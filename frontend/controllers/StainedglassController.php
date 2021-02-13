<?php

namespace frontend\controllers;

use yii\web\Controller;
use ownsite\fileProcessing\FileExplorer;
use ownsite\fileProcessing\ArticleFormatter;
use yii\web\NotFoundHttpException;

use frontend\models\Article;
use frontend\models\Categories;
use frontend\models\Groups;
use frontend\models\Users;
use frontend\models\Keywords;
use frontend\models\Tips;
use frontend\models\Entity;
use yii\data\Pagination;

class StainedglassController extends Controller
{
    /**
     * все статьи во всех категориях с меню категорий
     */
    public function actionIndex(string $category_label = null)
    {
        $entityBasic = new Entity;
        $entity = $entityBasic->getEntities()[3];

        $groupBasic = new Groups;
        $stainedglassGroups = $groupBasic->getStainedglassGroups();

        $usersBasic = new Users;
        $users = $usersBasic->getUsers();

        $categoryBasic = new Categories;
        $articleCategories = $categoryBasic->getStainedglassCategories();
        $currentCategory = $category_label === null ? true : $categoryBasic->getCategoryByLabel($category_label);

        if (!$currentCategory) {
            throw new NotFoundHttpException("Категория не существует - " .  $category_label);
        }


        $keywordsBasic = new Keywords;
        $keywords = $category_label 
            ? $keywordsBasic->getKeywordsByCategory($currentCategory['key'])
            : $keywordsBasic->getKeywordsByCategories(array_column($articleCategories, 'key'));

        $articleBasic = new Article;
        $articles = $category_label 
            ? $articleBasic->getArticlesByCategory($currentCategory['key'])
            : $articleBasic->getArticlesByCategories(array_keys($articleCategories));

        $pages = new Pagination(['totalCount' => count($articles), 'pageSize' => 5]);
        $articlesByPagination = $articleBasic->pagination($articles, $pages->offset, $pages->limit);

        $metaDesc = $category_label 
        ? $currentCategory['breaf']
        : implode('. ', array_column($stainedglassGroups, 'breaf'));

        return $this->render(
            'index',
            [
                'categories' => $articleCategories, 
                'groups' => $stainedglassGroups,
                'currentCategory' => $currentCategory,
                'articles' => $articlesByPagination,
                'users' => $users,
                'entity' => $entity,
                'pages' => $pages,
                'keywords' => $keywords,
                'metaDesc' => $metaDesc,
            ]
        );
    }

    public function actionShow(int $article_key)
    {

        $articleBasic = new Article();
        $currentArticle = $articleBasic->getArticleByKeyWithParts($article_key);

        if (!$currentArticle) {
            throw new NotFoundHttpException("Статья не существует - " .  $article_key);
        }


        $groupBasic = new Groups;
        $articleGroups = $groupBasic->getArticleGroups();

        $categoryBasic = new Categories;
        $articleCategories = $categoryBasic->getStainedglassCategories();
        $currentCategory = $articleCategories[$currentArticle['category_key']];
        
        $usersBasic = new Users;
        $users = $usersBasic->getUsers();
        $author = $users[$currentArticle['author_key']];

        $tipsBasic = new Tips;
        $tips = $tipsBasic->getTipsByCategory($currentCategory['key']);

        // случайный совет по текущей категории
        $tip = $tips[array_rand($tips)];

        $keywordsBasic = new Keywords;
        $keywords = $keywordsBasic->getKeywordsByCategory($currentCategory['key']);
        $keywordNames = array_map(function($key) use($keywordsBasic) {
            return $keywordsBasic->getKeywordByKey($key)['name'];
        }, $currentArticle['keywords']);

        return $this->render(
            'show',
            [
                'categories' => $articleCategories, 
                'article_groups' => $articleGroups,
                'currentCategory' => $currentCategory,
                'author' => $author,
                'article' => $currentArticle,
                'article_parts' => $currentArticle['parts'],
                'tips' => $tips,
                'tip' => $tip,
                'keywordNames' => array_slice($keywordNames, 0, 3, true),
                'keywords' => $keywords,
            ]
        );
    }
}
