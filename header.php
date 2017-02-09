<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
    <?php global $template_dir;
    $template_dir = get_template_directory_uri(); ?>

	<meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width" />

	<title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>

    <!-- HTML5 SHIV for IE --><!-- If using Modernizr you can remove this script! -->
    <!--[if lt IE 9]>
    <script src="
//html5shiv.googlecode.com/svn/trunk/html5.js
"></script>
    <![endif]-->

    <link rel="icon" type="image/x-icon" href="css/img/favicon.ico" />

    <?php wp_enqueue_script( 'jquery' ); ?><!-- not heavily covered in the book for more info go to http://wdgwp.com/enqueue -->



    <?php
    /* Only call the nivo slider funcitons and css if we are on the homepage  */
    if( is_home() ) : ?>
        <!-- Nivo Slider -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"> </ script>
        <script src="<?php echo get_template_directory_uri(); ?>/scripts/jquery.nivo.slider.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/nivo/nivo-slider.css" >
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/nivo/nivo.css" >
        <!-- Nivo Slider -->
    <?php endif; ?>






	<link href="/wp-content/themes/kuk/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script src="/wp-content/themes/kuk/bootstrap/js/bootstrap.min.js"></script>

    <?php
    if ( function_exists( 'ot_get_option' ) ) { // если плагин установлен

        // получаем значения поля social_icons как массив
        $disable_responsive = ot_get_option('disable_responsive',false);
        if (!$disable_responsive) :
            echo '<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1" />';
        else :
            echo '<meta name="viewport" content="width=1050" />';
        endif;
    }
    ?>

 <link rel="shortcut icon" href="<?php  echo ale_get_option('favicon'); ?>" />


    <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

    <?php wp_head(); ?>
</head>
<?php if (is_admin_bar_showing()) : $extra_class = 'admin-bar'; else : $extra_class = ''; endif; ?>
<body <?php body_class(); ?> >
<?php

$google_analytics = ot_get_option('espresso_google_analytics');
if ($google_analytics) {
    echo $google_analytics;
}
global $boxed_style;
$boxed_style = ot_get_option('boxed_style');
$background_image = ot_get_option('background_image');
$background_color = ot_get_option('background_color');
?>
<div class="width100">


	<header class="top_header">
        <div class="navbar width100pad clearfix">
            <div class="widthfull mar0auto">

                <div class=”full”>
                <?php
                $main_menu_header_top = array(
                    'theme_location' => 'main-nav-header-top',
                    'container' => 'nav',
                    'container_class' => 'alignleft widecol',
                    'container_id' => 'header-main-nav',
                    'menu_id' => 'main-nav-header-top',
                    'depth' => 1,
                    'walker' => new main_nav_header_top_walker
                );
                ?>
                <?php wp_nav_menu( $main_menu_header_top ); ?>
                <!--<?php
                // To be able to access the menu in your templates through the wp_nav_menu function
                wp_nav_menu( array('theme_location' => 'primary', 'container' => '' ));
                ?>-->
                    <div class=”jump”>
                        <a href=”#footernav”>Jump to Nav</a>
                    </div>
                    <!--хлебные крошки
                    <?php
                    the_breadcrumb();
                    ?>-->
              </div>


                <div class="narcolrt alignright">
                    <nav class="alignright social">
                        <ul>
                            <li class="alignleft nobull"><a href="http://twitter.com/yourpage" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/css/img/social/twitter-lg.png" alt="Twitter Icon" title="<?php bloginfo( 'title' ); ?> on Twitter"></a></li>
                            <li class="alignleft nobull"><a href=”http://facebook.com/yourpage” target="_blank">
                                    <img src="<?php echo get_template_directory_uri(); ?>/css/img/social/facebook-lg.png" alt="Facebook Icon" title="<?php bloginfo( 'title' ); ?> on Facebook"></a></li>
                            <li class="alignleft nobull"><a href="<?php bloginfo( 'rss2_url' ); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/css/img/social/rss-lg.png" alt="<?php bloginfo( 'title' ); ?> RSS Icon" title="Subscribe to <?php bloginfo( 'title' ); ?>"></a></li>

                        </ul>
                    </nav><!-- .social -->
                    <form class="alignright">
                        <input id="s" name="s" type="text" value="search" class="osc italic txttranup">
                        <input id="submit" name="submit" type="submit" value="" class="alignleft">
                    </form><!-- form (search box) -->
                </div>



                </div>

                <i class="fa fa-bars" aria-hidden="true"></i>
                <div class="nav-toggle"><span></span></div>
