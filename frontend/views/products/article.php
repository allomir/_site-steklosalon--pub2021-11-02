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
            <h2 class="breadcrumbs-custom-title"><?= $currentCategory['name'] ?></h2>
            <ul class="breadcrumbs-custom-path">
                <li><a href="/">Главная</a></li>
                <li><a href="/?r=products"><?= $entity['name'] ?></a></li>
                <li><a href="/?r=products&category_label=<?= $currentCategory['label'] ?>"><?= $currentCategory['name'] ?></a></li>
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
                            <a class="badge badge-secondary" href="/?r=products&category_label=<?= $currentCategory['label'] ?>">
                                <svg xmlns="https://www.w3.org/2000/svg" x="0px" y="0px" width="16px"
                                    height="27px" viewBox="0 0 16 27" enable-background="new 0 0 16 27"
                                    xml:space="preserve">
                                    <path d="M0,0v6c4.142,0,7.5,3.358,7.5,7.5S4.142,21,0,21v6h16V0H0z"></path>
                                </svg>
                                <div><?= $currentCategory['name'] ?></div>
                            </a>
                            <?php $this->beginBlock('products_excluded_num_comm'); ?>
                            <!-- количество комментариев -->
                            <!-- <div class="post-classic-comments">
                                <span class="icon fa fa-comments-o"></span>
                                <a href="#">14</a>
                            </div> -->
                            <?php $this->endBlock(); ?>

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
                    </div>
                </div>

            </div>

            <!-- right panel -->
            <div class="col-lg-4">
                <!-- Post Sidebar-->
                <div class="post-sidebar post-sidebar-inset">
                    <div class="row row-lg row-60">
                        <div class="col-sm-6 col-lg-12">

                            <div class="post-sidebar-item">
                                <h5>Статьи о продукции</h5>
                                <div class="post-sidebar-item-inset">
                                    <ul class="list list-categories">
                                        <?php $active = 'class="active"'; ?>
                                        <?php $currentKey = $article['key'] ?? ''; ?>
                                        <?php foreach ($articles as $article):?>
                                            <?php $key = $article['key']; ?>
                                            <li><a <?= $key === $currentKey ? $active : '' ?> href="/?r=products/article&article_key=<?= $article['key'] ?>"><?= $article['name'] ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                            <!-- Еще Категории в разделе -->
                            <div class="post-sidebar-item">
                                <h5>Еще <?= $entity['name'] ?></h5>
                                <div class="post-sidebar-item-inset">
                                    <!-- Post Minimal-->
                                    <?php shuffle($categories); $i= 1; ?>
                                    <?php while($i <= 2) : ?>
                                        <?php $anotherCategory = array_shift($categories); ?>
                                        <?php if($currentCategory['key'] === $anotherCategory['key']) continue; ?>
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
