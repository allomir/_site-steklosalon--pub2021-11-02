<?php

namespace frontend\models;

use yii\base\Model;
use yii\bootstrap\Modal;

class Tips extends Model
{
    public $key;
    public $category_key;
    public $name;
    public $label;
    public $desc;

    protected $arrdata;

    public function __construct()
    {
        // Стандартные настройки
        $this->arrdata = dirname(dirname(__DIR__)) . '/data/arrdata/tips.php';
    }

    public function getTips(): array
    {
        $tips = $this->getTipsFromArrdata();

        return $tips;
    }

    public function getTipsFromArrdata(): array
    {
        require $this->arrdata;

        return $tips;
    }

    public function getTipsByCategory(int $categoryKey): array
    {
        $tips = $this->getTips();

        $tipsByCategory = array_filter($tips, function($tip) use($categoryKey) {
            return $tip['category_key'] === $categoryKey;
        });

        return $tipsByCategory;
    }
}
