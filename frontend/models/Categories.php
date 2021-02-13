<?php

namespace frontend\models;

use yii\base\Model;
use yii\bootstrap\Modal;

class Categories extends Model
{
    public $key;
    public $group_key;
    public $name;
    public $label;
    public $labelEng;
    public $icon;
    public $breaf;

    protected $arrdataPath;
    protected $arrfile;

    public function __construct(string $productCategoryLabelEng = null)
    {
        // Стандартные настройки
        $this->arrdataPath = dirname(dirname(__DIR__)) . '/data/arrdata';
        if ($productCategoryLabelEng) {
            $this->arrfile = $this->arrdataPath . '/categories_' . $productCategoryLabelEng . '.php';
        } else {
            $this->arrfile = $this->arrdataPath . '/categories.php';
        }
    }

    public function getCategories(): ?array
    {
        $categories = $this->getCategoriesFromArrfile();

        return $categories;
    }

    public function getCategoriesFromArrfile(): ?array
    {
        if (!is_readable($this->arrfile)) {
            return null;
        }

        require $this->arrfile;

        return $categories;
    }

    public function getArticleCategories(): array
    {
        $categories = $this->getCategories();

        $articlesCategories = array_filter($categories, function($category){
            return $category['group_key'] <= 2;
        });

        return $articlesCategories;
    }

    public function getProductCategories(): array
    {
        $categories = $this->getCategories();

        $productCategories = array_filter($categories, function($category){
            return $category['group_key'] >= 3 && $category['group_key'] <= 5;
        });

        return $productCategories;
    }

    public function getStainedglassCategories(): array
    {
        $categories = $this->getCategories();

        $articlesCategories = array_filter($categories, function($category){
            return $category['group_key'] >= 6;
        });

        return $articlesCategories;
    }

    public function getCategoryByLabel(string $label): array
    {
        $categories = $this->getCategories();

        $currentCategory = [];
        foreach ($categories as $category) {
            if ($category['label'] === $label) {
                $currentCategory = $category;
                break;
            }
        }

        return $currentCategory;
    }


    public function getCategoryByLabelEng(string $labelEng): array
    {
        $categories = $this->getCategories();

        $currentCategory = [];
        foreach ($categories as $category) {
            if ($category['label_eng'] === $labelEng) {
                $currentCategory = $category;
                break;
            }
        }

        return $currentCategory;
    }

    public function getCategoryByKey(int $key): array
    {
        return $this->getCategories()[$key] ?? [];
    }

    public function sorting(string $field, array $categories): array
    {
        $fieldRows = array_column($categories, $field, 'key');
        array_multisort($fieldRows, SORT_DESC, $categories);

        return $categories;
    }

    public function getCategoryByGroup(int $groupKey): array
    {
        $categories = $this->getCategories();

        $categoriesByGroup = array_filter($categories, function($category) use($groupKey) {
            return $category['group_key'] === $groupKey;
        });

        return $categoriesByGroup;
    }

}
