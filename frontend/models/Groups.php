<?php

namespace frontend\models;

use yii\base\Model;
use yii\bootstrap\Modal;

class Groups extends Model
{
    public $key;
    public $name;
    public $label;
    public $slogan;
    public $icon;
    public $breaf;

    protected $arrdata;

    public function __construct()
    {
        // Стандартные настройки
        $this->arrdata = dirname(dirname(__DIR__)) . '/data/arrdata/groups.php';
    }

    public function getGroups(): array
    {
        $groups = $this->getGroupsFromArrdata();

        return $groups;
    }

    public function getGroupsFromArrdata(): array
    {
        require $this->arrdata;

        return $groups;
    }

    public function getArticleGroups(): array
    {
        $groups = $this->getGroups();
        $articleGroups = array_filter($groups, function($group) {
            return $group['entity_key'] === 1;
        });

        return $articleGroups;
    }

    public function getProductGroups(): array
    {
        $groups = $this->getGroups();
        $productGroups = array_filter($groups, function($group) {
            return $group['entity_key'] === 2;
        });

        return $productGroups;
    }

    public function getStainedglassGroups(): array
    {
        $groups = $this->getGroups();
        $productGroups = array_filter($groups, function($group) {
            return $group['entity_key'] === 3;
        });

        return $productGroups;
    }


    public function getGroupByKey(int $key): array
    {
        $groups = $this->getGroups();

        return $groups[$key] ?? [];
    }

}