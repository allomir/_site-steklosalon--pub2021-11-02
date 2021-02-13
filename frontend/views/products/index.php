<?php

/* @var $this yii\web\View */

use yii\widgets\LinkPager;

$this->title = $currentProductCategory['name'] 
    ? $category['name'] . ' - ' . $currentProductCategory['name']
    : $category['name'];
$this->registerMetaTag(['name' => 'keywords', 'content' => implode(', ', array_column($keywords, 'name'))]);
$this->registerMetaTag(['name' => 'description', 'content' => $metaDesc], 'description');
?>

<!-- Breadcrumbs -->
<section class="breadcrumbs-custom-inset">
    <div class="breadcrumbs-custom context-dark bg-overlay-60">
        <div class="container">
            <h2 class="breadcrumbs-custom-title"><?= $category['name'] ?></h2>
            <ul class="breadcrumbs-custom-path">
                <li><a href="/">Главная</a></li>
                <li><a href="/?r=products"><?= $entity['name'] ?></a></li>
                <li class="active"><?= $category['name'] ?></li>
            </ul>
        </div>
        <div class="box-position" style="background-image: url(images/bg-breadcrumbs.jpg);"></div>
    </div>
</section>

<section class="section section-lg bg-default">
    <div class="container">
        <?php $this->beginBlock('products_excluded_filters'); ?>
            <!-- filters -->
            <div class="isotope-filters isotope-filters-horizontal">
                <ul class="isotope-filters-list" id="isotope-1">
                    <li><a class="active" href="#" data-isotope-filter="*" data-isotope-group="gallery">По дате</a></li>
                    <li><a href="#" data-isotope-filter="Type 1" data-isotope-group="gallery">По популярности</a></li>
                    <!-- <li><a href="#" data-isotope-filter="Type 2" data-isotope-group="gallery">По отзывам</a></li> -->
                </ul>
            </div>
        <?php $this->endBlock(); ?>

        <div class="row row-30">
            <!-- left panel -->
            <div class="row col-lg-8">

                <?php foreach($productItems as $productItem) : ?>
                <?php
                    // приоритеты свойств, необхомо создавать список items так чтобы поля для печати карточки располагались самыми первыми
                    // пока не сделано items со смещением полей можно использовать код ниже
                    $productItemCaption = [
                        $productCategories[$productItem['product_category_key']]['name'] ?? null,
                        $productItem['vendor_code'] ?? null, // !!!может быть совпадать по значению с каким то полем
                        $productItem['filling'] ?? null,
                    ];
                    $productItemCaption = array_values(array_filter($productItemCaption));
                    $productItemCaption = $productItemCaption[0] ?? $keywords[$category['key'] + 1]['name'];
                ?>
                <div class="col-4 col-sm-4 col-md-3 col-lg-4">
                    <article class="services-modern" style="margin-bottom: 2em;">
                        <a class="services-modern-figure">
                            <img src="<?= $productItem['images'][0] ?? '' ?>" alt="<?= $productItem['desc'] ?: $productItemCaption . ', ' . $productItem['color'] ?? '' . ', ' . $productItem['company'] ?? '' ?>" width="" height="">
                        </a>
                        <div class="services-modern-content">
                            <!-- Заголовок -->
                            <h5 class="services-modern-title">
                                <a><?= $productItemCaption ?? '' ?></a>
                            </h5>
                            <div class="services-modern-price-wrap">
                                <!-- Описание -->
                                <span class="services-modern-date heading-6"><?= $productItemMain[1] ?? '' ?></span>
                                <span class="services-modern-date"><?= isset($productItem['color']) ? 'Цвет: ' . $productItem['color'] . '.': '' ?></span>
                                <span class="services-modern-date"><?= isset($productItem['company']) ? 'Про-ль: ' . $productItem['company'] : '' ?></span>

                                <?php $this->beginBlock('product_item_info'); ?>
                                <!-- примеры оформления -->
                                <span class="services-modern-price heading-5">$100</span>
                                <span class="services-modern-price-divider heading-5">/</span>
                                <span class="services-modern-date heading-6">night</span>
                                <?php $this->endblock(); ?>
                            </div>

                        </div>
                    </article>
                </div>
                <?php endforeach; ?>

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

            <!-- Post Sidebar-->
            <div class="col-lg-4">
                <div class="post-sidebar post-sidebar-inset">
                    <div class="row row-lg row-60">
                        <div class="col-sm-6 col-lg-12">
                            <!-- категории -->
                            <?php if ($productCategories) : ?>
                            <div class="post-sidebar-item">
                                <h5>Категории</h5>
                                <div class="post-sidebar-item-inset">
                                    <ul class="list list-categories">
                                        <?php $active = 'class="active"'; ?>
                                        <?php $currentKey = $currentProductCategory['key'] ?? ''; ?>
                                        <li><a <?= $currentKey ? '' : $active ?> href="/?r=products&category_label=<?= $category['label'] ?>">Все категории</a></li>
                                        <?php foreach ($productCategories as $prodCategory):?>
                                            <?php $key = $prodCategory['key']; ?>
                                            <li><a <?= $key === $currentKey ? $active : '' ?> href="/?r=products&category_label=<?= $category['label'] ?>&product_category_label=<?= $prodCategory['label'] ?>"><?= $prodCategory['name'] ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                            <?php endif; ?>

                            <!-- Еще Категории в группе -->
                            <div class="post-sidebar-item">
                                <h5>Еще <?= $group['name'] ?></h5>
                                <div class="post-sidebar-item-inset">
                                    <!-- Post Minimal-->
                                    <?php shuffle($categories); $i= 1; ?>
                                    <?php while($i <= 2) : ?>
                                        <?php $anotherCategory = array_shift($categories); ?>
                                        <?php if($category['key'] === $anotherCategory['key']) continue; ?>
                                        <?php if($category['group_key'] !== $anotherCategory['group_key']) continue; ?>
                                        <article class="post post-minimal">
                                            <a class="post-minimal-figure" href="<?= '/?r=' . $entity['label'] . '&category_label=' .  $anotherCategory['label'] ?>">
                                                <img src="/images/category_icons/<?= $anotherCategory['icon']?>" alt="" width="232" height="138"></a>
                                            <p class="post-minimal-title">
                                                <a href="<?= '/?r=' . $entity['label'] . '&category_label=' .  $anotherCategory['label'] ?>"><?= $anotherCategory['name']?></a>
                                            </p>
                                        </article>
                                    <?php $i++; endwhile; ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
