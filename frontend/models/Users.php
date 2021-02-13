<?php

namespace frontend\models;

use yii\base\Model;
use yii\bootstrap\Modal;

class Users extends Model
{
    public $key;
    public $name;

    protected $arrdata;

    public function __construct()
    {
        // Стандартные настройки
        $this->arrdata = dirname(dirname(__DIR__)) . '/data/arrdata/users.php';
    }

    public function getUsers(): array
    {
        $users = $this->getUsersFromArrdata();

        return $users;
    }

    public function getUsersFromArrdata(): array
    {
        require $this->arrdata;

        return $users;
    }

}
