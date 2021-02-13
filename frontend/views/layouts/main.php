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

    <!-- Метрика яндекс -->
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
    (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
    m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(15115918, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true
    });
    </script>
    <!-- /Yandex.Metrika counter -->
</head>
<body>
    <?php $this->beginBody() ?>

    <div class="ie-panel">
        <a href="https://windows.microsoft.com/en-US/internet-explorer/">
            <img src="images/ie8-panel/warning_bar_0000_us.jpg" height="42" width="820"
                    alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today.">
        </a>
    </div>
    <div class="preloader loaded">
        <div class="preloader-body">
            <div class="cssload-container"><span></span><span></span><span></span><span></span>
            </div>
        </div>
    </div>

    <div class="page animated" style="animation-duration: 500ms;">
        <!-- Page Header-->
        <header class="section page-header">
                    <!-- RD Navbar-->
                    <div class="rd-navbar-wrap" style="height: 170px;">
                        <nav class="rd-navbar rd-navbar-corporate rd-navbar-original rd-navbar-static"
                            data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed"
                            data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static"
                            data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static"
                            data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static"
                            data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px"
                            data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="106px" data-lg-stick-up="true"
                            data-xl-stick-up="true" data-xxl-stick-up="true">
                            <div class="rd-navbar-collapse-toggle rd-navbar-fixed-element-1 toggle-original"
                                data-rd-navbar-toggle=".rd-navbar-collapse"><span></span>
                            </div>
                            <div class="rd-navbar-aside-outer">
                                <div class="rd-navbar-aside">
                                    <!-- RD Navbar Panel-->
                                    <div class="rd-navbar-panel">
                                        <!-- RD Navbar Toggle-->
                                        <button class="rd-navbar-toggle toggle-original"
                                            data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                                        <!-- RD Navbar Brand-->
                                        <div class="rd-navbar-brand">
                                            <!--Brand-->
                                            <a class="brand" <?= $this->context->id === 'site' ? '' : 'href="/"' ?>>
                                                <img class="brand-logo-dark" src="<?= $companyInfo['logo'] ?>" alt="<?= $companyInfo['name'] ?>" width="123" height="37">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="rd-navbar-aside-right rd-navbar-collapse toggle-original-elements">
                                        <ul class="rd-navbar-corporate-contacts">
                                            <li>
                                                <div class="unit unit-spacing-xs">
                                                    <div class="unit-left"><span class="icon fa fa-clock-o"></span></div>
                                                    <div class="unit-body">
                                                        <p><span><?= $companyInfo['working_days'] ?> </span><?= $companyInfo['working_time'] ?></p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="unit unit-spacing-xs">
                                                    <div class="unit-left"><span class="icon fa fa-phone"></span></div>
                                                    <div class="unit-body">
                                                        <p>
                                                            <span>Офис: &nbsp;&nbsp;&nbsp;</span><a class="link-phone"><?= $companyInfo['tel'] ?></a>
                                                        </p>
                                                        <p>
                                                            <span>Мастер: </span><a class="link-phone"><?= $companyInfo['tel2'] ?></a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <!-- <a class="button button-md button-ujarak button-default-outline" href="#">Get in touch</a> -->
                                    </div>
                                </div>
                            </div>
                            <div class="rd-navbar-main-outer">
                                <div class="rd-navbar-main">
                                    <div class="rd-navbar-nav-wrap toggle-original-elements">
                                        <?php $this->beginBlock('layout_excluded_social'); ?>
                                        <!-- иконки и ссылки на социальные сети -->
                                        <!-- <ul class="list-inline list-inline-md rd-navbar-corporate-list-social">
                                            <li><a class="icon fa fa-facebook" href="#"></a></li>
                                            <li><a class="icon fa fa-twitter" href="#"></a></li>
                                            <li><a class="icon fa fa-google-plus" href="#"></a></li>
                                            <li><a class="icon fa fa-instagram" href="#"></a></li>
                                        </ul> -->
                                        <?php $this->endBlock(); ?>
                                        <!-- RD Navbar Nav-->
                                        <ul class="rd-navbar-nav">
                                            <li class="rd-nav-item <?= $this->context->id === 'site' ? 'active' : ''?>"><a class="rd-nav-link" href="/">Главная</a></li>

                                            <!-- ПРОИЗВОДСТВО -->
                                            <?php $entity = $navmain['entiies'][1] ?>
                                            <li class="rd-nav-item <?= $this->context->id === $entity['label'] ? 'active' : ''?> rd-navbar--has-megamenu rd-navbar-submenu">
                                                <a class="rd-nav-link" href="/?r=<?= $entity['label'] ?>"><?= $entity['name'] ?></a>
                                                <span class="rd-navbar-submenu-toggle"></span>

                                                <!-- RD Navbar Megamenu-->
                                                <ul class="rd-menu rd-navbar-megamenu rd-navbar-open-right">
                                                <?php for($i = 1; $i <= 2; $i++) : ?>
                                                    <?php $group = $navmain['groups'][$i] ?>
                                                    <li class="rd-megamenu-item">
                                                        <div>
                                                            <h5 class="rd-megamenu-title"><?= $group['name'] ?></h5>
                                                            <ul class="rd-megamenu-list">
                                                                <?php foreach($navmain['categories'] as $category) : ?>
                                                                    <?php if ($category['group_key'] !== $group['key']) continue; ?>
                                                                    <li class="rd-dropdown-item">
                                                                        <a class="rd-dropdown-link" href="/?r=<?= $entity['label'] ?>&category_label=<?= $category['label'] ?>"><?= $category['name'] ?></a>
                                                                    </li>
                                                                <?php endforeach;?>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                <?php endfor; ?>
                                                </ul>
                                            </li>

                                            <!-- СТЕКЛОИЗДЕЛИЯ И СТЕКЛА -->
                                            <?php $entity = $navmain['entiies'][2] ?>
                                            <li class="rd-nav-item <?= $this->context->id === $entity['label'] ? 'active' : ''?> rd-navbar--has-megamenu rd-navbar-submenu">
                                                <a class="rd-nav-link" href="/?r=<?= $entity['label'] ?>"><?= $entity['name'] ?></a>
                                                <span class="rd-navbar-submenu-toggle"></span>

                                                <!-- RD Navbar Megamenu-->
                                                <ul class="rd-menu rd-navbar-megamenu rd-navbar-open-right">
                                                <?php for($i = 3; $i <= 4; $i++) : ?>
                                                    <?php $group = $navmain['groups'][$i] ?>
                                                    <li class="rd-megamenu-item">
                                                        <div>
                                                            <h5 class="rd-megamenu-title"><?= $group['name'] ?></h5>
                                                            <ul class="rd-megamenu-list">
                                                                <?php foreach($navmain['categories'] as $category) : ?>
                                                                    <?php if ($category['group_key'] !== $group['key']) continue; ?>
                                                                    <li class="rd-dropdown-item">
                                                                        <a class="rd-dropdown-link" href="/?r=<?= $entity['label'] ?>&category_label=<?= $category['label'] ?>"><?= $category['name'] ?></a>
                                                                    </li>
                                                                <?php endforeach;?>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                <?php endfor; ?>
                                                </ul>
                                            </li>

                                            <!-- ВИТРАЖИ (в одну колонку без группы) -->
                                            <?php $entity = $navmain['entiies'][3] ?>
                                            <li class="rd-nav-item <?= $this->context->id === $entity['label'] ? 'active' : ''?> rd-navbar--has-dropdown rd-navbar-submenu">
                                                <a  class="rd-nav-link" href="/?r=<?= $entity['label'] ?>"><?= $entity['name'] ?></a>
                                                <span class="rd-navbar-submenu-toggle"></span>

                                                <!-- RD Navbar Dropdown-->
                                                <ul class="rd-menu rd-navbar-dropdown">
                                                    <?php foreach($navmain['categories'] as $category) : ?>
                                                        <?php if ($category['group_key'] === 6) : ?>
                                                        <li class="rd-dropdown-item">
                                                            <a class="rd-dropdown-link" href="/?r=<?= $entity['label'] ?>&category_label=<?= $category['label'] ?>"><?= $category['name'] ?></a>
                                                        </li>
                                                        <?php endif;?>
                                                    <?php endforeach;?>
                                                </ul>
                                            </li>

                                            <?php $this->beginBlock('gallery1'); ?>
                                            <!-- ГАЛЕРЕЯ (вариант 1 - в одну колонку, без группы, свой набор категорий, которые существуют ) -->
                                            <?php $entity = $navmain['entiies'][4] ?>
                                            <li class="rd-nav-item <?= $this->context->id === $entity['label'] ? 'active' : ''?> rd-navbar--has-dropdown rd-navbar-submenu">
                                                <a  class="rd-nav-link" href="/?r=<?= $entity['label'] ?>"><?= $entity['name'] ?></a>
                                                <span class="rd-navbar-submenu-toggle"></span>

                                                <!-- RD Navbar Dropdown-->
                                                <ul class="rd-menu rd-navbar-dropdown">
                                                    <?php foreach($navmain['gallery_nav'] as $category) : ?>
                                                        <li class="rd-dropdown-item">
                                                            <a class="rd-dropdown-link" href="/?r=<?= $entity['label'] ?>&category_label=<?= $category['label'] ?>"><?= $category['name'] ?></a>
                                                        </li>
                                                    <?php endforeach;?>
                                                </ul>
                                            </li>
                                            <?php $this->endBlock(); ?>
                                            
                                            <?php $this->beginBlock('gallery2'); ?>
                                            <!-- ГАЛЕРЕЯ (вариант 2 - в 4 колонки, без группы, свой набор категорий, которые существуют ) -->
                                            <?php $entity = $navmain['entiies'][4] ?>
                                            <li class="rd-nav-item <?= $this->context->id === $entity['label'] ? 'active' : ''?> rd-navbar--has-megamenu rd-navbar-submenu">
                                                <a class="rd-nav-link" href="/?r=<?= $entity['label'] ?>"><?= $entity['name'] ?></a>
                                                <span class="rd-navbar-submenu-toggle"></span>

                                                <!-- RD Navbar Megamenu-->
                                                <ul class="rd-menu rd-navbar-megamenu rd-navbar-open-right">
                                                <?php $divisor = 2; ?>
                                                <?php $num = floor(count($navmain['gallery_nav']) / $divisor); ?>
                                                <?php $nav_categories = []; ?>
                                                <?php for($i = 1; $i <= $divisor; $i++) :?>
                                                    <?php $nav_categories = array_slice($navmain['gallery_nav'], ($i - 1) * $num, $divisor === $i ? null : $num); ?>
                                                    <li class="rd-megamenu-item">
                                                        <div>
                                                            <ul class="rd-megamenu-list">
                                                            <?php foreach($nav_categories as $category) : ?>
                                                                <li class="rd-dropdown-item">
                                                                    <a class="rd-dropdown-link" href="/?r=<?= $entity['label'] ?>&category_label=<?= $category['label'] ?>"><?= $category['name'] ?></a>
                                                                </li>
                                                            <?php endforeach;?>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                <?php endfor;?>
                                                </ul>
                                            </li>
                                            <?php $this->endBlock(); ?>

                                            <?= $this->blocks['gallery2'] ?>

                                            <li class="rd-nav-item <?= $this->context->id === 'contacts' ? 'active' : ''?>"><a class="rd-nav-link" href="/?r=contacts">Контакты</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
        </header>

        <?= $content ?>

        <!-- Page Footer-->
        <footer class="section footer-corporate footer-corporate-2 context-dark">
            <div class="footer-corporate-inset">
                <div class="container">
                    <div class="row row-40 justify-content-lg-between">
                        <div class="col-sm-6 col-md-12 col-lg-3 col-xl-4">
                            <div class="oh-desktop">
                                <div class="wow slideInRight" data-wow-delay="0s"
                                    style="visibility: visible; animation-delay: 0s; animation-name: slideInRight;">
                                    <h5 class="text-spacing-100">Наши контакты</h5>
                                    <ul class="footer-contacts d-inline-block d-sm-block">
                                        <li>
                                            <div class="unit">
                                                <div class="unit-left"><span class="icon fa fa-phone"></span></div>
                                                <div class="unit-body">
                                                    <a class="link-phone" href="tel:#"><?= $companyInfo['tel']?></a>
                                                    <br /><a class="link-phone" href="tel:#"><?= $companyInfo['tel2']?></a>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="unit">
                                                <div class="unit-left"><span class="icon fa fa-envelope"></span></div>
                                                <div class="unit-body"><a class="link-aemail"><?= $companyInfo['email']?></a></div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="unit">
                                                <div class="unit-left"><span class="icon fa fa-location-arrow"></span></div>
                                                <div class="unit-body"><a class="link-location"><?= $companyInfo['address']?></a></div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-5 col-lg-3 col-xl-4">
                            <div class="oh-desktop">
                                <div class="wow slideInDown" data-wow-delay="0s"
                                    style="visibility: visible; animation-delay: 0s; animation-name: slideInDown;">
                                    <h5 class="text-spacing-100">Новости и акции</h5>
                                    <!-- Post Minimal 2-->
                                    <article class="post post-minimal-2">
                                        <p class="post-minimal-2-title">
                                            <a href="#">Распродажа остатков багетов, скидка -30%</a>
                                        </p>
                                        <div class="post-minimal-2-time">
                                            <time datetime="2019-05-04">01 февраля 2021</time>
                                        </div>
                                    </article>
                                    <!-- Post Minimal 2-->
                                    <article class="post post-minimal-2">
                                        <p class="post-minimal-2-title">
                                            <a href="#">Распродажа зеркал, скидка -50%</a>
                                        </p>
                                        <div class="post-minimal-2-time">
                                            <time datetime="2019-05-04">15 января 2021</time>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-11 col-md-7 col-lg-5 col-xl-4">
                            <div class="oh-desktop">
                                <div class="wow slideInLeft" data-wow-delay="3s"
                                    style="visibility: visible; animation-delay: 0s; animation-name: slideInLeft;">
                                    <h5 class="text-spacing-100">Разделы</h5>
                                    <ul
                                        class="row-6 list-0 list-marked list-marked-md list-marked-primary list-custom-2">
                                        <li><a href="/">Главная</a></li>
                                        <?php foreach($navmain['entiies'] as $entity) : ?>
                                            <li><a href="/?r=<?= $entity['label'] ?>"><?= $entity['name'] ?></a></li>
                                        <?php endforeach;?>    
                                        <li><a href="/?r=contacts">Контакты</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-corporate-bottom-panel">
                <div class="container">
                    <div class="row row-10 align-items-md-center">
                        <div class="col-sm-6 col-md-4 text-sm-right text-md-center">
                            <div>
                                <ul class="list-inline list-inline-sm footer-social-list-2">
                                    <li><a class="icon fa fa-facebook"></a></li>
                                    <li><a class="icon fa fa-twitter"></a></li>
                                    <li><a class="icon fa fa-google-plus"></a></li>
                                    <li><a class="icon fa fa-instagram"></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 order-sm-first">
                            <!-- Rights-->
                            <p class="rights"><span>©&nbsp;</span><span class="copyright-year">2021</span>
                                <span><?= $companyInfo['name']?></span>. Все прова защищены
                            </p>
                        </div>
                        <div class="col-sm-6 col-md-4 text-md-right">
                            <p class="rights"><a>разработано weblebed@gmail.com</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

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