</div>

         <section class="two">
          <div class="linia_red">
              <div class="linia_email">
				  <div class="row">
				  <div class="col-xs-12 col-sm-7">
					  <div class="contact-number">
						  <a href="#" class="email"><span><i class="fa fa-envelope-o"></i></span><?php bloginfo( 'admin_email' ); ?></a>
					  </div>
				  </div>
			  </div>
			  </div>

			  <div class="linia_icon">
                  <div class="row">
					  <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
						  <div class="contact-number num">
							  <a href="#"><span><i class="fa fa-phone tel_icon"></i></span></a>

						  </div>
					  </div>
				  </div>


			  </div>

			  <div class="linia_contact">

				  <div class="row">
					  <div class="col-xs-12 col-sm-7">
						  <div class="contact-number num_tel">
							  <a href="#">+8801812-726495</a>
						  </div>
					  </div>
					  <div class="col-xs-10 col-sm-4">
						  <div class="social-menu">
							  <?php if(ale_get_option('fb')){ ?><a href="<?php echo ale_get_option('fb'); ?>"><i class="fa fa-facebook"></i></a><?php } ?>
                              <?php if(ale_get_option('fb')){ ?><a href="<?php echo ale_get_option('tw'); ?>"><i class="fa fa-twitter"></i></a><?php } ?>
                              <?php if(ale_get_option('fb')){ ?><a href="<?php echo ale_get_option('insta'); ?>"><i class="fa fa-"></i></a><?php } ?>
                              <?php if(ale_get_option('fb')){ ?><a href="<?php echo ale_get_option('gp'); ?>"><i class="fa fa-google-plus"></i></a><?php } ?>
						  </div>
					  </div>
					  <div class="col-xs-2 col-sm-1">
						  <div class="add-cart">
							  <a href="#"><i class="fa fa-shopping-cart"><span class="cartpoint">8</span></i></a>
						  </div>
					  </div>

				  </div>


			    </div>
		  </div>
		 </section>


		<section class="home_slider">
			<div class="table">
				<div class="table-cell">
					<div class="container">
						<div class="row">


							<div class="col-sm-7 box_slider">
                                <div class="before_box">
                                    <div class="row">
                                        <div class="col-xs-1 box_picture"></div>
                                        <div class="col-xs-1 box_picture"></div>
                                        <div class="col-xs-1 box_picture"></div>
                                    </div>
                                </div>
								<h1 class="pogoSlider-slide-element pogoSlider-animation-expandOut" data-in="slideUp" data-out="expand" data-duration="800" style="opacity: 1; animation-duration: 800ms;"><?php bloginfo( 'description' ); ?></h1>
                                <!-- Start the Loop. -->
                                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                                <!-- Далее проверяется, находится ли текущая запись в рубрике 3. -->
                                <!-- Если да, то блоку div, будет присвоен класс "post-cat-three". -->
                                <!-- Иначе, блоку div будет присвоен класс "post". -->

                                <?php if ( in_category('3') ) { ?>
                                <div class="post-cat-three">
                                    <?php } else { ?>
                                    <div class="post">
                                        <?php } ?>

                                        <!-- Отобразить Заголовок как постоянную ссылку на Запись. -->

                                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                                        <!-- Отобразить время. -->
                                        <small><?php the_time('F jS, Y'); ?></small>

                                        <!-- Отобразить Содержимое Записи внутри div. -->
                                        <div class="entry">
                                            <?php the_content(); ?>
                                        </div>

                                        <!-- Отобразить список Рубрик Записи, разделенных запятой. -->
                                        <p class="postmetadata">Posted in <?php the_category(', '); ?></p>
                                    </div> <!-- closes the first div box -->

                                    <!-- Остановить Цикл (но есть ключевое слово "else:" - смотрите далее). -->
                                    <?php endwhile; else: ?>

                                        <!-- В первом "if" проверяется существуют ли каки-либо записи для  -->
                                        <!-- вывода.  Эта часть "else", говорит что делать, если записей не нашлось.-->
                                        <p>Sorry, no posts matched your criteria.</p>

                                        <!-- ДЕЙСТВИТЕЛЬНО остановить Цикл -->
                                    <?php endif; ?>
                                <a href=”<?php the_permalink(); ?>” title=”” class="battn"><?php the_title(); ?></a>
                                <a href=”<?php the_permalink(); ?>” title=”” class="battn"><?php the_title(); ?></a>

							</div>
							<div class="after_box">
								<div class="row">
									<div class="col-xs-1 box_picture_after"></div>
									<div class="col-xs-1 box_picture_after"></div>
									<div class="col-xs-1 box_picture_after"></div>
								</div>
							</div>



							<div class="col-sm-5 box_logo">
								<!--<div class="header_one logo_section">-->
								<div>
									<a href="<?php echo home_url("/"); ?>" class="logo_link"><img src="<?php echo ale_get_option('sitelogo'); ?>" /></a>
								</div>
							</div>



						</div>
					</div>
				</div>
			</div>
			<button class="pogoSlider-dir-btn pogoSlider-dir-btn--prev"><i class="fa fa-angle-left"></i></button>
			<button class="pogoSlider-dir-btn pogoSlider-dir-btn--next"><i class="fa fa-angle-right"></i></button>
			<!--<ul class="pogoSlider-nav"><li data-num="0"><button class="pogoSlider-nav-btn"></button></li><li data-num="1"><button class="pogoSlider-nav-btn"></button></li><li data-num="2"><button class="pogoSlider-nav-btn pogoSlider-nav-btn--selected"></button></li><li data-num="3"><button class="pogoSlider-nav-btn"></button></li></ul>-->

		</section>
	</header>



    <section class="about-area section-padding section-relative" id="about">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xs-12 text-right wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
                    <div class="page-title">
                        <h2><?php the_title(); ?></h2>

                    </div>

                    <div class="about-text">




                        <div class="about-text-button">

                        </div>


                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 text-right wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
                    <div class="about-photo">

                    </div>

                </div>

            </div>
        </div>
    </section>

    <section class="servis" >
        <div class="container">
          <!--
            <div class="row">
                <div class="col-xs-4 icon_1">
                    <div class="page-title">
                        <h3 class="about"></h3>
                    </div>
                    <div class="about-text">

                        <p>The point of using Lorem Ipsum is that it has a  sing .</p>

                    </div>
                </div>
                <div class="col-xs-4 icon_2">
                    <div class="page-title">
                        <h3 class="about"></h3>
                    </div>
                    <div class="about-text">

                        <p>The point of using Lorem Ipsum is that it has a  sing .</p>

                    </div>
                </div>
                <div class="col-xs-4 icon_3">
                    <div class="page-title">
                        <h3 class="about"></h3>
                    </div>
                    <div class="about-text">

                        <p>The point of using Lorem Ipsum is that it has a  sing .</p>
                    </div>
                </div>

            </div>

            -->
            <div class="row text-center">
                <div class="col-xs-12 col-sm-4 xs-bottom-40 wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
                    <div class="single-service">
                        <div class="service-photo">
                            <img src="icon_1.png" alt="kuk">
                        </div>
                        <h2>pet examinatoin</h2>

                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since</p>

                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 xs-bottom-40 xs-bottom-40 wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
                    <div class="single-service">
                        <div class="service-photo">
                            <img src="css/img/icon_2.png" alt="kuk">
                        </div>
                        <h2>Pet Grooming</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since</p>

                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 xs-bottom-40  wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
                    <div class="single-service">
                        <div class="service-photo">
                            <img src="css/img/icon_3.png" alt="kuk">
                        </div>
                        <h2>pet Sitting</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since</p>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="portfolio-area padding-top gray-bg" id="portfolio">
        <div class="container">
            <div class="row">
                <div class="text-center col-xs-12 col-sm-8 col-sm-offset-2">
                    <div class="page-title">
                        <h2>This month special</h2>

                    </div>
                </div>
            </div>
        </div>
        <div class="portfolio-items fix" id="MixItUp0CBF2E">
            <div class="single-portfolio mix dog wow fadeIn one_photo" style="display: inline-block; visibility: visible; animation-name: fadeIn;" data-bound="" >

                <img src="img/icon_1.png" alt="pet">
                <div class="portfolio-zoom-icon">
                    <a href="images/folio-1.jpg" data-lightbox="roadtrip" >
                        <i class="fa fa-search-plus"></i>
                    </a>
                </div>

            </div>
            <div class="single-portfolio mix other wow fadeIn" style="display: inline-block; visibility: visible; animation-name: fadeIn;" data-bound="">
                <div class="title">
                    <p>Greens fava</p>

                </div>
                <div class="title_p">
                    <p>Lorem ipsum dolor sit  Pellentesque vel enim a </p>
                </div>
                <div class="cena-icon">
                    <i class="fa fa-rub" aria-hidden="true"></i>
                </div>
            </div>
            <div class="single-portfolio mix dog wow fadeIn" style="display: inline-block; visibility: visible; animation-name: fadeIn;" data-bound="">
                <img src="images/folio-3.jpg" alt="pet">
                <div class="portfolio-zoom-icon">
                    <a href="images/folio-3.jpg" data-lightbox="roadtrip">
                        <i class="fa fa-search-plus"></i>
                    </a>
                </div>
            </div>
            <div class="single-portfolio mix dog wow fadeIn" style="display: inline-block; visibility: visible; animation-name: fadeIn;" data-bound="">
                <div class="title">
                    <p>Greens fava</p>

                </div>
                <div class="title_p">
                    <p>Lorem ipsum dolor sit  Pellentesque vel enim a </p>
                </div>
                <div class="cena-icon">
                    <i class="fa fa-rub" aria-hidden="true"></i>
                </div>
            </div>
            <div class="single-portfolio mix other wow fadeIn" style="display: inline-block; visibility: visible; animation-name: fadeIn;" data-bound="">
                <img src="images/folio-5.jpg" alt="pet">
                <div class="portfolio-zoom-icon">
                    <a href="images/folio-5.jpg" data-lightbox="roadtrip">
                        <i class="fa fa-search-plus"></i>
                    </a>
                </div>
            </div>
            <div class="single-portfolio mix dog wow fadeIn" style="display: inline-block; visibility: visible; animation-name: fadeIn;" data-bound="">
                <div class="title">
                    <p>Greens fava</p>

                </div>
                <div class="title_p">
                    <p>Lorem ipsum dolor sit  Pellentesque vel enim a </p>
                </div>
                <div class="cena-icon">
                    <i class="fa fa-rub" aria-hidden="true"></i>
                </div>
            </div>
            <div class="single-portfolio mix dog wow fadeIn" style="display: inline-block; visibility: visible; animation-name: fadeIn;" data-bound="">
                <img src="images/folio-7.jpg" alt="pet">
                <div class="portfolio-zoom-icon">
                    <a href="images/folio-4.jpg" data-lightbox="roadtrip">
                        <i class="fa fa-search-plus"></i>
                    </a>
                </div>
            </div>
            <div class="single-portfolio mix dog wow fadeIn" style="display: inline-block; visibility: visible; animation-name: fadeIn;" data-bound="">
                <div class="title">
                    <p>Greens fava</p>

                </div>
                <div class="title_p">
                    <p>Lorem ipsum dolor sit  Pellentesque vel enim a </p>
                </div>
                <div class="cena-icon">
                    <i class="fa fa-rub" aria-hidden="true"></i>
                </div>
            </div>
            <div class="single-portfolio mix other wow fadeIn" style="display: inline-block; visibility: visible; animation-name: fadeIn;" data-bound="">
                <img src="images/folio-9.jpg" alt="pet">
                <div class="portfolio-zoom-icon">
                    <a href="images/folio-9.jpg" data-lightbox="roadtrip">
                        <i class="fa fa-search-plus"></i>
                    </a>
                </div>
            </div>
            <div class="single-portfolio mix other wow fadeIn" style="display: inline-block; visibility: visible; animation-name: fadeIn;" data-bound="">
                <div class="title">
                    <p>Greens fava</p>

                </div>
                <div class="title_p">
                    <p>Lorem ipsum dolor sit  Pellentesque vel enim a </p>
                </div>
                <div class="cena-icon">
                    <i class="fa fa-rub" aria-hidden="true"></i>
                </div>
        </div>
    </section>


    <section class="portfolio-area padding-top gray-bg" id="portfolio">
        <div class="container">
            <div class="row">
                <div class="text-center col-xs-12 col-sm-8 col-sm-offset-2">
                    <div class="page-title">
                        <h2>Gallery </h2>

                    </div>
                    <div class="row">
                        <div class="col-sm-7"><p>Share your moments and impressions with our cafe using hashtag</p></div>
                        <div class="col-sm-5"><p>#Yummicafe</p></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="portfolio-items fix" id="MixItUp0CBF2E">

            <div class="row">
                <div class="col-sm-3">
                    <div class="service-photo">
                        <img src="css/img/icon_2.png" alt="kuk">
                        <div class="cena-icon">
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                        </div>
                    </div>

                </div>

                <div class="col-sm-3">
                    <div class="single-social">

                        <div class="container">
                            <div class="row">
                                <div class="col-xs-1">
