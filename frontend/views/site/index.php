<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'Компания ЭЛТА - обработка стекла, стеклоизделия, стеклоконструкции, декор для стекла, багеты, листовое стекло, витражи';
$this->registerMetaTag(['name' => 'keywords', 'content' => implode(', ', array_column($keywords, 'name'))]);
$this->registerMetaTag(['name' => 'description', 'content' => $companyDesc], 'description');
?>

        <!-- Заставки Swiper-->
        <section
            class="section swiper-container swiper-slider swiper-slider-tara swiper-container-horizontal swiper-container-fade"
            data-loop="true" data-autoplay="5000" data-simulate-touch="true" data-nav="false" data-slide-effect="fade">
            <div class="swiper-wrapper text-center context-dark" style="transition-duration: 0ms;">
                <!-- Заставка -->
                <?php foreach($swiperArticles as $article) :?>
                <?php $swiperImage = pathinfo($article['cover']); ?>
                <div class="swiper-slide" data-slide-bg="<?= $article['frontpath']?>/<?= $swiperImage['dirname'] . '/' . $swiperImage['filename'] . '-swiper.' . $swiperImage['extension'] ?>">
                    <div class="swiper-slide-caption section-md">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-sm-8 col-xxl-7">
                                    <h6 class="oh swiper-subtitle">
                                        <span class="d-inline-block not-animated" data-caption-animate="slideInDown" data-caption-delay="300">
                                            <?php $swiperGroup = $groups[$categories[$article['category_key']]['group_key']];?>
                                            <?= $categories[$article['category_key']]['breaf']?>
                                        </span>
                                    </h6>
                                    <h2 class="swiper-title">
                                        <span class="d-block not-animated" data-caption-animate="fadeInRight" data-caption-delay="0">
                                        <?= $article['name']?>
                                        </span>
                                    </h2>
                                    <div class="oh button-wrap">
                                        <a class="button button-primary button-ujarak not-animated" 
                                            <?php $swiperEntity = $entities[$swiperGroup['entity_key']];?>
                                            <?php $swiperAction = $swiperEntity['key'] === 1 ? 'show' : 'article';?>
                                            href="/?r=<?= $swiperEntity['label']?>/<?= $swiperAction?>&article_key=<?= $article['key']?>" 
                                            data-caption-animate="slideInUp" data-caption-delay="300">
                                            Смотреть
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <!-- Swiper Pagination-->
            <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets">
                <span class="swiper-pagination-bullet"></span>
            </div>
        </section>

        <!-- ИЗДЕЛИЯ -->
        <section class="section section-xl bg-default">
            <div class="container">
                <div class="heading-panel">
                    <div class="heading-panel-left heading-panel-left-1">
                        <h1 class="oh-desktop heading-panel-title"><span class="d-inline-block wow slideInLeft"
                                style="visibility: visible; animation-name: slideInLeft;"><?= $productEntities['name']?></span></h1>
                        <h4 class="oh-desktop heading-panel-subtitle"><span class="d-inline-block wow slideInDown"
                                data-wow-delay=".2s"
                                style="visibility: visible; animation-delay: 0.2s; animation-name: slideInDown;"><?= $productEntities['type']?></span></h4>
                    </div>
                    <div class="heading-panel-decor wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
                    </div>
                    <div class="oh-desktop">
                        <div class="owl-custom-nav wow slideInUp disabled" id="owl-custom-nav-1"
                            style="visibility: visible; animation-name: slideInUp;">
                        </div>
                    </div>
                </div>
                
                <div class="owl-carousel owl-services-2 owl-loaded owl-drag" data-items="1" data-sm-items="2"
                    data-md-items="3" data-lg-items="4" data-margin="30" data-animation-in="fadeIn"
                    data-animation-out="fadeOut" data-autoplay="false" data-navigation-class="#owl-custom-nav-1">
                    <!-- ИЗДЕЛИЕ -->
                    <?php foreach($productCategories as $category) :?>
                    <article class="services-modern">
                        <a class="services-modern-figure" href="/?r=products&category_label=<?= $category['label']?>">
                            <img src="images/category_icons/<?= $category['icon']?>" alt="">
                        </a>
                        <div class="services-modern-content">
                            <h5 class="services-modern-title">
                                <a href="/?r=products&category_label=<?= $category['label']?>"><?= $category['name'] ?></a>
                            </h5>
                        </div>
                    </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- О НАС -->
        <section class="section section-xl bg-gray-4">
            <div class="container">
                <div class="heading-panel">
                    <div class="heading-panel-left heading-panel-left-1">
                        <h1 class="oh-desktop heading-panel-title"><span class="d-inline-block wow slideInLeft"
                                style="visibility: visible; animation-name: slideInLeft;">О нас</span></h1>
                        <h4 class="oh-desktop heading-panel-subtitle"><span class="d-inline-block wow slideInDown"
                                data-wow-delay=".2s"
                                style="visibility: visible; animation-delay: 0.2s; animation-name: slideInDown;">Наши услуги</span></h4>
                    </div>
                    <div class="heading-panel-decor wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
                    </div>
                </div>
                <div class="row row-30">
                    <!-- группы -->
                    <?php foreach($groups as $group) :?>
                    <div class="col-sm-6 col-lg-4">
                        <article class="box-icon-classic box-icon-classic-3 wow fadeInUp" data-wow-delay=".2s"
                            style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                            <div class="unit box-icon-classic-body flex-column flex-md-row text-md-left flex-lg-column text-lg-center flex-xl-row text-xl-left">
                                <div class="unit-left">
                                    <div class="box-icon-classic-icon linearicons-star"></div>
                                </div>
                                <div class="unit-body">
                                    <h5 class="box-icon-classic-title"><a href="/?r=<?= $entities[$group['entity_key']]['label']?>#<?= $group['label']?>"><?= $group['name']?></a></h5>
                                    <p class="box-icon-classic-text"><?= $group['breaf']?></p>
                                </div>
                            </div>
                        </article>
                    </div>
                    <?php endforeach; ?>

                    <!-- дополнено до 6 -->
                    <div class="col-sm-6 col-lg-4">
                        <article class="box-icon-classic box-icon-classic-3 wow fadeInUp" data-wow-delay=".2s"
                            style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                            <div
                                class="unit box-icon-classic-body flex-column flex-md-row text-md-left flex-lg-column text-lg-center flex-xl-row text-xl-left">
                                <div class="unit-left">
                                    <div class="box-icon-classic-icon linearicons-star"></div>
                                </div>
                                <div class="unit-body">
                                    <h5 class="box-icon-classic-title"><a href="/?r=gallery">Производство под ключ</a></h5>
                                    <p class="box-icon-classic-text">Большой опыт работы в сфере стеклоконструкций, широкий выбор изготавливаемой продукции, собственное производство</p>
                                </div>
                            </div>
                        </article>
                    </div>

                </div>
            </div>
        </section>

