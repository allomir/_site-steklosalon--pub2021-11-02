<?php

/* @var $this yii\web\View */

use yii\widgets\LinkPager;

$this->title = isset($currentCategory['name']) ? $entity['name'] . ' - ' . $currentCategory['name'] : $entity['breaf'];
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
                    <li><a href="/?r=articles/categories"><?= $entity['name'] ?></a></li>
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
        <?php $this->beginBlock('products_excluded_num_comm'); ?>
        <!-- filters -->
        <div class="isotope-filters isotope-filters-horizontal">
            <button
                class="isotope-filters-toggle button button-md button-icon button-icon-right button-default-outline button-wapasha"
                data-custom-toggle="#isotope-1" data-custom-toggle-hide-on-blur="true"
                data-custom-toggle-disable-on-blur="true">
                <span class="icon fa fa-caret-down"></span>
                Фильтр
            </button>
            <ul class="isotope-filters-list" id="isotope-1">
                <li><a class="active" href="#" data-isotope-filter="*" data-isotope-group="gallery">По дате</a></li>
                <li><a href="#" data-isotope-filter="Type 1" data-isotope-group="gallery">По популярности</a></li>
                <!-- <li><a href="#" data-isotope-filter="Type 2" data-isotope-group="gallery">По отзывам</a></li> -->
            </ul>
        </div>
        <?php $this->endBlock(); ?>

        <div class="row row-70">
            <!-- left panel -->
            <div class="col-lg-8">
                <!-- Post Classic-->
                <?php foreach ($articles as $article): ?>
                    <article class="post post-classic">
                        <h4 class="post-classic-title">
                            <a href="/?r=articles/show&article_key=<?= $article['key'] ?>"><?= $article['name'] ?></a>
                        </h4>
                        <div class="post-classic-panel group-middle justify-content-start">
                            <a class="badge badge-secondary" href="/?r=articles&category_label=<?= $categories[$article['category_key']]['label'] ?>">
                                <svg xmlns="https://www.w3.org/2000/svg" x="0px" y="0px" width="16px" height="27px"
                                    viewBox="0 0 16 27" enable-background="new 0 0 16 27" xml:space="preserve">
                                    <path d="M0,0v6c4.142,0,7.5,3.358,7.5,7.5S4.142,21,0,21v6h16V0H0z"></path>
                                </svg>
                                <div><?= $categories[$article['category_key']]['name'] ?></div>
                            </a>
                            <?php $this->beginBlock('articles_excluded_num_comm'); ?>
                            <!-- число комментариев отзывов -->
                            <!-- <div class="post-classic-comments">
                                <span class="icon fa fa-comments-o"></span>
                                <a href="#">14</a>
                            </div> -->
                            <?php $this->endBlock(); ?>
                            <div class="post-classic-time">
                                <span class="icon fa fa-clock-o"></span>
                                <time datetime="<?= $article['date'] ?>"><?= $article['date'] ?></time>
                            </div>
                            <div class="post-classic-author">Автор: <a><?= $users[$article['author_key']]['name'] ?></a></div>
                        </div>
                        <a class="post-classic-figure" href="/?r=articles/show&article_key=<?= $article['key'] ?>">
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
                            <?php $this->beginBlock('products_excluded_num_comm'); ?>
                                <!-- RD Search Form-->
                                <div class="post-sidebar-item">
                                    <form class="rd-search form-search form-post-search"
                                        action="search-results.html" method="GET">
                                        <div class="form-wrap">
                                            <label class="form-label rd-input-label" for="search-form">Search the
                                                blog...</label>
                                            <input class="form-input" id="search-form" type="text" name="s"
                                                autocomplete="off">
                                            <button class="button-search fl-bigmug-line-search74"
                                                type="submit"></button>
                                        </div>
                                    </form>
                                </div>
                            <?php $this->endBlock(); ?>

                            <!-- категории -->
                            <div class="post-sidebar-item">
                                <h5>Рубрики</h5>
                                <div class="post-sidebar-item-inset">
                                    <ul class="list list-categories">
                                        <?php $active = 'class="active"'; ?>
                                        <?php $currentKey = $currentCategory['key'] ?? ''; ?>
                                        <li><a <?= $currentKey ? '' : $active ?> href="/?r=articles">Все рубрики</a></li>
                                        <?php foreach ($categories as $category):?>
                                            <?php $key = $category['key']; ?>
                                            <li><a <?= $key === $currentKey ? $active : '' ?> href="/?r=articles&category_label=<?= $category['label'] ?>"><?= $category['name'] ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>

                            <?php $this->beginBlock('articles_excluded_pop_articles'); ?>
                            <div class="post-sidebar-item">
                                <h5>Популярные статьи</h5>
                                <div class="post-sidebar-item-inset">
                                    <!-- Post Minimal-->
                                    <article class="post post-minimal"><a class="post-minimal-figure"
                                            href="blog-post.html"><img src="images/post-8-232x138.jpg" alt=""
                                                width="232" height="138"></a>
                                        <p class="post-minimal-title"><a href="blog-post.html">5 Facilities
                                                Every Hotel Should Have</a></p>
                                    </article>
                                    <!-- Post Minimal-->
                                    <article class="post post-minimal"><a class="post-minimal-figure"
                                            href="blog-post.html"><img src="images/post-9-232x138.jpg" alt=""
                                                width="232" height="138"></a>
                                        <p class="post-minimal-title"><a href="blog-post.html">Making the Most
                                                of your Stay at Resort</a></p>
                                    </article>
                                </div>
                            </div>
                            <?php $this->endblock(); ?>

                        </div>

                        <div class="col-sm-6 col-lg-12">
                            <?php $this->beginBlock('articles_excluded_comm'); ?>
                            <!-- Quote Minimal-->
                            <!-- <div class="post-sidebar-item">
                                <h5>Comments</h5>
                                <div class="post-sidebar-item-inset">
                                    <article class="quote-minimal">
                                        <div class="quote-minimal-text">
                                            <p class="q">Sed ut perspiciatis unde omnis iste natus error sit
                                                voluptatem.</p>
                                        </div>
                                        <h6 class="quote-minimal-cite">Jessica Brown on<span
                                                class="quote-minimal-source"><a href="#">useful Hotel Safety
                                                    Tips</a></span></h6>
                                    </article>
                                    <article class="quote-minimal">
                                        <div class="quote-minimal-text">
                                            <p class="q">Nemo enim ipsam voluptatem quia voluptas sit aspernatur
                                                aut odit.</p>
                                        </div>
                                        <h6 class="quote-minimal-cite">Adam Williams on<span
                                                class="quote-minimal-source"><a href="#">How to Book a Room at
                                                    Resort</a></span></h6>
                                    </article>
                                </div>
                            </div> -->
                            <?php $this->endblock(); ?>

                            <?php $this->beginBlock('articles_excluded_pop_categories'); ?>
                            <div class="post-sidebar-item">
                                <h5>Popular tags</h5>
                                <div class="post-sidebar-item-inset">
                                    <div class="group-xs group-middle justify-content-start"><a
                                            class="badge badge-white" href="#">
                                            <svg xmlns="https://www.w3.org/2000/svg" x="0px" y="0px"
                                                width="16px" height="27px" viewBox="0 0 16 27"
                                                enable-background="new 0 0 16 27" xml:space="preserve">
                                                <path
                                                    d="M0,0v6c4.142,0,7.5,3.358,7.5,7.5S4.142,21,0,21v6h16V0H0z">
                                                </path>
                                            </svg>
                                            <div>News</div>
                                        </a><a class="badge badge-white" href="#">
                                            <svg xmlns="https://www.w3.org/2000/svg" x="0px" y="0px"
                                                width="16px" height="27px" viewBox="0 0 16 27"
                                                enable-background="new 0 0 16 27" xml:space="preserve">
                                                <path
                                                    d="M0,0v6c4.142,0,7.5,3.358,7.5,7.5S4.142,21,0,21v6h16V0H0z">
                                                </path>
                                            </svg>
                                            <div>Hotel</div>
                                        </a><a class="badge badge-white" href="#">
                                            <svg xmlns="https://www.w3.org/2000/svg" x="0px" y="0px"
                                                width="16px" height="27px" viewBox="0 0 16 27"
                                                enable-background="new 0 0 16 27" xml:space="preserve">
                                                <path
                                                    d="M0,0v6c4.142,0,7.5,3.358,7.5,7.5S4.142,21,0,21v6h16V0H0z">
                                                </path>
                                            </svg>
                                            <div>Accommodation</div>
                                        </a><a class="badge badge-white" href="#">
                                            <svg xmlns="https://www.w3.org/2000/svg" x="0px" y="0px"
                                                width="16px" height="27px" viewBox="0 0 16 27"
                                                enable-background="new 0 0 16 27" xml:space="preserve">
                                                <path
                                                    d="M0,0v6c4.142,0,7.5,3.358,7.5,7.5S4.142,21,0,21v6h16V0H0z">
                                                </path>
                                            </svg>
                                            <div>Dining</div>
                                        </a><a class="badge badge-white" href="#">
                                            <svg xmlns="https://www.w3.org/2000/svg" x="0px" y="0px"
                                                width="16px" height="27px" viewBox="0 0 16 27"
                                                enable-background="new 0 0 16 27" xml:space="preserve">
                                                <path
                                                    d="M0,0v6c4.142,0,7.5,3.358,7.5,7.5S4.142,21,0,21v6h16V0H0z">
                                                </path>
                                            </svg>
                                            <div>Facilities</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php $this->endblock(); ?>

                            <?php $this->beginBlock('articles_excluded_email'); ?>
                            <!-- RD Mailform-->
                            <!-- <div class="post-sidebar-item">
                                <h5>Newsletter</h5>
                                <div class="post-sidebar-item-inset">
                                    <form class="rd-form rd-mailform" data-form-output="form-output-global"
                                        data-form-type="subscribe" method="post" action="bat/rd-mailform.php"
                                        novalidate="novalidate">
                                        <div class="form-wrap">
                                            <input class="form-input form-control-has-validation"
                                                id="subscribe-form-4-email" type="email" name="email"
                                                data-constraints="@Email @Required"><span
                                                class="form-validation"></span>
                                            <label class="form-label rd-input-label"
                                                for="subscribe-form-4-email">Enter Your E-mail</label>
                                        </div>
                                        <div class="form-button">
                                            <button class="button button-block button-primary"
                                                type="submit">Subscribe</button>
                                        </div>
                                    </form>
                                </div>
                            </div> -->
                            <?php $this->endblock(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

