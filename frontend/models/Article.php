<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use DirectoryIterator as Explorer;
use ownsite\ownExeptions\NotExistKeywordsException;
use frontend\models\Categories;

use function ownsite\functions\saveDataToArrfile;
use function ownsite\functions\latinTrans;

/**
 * При использовании импортера название файла статьи должны быть по умолчанию text.php (Одинаковым для всех), чтобы добавить в $articles
 * номер рубрики кратен 100, номер статьи от 1 до 99 + номер рубрики
 * скопировать шаблонную папку-ключ статьи - 101 и переименовать в номер статьи
 * Номер статьия #КОД# в файле text.php не влияет на ключ, тк он определяется папкой
 * изменить text.php в соответствующей папке с номером статьи - данные статьия, текст и изображения
 * добавить фото в папку статей из общей папки, тк фото отличаются от стандартных в images (width="770" height="430")
 * добавить $tips - советы для статей по категориям (не менее 2х в категории)
 * добавить $keywords - ключевые слова по категориям (не менее 3х в категории)
 * вызвать страницу importer для обновления данных в массиве статей $articles
 */
class Article extends Model
{
    public $key;
    public $category_key;
    public $author_key;

    public $name;
    public $label;
    public $cover;
    public $breaf;
    public $keywords;
    public $date;

    public $file;
    public $path;
    public $frontpath;

    public $parts;

    protected $articles_frontpath;
    protected $articles_path;
    protected $arrfile;

    // Константы. Основные параметры в article_text;
    const ARTICLE_KEY = '#КОД#';
    const ARTICLE_AUTHOR = '#АВТОР#';
    const ARTICLE_NAME = '#НАЗВАНИЕ#';
    const ARTICLE_KEYWORDS = '#КЛЮЧСЛОВА#';
    const ARTICLE_COVER = '#ОБЛОЖКА#';
    const ARTICLE_BREAF = '#КРАТКО#';

    // Константы. Текстовые части в article_text;
    const ARTICLE_PARAG = '#ПАРАГРАФ#';
    const ARTICLE_LIST = '#СПИСОК#';
    const ARTICLE_PHOTO = '#ФОТО#';
    const ARTICLE_PHOTOS = '#ФОТОГРАФИИ#';
    const ARTICLE_COLLAGE = '#ФОТОКОЛЛАЖ#';
    const ARTICLE_TABLE = '#ТАБЛИЦА#';
    const ARTICLE_ROWSET = '#НАБОРСТРОК#';
    const ARTICLE_TIP = '#СОВЕТ#';

    /**
     * предзагрузка директории статей относительно точки входа
     */
    public function __construct(string $articles_frontpath = null, string $arrfileName = null)
    {
        if (!$articles_frontpath && !$arrfileName) {
            $this->articles_frontpath = '/articles'; // относительно точки входа, должна располагатся внутри frontend/web
            $this->articles_path = Yii::getAlias('@webroot') . $this->articles_frontpath;
            $this->arrfile = dirname(dirname(__DIR__)) . '/data/arrdata/articles.php';
        } else {
            // стандартные настройки, если $articles_frontpath = null
            $this->articles_frontpath = $articles_frontpath; // относительно точки входа, должна располагатся внутри frontend/web
            $this->articles_path = Yii::getAlias('@webroot') . $articles_frontpath;
            $this->arrfile = dirname(dirname(__DIR__)) . '/data/arrdata/' . $arrfileName;
        }
        // свойства атрибутов по умолчанию
        $this->file = 'text.php';
        $this->date = date('d-m-Y', time());
        $this->author_key = 3;
    }

    public function rules()
    {
        return [
            [['key', 'category_key', 'author_key', 'name', 'label', 'cover', 'breaf', 'keywords', 'date', 'file', 'path', 'frontpath', 'parts'], 'safe']
        ];
    }

    public function getArticles(): array
    {
        $articles = $this->getArticlesFromArrdata();

        return  $articles;
    }

    public function getArticlesFromArrdata(): array
    {
        require $this->arrfile;
        $articlesName = basename($this->arrfile, '.php');

        return  $$articlesName;
    }

    public function getArticlesFromPath(): array
    {
        $articlePaths = $this->searchArticleFoldersInPath();
        $articles = $this->articlesImporterFromText($articlePaths);
        return  $articles;
    }

    public function getArticleByKey(int $key): array
    {
        $articles = $this->getArticles();

        return $articles[$key] ?? [];
    }

    public function getArticleByKeyWithParts(int $key): ?Article
    {
        $article = $this->getArticleByKey($key);

        if (!$article) {
            return null;
        }

        return $this->articlesImporterFromText([$article['path']])[$key];
    }

    public function getArticlesByCategory(int $categoryKey): array
    {
        $articles = $this->getArticles();

        $articles = array_filter($articles, function($article) use ($categoryKey) {
            return $article['category_key'] === $categoryKey;
        });

        return $articles;
    }
    
    public function getArticlesByCategories(array $categoryKeys): array
    {
        $articles = $this->getArticles();

        $articles = array_filter($articles, function($article) use ($categoryKeys) {
            return in_array($article['category_key'], $categoryKeys);
        });

        return $articles;
    }

