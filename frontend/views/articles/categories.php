<?php

/* @var $this yii\web\View */

$this->title = $entity['breaf'];
$this->registerMetaTag(['name' => 'keywords', 'content' => implode(', ', array_column($keywords, 'name'))]);
$this->registerMetaTag(['name' => 'description', 'content' => $metaDesc], 'description');
?>

<!-- Breadcrumbs -->
<section class="breadcrumbs-custom-inset">
    <div class="breadcrumbs-custom context-dark bg-overlay-60">
        <div class="container">
            <h2 class="breadcrumbs-custom-title"><?= $entity['slogan']?></h2>
            <ul class="breadcrumbs-custom-path">
                <li><a href="/">Главная</a></li>
                <li class="active"><?= $entity['name']?></li>
            </ul>
        </div>
        <div class="box-position" style="background-image: url(images/bg-breadcrumbs.jpg);"></div>
    </div>
</section>

<!-- Section обработка стекла -->
<section class="section section-xl bg-default" id="<?= $article_groups[1]['label']?>">
    <div class="container">
        <div class="heading-panel">
            <div class="heading-panel-left">
                <h1 class="oh-desktop heading-panel-title"><span class="d-inline-block wow slideInLeft"
                        style="visibility: visible; animation-name: slideInLeft;"><?= $article_groups[1]['slogan'] ?></span></h1>
                <h4 class="oh-desktop heading-panel-subtitle">
                    <span class="d-inline-block wow slideInDown" 
                        data-wow-delay=".2s"
                        style="visibility: visible; animation-delay: 0.2s; animation-name: slideInDown;">
                        <?= $article_groups[1]['name'] ?>
                    </span>
                </h4>
            </div>
            <div class="heading-panel-decor wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
            </div>
        </div>

        <div class="row row-40">
            <?php foreach ($categories_1 as $category): ?>
            <div class="col-md-6 col-lg-4">
                <article class="box-icon-modern">
                    <div class="box-icon-modern-icon category-icon"
                        style="background-image: url(/../images/category_icons/<?=$category['icon']?>)"></div>
                    <h5 class="box-icon-modern-title"><a href="/?r=articles&category_label=<?=$category['label']?>"><?=$category['name']?></a></h5>
                    <div class="box-icon-modern-decor"></div>
                    <p class="box-icon-modern-text"><?=$category['breaf']?></p>
                </article>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</section>

<!-- Section стеклоконструкции-->
<section class="section section-xl bg-default" id="<?= $article_groups[2]['label']?>">
    <div class="container">
        <div class="heading-panel">
            <div class="heading-panel-left">
                <h1 class="oh-desktop heading-panel-title"><span class="d-inline-block wow slideInLeft"
                        style="visibility: visible; animation-name: slideInLeft;"></span><?= $article_groups[2]['slogan'] ?></h1>
                <h4 class="oh-desktop heading-panel-subtitle">
                    <span class="d-inline-block wow slideInDown" 
                        data-wow-delay=".2s"
                        style="visibility: visible; animation-delay: 0.2s; animation-name: slideInDown;">
                        <?= $article_groups[2]['name'] ?>
                    </span>
                </h4>
            </div>
            <div class="heading-panel-decor wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
            </div>
        </div>

        <div class="row row-40">
            <?php foreach ($categories_2 as $category): ?>
            <div class="col-md-6 col-lg-4">
                <article class="box-icon-modern">
                    <div class="box-icon-modern-icon category-icon"
                        style="background-image: url(/../images/category_icons/<?=$category['icon']?>)"></div>
                    <h5 class="box-icon-modern-title"><a href="/?r=articles&category_label=<?=$category['label']?>"><?=$category['name']?></a></h5>
                    <div class="box-icon-modern-decor"></div>
                    <p class="box-icon-modern-text"><?=$category['breaf']?></p>
                </article>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</section>

