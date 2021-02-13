<?php

/* @var $this yii\web\View */

use frontend\models\Article;

$this->title = $article['name'];
$this->registerMetaTag(['name' => 'keywords', 'content' => implode(', ', array_column($keywords, 'name'))]);
$this->registerMetaTag(['name' => 'description', 'content' => $article['breaf']], 'description');
?>

<!-- Breadcrumbs -->
<section class="breadcrumbs-custom-inset">
    <div class="breadcrumbs-custom context-dark bg-overlay-60">
        <div class="container">
            <h2 class="breadcrumbs-custom-title visually-hidden"><?= $article['name'] ?></h2>
            <ul class="breadcrumbs-custom-path">
                <li><a href="/">Главная</a></li>
                <li><a href="/?r=articles/categories"><?= $entity['name'] ?></a></li>
                <li><a href="/?r=articles&category_label=<?= $currentCategory['label'] ?>"><?= $currentCategory['name'] ?></a></li>
                <li class="active">статья-<?= $article['key'] ?> <span class="visually-hidden"><?= $article['name'] ?></span></li>
            </ul>
        </div>
        <div class="box-position" style="background-image: url(images/bg-breadcrumbs.jpg);"></div>
    </div>
</section>

<!-- Grid blog-->
<section class="section section-xl bg-default text-left">
    <div class="container">
        <div class="row row-50">
            <!-- left panel -->
            <div class="col-lg-8">
                <div class="blog-post">
                    <!-- Post Classic-->
                    <article class="post post-classic text-justify">
                        <h4 class="post-classic-title text-left"><?= $article['name'] ?></h4>
                        <div class="post-classic-panel group-middle justify-content-start">
                            <a class="badge badge-secondary" href="/?r=articles&category_label=<?= $currentCategory['label'] ?>">
                                <svg xmlns="https://www.w3.org/2000/svg" x="0px" y="0px" width="16px"
                                    height="27px" viewBox="0 0 16 27" enable-background="new 0 0 16 27"
                                    xml:space="preserve">
                                    <path d="M0,0v6c4.142,0,7.5,3.358,7.5,7.5S4.142,21,0,21v6h16V0H0z"></path>
                                </svg>
                                <div><?= $currentCategory['name'] ?></div>
                            </a>
                            <!-- количество комментариев -->
                            <!-- <div class="post-classic-comments">
                                <span class="icon fa fa-comments-o"></span>
                                <a href="#">14</a>
                            </div> -->
                            <div class="post-classic-time"><span class="icon fa fa-clock-o"></span>
                                <time datetime="<?= $article['date'] ?>!!!"><?= $article['date'] ?></time>
                            </div>
                            <div class="post-classic-author">Автор: <a><?= $author['name'] ?></a></div>
                        </div>
                        <?php foreach($article_parts as $article_part): ?>
                            <?php if ($article_part['type'] === Article::ARTICLE_COVER && false): // false обложка отключена ?>
                                <div class="post-classic-figure">
                                    <img src="<?= $article['frontpath'] .'/'. $article_part['cover'][0] ?>" 
                                    alt="<?= $article_part['cover'][1] ?>" width="770" height="430">
                                </div>

                            <?php elseif ($article_part['type'] === Article::ARTICLE_BREAF): ?>
                                <p class="post-classic-text"><b><?= $article_part['breaf'] ?></b></p>

                            <?php elseif ($article_part['type'] === Article::ARTICLE_PARAG): ?>
                                <p class="post-classic-text"><?= $article_part['parag'] ?></p>

                            <?php elseif ($article_part['type'] === Article::ARTICLE_PHOTO): ?>
                                <div class="post-classic-figure">
                                    <img src="<?= $article['frontpath'] .'/'. $article_part['image'][0] ?>" 
                                    alt="<?= $article_part['image'][1] ?>" width="770" height="430">
                                </div>
                                <p class="post-classic-text" style="text-align: center; color: black;">Рис. <?= $article_part['image'][1] ?></p>

                            <?php elseif ($article_part['type'] === Article::ARTICLE_TIP): ?>
                                <!-- Tips Quote Classic-->
                                <article class="quote-classic quote-classic-big">
                                    <div class="quote-classic-text">
                                        <p class="q">
                                            <?= $article_part['tip'] === null ? $tip['desc'] : $tips[$article_part['tip']]['desc'] ?>
                                        </p>
                                    </div>
                                </article>

                            <?php elseif ($article_part['type'] === Article::ARTICLE_PHOTOS): ?>
                                <div class="owl-carousel owl-dots-white owl-loaded owl-drag" data-items="1" data-dots="true"
                                data-autoplay="true" data-animation-in="fadeIn" data-animation-out="fadeOut" style="">
                                    <?php foreach ($article_part['images'] as $image): ?>
                                        <img src="<?= $article['frontpath'] .'/'. $image[0] ?>" alt="<?= $image[1] ?>" width="770" height="430">
                                    <?php endforeach; ?>
                                </div>

                            <?php elseif ($article_part['type'] === Article::ARTICLE_LIST): ?>
                                <p class="post-classic-text"><?= $article_part['list'][0] ?></p>
                                <ul class="list-marked list-marked-primary">
                                    <?php  foreach ($article_part['list'][1] as $li_item): ?>
                                        <li><?= $li_item ?></li>
                                    <?php endforeach; ?>
                                </ul>

                            <?php elseif ($article_part['type'] === Article::ARTICLE_TABLE): ?>
                                <p class="post-classic-text"><strong><?= $article_part['table']['name'] ?></strong></p>
                                <?= $article_part['table']['html'] ?>

                            <?php elseif ($article_part['type'] === Article::ARTICLE_ROWSET): ?>
                                <div class="post-classic-text">
                                    <h5 class="text-spacing-100 font-weight-normal h5-heading"><?= $article_part['rowset']['name'] ?></h5>
                                    <?php $captions = array_shift($article_part['rowset']['rows']); // первый rows - заголовки?>
                                    <?php foreach ($article_part['rowset']['rows'] as $item): ?>
                                        <?php $item[2] = explode('*', $item[2]); ?>
                                        <?php count($item[2]) !== 1 ?: $item[2][0];?>
                                        <div class="box-comment">
                                            <div class="unit unit-spacing-md flex-column flex-md-row align-items-lg-center">
                                                <div class="unit-left">
                                                    <img src="<?= $article['frontpath'] .'/'. $item[0] ?>" alt="<?= $item[1] ?>" width="119" height="119">
                                                </div>
                                                <div class="unit-body">
                                                    <div class="group-sm group-justify">
                                                        <p class="box-comment-text">
                                                            <?= '<strong>' . $item[1] . '</strong>' ?>
                                                        </p>
                                                    </div>
                                                    <div class="group-sm group-justify" style="margin-top: 10px">
                                                        <?php if (is_array($item[2])) : ?>
                                                        <ul>
                                                            <?php foreach ($item[2] as $li_item) : ?>
                                                            <li><?= $li_item ?></li>
                                                            <?php endforeach;?>
                                                        </ul>
                                                        <?php else : ?>
                                                        <p class="box-comment-text">
                                                            <?= $captions[2] . ': ' . $item[2] ?>
                                                        </p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </article>

                    <!-- Описание категории -->
                    <p> <?= $currentCategory['breaf'] ?> - реализует ООО ПКФ "ЭЛТА". Мы производственно коммерческая организация, специализируемся в изготовлении стеклоизделий, обработке стекла. Выполняем полный цикл изготовления изделий и конструкций из стекла: дизайн, проектирование, подбор комплектующих, расчет цены, производство, доставку и монтаж.</p>

                    <!-- article end string -->
                    <div class="blog-post-bottom-panel group-md group-justify">
                        <div class="blog-post-tags">
                            <?php foreach ($keywordNames as $keyword): ?>
                            <a><?= $keyword ?></a>
                            <?php endforeach; ?>
                        </div>

                        <?php $this->beginBlock('articles_excluded_social'); ?>
                        <!-- иконки и ссылки на социальные сети -->
                        <!-- <div>
                            <div class="group-md group-middle"><span class="social-title">Share</span>
                                <div>
                                    <ul class="list-inline list-inline-sm social-list">
                                        <li><a class="icon fa fa-facebook" href="#"></a></li>
                                        <li><a class="icon fa fa-twitter" href="#"></a></li>
                                        <li><a class="icon fa fa-google-plus" href="#"></a></li>
                                        <li><a class="icon fa fa-instagram" href="#"></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div> -->
                        <?php $this->endblock(); ?>

                    </div>
                </div>

                <?php $this->beginBlock('articles_excluded_pop_comm'); ?>
                <!-- Комментарии к статьям -->
                <!-- <div class="blog-post-comments">
                    <h5 class="text-spacing-100 font-weight-normal">3 Comments</h5>
                    <div class="box-comment">
                        <div class="unit unit-spacing-md flex-column flex-md-row align-items-lg-center">
                            <div class="unit-left"><a class="box-comment-figure" href="#"><img
                                        src="images/user-1-119x119.jpg" alt="" width="119" height="119"></a>
                            </div>
                            <div class="unit-body">
                                <div class="group-sm group-justify">
                                    <div>
                                        <div class="group-sm group-middle">
                                            <p class="box-comment-author"><a href="#">John Doe</a></p>
                                            <div class="box-comment-reply"><a href="#">Reply</a></div>
                                        </div>
                                    </div>
                                    <div class="box-comment-time">
                                        <time datetime="2019-11-30">Nov 30, 2019</time>
                                    </div>
                                </div>
                                <p class="box-comment-text">At vero eos et accusamus et iusto odio dignissimos
                                    ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos
                                    dolores et quas molestias excepturi sint occaecati cupiditate non provident.
                                </p>
                            </div>
                        </div>
                        <div class="box-comment">
                            <div class="unit unit-spacing-md flex-column flex-md-row align-items-lg-center">
                                <div class="unit-left"><a class="box-comment-figure" href="#"><img
                                            src="images/user-2-119x119.jpg" alt="" width="119" height="119"></a>
                                </div>
                                <div class="unit-body">
                                    <div class="group-sm group-justify">
                                        <div>
                                            <div class="group-sm group-middle">
                                                <p class="box-comment-author"><a href="#">Jessica Brown</a></p>
                                                <div class="box-comment-reply"><a href="#">Reply</a></div>
                                            </div>
                                        </div>
                                        <div class="box-comment-time">
                                            <time datetime="2019-11-30">Nov 30, 2019</time>
                                        </div>
                                    </div>
                                    <p class="box-comment-text">Et harum quidem rerum facilis est et expedita
                                        distinctio. Nam libero tempore, cum soluta nobis est eligendi optio
                                        cumque nihil impedit.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-comment">
                        <div class="unit unit-spacing-md flex-column flex-md-row align-items-lg-center">
                            <div class="unit-left"><a class="box-comment-figure" href="#"><img
                                        src="images/user-3-119x119.jpg" alt="" width="119" height="119"></a>
                            </div>
                            <div class="unit-body">
                                <div class="group-sm group-justify">
                                    <div>
                                        <div class="group-sm group-middle">
                                            <p class="box-comment-author"><a href="#">Nick Stevens</a></p>
                                            <div class="box-comment-reply"><a href="#">Reply</a></div>
                                        </div>
                                    </div>
                                    <div class="box-comment-time">
                                        <time datetime="2019-11-30">Nov 30, 2019</time>
                                    </div>
                                </div>
                                <p class="box-comment-text">Temporibus autem quibusdam et aut officiis debitis
                                    aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et
                                    molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente
                                    delectus.</p>
                            </div>
                        </div>
                    </div>
                </div> -->

                <!-- Добавте комментарий или напишите нам -->
                <!-- <div class="blog-post-comments">
                    <h5 class="text-spacing-100 font-weight-normal">Напишите нам</h5>
                    <form class="rd-form rd-mailform" novalidate="novalidate">
                        <div class="row row-14 gutters-14">
                            <div class="col-sm-6">
                                <div class="form-wrap">
                                    <input class="form-input form-control-has-validation"
                                        id="contact-your-name-5" type="text" name="name"
                                        data-constraints="@Required"><span class="form-validation"></span>
                                    <label class="form-label rd-input-label" for="contact-your-name-5">Your
                                        Name</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-wrap">
                                    <input class="form-input form-control-has-validation" id="contact-email-5"
                                        type="email" name="email" data-constraints="@Email @Required"><span
                                        class="form-validation"></span>
                                    <label class="form-label rd-input-label" for="contact-email-5">Your
                                        E-mail</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-wrap">
                                    <label class="form-label rd-input-label"
                                        for="contact-message-5">Message</label>
                                    <textarea
                                        class="form-input textarea-lg form-control-has-validation form-control-last-child"
                                        id="contact-message-5" name="message"
                                        data-constraints="@Required"></textarea><span
                                        class="form-validation"></span>
                                </div>
                            </div>
                        </div>
                        <button class="button button-primary" type="submit">Submit</button>
                    </form>
                </div> -->
                <?php $this->endblock(); ?>

            </div>

            <!-- right panel -->
            <div class="col-lg-4">
                <div class="post-sidebar post-sidebar-inset">
                    <div class="row row-lg row-60">
                        <div class="col-sm-6 col-lg-12">

                            <div class="post-sidebar-item">
                                <!-- RD Search Form-->
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

                            <div class="post-sidebar-item">
                                <h5>Рубрики</h5>
                                <div class="post-sidebar-item-inset">
                                    <ul class="list list-categories">
                                        <?php $active = 'class="active"'; ?>
                                        <?php $currentKey = $currentCategory['key'] ?? ''; ?>
                                        <li><a <?= $currentKey ? '' : $active ?> href="/?r=articles/categories">Все рубрики</a></li>
                                        <?php foreach ($categories as $category):?>
                                            <?php $key = $category['key']; ?>
                                            <li><a <?= $key === $currentKey ? $active : '' ?> href="/?r=articles&category_label=<?= $category['label'] ?>"><?= $category['name'] ?></a></li>
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
