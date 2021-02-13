<?php
/* @var $this yii\web\View */

use yii\widgets\LinkPager;

$this->title = isset($currentCategory['name']) ? $entity['name'] . ' - ' . $currentCategory['name'] : $entity['breaf'];
$this->registerMetaTag(['name' => 'keywords', 'content' => 'фотография стекла, изображение стекла, картинка изделия, портфолио, ' . implode(', ', array_column($keywords, 'name'))]);
$this->registerMetaTag(['name' => 'description', 'content' => $metaDesc], 'description');
?>

<!-- Breadcrumbs -->
<section class="breadcrumbs-custom-inset">
    <div class="breadcrumbs-custom context-dark bg-overlay-60">
        <div class="container">
            <h2 class="breadcrumbs-custom-title"><?= isset($currentCategory['name']) ? $entity['name'] . ' - ' . $currentCategory['name'] : $entity['slogan'] ?></h2>
            <ul class="breadcrumbs-custom-path">
                <li><a href="/">Главная</a></li>
                <?php if (isset($currentCategory['name'])): ?>
                    <li><a href="/?r=<?= $entity['label'] ?>"><?= $entity['name'] ?></a></li>
                    <li class="active"><?= $currentCategory['name'] ?></li>
                <?php else: ?>
                    <li class="active"><?= $entity['name'] ?></li>
                <?php endif; ?>
            </ul>
        </div>
        <div class="box-position" style="background-image: url(images/bg-breadcrumbs.jpg);"></div>
    </div>
</section>

<!-- Grid Gallery-->
<section class="section section-xl bg-default text-center isotope-wrap">
    <div class="container isotope-wrap">
        <!-- filters -->
        <div class="isotope-filters isotope-filters-horizontal">

            <!-- категории -->
            <ul class="isotope-filters-list" id="isotope-1">
                <?php $activeClassAll = null;?>
                <?php $hrefAll = '/?r=gallery';?>
                <?php if (!isset($currentCategory['name'])) :?>
                    <?php $activeClassAll = 'class="active"';?>
                    <?php $hrefAll = null;?>
                <?php endif;?>
                    <li><a <?= $activeClassAll ?> href="<?= $hrefAll ?>" data-isotope-filter="*" data-isotope-group="gallery">Все</a></li>

                <?php foreach($categories as $category) : ?>
                    <?php $activeClass = null;?>
                    <?php $href = '/?r=gallery&category_label=' . $category['label'];?>
                    <?php if (isset($currentCategory['name']) && $currentCategory['name'] === $category['name']) :?>
                        <?php $activeClass = 'class="active"';?>
                        <?php $href = null;?>
                    <?php endif;?>
                    <li><a <?= $activeClass ?> href="<?= $href ?>" data-isotope-filter="<?= $category['key'] ?>" data-isotope-group="gallery"><?= $category['name'] ?></a></li>
                <?php endforeach; ?>
            </ul>

        </div>
        <div class="row row-50 isotope" data-isotope-layout="fitRows" data-isotope-group="gallery"
            data-lightgallery="group">
                <!-- Изображение -->
            <?php foreach($images as $image) : ?>
                <?php list($width, $height, $type, $attr) = getimagesize(Yii::getAlias('@webroot') . '/' . $image['image']); ?>

                <?php $this->beginBlock('gallery_imageblock_1'); ?>
                <!-- Варинт блока универсальный -->
                <div class="col-md-6 col-lg-4 isotope-item" data-filter="Type 2">
                    <article class="thumbnail thumbnail-modern thumbnail-sm">
                        <a class="thumbnail-modern-figure"
                            href="images/grid-gallery-1-1200x800-original.jpg" data-lightgallery="item"><img
                            src="images/grid-gallery-1-370x303.jpg" alt="<?= pathinfo($image['image'], PATHINFO_FILENAME) ?>" width="370" height="303">
                        </a>
                        <!-- <div class="thumbnail-modern-caption">
                            <h5 class="thumbnail-modern-title"><a href="#">категория</a></h5>
                            <p class="thumbnail-modern-subtitle">описание</p>
                        </div> -->
                    </article>
                </div>
                <?php $this->endblock(); ?>

                <?php if ($width/$height <= 1) : ?>
                    <div class="col-sm-3 col-md-3 col-lg-3 isotope-item">
                        <article class="thumbnail thumbnail-modern thumbnail-xs">
                            <a class="thumbnail-modern-figure"
                                href="<?= $image['image'] ?>" data-lightgallery="item">
                                <img src="<?= $image['image'] ?>" alt="<?= pathinfo($image['image'], PATHINFO_FILENAME) ?>" width="<?= $width ?>" height="<?= $height ?>">
                            </a>
                            <!-- <div class="thumbnail-modern-caption">
                                <h5 class="thumbnail-modern-title"><a href="#">категория</a></h5>
                                <p class="thumbnail-modern-subtitle">описание</p>
                            </div> -->
                        </article>
                    </div>
                <?php else:?>
                    <div class="col-sm-6 col-md-6 col-lg-6 isotope-item" data-filter="<?= $image['category_key'] ?>">
                        <article class="thumbnail thumbnail-modern thumbnail-lg thumbnail-custom-mobile">
                            <a class="thumbnail-modern-figure"
                                href="<?= $image['image'] ?>" data-lightgallery="item">
                                <img src="<?= $image['image'] ?>" alt="<?= pathinfo($image['image'], PATHINFO_FILENAME) ?>" width="<?= $width ?>" height="<?= $height ?>">
                            </a>
                            <!-- <div class="thumbnail-modern-caption">
                                <h5 class="thumbnail-modern-title"><a href="#">категория</a></h5>
                                <p class="thumbnail-modern-subtitle">описание</p>
                            </div> -->
                        </article>
                    </div>
                <?php endif;?>
            <?php endforeach; ?>
        </div>
        <!-- Bootstrap Pagination -->
        <div class="pagination-wrap" style="width: 100%">
            <nav aria-label="Page navigation">
                <?= LinkPager::widget([
                    'pagination' => $pages,
                    'options' => [
                        'class' => 'pagination',
                    ],
                    'pageCssClass' => 'page-item',
                    'prevPageCssClass' => 'page-item page-item-control',
                    'nextPageCssClass' => 'page-item page-item-control',
                    'linkOptions' => [
                        'class' => 'page-link',
                        'aria-label' => "Previous",
                    ],
                    'nextPageLabel' => '<span class="icon" aria-hidden="true"></span>',
                    'prevPageLabel' => '<span class="icon" aria-hidden="true"></span>',
                    'disabledListItemSubTagOptions' => [
                        'tag' => 'a', 'class' => 'page-link',
                    ],
                ]);?>
            </nav>
        </div>

    </div>
</section>
