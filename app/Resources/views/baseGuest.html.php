<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php $view['slots']->output('title', 'Sole &amp; Luks') ?></title>
    <link rel="shortcut icon" href="<?php echo $view['assets']->getUrl('images/favicon.ico') ?>" />

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
    <script type="text/javascript" src="<?php echo $view['assets']->getUrl('js/lib/jquery.countdown.js') ?>"></script>

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

                    <div class="one_half">
                            <div class="widget">
                                <h3>"La felicidad es un trayecto, no un destino.
                                    Atesora cada momento que vives,
                                    y atesóralo más porque lo compartiste
                                    con alguien especial;
                                    tan especial que lo llevas en tu corazón."</h3>
                            </div>
                    </div>

                    <div class="one_sixth last">
                        <div class="one_sixth last">
                            <div class="widget contactinfo">
                                <h3 class="widget-title">Contacto</h3>
                                <ul>
                                    <li class="icon-home">labodadelanio.com.ar</li>
                                    <li class="icon-email">E-Mail: info@labodadelanio.com.ar</li>
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
