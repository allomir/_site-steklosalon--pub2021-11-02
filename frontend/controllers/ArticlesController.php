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

class ArticlesController extends Controller
{
    /**
     * все статьи во всех категориях с меню категорий
     */
    public function actionIndex(string $category_label = null)
    {
        if (!$category_label) {
            return $this->actionCategories(); // при действии по умолчанию вызываем actionCategories() 
        }
        
        $entityBasic = new Entity;
        $entity = $entityBasic->getEntities()[1];

        $groupBasic = new Groups;
        $articleGroups = $groupBasic->getArticleGroups();

        $usersBasic = new Users;
        $users = $usersBasic->getUsers();

        $categoryBasic = new Categories;
        $articleCategories = $categoryBasic->getArticleCategories();
        
        $currentCategory = $category_label === null ? true : $categoryBasic->getCategoryByLabel($category_label);

        if (!$currentCategory) {
            throw new NotFoundHttpException("Категория не существует - " .  $category_label);
        }

        $keywordsBasic = new Keywords;
        $keywords = $category_label 
            ? $keywordsBasic->getKeywordsByCategory($currentCategory['key'])
            : $articleCategories; // в виде выберутся имена категорий как ключевые слова при показе всех статей

        $articleBasic = new Article;
        $articles = $category_label 
            ? $articleBasic->getArticlesByCategory($currentCategory['key'])
            : $articleBasic->getArticlesByCategories(array_keys($articleCategories));

        $pages = new Pagination(['totalCount' => count($articles), 'pageSize' => 5]);
        $articlesByPagination = $articleBasic->pagination($articles, $pages->offset, $pages->limit);
    
        $metaDesc = $category_label 
        ? $currentCategory['breaf']
        : implode('. ', array_column($articleGroups, 'breaf'));

        return $this->render(
            'index',
            [
                'categories' => $articleCategories, 
                'groups' => $articleGroups,
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

    /**
     * все категории в виде иконок без меню категорий
     */
    public function actionCategories()
    {

        $categoryBasic = new Categories;
        $categories_1 = $categoryBasic->getCategoryByGroup(1);
        $categories_2 = $categoryBasic->getCategoryByGroup(2);

        $keywordsAsCategoryName = array_merge($categories_1, $categories_2); // в виде выберутся имена категорий как ключевые слова

        $groupBasic = new Groups;
        $articleGroups = $groupBasic->getArticleGroups();

        $entityBasic = new Entity;
        $entity = $entityBasic->getEntities()[1];

        $metaDesc = implode('. ', array_column($articleGroups, 'breaf'));

        return $this->render(
            'categories',
            [
                'categories_1' => $categories_1, 
                'categories_2' => $categories_2,
                'article_groups' => $articleGroups,
                'entity' => $entity,
                'keywords' => $keywordsAsCategoryName,
                'metaDesc' => $metaDesc,
            ]
        );
    }

    public function actionShow(int $article_key)
    {
        $entityBasic = new Entity;
        $entity = $entityBasic->getEntities()[1];

        $articleBasic = new Article();
        $currentArticle = $articleBasic->getArticleByKeyWithParts($article_key);

        if (!$currentArticle) {
            throw new NotFoundHttpException("Статья не существует - " .  $article_key);
        }

        $groupBasic = new Groups;
        $articleGroups = $groupBasic->getArticleGroups();

        $categoryBasic = new Categories;
        $articleCategories = $categoryBasic->getArticleCategories();
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
                'entity' => $entity,
            ]
        );
    }

    public function _actionImporter()
    {
        $articleBasic = new Article(); // articles_frontpath, arrfileName по умолчанию
        $articles = $articleBasic->getArticlesFromPath();
        $saver = $articleBasic->saveArticlesAsArrfile($articles);

        $articleProduct = new Article('/products', 'articles_products.php'); // products_frontpath, arrfileName
        $articles2 = $articleProduct->getArticlesFromPath();
        $saver2 = $articleProduct->saveArticlesAsArrfile($articles2);
        return $this->render(
            'importer',
            [
                'articles' => array_merge($articles, $articles2),
                'saver' => $saver . $saver2,
            ]
        );
    }
}
