<?php

namespace frontend\models;

use yii\base\Model;
use yii\bootstrap\Modal;

class Keywords extends Model
{
    public $key;
    public $category_key;
    public $name;
    public $label;
    public $pop;

    protected $arrdata;

    public function __construct()
    {
        // Стандартные настройки
        $this->arrdata = dirname(dirname(__DIR__)) . '/data/arrdata/keywords.php';
    }

    public function getKeywords(): array
    {
        $keywords = $this->getKeywordsFromArrdata();

        return $keywords;
    }

    public function getKeywordsFromArrdata(): array
    {
        require $this->arrdata;

        return $keywords;
    }

    public function getKeywordByKey(int $key): array
    {
        $keywords = $this->getKeywords();

        return $keywords[$key] ?? [];
    }

    public function getKeywordsByCategory(int $category_key): array
    {
        $keywords = $this->getKeywords();

        $keywordsByCategory = array_filter($keywords, function($word) use($category_key) {
            return $word['category_key'] === $category_key;
        });

        return $keywordsByCategory;
    }

    public function getKeywordsByCategories(array $categories_key): array
    {
        $keywords = $this->getKeywords();

        $keywordsByCategories = array_filter($keywords, function($word) use($categories_key) {
            return in_array($word['category_key'], $categories_key);
        });

        return $keywordsByCategories;
    }

    public function getKeywordsMain(): array
    {
        $keywords = $this->getKeywords();

        $keywordsMain = array_filter($keywords, function($word) {
            return $word['key'] <= 100;
        });

        return array_column($keywordsMain, null, 'key');
    }

}