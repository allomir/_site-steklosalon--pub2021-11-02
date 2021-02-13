<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use frontend\models\Categories;
use frontend\models\Article;

use function ownsite\functions\saveDataToArrfile;
use function ownsite\functions\latinTrans;

use DirectoryIterator as Explorer;

/**
 * @arrFile string path/to/dir/arrdata/arrfile
 * @articleFileMain string имя файла с общей статьей для всех продуктовых категорий (серий) одного вида продукции в ее папке (product_path)
 * 
 */
class Products extends Model
{
    public $categoryKey;

    public $articleFileMain;
    public $date;
    public $author_key;
    
    protected $categoryLabelEng;
    protected $products_frontpath;
    protected $product_frontpath;
    protected $product_path;
    protected $arrfile;
    protected $itemImagesFolder;

     /**
     * предзагрузка продукта по категории (не путать с продуктовыми категориями)
     */
    public function __construct(string $categoryLabelEng)
    {
        // стандартные настройки
        $this->products_frontpath = '/products';
        $this->categoryLabelEng = $categoryLabelEng;
        $this->product_frontpath = $this->products_frontpath . '/' . $categoryLabelEng; // относительно точки входа, должна располагатся внутри frontend/web
        $this->product_path = Yii::getAlias('@webroot') . $this->product_frontpath;
        $this->arrfile = dirname(dirname(__DIR__)) . '/data/arrdata/product_' . $categoryLabelEng . '.php';
        $this->itemImagesFolder = '/images-items';

        // свойства атрибутов по умолчанию
        $this->articleFileMain = 'text_main.php';
        $this->date = date('d-m-Y', time());
        $this->author_key = 3;

    }

    public function getProductItems()
    {
        $productItems = $this->getProductItemsFromArrfile();

        return $productItems;
    }

    public function getProductsFrontpath()
    {
        return $this->products_frontpath;
    }

    public function getProductFrontpath()
    {
        return $this->product_frontpath;
    }

    public function getProductPath()
    {
        return $this->product_path;
    }


    public function getProductItemsByCategoryKey(int $productCategoryKey) : array
    {
        $productItems = $this->getProductItems();

        $itemsByCategory = array_filter($productItems, function($item) use ($productCategoryKey) {
            return $item['product_category_key'] === $productCategoryKey;
        });

        return $itemsByCategory;
    }

    public function getProductItemsByCategoryKeyWithImages(int $productCategoryKey) : array
    {
        $productItems = $this->getProductItemsWithImages();

        $itemsByCategory = array_filter($productItems, function($item) use ($productCategoryKey) {
            return $item['product_category_key'] === $productCategoryKey;
        });

        return $itemsByCategory;
    }

    public function getProductCategories()
    {
        $productCategories = $this->getProductCategoriesFromArrfile();

        return $productCategories;
    }

    public function getItemImages()
    {
        $itemImages = $this->getItemImagesFromArrfile();

        return $itemImages;
    }

    public function getItemByVendorCode(string $vendorCode)
    {
        $productItems = $this->getProductItems();

        if (!isset($productItems[array_key_first($productItems)]['vendor_code'])) {
            return null;
        }

        $productItems = array_filter($productItems, function($item) use($vendorCode) {
            return $item['vendor_code'] === $vendorCode;
        });

        return array_shift($productItems);
    }

    public function getProductItemsWithImages() : ?array
    {
        $productItems = $this->getProductItems();
        // Если не добавлен ни один элемент
        if (!$productItems) {
            return [];
        }

        $itemImages = $this->getItemImages();

        $itemImagesByItemKey = array_reduce($itemImages, function($acc, $image) {
            $acc[$image['item_key']][] = $image['image'];
            return $acc;
        }, []);

        $fullItems = array_map(function($item) use($itemImagesByItemKey) {
            $item['images'] = $itemImagesByItemKey[$item['key']] ?? null;
            return $item; 
        }, $productItems);

        return $fullItems;
    }

    public function getProductItemsFromArrfile() : ?array
    {
        if (!is_readable($this->arrfile)) {
            return null;
        }

        require $this->arrfile;
        $arrayName = basename($this->arrfile, '.php');

        return $$arrayName;
    }

    public function getProductCategoriesFromArrfile() : ?array
    {
        $arrFile = dirname($this->arrfile) . "/categories_" . $this->categoryLabelEng . '.php';
        if (!is_readable($arrFile)) {
            return null;
        }

        require $arrFile;
        $arrayName = basename($arrFile, '.php');

        return $$arrayName;
    }

