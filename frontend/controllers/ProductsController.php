<?php

namespace frontend\controllers;

use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use frontend\models\Article;
use frontend\models\Users;
use frontend\models\Keywords;
use frontend\models\Tips;
use frontend\models\Categories;
use frontend\models\Groups;
use frontend\models\Entity;
use frontend\models\Products;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;

class ProductsController extends Controller
{
    /**
     * Displays page.
     *
     * @return mixed
     */
    public function actionIndex(string $category_label = null, string $product_category_label = null) // тк по умолчанию вызывается этот контроллер то необходимо разрешить заходить в контроллер при = null 
    {
        if (!$category_label) {
            return $this->actionCategories(); // при действии по умолчанию вызываем actionCategories() 
        }

        $categoryBasic = new Categories;
        $category = $categoryBasic->getCategoryByLabel($category_label);
        $categories = $categoryBasic->getProductCategories();
        $categories = $categoryBasic->sorting('pop', $categories);

        if (!$category) {
            throw new NotFoundHttpException("Категория не существует - " .  $category_label);
        }

        $categoryProduct = new Categories($category['label_eng']);
        $productCategories = $categoryProduct->getCategories();
        $currentProductCategory = $product_category_label 
            ? $categoryProduct->getCategoryByLabel($product_category_label) 
            : true;

        if (!$currentProductCategory) {
            throw new NotFoundHttpException("Категория продукта не существует - " .  $product_category_label);
        }
    
        $groupBasic = new Groups;
        $group = $groupBasic->getGroupByKey($category['group_key']);

        $entityBasic = new Entity;
        $entity = $entityBasic->getEntities()[2];
        
        $keywordsBasic = new Keywords;
        $keywords = $keywordsBasic->getKeywordsByCategory($category['key']); 

        $productBasic = new Products($category['label_eng']);
        $productItems = $product_category_label
            ? $productBasic->getProductItemsByCategoryKeyWithImages($currentProductCategory['key'])
            : $productBasic->getProductItemsWithImages();

        // если items нет то показываем главную статью c помощью редиректа, чтобы статья отражалась под своим адресом
        if (!$productItems) {
            return Yii::$app->getResponse()->redirect('/?r=products/article&article_key=' . ($category['key'] + 1));
        }

        $pages = new Pagination(['totalCount' => count($productItems)]);
        $itemsByPagination = $productBasic->pagination($productItems, $pages->offset, $pages->limit);

        $metaDesc = $category['breaf'];

        return $this->render('index', [
            'category' => $category,
            'categories' => $categories,
            'productCategories' => $productCategories,
            'currentProductCategory' => $currentProductCategory,
            'group' => $group,
            'entity' => $entity,
            'productItems' => $itemsByPagination,
            'pages' => $pages,
            'keywords' => $keywords,
            'metaDesc' => $metaDesc,
        ]);
    }

    public function actionCategories()
    {
        $categoryBasic = new Categories;
        $productCategories = $categoryBasic->getProductCategories();

        $keywords = $productCategories; // в виде выберутся имена категорий как ключевые слова

        $groupBasic = new Groups;
        $productGroups = $groupBasic->getProductGroups();

        $entityBasic = new Entity;
        $entity = $entityBasic->getEntities()[2];
        
        $metaDesc = implode('. ', array_column($productGroups, 'breaf'));

        return $this->render('categories', [
            'categories' => $productCategories,
            'product_groups' => $productGroups,
            'entity' => $entity,
            'keywords' => $keywords,
            'metaDesc' => $metaDesc,
        ]);
    }

    public function _actionImporter()
    {
        $categoryBasic = new Categories;
        $productCategories = $categoryBasic->getProductCategories();
        
        $success = [];
        foreach($productCategories as $category) {
            $productBasic = new Products($category['label_eng']);
            $success[$category['label_eng']] = $productBasic->createItemImagesArrfile();
        }
        
        return $this->render('importer', [
            'success' => $success,
        ]);
    }

    public function actionArticle(string $article_key)
    {
        $articleProduct = new Article('/products', 'articles_products.php'); // products_frontpath, arrfileName
        $currentArticle = $articleProduct->getArticleByKeyWithParts($article_key);

        if (!$currentArticle) {
            throw new NotFoundHttpException("Статья не существует - " .  $article_key);
        }

        $categoryBasic = new Categories;
        $categories = $categoryBasic->getProductCategories();
        $categories = $categoryBasic->sorting('pop', $categories);

        $articles = $articleProduct->getArticlesByCategory($currentArticle['category_key']);

        $categoryBasic = new Categories;
        $currentCategory = $categoryBasic->getCategoryByKey($currentArticle['category_key']);

        $entityBasic = new Entity;
        $entity = $entityBasic->getEntities()[2];
        
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
            'article',
            [
                'currentCategory' => $currentCategory,
                'author' => $author,
                'article' => $currentArticle,
                'articles' => $articles,
                'article_parts' => $currentArticle['parts'],
                'tips' => $tips,
                'tip' => $tip,
                'entity' => $entity,
                'categories' => $categories,
                'keywordNames' => array_slice($keywordNames, 0, 3, true),
                'keywords' => $keywords,
            ]
        );
    }

}