    public function getArticlesBySortingCategories(array $categoryKeys): array
    {
        $articles = [];
        foreach ($categoryKeys as $key) {
            $articles = array_merge($articles, $this->getArticlesByCategory($key));
        }

        return $articles;
    }

    public function pagination(array $items, $offset, $limit) : array
    {
        return array_slice($items, $offset, $limit);
    }

    public function getLatinTrans(string $string): string
    {
        return latinTrans($string);
    }

    public function saveArticlesAsArrfile(array $articles): bool
    {
        // Сохраняем все safe атрибуты кроме $parts
        $mapArticles = array_map(function($article) {
                unset($article['parts']);
                return array_filter($article->toArray());
        }, $articles);

        return saveDataToArrfile($this->arrfile, $mapArticles);
    }

    /**
     * Просматривает папку статей, которая содержит папки с номерами статей
     * Возвращает массив ввиде ключ-директория статьи
     */
    public function searchArticleFoldersInPath(): array
    {
        $articleFolders = new Explorer($this->articles_path);

        $articlePaths = [];
        foreach ($articleFolders as $folder) {
            if($folder->isDot()) continue;
            if($folder->isFile()) continue;

            $articleKey = $folder->current()->getFilename(); // название папки-ключа статьи

            $articlePaths[$articleKey] = $this->articles_path . '/' . $articleKey;
        }

        return $articlePaths;
    }

    /**
     * Читает файл со статьей и добавляет параметры статьи в объект статьи
     * Возвращает массив ввиде ключ-объект статьи
     */
    public function articlesImporterFromText(array $articlePaths): array
    {

        $articles = [];
        foreach ($articlePaths as $article_path) {

            $article = $this->articlesTextConverter($article_path);
            if (!$article) continue;

            $article_params = $article['params'];
            $article_parts = $article['parts'];

            // Если папки названы как ключи
            $article_key = basename($article_path);

            // Если папки названы как categoryLabelEng переписываем $article_key
            $categories = (new Categories())->getCategories();
            $categoryLabelsEng = array_column($categories, 'label_eng');

            $categoryLabelEng = null;
            if (in_array($article_key, $categoryLabelsEng)) {
                $categoryLabelEng = $article_key;
                $article_key = (new Categories())->getCategoryByLabelEng($categoryLabelEng)['key'] + 1;
            }
    
            $article_params = array_merge($article_params, [
                'key' => (int) $article_key,
                'category_key' => (int) $article_key - ((int) $article_key % 100),
                'author_key' => (int) ($article_params['author_key'] ?? $this->author_key),
    
                'label' => $this->getLatinTrans($article_params['name']),
                'date' => $article_params['date'] ?? $this->date,
    
                'file' => $this->file,
                'path' => $article_path,
                'frontpath' => $categoryLabelEng 
                    ? $this->articles_frontpath . '/' . $categoryLabelEng 
                    : $this->articles_frontpath . '/' . $article_key,
                'parts' => $article_parts,
            ]);
    
            $article = new Article();
            $article->attributes = $article_params;

            $articles[$article_key] = $article;
        }

        return $articles;
    }

    /**
     * Читает файл со статьей и добавляет параметры статьи в объект статьи
     * Возвращает объект статьи
     */
    public function articleImporterFromText(string $article_frontpath): Article
    {
        $article_path = Yii::getAlias('@webroot') . $article_frontpath;

        $article = $this->articlesTextConverter($article_path);
        $article_params = $article['params'];
        $article_parts = $article['parts'];

        // Если папки названы как ключи
        $article_key = basename($article_path);

        // Если папки названы как categoryLabelEng переписываем $article_key
        $categories = (new Categories())->getCategories();
        $categoryLabelsEng = array_column($categories, 'label_eng');

        $categoryLabelEng = null;
        if (in_array($article_key, $categoryLabelsEng)) {
            $categoryLabelEng = $article_key;
            $article_key = (new Categories())->getCategoryByLabelEng($categoryLabelEng)['key'] + 1;
        }

        $article_params = array_merge($article_params, [
            'key' => (int) $article_key,
            'category_key' => (int) $article_key - ((int) $article_key % 100),
            'author_key' => (int) ($article_params['author_key'] ?? $this->author_key),

            'label' => $this->getLatinTrans($article_params['name']),
            'date' => $article_params['date'] ?? $this->date,

            'file' => $this->file,
            'path' => $article_path,
            'frontpath' => $categoryLabelEng 
                ? $this->articles_frontpath . '/' . $categoryLabelEng 
                : $this->articles_frontpath . '/' . $article_key,
            'parts' => $article_parts,
        ]);

        $article = new Article();
        $article->attributes = $article_params;

        return $article;
    }

