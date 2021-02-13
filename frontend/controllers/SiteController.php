<?php

namespace frontend\controllers;

use yii\web\Controller;
use frontend\models\Article;
use frontend\models\Categories;
use frontend\models\Groups;
use frontend\models\Users;
use frontend\models\Keywords;
use frontend\models\Tips;
use frontend\models\Entity;
use frontend\models\CompanyInfo;

class SiteController extends Controller
{
    // public function actions()
    // {
    //     return [
    //         'error' => ['class' => 'yii\web\ErrorAction'],
    //     ];
    // }

    public function actionError()
    {
        $this->layout = 'emptypage';

        $companyInfo = (new CompanyInfo)->getInfo();
        $exception = \Yii::$app->errorHandler->exception;
        $errname = \Yii::$app->errorHandler->getExceptionName($exception);
        $code = $exception->statusCode;
        $mess = $exception->getMessage();

        if ($exception !== null) {
            return $this->render('error', [
                'code' => $code,
                'mess' => $mess,
                'errname' => $errname,
                'exception' => $exception,
                'companyInfo' => $companyInfo,
                ]);
        }
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex(int $more = 1)
    {
        $companyDesc = (new CompanyInfo)->getInfo()['desc'];

        $categoryBasic = new Categories;
        $categories = $categoryBasic->getCategories();
        
        $productCategories = $categoryBasic->getProductCategories();
        $productCategories = $categoryBasic->sorting('pop', $productCategories);
        $productCategories = array_slice($productCategories, 0, 10);

        $articleCategories = $categoryBasic->getArticleCategories();
        $articleCategories = $categoryBasic->sorting('pop', $articleCategories);

        $groupBasic = new Groups;
        $groups = $groupBasic->getGroups();

        $entityBasic = new Entity;
        $entities = $entityBasic->getEntities();
        $productEntities = $entities[2];
        $articleEntities = $entities[1];

        $keywordsBasic = new Keywords;
        $keywords = $keywordsBasic->getKeywordsMain(); 

        $articleBasic = new Article;
        $articleProduct = new Article('/products', 'articles_products.php'); // products_frontpath, arrfileName

        $articles = $articleBasic->getArticlesBySortingCategories(array_column($articleCategories, 'key'));
        
        $swiperArticles = [];
        $swiperArticles[] = $articleProduct->getArticleByKey(31601); //Двери раздвижные
        $swiperArticles[] = $articleProduct->getArticleByKey(31201); //Душевые перегородки
        $swiperArticles[] = $articleBasic->getArticleByKey(20501); //Перегородки межкомнатные

        $num = 6;
        $quntity = $num * $more;
        $articles = array_slice($articles, 0, $quntity);

        if ($quntity >= count($articleCategories)) {
            $more = false;
        }

        return $this->render('index',
            [
                'productCategories' => $productCategories, 
                'productEntities' => $productEntities,
                'articleCategories' => $articleCategories,
                'articleEntities' => $articleEntities,
                'categories' => $categories,
                'groups' => $groups,
                'entities' => $entities,
                'articles' => $articles,
                'swiperArticles' => $swiperArticles,
                'more' => $more,
                'keywords' => $keywords,
                'companyDesc' => $companyDesc,
            ]
        );
    }
}