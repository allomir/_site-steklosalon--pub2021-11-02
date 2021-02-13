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
            <h2 class="breadcrumbs-custom-title"><?= $entity['slogan'] ?></h2>
            <ul class="breadcrumbs-custom-path">
                <li><a href="/">Главная</a></li>
                <li class="active"><?= $entity['name'] ?></li>
            </ul>
        </div>
        <div class="box-position" style="background-image: url(images/bg-breadcrumbs.jpg);"></div>
    </div>
</section>

<!-- Группы и категории -->
<?php foreach($product_groups as $group) :?>
<section class="section section-xl bg-default text-md-left" id="<?= $group['label']?>">

    <div class="container">
        <div class="heading-panel">
            <div class="heading-panel-left">
                <h1 class="oh-desktop heading-panel-title"><span class="d-inline-block wow slideInLeft"
                        style="visibility: visible; animation-name: slideInLeft;"><?= $group['slogan'] ?></span></h1>
                <h4 class="oh-desktop heading-panel-subtitle">
                    <span class="d-inline-block wow slideInDown" 
                        data-wow-delay=".2s"
                        style="visibility: visible; animation-delay: 0.2s; animation-name: slideInDown;">
                        <?= $group['name'] ?>
                    </span>
                </h4>
            </div>
            <div class="heading-panel-decor wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
            </div>
        </div>

        <div class="row row-50 justify-content-left">
            <?php foreach($categories as $category) :?>
            <?php if ($category['group_key'] !== $group['key']) continue; ?>
            <div class="col-sm-9 col-md-6 col-lg-5 col-xl-4">
                <!-- Post Creative-->
                <article class="post post-creative">
                    <a class="post-creative-figure" href="/?r=products&category_label=<?= $category['label']?>">
                        <img src="/images/category_icons/<?= $category['icon']?>" alt="" width="370" height="267">
                    </a>
                    <div class="post-creative-footer">
                        <h5 class="post-creative-title">
                            <a href="/?r=products&category_label=<?= $category['label']?>"><?= $category['name'] ?></a>
                        </h5>
                    </div>
                </article>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endforeach; ?>
