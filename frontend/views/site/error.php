<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;


$this->title = $code .' '. $errname;
?>

<div class="page animated" style="animation-duration: 500ms;">
        <!-- fullscreen-page -->
        <section class="section section-single section-404 novi-background bg-overlay-70 novi-background context-dark">
            <div class="section-single-inner">
                <header class="section-single-header page-header">
                    <div class="page-head-inner">
                        <a class="brand" href="/">
                            <img class="brand-logo-dark" src="<?= $companyInfo['logo'] ?>" alt="" width="123" height="37">
                            <img class="brand-logo-light" src="<?= $companyInfo['logo_lt'] ?>" alt="" width="123" height="37">
                        </a>
                    </div>
                </header>

                <div class="section-single-main">
                    <div class="container">
                        <h1 class="title-modern">Не найдено<span><?= $code ?></span></h1>
                        <p class="big text-spacing-25">Страницы с таким адресом не существует или страница перемещена на другой адрес</p>
                        <a class="button button-primary button-ujarak" href="/">На главную</a>
                    </div>
                </div>
                <div class="section-single-footer">
                    <div class="container text-center">
                        <!-- Rights-->
                        <p class="rights"><span><?= $companyInfo['name'] ?></span><span>&nbsp;</span><span>©&nbsp;</span>
                            <span class="copyright-year">2020</span><span>&nbsp;</span>
                        </p>
                    </div>
                </div>

            </div>
            <div class="box-position" style="background-image: url(images/text-image.jpg);"></div>
        </section>
    </div>
