<?php
/* @var $this yii\web\View */

use yii\widgets\LinkPager;
$pageName = 'Контакты';
$this->title = 'Контакты';
$this->registerMetaTag(['name' => 'keywords', 'content' => 'Телефоны, адрес, электронная почта, почта, карта города, график работы']);
$this->registerMetaTag(['name' => 'description', 'content' => $companyDesc], 'description');
?>

<!-- Breadcrumbs -->
<section class="breadcrumbs-custom-inset">
    <div class="breadcrumbs-custom context-dark bg-overlay-60">
        <div class="container">
            <h2 class="breadcrumbs-custom-title"><?= $pageName ?></h2>
            <ul class="breadcrumbs-custom-path">
                <li><a href="/">Главная</a></li>
                <li class="active"><?= $pageName ?></li>
            </ul>
        </div>
        <div class="box-position" style="background-image: url(images/bg-breadcrumbs.jpg);"></div>
    </div>
</section>

<!-- Contact information-->
<section class="section section-sm section-first bg-default">
    <div class="container">
        <div class="row row-30 justify-content-center">
            <div class="col-sm-8 col-md-6 col-lg-4">
                <article class="box-contacts">
                    <div class="box-contacts-body">
                        <div class="box-contacts-icon fa fa-phone"></div>
                        <?php foreach($contacts['tels'] as $managerName => $tel) : ?>
                            <p class="box-contacts-link"><?= $managerName ?>: <a><?= $tel?></a></p>
                        <?php endforeach;?>
                    </div>
                </article>
            </div>
            <div class="col-sm-8 col-md-6 col-lg-4">
                <article class="box-contacts">
                    <div class="box-contacts-body">
                        <div class="box-contacts-icon fa fa-location-arrow"></div>
                        <p class="box-contacts-link">Адрес: <a><?= $contacts['address']?></a></p>
                        <div class="box-contacts-icon fa fa-envelope"></div>
                        <p class="box-contacts-link"><a><?= $contacts['email']?></a></p>
                    </div>
                </article>
            </div>
            <div class="col-sm-8 col-md-6 col-lg-4">
                <article class="box-contacts">
                    <div class="box-contacts-body">
                        <div class="box-contacts-icon fa fa-clock-o"></div>
                        <p class="box-contacts-link">График работы (офис):</p>
                        <p class="box-contacts-link">ПН - СБ : 09:00 — 18:00</p>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>

    <!-- Контакты и карта -->
    <section class="main-map-fullsize">
      <h2 class="visually-hidden">Контакты и карта города</h2>
        <iframe class="main-map-iframe" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1566.0012149710258!2d44.07850032428091!3d56.283916346276044!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1b6cdcff5d434b33!2z0K3Qu9GC0LA!5e0!3m2!1sru!2sru!4v1612801417063!5m2!1sru!2sru" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        <div class="main-map-contacts">
            <p class="main-map-company"><?= $contacts['name']?></p>
            <p class="main-map-address">
                <?= $contacts['address']?>
            </p>
            <p class="main-map-phone">
                тел. <a><?= $contacts['tel']?></a><br />
                тел. <a><?= $contacts['tel2']?></a>
            </p>
            <p class="main-map-phone">
                эл. почта <?= $contacts['email']?><br />
            </p>
        </div>
    </section>
