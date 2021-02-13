<?php

/* @var $this yii\web\View */

use yii\widgets\LinkPager;

$this->title = isset($currentCategory['name']) ? $entity['name'] . ' - ' . $currentCategory['name'] : $entity['slogan'];
$this->registerMetaTag(['name' => 'keywords', 'content' => implode(', ', array_column($keywords, 'name'))]);
$this->registerMetaTag(['name' => 'description', 'content' => $metaDesc], 'description');
?>

<!-- Breadcrumbs -->
<section class="breadcrumbs-custom-inset">
    <div class="breadcrumbs-custom context-dark bg-overlay-60">
        <div class="container">
            <h2 class="breadcrumbs-custom-title"><?= $currentCategory['name'] ?? $entity['slogan'] ?></h2>
            <ul class="breadcrumbs-custom-path">
                <li><a href="/">Главная</a></li>
                <?php if (isset($currentCategory['name'])): ?>
                    <li><a href="/?r=stainedglass"><?= $entity['name'] ?></a></li>
                    <li class="active"><?= $currentCategory['name'] ?></li>
                <?php else: ?>
                    <li class="active"><?= $entity['name'] ?></li>
                <?php endif; ?>
            </ul>
        </div>
        <div class="box-position" style="background-image: url(images/bg-breadcrumbs.jpg);"></div>
    </div>
</section>

<!-- Classic blog-->
<section class="section section-xl bg-default text-md-left">
    <div class="container">

        <div class="row row-70">
            <!-- left panel -->
            <div class="col-lg-8">
                <!-- Post Classic-->
                <?php foreach ($articles as $article): ?>
                    <article class="post post-classic">
                        <h4 class="post-classic-title">
                            <a href="/?r=stainedglass/show&article_key=<?= $article['key'] ?>"><?= $article['name'] ?></a>
                        </h4>
                        <div class="post-classic-panel group-middle justify-content-start">
                            <a class="badge badge-secondary" href="/?r=stainedglass&category_label=<?= $categories[$article['category_key']]['label'] ?>">
                                <svg xmlns="https://www.w3.org/2000/svg" x="0px" y="0px" width="16px" height="27px"
                                    viewBox="0 0 16 27" enable-background="new 0 0 16 27" xml:space="preserve">
                                    <path d="M0,0v6c4.142,0,7.5,3.358,7.5,7.5S4.142,21,0,21v6h16V0H0z"></path>
                                </svg>
                                <div><?= $categories[$article['category_key']]['name'] ?></div>
                            </a>
                            <?php $this->beginBlock('stained_excluded_num_comm'); ?>
                            <!-- число комментариев отзывов -->
                            <!-- <div class="post-classic-comments">
                                <span class="icon fa fa-comments-o"></span>
                                <a href="#">14</a>
                            </div> -->
                            <?php $this->endBlock(); ?>

                            <div class="post-classic-time">
                                <span class="icon fa fa-clock-o"></span>
                                <time datetime="2019-11-30"><?= $article['date'] ?></time>
                            </div>
                            <div class="post-classic-author">Автор: <a><?= $users[$article['author_key']]['name'] ?></a></div>
                        </div>
                        <a class="post-classic-figure" href="/?r=stainedglass/show&article_key=<?= $article['key'] ?>">
                            <img src="<?= $article['frontpath'] ?>/<?= $article['cover'] ?>" alt="<?= $article['name'] ?>" width="770" height="430">
                        </a>
                    </article>
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
            
            <!-- right panel -->
            <div class="col-lg-4">
                <!-- Post Sidebar-->
                <div class="post-sidebar post-sidebar-inset">
                    <div class="row row-lg row-60">
                        <div class="col-sm-6 col-lg-12">

                            <!-- категории -->
                            <div class="post-sidebar-item">
                                <h5>Рубрики</h5>
                                <div class="post-sidebar-item-inset">
                                    <ul class="list list-categories">
                                        <?php $active = 'class="active"'; ?>
                                        <?php $currentKey = $currentCategory['key'] ?? ''; ?>
                                        <li><a <?= $currentKey ? '' : $active ?> href="/?r=stainedglass">Все статьи</a></li>
                                        <?php foreach ($categories as $category):?>
                                            <?php $key = $category['key']; ?>
                                            <li><a <?= $key === $currentKey ? $active : '' ?> href="/?r=stainedglass&category_label=<?= $category['label'] ?>"><?= $category['name'] ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                            
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