    public function articlesTextConverter(string $article_path) : ?array
    {
        if (!is_readable($article_path . '/' . $this->file)) {
            return null;
        }
        /**
         * $article_text
         */
        require $article_path . '/' . $this->file;

        $text_parts = explode(PHP_EOL . PHP_EOL, $article_text);

        $article_parts = [];
        $article_properties = [];

        foreach ($text_parts as $text_part) {
            $text_rows = explode(PHP_EOL, $text_part);
            $article_part_type = array_shift($text_rows);

            // Основные параметры статьи
            if ($article_part_type === self::ARTICLE_BREAF) {
                $article_breaf = array_shift($text_rows);
                $article_parts[] = ['type' => $article_part_type, 'breaf' => $article_breaf];
                $article_properties['breaf'] =  $article_breaf;

            } elseif ($article_part_type === self::ARTICLE_KEY) {
                $article_properties['key'] =  array_shift($text_rows);

            } elseif ($article_part_type === self::ARTICLE_AUTHOR) {
                $article_properties['author_key'] =  array_shift($text_rows);

            } elseif ($article_part_type === self::ARTICLE_NAME) {
                $article_properties['name'] =  array_shift($text_rows);

            } elseif ($article_part_type === self::ARTICLE_KEYWORDS) {

                $keywords = (new Keywords)->getKeywords(); // для проверка ключевых слов
                $keywords_keys = array_column($keywords, 'key', 'name');

                $article_keywords = explode(', ', array_shift($text_rows));

                $article_keywords_keys = [];
                foreach ($article_keywords as $article_keyword)
                {
                    $keywords_key = $keywords_keys[$article_keyword] ?? null;
                    if ($keywords_key) {
                        $article_keywords_keys[] = $keywords_key;
                    } else {
                        throw new NotExistKeywordsException('Не существующее ключслово - ' . $article_keyword);
                    }
                }
                
                $article_properties['keywords'] = $article_keywords_keys;

            } elseif ($article_part_type === self::ARTICLE_COVER) {
                $article_cover = array_shift($text_rows);
                $article_alt = array_shift($text_rows);
                $article_parts[] = ['type' => $article_part_type, 'cover' => [$article_cover, $article_alt]];
                $article_properties['cover'] =  $article_cover;

            // Текстовые части статьи
            } elseif ($article_part_type === self::ARTICLE_PARAG) {
                $article_parts[] = ['type' => $article_part_type, 'parag' => array_shift($text_rows)];

            } elseif ($article_part_type === self::ARTICLE_TIP) {
                $article_parts[] = ['type' => $article_part_type, 'tip' => empty($text_rows) ? null : array_shift($text_rows)];

            } elseif ($article_part_type === self::ARTICLE_PHOTO) {
                $article_photo = array_shift($text_rows);
                $article_alt = array_shift($text_rows);
                $article_parts[] = ['type' => $article_part_type, 'image' => [$article_photo, $article_alt]];
            
            } elseif ($article_part_type === self::ARTICLE_PHOTOS) {
                $article_parts[] = ['type' => $article_part_type, 'images' => []];
                $article_parts_last_key = count($article_parts) - 1;
                $num = count($text_rows) / 2;

                for ($i = 0; $i < $num; $i++) {
                    $article_photo = array_shift($text_rows);
                    $article_alt = array_shift($text_rows);
                    $article_parts[$article_parts_last_key]['images'][] = [$article_photo, $article_alt];
                }

            } elseif ($article_part_type === self::ARTICLE_LIST) {
                $article_list_caption = array_shift($text_rows);
                $article_parts[] = ['type' => $article_part_type, 'list' => [$article_list_caption, $text_rows]];

            } elseif ($article_part_type === self::ARTICLE_TABLE) {
                $table_name = array_shift($text_rows);

                $table_html = PHP_EOL . '<table style="width: 100%; border-collapse: collapse">'. PHP_EOL;
                foreach ($text_rows as $row) {
                    $cells = explode('|', $row);
                    $table_html .= '<tr>' . PHP_EOL;
                    $first = $first ?? 'text-align: center; background-color: #eee;';
                    foreach ($cells as $cell_key => $cell) {
                        if (str_contains($cell, 'images/')) {
                            $cell = '<img style="max-width: 120px !important;" src="' . $this->articles_frontpath . '/' . $article_properties['key'] . '/' . $cell . '" alt="'. $cells[$cell_key + 1] .'" width="120" height="75">';
                        }
                        $table_html .= '<td style="' . $first . ' padding: 5px 5px; border: 1px solid grey;">' . $cell . '</td>' . PHP_EOL;
                    }

                    $first = '';
                    $table_html .= '</tr>'. PHP_EOL;
                }
                $table_html .= "</table>";

                $article_parts[] = ['type' => $article_part_type, 'table' => ['name' => $table_name, 'html' => $table_html]]; 
            
            } elseif ($article_part_type === self::ARTICLE_ROWSET) {
                $rowset_name = array_shift($text_rows);

                $rowset_rows = [];
                foreach ($text_rows as $csv_row) {
                    $rowset_rows[] = explode('|', $csv_row);
                }

                $article_parts[] = ['type' => $article_part_type, 'rowset' => ['rows' => $rowset_rows, 'name' => $rowset_name]]; 
            }
        }

        return ['params' => $article_properties, 'parts' => $article_parts];
    }

}