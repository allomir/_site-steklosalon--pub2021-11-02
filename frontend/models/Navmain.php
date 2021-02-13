<?php

namespace frontend\models;

use yii\base\Model;
use frontend\models\Entity;
use frontend\models\Groups;
use frontend\models\Categories;
use frontend\models\Gallery;

class Navmain extends Model
{
    public function getNammain() : array
    {
        $entiies = (new Entity)->getEntities();
        $groups = (new Groups)->getGroups();
        $categories = (new Categories())->getCategories();
        $gallery_nav = (new Gallery)->getExistCategories();
        
        return [
            'entiies' => $entiies,
            'groups' => $groups,
            'categories' => $categories,
            'gallery_nav' => $gallery_nav,
        ];
    }
}