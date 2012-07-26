<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php $view['slots']->output('title', 'Bienvenido!') ?></title>

    <link href="<?php echo $view['assets']->getUrl('css/guest/style.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo $view['assets']->getUrl('css/guest/shortcodes.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo $view['assets']->getUrl('css/guest/dark.css') ?>" rel="stylesheet" type="text/css" />

    <link href="<?php echo $view['assets']->getUrl('css/guest/zocial/zocial.css') ?>" rel="stylesheet" type="text/css" />

    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAq0JSLfc3E7S3g4wA6AGVIbuU6i4QgiuQ&sensor=true"></script>

    <script type="text/javascript" src="<?php echo $view['assets']->getUrl('js/lib/jquery-1.7.2.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo $view['assets']->getUrl('js/lib/jquery.easing.1.3.js') ?>"></script>
    <script type="text/javascript" src="<?php echo $view['assets']->getUrl('js/lib/hoverIntent.js') ?>"></script>
    <script type="text/javascript" src="<?php echo $view['assets']->getUrl('js/lib/superfish.js') ?>"></script>
    <script type="text/javascript" src="<?php echo $view['assets']->getUrl('js/lib/jquery.preloadify.min.js') ?>"></script>

    <link rel="stylesheet" type="text/css" media="all" href="<?php echo $view['assets']->getUrl('css/guest/carousel-slider.css') ?>" />

    <?php $view['slots']->output('header_includes') ?>

    <!--[if lt IE 9]>
    <script src="<?php echo $view['assets']->getUrl('js/lib/html5.js') ?>" type="text/javascript"></script>
    <![endif]-->

</head>
<body>
    <div class="body_overlay"></div>
    <div id="boxed" class="fullwidth">
        <div id="wrapper">
            <header id="header">
                <?php $view['slots']->output('header') ?>
            </header>
            <!-- /- #header -->
            <div class="clear"></div>

            <?php $view['slots']->output('subheader') ?>

            <div class="clear"></div>

            <?php $view['slots']->output('content') ?>

            <div class="clear"></div>

            <div id="footersidebar">
                <?php $view['slots']->output('footersidebar') ?>
                <div class="inner">
                    <div class="one_fourth ">
                        <section>
                            <h2 class="largeheading"><span>All you need is love...</span></h2>
                        </section>
                    </div>
                    <!-- /- .one_fourth -->

<!--                    <div class="one_fourth ">-->
<!--                        <div class="widget">-->
<!--                            <h3 class="widget-title">Makes Photos</h3>-->
<!--                            <p>Etiam in mattis eros. Etiam lacinia nequenec rutrum magna. Mauris sem metus, varius at sit amet</p>-->
<!--                            <a href="#" class="more-link">continue reading</a>-->
<!--                        </div>-->
<!--                    </div>-->
                    <!-- /- .one_fourth -->

<!--                    <div class="one_fourth ">-->
<!--                        <div class="widget">-->
<!--                            <h3 class="widget-title">Makes Photos</h3>-->
<!--                            <p>Vestibulum id odio ut arcu rutrum consequat. Duis id massa arcu. Duis adipiscing dignissim nunc a aliquam. </p>-->
<!--                            <a href="#" class="more-link">continue reading</a>-->
<!--                        </div>-->
<!--                    </div>-->
                    <!-- /- .one_fourth -->

                    <div class="custom_three_fourth">
                        <div class="one_fourth last float-right">
                            <div class="widget contactinfo">
                                <h3 class="widget-title">Get in Touch</h3>
                                <ul>
                                    <li class="icon-home">IdealBeauty</li>
                                    <li class="icon-mobile">Mobile:	0123456789</li>
                                    <li class="icon-phone">Fax: 001-0123-4567</li>
                                    <li class="icon-email">Mail: yourname@domain.com</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /- .one_fourth last -->
                </div>
                <!-- /- .inner(footer) -->
            </div>
            <!-- /- #footersidebar -->

            <div class="copyright">
                <div class="inner">
                    <p> &copy; Copyright 2012 <a href="#">www.labodadelanio.com.ar</a> - Todos los derechos reservados</p>
                </div>
            </div>
            <!-- /- .copyright -->
        </div>
        <!-- /- #wrapper -->
    </div>
    <script src="<?php echo $view['assets']->getUrl('js/lib/sys_custom.js') ?>" type="text/javascript"></script>
</body>
</html>
