<?php $view->extend('WedWeddingBundle::layoutGuest.html.php') ?>

<?php $view['slots']->start('header_includes') ?>
<link href="<?php echo $view['assets']->getUrl('css/guest/jphotogrid/jphotogrid.css') ?>" rel="stylesheet" type="text/css" />
<!--[if IE]>
    <link href="<?php echo $view['assets']->getUrl('css/guest/jphotogrid/jphogrid.ie.css') ?>" rel="stylesheet" type="text/css" />
<![endif]-->
<script type="text/javascript" src="<?php echo $view['assets']->getUrl('js/lib/jphotogrid/jphotogrid.js') ?>"></script>
<script type="text/javascript" src="<?php echo $view['assets']->getUrl('js/guest.js') ?>"></script>
<?php $view['slots']->stop() ?>

<?php $view['slots']->start('subheader') ?>
<div class="header_teaser">
    <div class="inner">
        <h3 class="header-title-note">Ser&aacute; excluyente la <span class="note-important">confirmaci&oacute;n</span> de asistencia de cada invitado antes del <span class="note-important">1 de septiembre de 2012</span> para poder tener acceso al sal&oacute;n.</h3>
    </div>
</div>
<!-- /- .header_teaser -->
<?php $view['slots']->stop() ?>

<?php $view['slots']->start('content') ?>
<div id="featured_slider">
    <script type="text/javascript" src="<?php echo $view['assets']->getUrl('js/lib/jquery.contentcarousel.js') ?>"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            jQuery('#ca-container').contentcarousel();
        });
    </script>
    <div class="slider_wrapper">
        <div id="ca-container" class="ca-container">
            <div class="ca-wrapper">
                <div class="ca-item ca-item3">
                    <div class="ca-item-main">
                        <span class="title">Nosotros</span>
                        <a href="#" class="ca-more"><img alt="" src="<?php echo $view['assets']->getUrl('images/guest/assets/us-color.jpg') ?>" /></a>
                    </div>
                    <div class="ca-content-wrapper">
                        <div class="ca-content">

                            <div class="ca-content-map">
                                <h3>Nosotros</h3>
                                <p>El destino quiso que nos presentaran.</p>
                                <p>Nos conocimos poco a poco, nos divertimos.</p>
                                <p>Y claro, nos enamoramos.</p>
                                <p>Ahora, 5 años después de nuestro primer beso.</p>
                                <p class="big-bold-font">Nos casamos!</p>
                                <p>Y queremos compartir este momento único con ustedes.</p>
                            </div>
                            <div class="ca-content-photogrid">
                                <ul id="usGridGallery">
                                    <li>
                                        <img src="<?php echo $view['assets']->getUrl('images/guest/jPhotoGrid/img1.jpg') ?>" alt="" />
                                    </li>
                                    <li>
                                        <img src="<?php echo $view['assets']->getUrl('images/guest/jPhotoGrid/img2.jpg') ?>" alt="" />
                                    </li>
                                    <li>
                                        <img src="<?php echo $view['assets']->getUrl('images/guest/jPhotoGrid/img3.jpg') ?>" alt="" />
                                    </li>
                                    <li>
                                        <img src="<?php echo $view['assets']->getUrl('images/guest/jPhotoGrid/img4.jpg') ?>" alt="" />
                                    </li>
                                    <li>
                                        <img src="<?php echo $view['assets']->getUrl('images/guest/jPhotoGrid/img5.jpg') ?>" alt="" />
                                    </li>
                                    <li>
                                        <img src="<?php echo $view['assets']->getUrl('images/guest/jPhotoGrid/img6.jpg') ?>" alt="" />
                                    </li>
                                    <li>
                                        <img src="<?php echo $view['assets']->getUrl('images/guest/jPhotoGrid/img7.jpg') ?>" alt="" />
                                    </li>
                                    <li>
                                        <img src="<?php echo $view['assets']->getUrl('images/guest/jPhotoGrid/img8.jpg') ?>" alt="" />
                                    </li>
                                    <li>
                                        <img src="<?php echo $view['assets']->getUrl('images/guest/jPhotoGrid/img9.jpg') ?>" alt="" />
                                    </li>
                                    <li>
                                        <img src="<?php echo $view['assets']->getUrl('images/guest/jPhotoGrid/img10.jpg') ?>" alt="" />
                                    </li>
                                    <li>
                                        <img src="<?php echo $view['assets']->getUrl('images/guest/jPhotoGrid/img11.jpg') ?>" alt="" />
                                    </li>
                                    <li>
                                        <img src="<?php echo $view['assets']->getUrl('images/guest/jPhotoGrid/img12.jpg') ?>" alt="" />
                                    </li>
                                <ul>
                            </div>
                        </div>
                        <a href="#" class="ca-close">x</a>
                    </div>
                </div>
                <div class="ca-item ca-item1">
                    <div class="ca-item-main">
                        <span class="title">Iglesia</span>
                        <a href="#" class="ca-more"><img alt="" src="<?php echo $view['assets']->getUrl('images/guest/assets/church.jpg') ?>" /></a>
                    </div>
                    <div class="ca-content-wrapper">
                        <div class="ca-content">
                            <div class="ca-content-map content-church">
                                <h3>Bas&iacute;lica San Carlos</h3>
                                <p>21 de septiembre de 2012</p>
                                <p>20:30hs (puntual)</p>
                                <p>Hipolito Yrigoyen y Quintino Bocayuva</p>
                                <p>Capital Federal, Almagro</p>
                            </div>
                            <div id="map_canvas2" style="width:480px; height:355px;"></div>
                        </div>
                        <a href="#" class="ca-close">x</a>
                    </div>
                </div>
                <div class="ca-item ca-item2">
                    <div class="ca-item-main">
                        <span class="title">Sal&oacute;n</span>
                        <a href="#" class="ca-more"><img alt="" src="<?php echo $view['assets']->getUrl('images/guest/assets/salon.jpg') ?>" /></a>
                    </div>
                    <div class="ca-content-wrapper">
                        <div class="ca-content">
                            <div class="ca-content-map">
                                <h3>Sal&oacute;n Plauto</h3>
                                <p>San Ireneo 243</p>
                                <p>Capital Federal. Caballito.</p>
                            </div>
                            <div id="map_canvas" style="width:535px; height:355px;"></div>
                        </div>
                        <a href="#" class="ca-close">x</a>
                    </div>
                </div>
                <div class="ca-item ca-item4">
                    <div class="ca-item-main">
                        <span class="title">Obsequio</span>
                        <a href="#" class="ca-more"><img alt="" src="<?php echo $view['assets']->getUrl('images/guest/assets/honeymoon.jpg') ?>" /></a>
                    </div>
                    <div class="ca-content-wrapper">
                        <div class="ca-content ca-content-honeymoon">
                            <h3>Tu mejor regalo... nuestra luna de miel</h3>
                            <h5>Informaci&oacute;n de cuenta</h5>
                            <p>Banco: HSBC</p>
                            <p>Titular: Campanella Lucas Marcelo</p>
                            <p>Tipo de cuenta: Caja de Ahorro en pesos</p>
                            <p>Nro. de cuenta:	0566244434</p>
                            <p>CBU: 1500006000005662444346</p>
                        </div>
                        <a href="#" class="ca-close">x</a>
                    </div>
                </div>
            </div>
            <!-- /.ca-wrapper-->
        </div>
        <!-- /#ca-container-->
    </div>
    <!-- /-.slider_wrapper -->
</div>
<!-- /-#featured_slider -->
<div class="ca-footer-note">(haga click sobre las imagenes para acceder a la informaci&oacute;n)</div>
<?php $view['slots']->stop() ?>