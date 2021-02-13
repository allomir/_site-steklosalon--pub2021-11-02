<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use frontend\models\Navmain;
use frontend\models\CompanyInfo;

$companyInfo = (new CompanyInfo)->getInfo();
$navmain = (new Navmain)->getNammain();
// use frontend\assets\AppAsset;
// AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <!-- page head -->
    <?php $this->beginBlock('layout_excluded_scripts'); ?>
    <!-- <script type="text/javascript" async="" src="https://www.google-analytics.com/plugins/ua/ec.js"></script>
    <script type="text/javascript" async="" src="https://www.google-analytics.com/analytics.js"></script>
    <script async="" src="//www.googletagmanager.com/gtm.js?id=GTM-P9FT69"></script>
    <script type="text/javascript" async="" src="https://ssl.google-analytics.com/ga.js"></script> -->
    <!-- нижний догружает <script src="/cdn-cgi/apps/body/4o300efCt-CXoq1JEC-sVReFz48.js"></script> -->
    <?php $this->endBlock(); ?>

    <script src="/cdn-cgi/apps/head/3ts2ksMwXvKRuG480KNifJ2_JNM.js"></script> 
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <!-- Stylesheets собрать в один файл-->
    <link href="https://fonts.googleapis.com/css2?family=Cuprum:wght@400;500&family=Fira+Sans+Extra+Condensed:wght@300;400;500&family=Inter:wght@400;500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/normalize-min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/style.css">

    <style>
        .ie-panel {
            display: none;
            background: #212121;
            padding: 10px 0;
            box-shadow: 3px 3px 5px 0 rgba(0, 0, 0, .3);
            clear: both;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        html.ie-10 .ie-panel,
        html.lt-ie-10 .ie-panel {
            display: block;
        }
    </style>
    <!-- \page head -->

    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>

        <?= $content ?>

    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>

    <!-- Javascript-->
    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>

    <a href="#" id="ui-to-top" class="ui-to-top fa fa-angle-up"></a>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