<?php $this->beginBlock('indexSections'); ?>
        <!-- Get a Free Quote-->
        <section class="section bg-default text-center">
            <div class="parallax-container" data-parallax-img="images/bg-forms-3.jpg">
                <div class="material-parallax parallax"><img src="images/bg-forms-3.jpg" alt=""
                        style="display: block; transform: translate3d(-50%, 6px, 0px);"></div>
                <div class="parallax-content section-xl section-lg-0">
                    <div class="container">
                        <div
                            class="row justify-content-center justify-content-md-end justify-content-lg-between align-items-lg-end">
                            <div class="col-lg-5 col-xl-6">
                                <div class="d-none d-lg-block wow fadeInRight"
                                    style="visibility: visible; animation-name: fadeInRight;"></div>
                            </div>
                            <div class="col-sm-8 col-md-6 col-lg-5">
                                <div class="section-inset-custom-6">
                                    <div class="oh-desktop">
                                        <div class="box-form wow slideInLeft"
                                            style="visibility: visible; animation-name: slideInLeft;">
                                            <h4 class="box-form-title">Book a room</h4>
                                            <form class="rd-form rd-mailform" data-form-output="form-output-global"
                                                data-form-type="contact" method="post" action="bat/rd-mailform.php"
                                                novalidate="novalidate">
                                                <div class="form-wrap">
                                                    <input class="form-input form-control-has-validation"
                                                        id="contact-name-8" type="text" name="name"
                                                        data-constraints="@Required">
                                                    <label class="form-label rd-input-label"
                                                        for="contact-name-8">Name</label>
                                                </div>
                                                <div class="form-wrap">
                                                    <input class="form-input form-control-has-validation"
                                                        id="contact-phone-8" type="text" name="phone"
                                                        data-constraints="@Numeric">
                                                    <label class="form-label rd-input-label"
                                                        for="contact-phone-8">Phone</label>
                                                </div>
                                                <div class="form-wrap">
                                                    <select
                                                        class="form-input form-control-has-validation form-control-last-child select2-hidden-accessible"
                                                        id="arrival-date" name="arrival-date"
                                                        data-constraints="@Required" data-placeholder="Arrival date"
                                                        data-select2-id="arrival-date" tabindex="-1" aria-hidden="true">
                                                        <option label="placeholder" data-select2-id="2"></option>
                                                        <option>January 15, 2019</option>
                                                        <option>February 10, 2019</option>
                                                        <option>March 13, 2019</option>
                                                    </select>
                                                </div>
                                                <div class="form-wrap">
                                                    <select
                                                        class="form-input form-control-has-validation form-control-last-child select2-hidden-accessible"
                                                        id="departure-date" name="departure-date"
                                                        data-constraints="@Required" data-placeholder="Departure date"
                                                        data-select2-id="departure-date" tabindex="-1"
                                                        aria-hidden="true">
                                                        <option label="placeholder" data-select2-id="4"></option>
                                                        <option>February 25, 2019</option>
                                                        <option>March 2, 2019</option>
                                                        <option>April 21, 2019</option>
                                                    </select>
                                                </div>
                                                <div class="form-wrap">
                                                    <div class="row row-10 row-gutter-10">
                                                        <div class="col-md-6">
                                                            <select
                                                                class="form-input form-control-has-validation form-control-last-child select2-hidden-accessible"
                                                                id="adults" name="adults" data-constraints="@Required"
                                                                data-placeholder="Adults" data-select2-id="adults"
                                                                tabindex="-1" aria-hidden="true">
                                                                <option label="placeholder" data-select2-id="6">
                                                                </option>
                                                                <option>2 Adults</option>
                                                                <option>3 Adults</option>
                                                                <option>4 Adults</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <select
                                                                class="form-input form-control-has-validation form-control-last-child select2-hidden-accessible"
                                                                id="children" name="children"
                                                                data-constraints="@Required" data-placeholder="Children"
                                                                data-select2-id="children" tabindex="-1"
                                                                aria-hidden="true">
                                                                <option label="placeholder" data-select2-id="8">
                                                                </option>
                                                                <option>1 Child</option>
                                                                <option>2 Children</option>
                                                                <option>3 Children</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="button button-block button-primary button-ujarak"
                                                    type="submit">Check Availability</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Latest projects-->
        <section class="section section-lg bg-default">
            <div class="container">
                <div class="heading-panel">
                    <div class="heading-panel-left">
                        <h1 class="oh-desktop heading-panel-title"><span class="d-inline-block wow slideInLeft"
                                style="visibility: visible; animation-name: slideInLeft;">Gallery</span></h1>
                        <h4 class="oh-desktop heading-panel-subtitle"><span class="d-inline-block wow slideInDown"
                                data-wow-delay=".2s"
                                style="visibility: visible; animation-delay: 0.2s; animation-name: slideInDown;">Hotel
                                Gallery</span></h4>
                    </div>
                    <div class="heading-panel-decor wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
                    </div>
                </div>
                <div class="row row-sm row-30" data-lightgallery="group">
                    <div class="col-sm-6 col-lg-4">
                        <div class="oh-desktop">
                            <!-- Thumbnail Modern-->
                            <article class="thumbnail thumbnail-creative thumbnail-sm wow slideInRight"
                                style="visibility: visible; animation-name: slideInRight;"><a
                                    class="thumbnail-creative-figure" href="images/home-gallery-1-1200x800-original.jpg"
                                    data-lightgallery="item"><img src="images/home-gallery-1-370x303.jpg" alt=""
                                        width="370" height="303"></a>
                                <div class="thumbnail-creative-caption">
                                    <h5 class="thumbnail-creative-title"><a href="#">Affordable Room Rates</a></h5>
                                    <div class="thumbnail-creative-button"><a class="button button-md button-white"
                                            href="#">Read more</a></div>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="oh-desktop">
                            <!-- Thumbnail Modern-->
                            <article class="thumbnail thumbnail-creative thumbnail-sm wow slideInUp"
                                style="visibility: visible; animation-name: slideInUp;"><a
                                    class="thumbnail-creative-figure" href="images/home-gallery-2-1200x800-original.jpg"
                                    data-lightgallery="item"><img src="images/home-gallery-2-370x303.jpg" alt=""
                                        width="370" height="303"></a>
                                <div class="thumbnail-creative-caption">
                                    <h5 class="thumbnail-creative-title"><a href="#">Best Room Service</a></h5>
                                    <div class="thumbnail-creative-button"><a class="button button-md button-white"
                                            href="#">Read more</a></div>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="oh-desktop">
                            <!-- Thumbnail Modern-->
                            <article class="thumbnail thumbnail-creative thumbnail-sm wow slideInDown"
                                style="visibility: visible; animation-name: slideInDown;"><a
                                    class="thumbnail-creative-figure" href="images/home-gallery-3-1200x800-original.jpg"
                                    data-lightgallery="item"><img src="images/home-gallery-3-370x303.jpg" alt=""
                                        width="370" height="303"></a>
                                <div class="thumbnail-creative-caption">
                                    <h5 class="thumbnail-creative-title"><a href="#">Spectacular Interior</a></h5>
                                    <div class="thumbnail-creative-button"><a class="button button-md button-white"
                                            href="#">Read more</a></div>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="oh-desktop">
                            <!-- Thumbnail Modern-->
                            <article class="thumbnail thumbnail-creative thumbnail-sm wow slideInUp"
                                style="visibility: visible; animation-name: slideInUp;"><a
                                    class="thumbnail-creative-figure"
                                    href="images/fullwidth-masonry-gallery-5-1200x800-original.jpg"
                                    data-lightgallery="item"><img src="images/home-gallery-4-370x303.jpg" alt=""
                                        width="370" height="303"></a>
                                <div class="thumbnail-creative-caption">
                                    <h5 class="thumbnail-creative-title"><a href="#">Diverse Amenities</a></h5>
                                    <div class="thumbnail-creative-button"><a class="button button-md button-white"
                                            href="#">Read more</a></div>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="oh-desktop">
                            <!-- Thumbnail Modern-->
                            <article class="thumbnail thumbnail-creative thumbnail-sm wow slideInDown"
                                style="visibility: visible; animation-name: slideInDown;"><a
                                    class="thumbnail-creative-figure" href="images/home-gallery-5-1200x800-original.jpg"
                                    data-lightgallery="item"><img src="images/home-gallery-5-370x303.jpg" alt=""
                                        width="370" height="303"></a>
                                <div class="thumbnail-creative-caption">
                                    <h5 class="thumbnail-creative-title"><a href="#">Comfortable Rooms</a></h5>
                                    <div class="thumbnail-creative-button"><a class="button button-md button-white"
                                            href="#">Read more</a></div>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="oh-desktop">
                            <!-- Thumbnail Modern-->
                            <article class="thumbnail thumbnail-creative thumbnail-sm wow slideInLeft"
                                style="visibility: visible; animation-name: slideInLeft;"><a
                                    class="thumbnail-creative-figure" href="images/home-gallery-6-1200x800-original.jpg"
                                    data-lightgallery="item"><img src="images/home-gallery-6-370x303.jpg" alt=""
                                        width="370" height="303"></a>
                                <div class="thumbnail-creative-caption">
                                    <h5 class="thumbnail-creative-title"><a href="#">Friendly Atmosphere</a></h5>
                                    <div class="thumbnail-creative-button"><a class="button button-md button-white"
                                            href="#">Read more</a></div>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- How we work for you-->
        <section class="section section-xl bg-gray-4">
            <div class="container">
                <div class="heading-panel">
                    <div class="heading-panel-left">
                        <h1 class="oh-desktop heading-panel-title"><span class="d-inline-block wow slideInLeft"
                                style="visibility: visible; animation-name: slideInLeft;">4 easy steps</span></h1>
                        <h4 class="oh-desktop heading-panel-subtitle"><span class="d-inline-block wow slideInDown"
                                data-wow-delay=".2s"
                                style="visibility: visible; animation-delay: 0.2s; animation-name: slideInDown;">How to
                                Book a Room</span></h4>
                    </div>
                    <div class="heading-panel-decor wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
                    </div>
                </div>
                <div class="row row-30 justify-content-center box-ordered">
                    <div class="col-sm-6 col-md-5 col-lg-3 wow fadeInLeft"
                        style="visibility: visible; animation-name: fadeInLeft;">
                        <article class="box-icon-leah box-icon-leah-2">
                            <div class="box-icon-leah-icon linearicons-document"></div>
                            <h5 class="box-icon-leah-title"><a href="#">Fill out an Online Form</a></h5>
                            <p class="box-icon-leah-text">Everything starts with filling out the booking form on our
                                website.</p>
                            <div class="box-icon-leah-count box-ordered-item"></div>
                        </article>
                    </div>
                    <div class="col-sm-6 col-md-5 col-lg-3 wow fadeInLeft" data-wow-delay=".1s"
                        style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInLeft;">
                        <article class="box-icon-leah box-icon-leah-2">
                            <div class="box-icon-leah-icon linearicons-phone-wave"></div>
                            <h5 class="box-icon-leah-title"><a href="#">Confirm your Booking</a></h5>
                            <p class="box-icon-leah-text">After that, our receptionists will contact you to confirm your
                                booking.</p>
                            <div class="box-icon-leah-count box-ordered-item"></div>
                        </article>
                    </div>
                    <div class="col-sm-6 col-md-5 col-lg-3 wow fadeInLeft" data-wow-delay=".2s"
                        style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInLeft;">
                        <article class="box-icon-leah box-icon-leah-2">
                            <div class="box-icon-leah-icon linearicons-calendar-check"></div>
                            <h5 class="box-icon-leah-title"><a href="#">Select Your Room</a></h5>
                            <p class="box-icon-leah-text">You can also select an exact room type during your booking
                                confirmation.</p>
                            <div class="box-icon-leah-count box-ordered-item"></div>
                        </article>
                    </div>
                    <div class="col-sm-6 col-md-5 col-lg-3 wow fadeInLeft" data-wow-delay=".3s"
                        style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;">
                        <article class="box-icon-leah box-icon-leah-2">
                            <div class="box-icon-leah-icon linearicons-star"></div>
                            <h5 class="box-icon-leah-title"><a href="#">Check in at the hotel</a></h5>
                            <p class="box-icon-leah-text">When you arrive at the hotel, don’t forget to check in at the
                                front desk.</p>
                            <div class="box-icon-leah-count box-ordered-item"></div>
                        </article>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section Subscribe-->
        <section class="section bg-default text-center">
            <div class="parallax-container" data-parallax-img="images/bg-forms.jpg">
                <div class="material-parallax parallax"><img src="images/bg-forms.jpg" alt=""
                        style="display: block; transform: translate3d(-50%, 13px, 0px);"></div>
                <div class="parallax-content section-xl section-inset-custom-1 context-dark bg-overlay-70">
                    <div class="container">
                        <h3 class="oh font-weight-normal"><span class="d-inline-block wow slideInDown"
                                style="visibility: visible; animation-name: slideInDown;">Subcribe to Our
                                Newsletter</span></h3>
                        <p class="text-width-medium text-spacing-75 wow fadeInLeft" data-wow-delay=".1s"
                            style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInLeft;">Leave your
                            e-mail in the form below to sign up to our newsletter and receive regular news, updates, and
                            special offers.</p>
                        <!-- RD Mailform-->
                        <form class="rd-form rd-mailform rd-form-inline oh-desktop"
                            data-form-output="form-output-global" data-form-type="subscribe" method="post"
                            action="bat/rd-mailform.php" novalidate="novalidate">
                            <div class="form-wrap wow slideInUp"
                                style="visibility: visible; animation-name: slideInUp;">
                                <input class="form-input form-control-has-validation" id="subscribe-form-1-email"
                                    type="email" name="email" data-constraints="@Email @Required"><span
                                    class="form-validation"></span>
                                <label class="form-label rd-input-label" for="subscribe-form-1-email">Enter Your
                                    E-mail</label>
                            </div>
                            <div class="form-button wow slideInRight"
                                style="visibility: visible; animation-name: slideInRight;">
                                <button class="button button-primary" type="submit">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Professionals-->
        <section class="section section-xl bg-default">
            <div class="container">
                <div class="heading-panel">
                    <div class="heading-panel-left">
                        <h1 class="oh-desktop heading-panel-title"><span class="d-inline-block wow slideInLeft"
                                style="visibility: visible; animation-name: slideInLeft;">Our team</span></h1>
                        <h4 class="oh-desktop heading-panel-subtitle"><span class="d-inline-block wow slideInDown"
                                data-wow-delay=".2s"
                                style="visibility: visible; animation-delay: 0.2s; animation-name: slideInDown;">True
                                Professionals</span></h4>
                    </div>
                    <div class="heading-panel-decor wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
                    </div>
                </div>
                <div class="row row-sm row-20 justify-content-center justify-content-lg-start">
                    <div class="col-sm-6 col-md-5 col-lg-3 wow fadeInRight"
                        style="visibility: visible; animation-name: fadeInRight;">
                        <!-- Team Modern-->
                        <article class="team-modern team-modern-2">
                            <div class="team-modern-header"><a class="team-modern-figure" href="#"><img
                                        class="img-circles" src="images/user-7-118x118.jpg" alt="" width="118"
                                        height="118"></a>
                                <svg x="0px" y="0px" width="270px" height="70px" viewBox="0 0 270 70"
                                    enable-background="new 0 0 270 70" xml:space="preserve">
                                    <g>
                                        <path fill="#161616"
                                            d="M202.085,0C193.477,28.912,166.708,50,135,50S76.523,28.912,67.915,0H0v70h270V0H202.085z">
                                        </path>
                                    </g>
                                </svg>
                            </div>
                            <div class="team-modern-caption">
                                <h5 class="team-modern-name"><a href="#">Samuel Miller</a></h5>
                                <p class="team-modern-status">General Manager</p>
                                <h6 class="team-modern-phone"><a href="tel:#">+1 323-913-4688</a></h6>
                            </div>
                        </article>
                    </div>
                    <div class="col-sm-6 col-md-5 col-lg-3 wow fadeInRight" data-wow-delay=".1s"
                        style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInRight;">
                        <!-- Team Modern-->
                        <article class="team-modern team-modern-2">
                            <div class="team-modern-header"><a class="team-modern-figure" href="#"><img
                                        class="img-circles" src="images/user-8-118x118.jpg" alt="" width="118"
                                        height="118"></a>
                                <svg x="0px" y="0px" width="270px" height="70px" viewBox="0 0 270 70"
                                    enable-background="new 0 0 270 70" xml:space="preserve">
                                    <g>
                                        <path fill="#161616"
                                            d="M202.085,0C193.477,28.912,166.708,50,135,50S76.523,28.912,67.915,0H0v70h270V0H202.085z">
                                        </path>
                                    </g>
                                </svg>
                            </div>
                            <div class="team-modern-caption">
                                <h5 class="team-modern-name"><a href="#">Peter Mcmillan</a></h5>
                                <p class="team-modern-status">Assistant Manager</p>
                                <h6 class="team-modern-phone"><a href="tel:#">+1 323-913-4688</a></h6>
                            </div>
                        </article>
                    </div>
                    <div class="col-sm-6 col-md-5 col-lg-3 wow fadeInRight" data-wow-delay=".2s"
                        style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInRight;">
                        <!-- Team Modern-->
                        <article class="team-modern team-modern-2">
                            <div class="team-modern-header"><a class="team-modern-figure" href="#"><img
                                        class="img-circles" src="images/user-9-118x118.jpg" alt="" width="118"
                                        height="118"></a>
                                <svg x="0px" y="0px" width="270px" height="70px" viewBox="0 0 270 70"
                                    enable-background="new 0 0 270 70" xml:space="preserve">
                                    <g>
                                        <path fill="#161616"
                                            d="M202.085,0C193.477,28.912,166.708,50,135,50S76.523,28.912,67.915,0H0v70h270V0H202.085z">
                                        </path>
                                    </g>
                                </svg>
                            </div>
                            <div class="team-modern-caption">
                                <h5 class="team-modern-name"><a href="#">Jill Peterson</a></h5>
                                <p class="team-modern-status">Front Office Manager</p>
                                <h6 class="team-modern-phone"><a href="tel:#">+1 323-913-4688</a></h6>
                            </div>
                        </article>
                    </div>
                    <div class="col-sm-6 col-md-5 col-lg-3 wow fadeInRight" data-wow-delay=".3s"
                        style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInRight;">
                        <!-- Team Modern-->
                        <article class="team-modern team-modern-2">
                            <div class="team-modern-header"><a class="team-modern-figure" href="#"><img
                                        class="img-circles" src="images/user-10-118x118.jpg" alt="" width="118"
                                        height="118"></a>
                                <svg x="0px" y="0px" width="270px" height="70px" viewBox="0 0 270 70"
                                    enable-background="new 0 0 270 70" xml:space="preserve">
                                    <g>
                                        <path fill="#161616"
                                            d="M202.085,0C193.477,28.912,166.708,50,135,50S76.523,28.912,67.915,0H0v70h270V0H202.085z">
                                        </path>
                                    </g>
                                </svg>
                            </div>
                            <div class="team-modern-caption">
                                <h5 class="team-modern-name"><a href="#">James Smith</a></h5>
                                <p class="team-modern-status">Concierge</p>
                                <h6 class="team-modern-phone"><a href="tel:#">+1 323-913-4688</a></h6>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </section>

        <!-- Years of experience-->
        <section class="section section-xl context-dark bg-secondary-custom">
            <div class="container">
                <div
                    class="row row-50 row-xl-24 justify-content-center align-items-center align-items-lg-start text-left">
                    <!-- Counter Amy-->
                    <div class="col-md-6 col-lg-5 col-xl-4 text-center"><a class="text-img" href="about-us.html"><span
                                class="counter animated-first">20</span></a></div>
                    <div class="col-sm-8 col-md-6 col-lg-5 col-xl-4">
                        <div class="text-width-extra-small offset-top-lg-24 wow fadeInUp"
                            style="visibility: visible; animation-name: fadeInUp;">
                            <h3 class="title-decoration-lines-left">Years of experience</h3>
                            <p class="text-gray-500">Established in 1999, Resort Hotel is the leading hospitality
                                establishment offering first-class accommodation.</p><a
                                class="button button-primary button-ujarak" href="#">Get in touch</a>
                        </div>
                    </div>
                    <div class="col-sm-10 col-md-8 col-lg-6 col-xl-4 wow fadeInRight" data-wow-delay=".1s"
                        style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInRight;">
                        <div class="row justify-content-center border-2-column offset-top-xl-26">
                            <div class="col-9 col-sm-6">
                                <div class="counter-amy">
                                    <div class="counter-amy-number"><span class="counter animated-first">20</span><span
                                            class="symbol">k</span>
                                    </div>
                                    <h6 class="counter-amy-title">Satisfied clients</h6>
                                </div>
                            </div>
                            <div class="col-9 col-sm-6">
                                <div class="counter-amy">
                                    <div class="counter-amy-number"><span class="counter animated-first">240</span>
                                    </div>
                                    <h6 class="counter-amy-title">Rooms</h6>
                                </div>
                            </div>
                            <div class="col-9 col-sm-6">
                                <div class="counter-amy">
                                    <div class="counter-amy-number"><span class="counter animated-first">25</span>
                                    </div>
                                    <h6 class="counter-amy-title">Awards won</h6>
                                </div>
                            </div>
                            <div class="col-9 col-sm-6">
                                <div class="counter-amy">
                                    <div class="counter-amy-number"><span class="counter animated-first">100</span>
                                    </div>
                                    <h6 class="counter-amy-title">Team members</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-12 align-self-center">
                        <div class="row row-30 justify-content-center">
                            <div class="col-sm-6 col-md-5 col-lg-6 col-xl-3 wow fadeInLeft"
                                style="visibility: visible; animation-name: fadeInLeft;"><a class="clients-classic"
                                    href="#"><img src="images/clients-12-270x117.png" alt="" width="270"
                                        height="117"></a></div>
                            <div class="col-sm-6 col-md-5 col-lg-6 col-xl-3 wow fadeInLeft" data-wow-delay=".1s"
                                style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInLeft;"><a
                                    class="clients-classic" href="#"><img src="images/clients-13-270x117.png" alt=""
                                        width="270" height="117"></a></div>
                            <div class="col-sm-6 col-md-5 col-lg-6 col-xl-3 wow fadeInLeft" data-wow-delay=".2s"
                                style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInLeft;"><a
                                    class="clients-classic" href="#"><img src="images/clients-14-270x117.png" alt=""
                                        width="270" height="117"></a></div>
                            <div class="col-sm-6 col-md-5 col-lg-6 col-xl-3 wow fadeInLeft" data-wow-delay=".3s"
                                style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;"><a
                                    class="clients-classic" href="#"><img src="images/clients-15-270x117.png" alt=""
                                        width="270" height="117"></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Popular questions-->
        <section class="section section-xl bg-default">
            <div class="container">
                <div class="heading-panel">
                    <div class="heading-panel-left heading-panel-left-1">
                        <h1 class="oh-desktop heading-panel-title"><span class="d-inline-block wow slideInLeft"
                                style="visibility: visible; animation-name: slideInLeft;">FAQ</span></h1>
                        <h4 class="oh-desktop heading-panel-subtitle"><span class="d-inline-block wow slideInDown"
                                data-wow-delay=".2s"
                                style="visibility: visible; animation-delay: 0.2s; animation-name: slideInDown;">Your
                                questions</span></h4>
                    </div>
                    <div class="heading-panel-decor wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
                    </div>
                </div>
                <div class="row row-lg row-30 flex-lg-row-reverse">
                    <div class="col-lg-5 col-xl-6 wow fadeInRight"
                        style="visibility: visible; animation-name: fadeInRight;">
                        <div class="video-classic"><img src="images/video-3-570x418.jpg" alt="" width="570"
                                height="418"><a class="video-classic-play" data-lightgallery="item"
                                href="https://www.youtube.com/embed/e_TCFkRDmls"><span></span></a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-xl-6 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                        <div class="card-group-custom card-group-corporate" id="accordion3" role="tablist"
                            aria-multiselectable="false">
                            <!-- Bootstrap card-->
                            <article class="card card-custom card-corporate">
                                <div class="card-header" id="accordion3Heading1" role="tab">
                                    <div class="card-title"><a role="button" data-toggle="collapse"
                                            data-parent="#accordion3" href="#accordion3Collapse1"
                                            aria-controls="accordion3Collapse1" aria-expanded="true">What do I receive
                                            when I order a template?
                                            <div class="card-arrow"></div></a>
                                    </div>
                                </div>
                                <div class="collapse show" id="accordion3Collapse1" role="tabpanel"
                                    aria-labelledby="accordion3Heading1">
                                    <div class="card-body">
                                        <p>After you complete the payment via our secure form you will receive the
                                            instructions for downloading the product. The source files in the download
                                            package can vary.</p>
                                    </div>
                                </div>
                            </article>
                            <!-- Bootstrap card-->
                            <article class="card card-custom card-corporate">
                                <div class="card-header" id="accordion3Heading2" role="tab">
                                    <div class="card-title"><a class="collapsed" role="button" data-toggle="collapse"
                                            data-parent="#accordion3" href="#accordion3Collapse2"
                                            aria-controls="accordion3Collapse2">In what formats are your templates
                                            available?
                                            <div class="card-arrow"></div></a>
                                    </div>
                                </div>
                                <div class="collapse" id="accordion3Collapse2" role="tabpanel"
                                    aria-labelledby="accordion3Heading2">
                                    <div class="card-body">
                                        <p>Website templates are available in Photoshop and HTML formats. Fonts are
                                            included with the Photoshop file. In most templates, HTML is compatible with
                                            Adobe® Dreamweaver® and Microsoft®</p>
                                    </div>
                                </div>
                            </article>
                            <!-- Bootstrap card-->
                            <article class="card card-custom card-corporate">
                                <div class="card-header" id="accordion3Heading3" role="tab">
                                    <div class="card-title"><a class="collapsed" role="button" data-toggle="collapse"
                                            data-parent="#accordion3" href="#accordion3Collapse3"
                                            aria-controls="accordion3Collapse3">What am I allowed to do with the
                                            templates?
                                            <div class="card-arrow"></div></a>
                                    </div>
                                </div>
                                <div class="collapse" id="accordion3Collapse3" role="tabpanel"
                                    aria-labelledby="accordion3Heading3">
                                    <div class="card-body">
                                        <p>You may build a website using the template in any way you like. You may not
                                            resell or redistribute templates (like we do); claim intellectual or
                                            exclusive ownership to any of our products, modified or unmodified.</p>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- What people say-->
        <section class="section section-xl bg-gray-4">
            <div class="container">
                <div class="heading-panel">
                    <div class="heading-panel-left">
                        <h1 class="oh-desktop heading-panel-title"><span class="d-inline-block wow slideInLeft"
                                style="visibility: visible; animation-name: slideInLeft;">Testimonials</span></h1>
                        <h4 class="oh-desktop heading-panel-subtitle"><span class="d-inline-block wow slideInDown"
                                data-wow-delay=".2s"
                                style="visibility: visible; animation-delay: 0.2s; animation-name: slideInDown;">What
                                our clients say</span></h4>
                    </div>
                    <div class="heading-panel-decor wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
                    </div>
                    <div class="oh-desktop">
                        <div class="owl-custom-nav wow slideInUp disabled" id="owl-custom-nav-2"
                            style="visibility: visible; animation-name: slideInUp;">
                        </div>
                    </div>
                </div>
                <!-- Owl Carousel-->
                <div class="owl-carousel owl-quote-2 owl-loaded owl-drag" data-items="1" data-md-items="2"
                    data-autoplay="true" data-margin="30" data-animation-in="fadeIn" data-animation-out="fadeOut"
                    data-navigation-class="#owl-custom-nav-2" style="">
                    <!-- Quote Modern-->
                    <div class="owl-item" style="width: 570px; margin-right: 30px;">
                        <article class="quote-modern quote-modern-2 quote-modern-custom">
                            <div class="unit unit-spacing-md align-items-center">
                                <div class="unit-left"><a class="quote-modern-figure" href="#"><img
                                            class="img-circles" src="images/user-11-75x75.jpg" alt="" width="75"
                                            height="75"></a></div>
                                <div class="unit-body">
                                    <h5 class="quote-modern-cite"><a href="#">Catherine Williams</a></h5>
                                    <p class="quote-modern-status">Client</p>
                                </div>
                            </div>
                            <div class="quote-modern-text">
                                <p class="q">Resort Hotel is an excellent choice for anybody considering hosting
                                    their events there. Top level facilities and excellent staff make for a
                                    brilliant environment within which to operate.</p>
                            </div>
                        </article>
                    </div>
                    <!-- Quote Modern-->
                    <div class="owl-item" style="width: 570px; margin-right: 30px;">
                        <article class="quote-modern quote-modern-2 quote-modern-custom">
                            <div class="unit unit-spacing-md align-items-center">
                                <div class="unit-left"><a class="quote-modern-figure" href="#"><img
                                            class="img-circles" src="images/user-12-75x75.jpg" alt="" width="75"
                                            height="75"></a></div>
                                <div class="unit-body">
                                    <h5 class="quote-modern-cite"><a href="#">Rupert Wood</a></h5>
                                    <p class="quote-modern-status">Client</p>
                                </div>
                            </div>
                            <div class="quote-modern-text">
                                <p class="q">I had a marvelous time at Resort Hotel. From accommodation to spa,
                                    massage and room service, everything was wonderfully organized and
                                    delivered. This was definitely the best experience.</p>
                            </div>
                        </article>
                    </div>
                    <!-- Quote Modern-->
                    <div class="owl-item" style="width: 570px; margin-right: 30px;">
                        <article class="quote-modern quote-modern-2 quote-modern-custom">
                            <div class="unit unit-spacing-md align-items-center">
                                <div class="unit-left"><a class="quote-modern-figure" href="#"><img
                                            class="img-circles" src="images/user-20-75x75.jpg" alt="" width="75"
                                            height="75"></a></div>
                                <div class="unit-body">
                                    <h5 class="quote-modern-cite"><a href="#">Samantha Brown</a></h5>
                                    <p class="quote-modern-status">Client</p>
                                </div>
                            </div>
                            <div class="quote-modern-text">
                                <p class="q">This is a beautiful hotel with fantastic food, beautiful rooms
                                    &amp; very professional staff, who were very polite, knowledgeable &amp;
                                    always willing to help. My stay with you was fantastic!</p>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </section>