    public function getItemImagesFromArrfile()
    {
        $arrFile = dirname($this->arrfile) . "/images_" . $this->categoryLabelEng . '.php';
        require $arrFile;
        $arrayName = basename($arrFile, '.php');

        return $$arrayName;
    }

    public function createItemImagesArrfile() : bool
    {
        $productCategoryPaths = $this->searchProductCategoryPathsInProductPath();
        $itemImages = $this->searchItemImagesInProductCategoriesPaths($productCategoryPaths);

        return $this->saveitemImagesAsArrfile($itemImages);
    }

    public function pagination(array $items, $offset, $limit) : array
    {
        return array_slice($items, $offset, $limit);
    }

    public function ArticleFileMainImporter() : Article
    {
        $articleBasic = new Article;
        /**
         * $article_text
         */
        require $product_path . '/' . $this->articleFileMain;

        $article = $this->articlesTextConverter($article_text);
        $article_params = $article['params'];
        $article_parts = $article['parts'];

        $article_params = array_merge($article_params, [
            'category_key' => null,
            'author_key' => (int) ($article_params['author_key'] ?? $this->author_key),

            'label' => $articleBasic->getLatinTrans($article_params['name']),
            'date' => $article_params['date'] ?? $this->date,

            'file' => $this->articleFileMain,
            'path' => $product_path,
            'frontpath' => $this->product_frontpath . '/' . $categoryLabelEng,
            'parts' => $article_parts,
        ]);

        $article->attributes = $article_params;

        return $article;
    }

    /**
     * Просматривает папку продукта, которая содержит папки с категориями и главной статьей
     * Возвращает массив ввиде ключ-директория продуктовых категории по label_eng одного вида продукта
     */
    public function searchProductCategoryPathsInProductPath() : array
    {
        // если не создан еще продукт те папка не  создавалась
        if (!is_readable($this->product_path)) {
            return [[
                'category_path' => $this->product_path, 
                'category_frontpath' => $this->product_frontpath
            ]];
        }

        $productCategoryFolders = new Explorer($this->product_path);

        // По умолчанию ищем images-items внутри основной директории продукта, даже если есть категории, если все изображения лежат в одной папке
        $productCategoryPaths = [[
            'category_path' => $this->product_path, 
            'category_frontpath' => $this->product_frontpath
        ]];

        foreach ($productCategoryFolders as $folder) {
            if($folder->isDot()) continue;
            if($folder->isFile()) continue;

            $productCategory = $folder->current()->getFilename(); // название продуктовых категорий label_eng

            $productCategoryPaths[] = [
                'category_path' => $this->product_path . '/' . $productCategory, 
                'category_frontpath' => $this->product_frontpath . '/' . $productCategory
            ];
        }

        return $productCategoryPaths;
    }

    /**
     * Просматривает папку продуктовой категории и находим все фото в папке images-items
     * Возвращает массив ввиде ключ-директория продуктовых категории по label_eng одного вида продукта
     */
    public function searchItemImagesInProductCategoriesPaths(array $paths): array
    {
        $itemImages = [];

        foreach($paths as ['category_path' => $path, 'category_frontpath' => $frontpath]) {

            // Если директория не создавалась (!!! временно)
            if (!is_readable($path . $this->itemImagesFolder)) {
                continue;
            }
    
            $imageFiles = new Explorer($path . $this->itemImagesFolder);

            foreach ($imageFiles as $image) {
                if($image->isDot()) continue;
                if($image->isDir()) continue;

            // 1 вариант номер изображения в виде $productCategoryLabelEng-($productItemKey)--$anyDescAlt,
            // 2 вариант номер соответствует артиклу - item_vendor_code
            $imageName = $image->current()->getFilename();

                if ($item = $this->getItemByVendorCode( pathinfo($imageName, PATHINFO_FILENAME) )) { // номер соответствует vendor_code или артиклу
                    $productItemKey = $item['key'];
                } else {
                    $productItemKey = @explode(')', explode('(', $imageName)[1])[0]; //номер в скобках по умолчанию
                }

                $itemImages[] = [
                    'item_key' => (int) $productItemKey,
                    'image' => $frontpath . $this->itemImagesFolder . '/' . $imageName,
                ];
            }
        }
        return $itemImages;
    }

    public function saveitemImagesAsArrfile(array $itemImages): bool
    {
        if (empty($itemImages)) {
            return false;
        }

        $itemImagesFile = dirname($this->arrfile) . "/images_" . $this->categoryLabelEng . '.php';

        return saveDataToArrfile($itemImagesFile, $itemImages);
    }

}