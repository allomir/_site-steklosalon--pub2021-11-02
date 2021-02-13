<?php

namespace frontend\models;

use yii\base\Model;
use yii\bootstrap\Modal;

class Entity extends Model
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
        $this->arrdata = dirname(dirname(__DIR__)) . '/data/arrdata/entities.php';
    }

    public function getEntities(): array
    {
        $entities = $this->getEntitiesFromArrdata();

        return $entities;
    }

    public function getEntitiesFromArrdata(): array
    {
        require $this->arrdata;

        return $entities;
    }

}