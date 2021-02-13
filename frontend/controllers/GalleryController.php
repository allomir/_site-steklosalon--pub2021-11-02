<?php

namespace frontend\controllers;

use yii\web\Controller;
use frontend\models\Gallery;
use frontend\models\Categories;
use frontend\models\Entity;
use frontend\models\Keywords;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;

class GalleryController extends Controller
{
    public function actionIndex(string $category_label = null)
    {
        $gallery = new Gallery;
        $categories = $gallery->getExistCategories();
        $currentCategory = $category_label === null ?: (new Categories)->getCategoryByLabel($category_label);

        if (!$currentCategory) {
            throw new NotFoundHttpException("Категория не существует - " .  $category_label);
        }

        $keywordsBasic = new Keywords;
        $keywords = $category_label 
            ? $keywordsBasic->getKeywordsByCategory($currentCategory['key'])
            : $categories; // в виде выберутся имена категорий как ключевые слова

        $images = $category_label
            ? $gallery->getImagesByCategoryKey($currentCategory['key'])
            : $gallery->getImages();

        $entityBasic = new Entity;
        $entity = $entityBasic->getEntities()[4];

        $pages = new Pagination(['totalCount' => count($images)]);
        $imagesByPagination = $gallery->pagination($images, $pages->offset, $pages->limit);

        $metaDesc = $category_label 
        ? 'Фотографии работ, изображения изделий, конструкций, стелка и зеркал. Тема - ' . $currentCategory['breaf']
        : 'Галерея - портфолио, фотографии работ: фотографии стеклоконструкций, фотографии стеклоизделий, фотографии изделий из стекла, фотографии обработки стекла, фотографии витражей';

        return $this->render('index', [
            'images' => $imagesByPagination,
            'categories' => $categories,
            'currentCategory' => $currentCategory,
            'entity' => $entity,
            'pages' => $pages,
            'keywords' => $keywords,
            'metaDesc' => $metaDesc,
            ]);
    }

    public function _actionImporter()
    {
        $gallery = new Gallery;
        $images = $gallery->getImagesInFrontpath();
        $saver = $gallery->saveImagesarrToArrfile($images);

        return $this->render('importer', [
            'images' => $images,
            'saver' => $saver,
            ]);
    }

}