<?php $this->endBlock(); ?>



        <!-- ПРОИЗВОДСТВО-Популярные статьи -->
        <section class="section section-xl bg-default" id="more-ht">
            <div class="container">
                <div class="heading-panel">
                    <div class="heading-panel-left heading-panel-left-1">
                        <h1 class="oh-desktop heading-panel-title">
                            <span class="d-inline-block wow slideInLeft" style="visibility: visible; animation-name: slideInLeft;">
                                <?= $articleEntities['name']?>
                            </span>
                        </h1>
                        <h4 class="oh-desktop heading-panel-subtitle">
                            <span class="d-inline-block wow slideInDown" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: slideInDown;">
                                <?= $articleEntities['slogan']?>
                            </span>
                        </h4>
                    </div>
                    <div class="heading-panel-decor wow fadeIn" style="visibility: visible; animation-name: fadeIn;"></div>
                </div>
                <div class="row row-md row-30">
                <!-- статья -->
                    <?php foreach($articles as $article) :?>
                        <div class="col-md-6">
                            <div class="oh-desktop">
                                <article class="post post-ruth wow slideInDown" style="visibility: visible; animation-name: slideInDown;">
                                    <div class="unit unit-spacing-lg flex-column flex-sm-row align-items-sm-center flex-md-column align-items-md-stretch flex-lg-row align-items-lg-center">
                                        <div class="unit-left">
                                            <a class="post-ruth-figure" href="/?r=articles/show&article_key=<?= $article['key'] ?>">
                                                <img src="<?= $article['frontpath'] ?>/<?= $article['cover'] ?>" alt="<?= $article['name'] ?>" width="222" height="210">
                                            </a>
                                        </div>
                                        <div class="unit-body">
                                            <div class="post-ruth-body">
                                                <div class="post-ruth-time">
                                                    <time datetime="<?= $article['date'] ?>"><?= $article['date'] ?></time>
                                                </div>
                                                <h5 class="post-ruth-title">
                                                    <a href="/?r=articles/show&article_key=<?= $article['key'] ?>"><?= $article['name'] ?></a>
                                                </h5>
                                                <a class="badge badge-primary post-ruth-badge" href="/?r=articles&category_label=<?= $categories[$article['category_key']]['label'] ?>">
                                                    <svg xmlns="https://www.w3.org/2000/svg" x="0px" y="0px" width="16px"
                                                        height="27px" viewBox="0 0 16 27" enable-background="new 0 0 16 27"
                                                        xml:space="preserve">
                                                        <path d="M0,0v6c4.142,0,7.5,3.358,7.5,7.5S4.142,21,0,21v6h16V0H0z">
                                                        </path>
                                                    </svg>
                                                    <div><?= $categories[$article['category_key']]['name'] ?></div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php if ($more) : ?>
                <div class="button-wrap">
                    <a class="button button-md button-default-outline button-wapasha"  
                        href="<?= $more ? Url::to(['', 'more' => $more + 1]) . '#more-ht' : '#more-ht'?>">Еще</a>
                </div>
                <?php endif; ?>
            </div>
        </section>