<a><span>@</span><p></p></a>
                                </div>
                                <div class="col-xs-1">
<p>Date</p>
                                </div>
                                <div class="col-xs-1">
                                 <a><span><i class="fa fa-twitter" aria-hidden="true"></i></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="row"><div class="col-xs-1 text_inside"><p>Share your moments and impressions with </p></div></div>
                        <div class="row"><div class="col-xs-1"><p>#Yummicafe</p></div></div>

                        <div class="row"><div class="col-xs-1 likes"><span><i class="fa fa-heart" aria-hidden="true"></i></span><p>Likes</p></div></div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="service-photo">
                        <img src="css/img/icon_2.png" alt="kuk">
                        <div class="cena-icon">
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="single-social">

                        <div class="container">
                            <div class="row">
                                <div class="col-xs-1">
                                    <a><span>@</span><p></p></a>
                                </div>
                                <div class="col-xs-1">
                                    <p>Date</p>
                                </div>
                                <div class="col-xs-1">
                                    <a><span><i class="fa fa-twitter" aria-hidden="true"></i></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="row"><div class="col-xs-1 text_inside"><p>Share your moments and impressions with </p></div></div>
                        <div class="row"><div class="col-xs-1"><p>#Yummicafe</p></div></div>

                        <div class="row"><div class="col-xs-1 likes"><span><i class="fa fa-heart" aria-hidden="true"></i></span><p>Likes</p></div></div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="single-social_two">

                        <div class="container">
                            <div class="row">
                                <div class="col-xs-1">
                                    <a><span>@</span><p></p></a>
                                </div>
                                <div class="col-xs-1">
                                    <p>Date</p>
                                </div>
                                <div class="col-xs-1">
                                    <a><span><i class="fa fa-twitter" aria-hidden="true"></i></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="row"><div class="col-xs-1 text_inside"><p>Share your moments and impressions with </p></div></div>
                        <div class="row"><div class="col-xs-1"><p>#Yummicafe</p></div></div>

                        <div class="row"><div class="col-xs-1 likes"><span><i class="fa fa-heart" aria-hidden="true"></i></span><p>Likes</p></div></div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="service-photo">
                        <img src="css/img/icon_2.png" alt="kuk">
                        <div class="cena-icon">
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="single-social_two">

                        <div class="container">
                            <div class="row">
                                <div class="col-xs-1">
                                    <a><span>@</span><p></p></a>
                                </div>
                                <div class="col-xs-1">
                                    <p>Date</p>
                                </div>
                                <div class="col-xs-1">
                                    <a><span><i class="fa fa-twitter" aria-hidden="true"></i></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="row"><div class="col-xs-1 text_inside"><p>Share your moments and impressions with </p></div></div>
                        <div class="row"><div class="col-xs-1"><p>#Yummicafe</p></div></div>

                        <div class="row"><div class="col-xs-1 likes"><span><i class="fa fa-heart" aria-hidden="true"></i></span><p>Likes</p></div></div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="service-photo">
                        <img src="css/img/icon_2.png" alt="kuk">
                        <div class="cena-icon">
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>



    <section class="contact-area section-padding section-relative" id="contact">
        <div class="section-bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                    <div class="page-title">
                        <h2>Contact</h2>

                    </div>
                </div>
            </div>
            <div class="row">


                <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                    <div class="row">
                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-6">
                            <div class="top-cover center-block adress_1">
                                <h3>Reservations</h3>
                                <p>reservations@vegggie.com +48 202-555-0114</p>
                            </div>

                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-6 col-md-offset-3">
                            <div class="top-cover center-block adress_1">
                                <h3>Veggie </h3>
                                <p>3428 Magnolia Avenue  Hackettstown, NJ 07840</p>
                            </div>

                        </div>
                    </div>
                    <form action="process.php" id="contact-form" class="form-horizontal" role="form" method="post">

                        <input type="text" class="form-control" id="form-name" name="form-name" placeholder="Name" required="">

                        <input type="email" class="form-control" id="form-email" name="form-email" placeholder="Email" required="">

                        <input type="text" class="form-control" id="form-subject" name="form-subject" placeholder="Subject" required="">

                        <textarea class="form-control" rows="6" id="form-message" name="form-message" placeholder="Message" required=""></textarea>
                        <div class="text-center">
                            <button type="submit" class="battn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer-area">
        <nav id=”footernav”>
            <?php wp_nav_menu( $main_menu_header_top ); ?>
        </nav>
        <div class="footer-top section-padding">
            <div class="container">
                <div class="row">
                    <div class="text-center col-xs-12 col-sm-8 col-sm-offset-2">
                        <div class="page-title">
                            <h2>Get in touch</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-3 xs-bottom-40">
                        <div class="single-footer xs-bottom-40">
                            <div class="footer-logo">
                                <img src="images/footer-logo.png" alt="pet">
                            </div>
                            <p>203, Envato Labs, Behind Alis Steet, Melbourne, Australia.</p>
                            <div class="contact-details">
                                <p><i class="fa fa-phone"></i><a href="callto:+8801812726495">+880123-456-7891</a></p>
                                <p><i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:example@email.com">example@email.com</a></p>
                                <p><i class="fa fa-globe"></i> <a href="www.yourdomain.com" target="_blank">www.yourdomain.com</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3 xs-bottom-40">
                        <div class="single-footer xs-bottom-40">
                            <h2>Latest News</h2>

                            <div class="news-list">

                                <ul>
                                    <li><a href="#"><span class="news-list-photo"><img src="images/news-list-1.jpg" alt="pet"></span>Sustainable Construction Mar 08, 2015</a></li>
                                    <li><a href="#"><span class="news-list-photo"><img src="images/news-list-2.jpg" alt="pet"></span>Sustainable Construction Mar 08, 2015n</a></li>
                                    <li><a href="#"><span class="news-list-photo"><img src="images/news-list-3.jpg" alt="pet"></span>Sustainable Construction Mar 08, 2015</a></li>
                                </ul>

                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3 xs-bottom-40">
                        <div class="single-footer xs-bottom-40">
                            <h2>Opening Hours</h2>
                            <div class="open-hour">
                                <ul>
                                    <li>Mon-Tues<span>: 6.00 am - 10.00 pm</span></li>
                                    <li>Wednes - Thurs<span>: 8.00 am - 6.00 pm</span></li>
                                    <li>Fri<span>: 3.00 pm - 8.00 pm</span></li>
                                    <li>Sun<span>: Closed</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div id="maps" style="position: relative; overflow: hidden;"><div style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px; background-color: rgb(229, 227, 223);"><div class="gm-style" style="position: absolute; left: 0px; top: 0px; overflow: hidden; width: 100%; height: 100%; z-index: 0;"><div style="position: absolute; left: 0px; top: 0px; overflow: hidden; width: 100%; height: 100%; z-index: 0; cursor: url(&quot;https://maps.gstatic.com/mapfiles/openhand_8_8.cur&quot;) 8 8, default;"><div style="position: absolute; left: 0px; top: 0px; z-index: 1; width: 100%; transform-origin: 0px 0px 0px; transform: matrix(1, 0, 0, 1, 0, 0);"><div style="position: absolute; left: 0px; top: 0px; z-index: 100; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"><div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: inherit;"><div style="width: 256px; height: 256px; position: absolute; left: -213px; top: -251px;"></div><div style="width: 256px; height: 256px; position: absolute; left: -213px; top: 5px;"></div><div style="width: 256px; height: 256px; position: absolute; left: 43px; top: -251px;"></div><div style="width: 256px; height: 256px; position: absolute; left: 43px; top: 5px;"></div></div></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 101; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 102; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 103; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: -1;"><div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: inherit;"><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -213px; top: -251px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -213px; top: 5px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 43px; top: -251px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 43px; top: 5px;"><canvas draggable="false" height="256" width="256" style="user-select: none; position: absolute; left: 0px; top: 0px; height: 256px; width: 256px;"></canvas></div></div></div></div><div style="position: absolute; z-index: 0; left: 0px; top: 0px;"><div style="overflow: hidden;"></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"><div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: inherit;"><div style="position: absolute; left: -213px; top: -251px; transition: opacity 200ms ease-out;"><img src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i11!2i1537!3i883!4i256!2m3!1e0!2sm!3i372053718!3m14!2sru-RU!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcy50OjF8cy5lOmwudC5mfHAuYzojZmY0NDQ0NDQscy50OjV8cC5jOiNmZmYyZjJmMixzLnQ6MnxwLnY6b2ZmLHMudDozfHAuczotMTAwfHAubDo0NSxzLnQ6NDl8cC52OnNpbXBsaWZpZWQscy50OjQ5fHMuZTpnLmZ8cC5zOjczfHAubDoxMDB8cC52Om9ufHAudzoxLjMxLHMudDo0OXxzLmU6Zy5zfHAuczotMzV8cC5sOjY2fHAuZzozLjk3LHMudDo1MHxzLmU6bC5pfHAudjpvZmYscy50OjR8cC52Om9mZixzLnQ6NnxwLmM6I2ZmYWRkMzVkfHAudjpvbg!4e0&amp;token=100566" draggable="false" alt="" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 43px; top: -251px; transition: opacity 200ms ease-out;"><img src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i11!2i1538!3i883!4i256!2m3!1e0!2sm!3i372053718!3m14!2sru-RU!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcy50OjF8cy5lOmwudC5mfHAuYzojZmY0NDQ0NDQscy50OjV8cC5jOiNmZmYyZjJmMixzLnQ6MnxwLnY6b2ZmLHMudDozfHAuczotMTAwfHAubDo0NSxzLnQ6NDl8cC52OnNpbXBsaWZpZWQscy50OjQ5fHMuZTpnLmZ8cC5zOjczfHAubDoxMDB8cC52Om9ufHAudzoxLjMxLHMudDo0OXxzLmU6Zy5zfHAuczotMzV8cC5sOjY2fHAuZzozLjk3LHMudDo1MHxzLmU6bC5pfHAudjpvZmYscy50OjR8cC52Om9mZixzLnQ6NnxwLmM6I2ZmYWRkMzVkfHAudjpvbg!4e0&amp;token=108213" draggable="false" alt="" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: -213px; top: 5px; transition: opacity 200ms ease-out;"><img src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i11!2i1537!3i884!4i256!2m3!1e0!2sm!3i372053718!3m14!2sru-RU!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcy50OjF8cy5lOmwudC5mfHAuYzojZmY0NDQ0NDQscy50OjV8cC5jOiNmZmYyZjJmMixzLnQ6MnxwLnY6b2ZmLHMudDozfHAuczotMTAwfHAubDo0NSxzLnQ6NDl8cC52OnNpbXBsaWZpZWQscy50OjQ5fHMuZTpnLmZ8cC5zOjczfHAubDoxMDB8cC52Om9ufHAudzoxLjMxLHMudDo0OXxzLmU6Zy5zfHAuczotMzV8cC5sOjY2fHAuZzozLjk3LHMudDo1MHxzLmU6bC5pfHAudjpvZmYscy50OjR8cC52Om9mZixzLnQ6NnxwLmM6I2ZmYWRkMzVkfHAudjpvbg!4e0&amp;token=61917" draggable="false" alt="" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 43px; top: 5px; transition: opacity 200ms ease-out;"><img src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i11!2i1538!3i884!4i256!2m3!1e0!2sm!3i372053718!3m14!2sru-RU!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcy50OjF8cy5lOmwudC5mfHAuYzojZmY0NDQ0NDQscy50OjV8cC5jOiNmZmYyZjJmMixzLnQ6MnxwLnY6b2ZmLHMudDozfHAuczotMTAwfHAubDo0NSxzLnQ6NDl8cC52OnNpbXBsaWZpZWQscy50OjQ5fHMuZTpnLmZ8cC5zOjczfHAubDoxMDB8cC52Om9ufHAudzoxLjMxLHMudDo0OXxzLmU6Zy5zfHAuczotMzV8cC5sOjY2fHAuZzozLjk3LHMudDo1MHxzLmU6bC5pfHAudjpvZmYscy50OjR8cC52Om9mZixzLnQ6NnxwLmM6I2ZmYWRkMzVkfHAudjpvbg!4e0&amp;token=69564" draggable="false" alt="" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div></div></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 2; width: 100%; height: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 3; width: 100%; height: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 4; width: 100%; transform-origin: 0px 0px 0px; transform: matrix(1, 0, 0, 1, 0, 0);"><div style="position: absolute; left: 0px; top: 0px; z-index: 104; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 105; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 106; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 107; width: 100%;"></div></div></div><div style="margin-left: 5px; margin-right: 5px; z-index: 1000000; position: absolute; left: 0px; bottom: 0px;"><a target="_blank" href="https://maps.google.com/maps?ll=23.810332,90.412518&amp;z=11&amp;t=m&amp;hl=ru-RU&amp;gl=US&amp;mapclient=apiv3" title="Нажмите, чтобы отобразить эту область в Картах Google" style="position: static; overflow: visible; float: none; display: inline;"><div style="width: 66px; height: 26px; cursor: pointer;"><img src="https://maps.gstatic.com/mapfiles/api-3/images/google_white5.png" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 66px; height: 26px; user-select: none; border: 0px; padding: 0px; margin: 0px;"></div></a></div><div style="background-color: white; padding: 15px 21px; border: 1px solid rgb(171, 171, 171); font-family: Roboto, Arial, sans-serif; color: rgb(34, 34, 34); box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 16px; z-index: 10000002; display: none; width: 209px; height: 148px; position: absolute; left: 5px; top: 35px;"><div style="padding: 0px 0px 10px; font-size: 16px;">Картографические данные</div><div style="font-size: 13px;">Картографические данные © 2017 Google</div><div style="width: 13px; height: 13px; overflow: hidden; position: absolute; opacity: 0.7; right: 12px; top: 12px; z-index: 10000; cursor: pointer;"><img src="https://maps.gstatic.com/mapfiles/api-3/images/mapcnt6.png" draggable="false" style="position: absolute; left: -2px; top: -336px; width: 59px; height: 492px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div></div><div class="gmnoprint" style="z-index: 1000001; position: absolute; right: 131px; bottom: 0px; width: 211px;"><div draggable="false" class="gm-style-cc" style="user-select: none; height: 14px; line-height: 14px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a style="color: rgb(68, 68, 68); text-decoration: none; cursor: pointer; display: none;">Картографические данные</a><span>Картографические данные © 2017 Google</span></div></div></div><div class="gmnoscreen" style="position: absolute; right: 0px; bottom: 0px;"><div style="font-family: Roboto, Arial, sans-serif; font-size: 11px; color: rgb(68, 68, 68); direction: ltr; text-align: right; background-color: rgb(245, 245, 245);">Картографические данные © 2017 Google</div></div><div class="gmnoprint gm-style-cc" draggable="false" style="z-index: 1000001; user-select: none; height: 14px; line-height: 14px; position: absolute; right: 0px; bottom: 0px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a href="https://www.google.com/intl/ru-RU_US/help/terms_maps.html" target="_blank" style="text-decoration: none; cursor: pointer; color: rgb(68, 68, 68);">Условия использования</a></div></div><div style="cursor: pointer; display: none; margin: 10px 14px; position: absolute; top: 0px; right: 0px;"></div><div draggable="false" class="gm-style-cc" style="user-select: none; height: 14px; line-height: 14px; display: none; position: absolute; right: 0px; bottom: 0px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a target="_new" title="Сообщить об ошибке на карте или снимке" href="https://www.google.com/maps/@23.810332,90.4125181,11z/data=!10m1!1e1!12b1?source=apiv3&amp;rapsrc=apiv3" style="font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); text-decoration: none; position: relative;">Сообщить об ошибке на карте</a></div></div></div></div></div>
                    </div>
                </div>
                <div class="row margin-top-40">
                    <div class="hidden-xs col-sm-6 col-md-3">
                        <div class="social-menu circle text-left">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="subs-title">
                            <h2>Subscribe to Us</h2>
                            <p>Subscribe to Our Newsletter</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <div class="subs-form">
                            <form id="mc-form" novalidate="true">
                                <span><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                                <label class="mt20" for="mc-email"></label>
                                <input type="email" id="mc-email" placeholder="example@email.com" name="EMAIL">
                                <button type="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </footer>
</div><!-- width100pad -->
<?php wp_footer(); ?>
</body>
</html>