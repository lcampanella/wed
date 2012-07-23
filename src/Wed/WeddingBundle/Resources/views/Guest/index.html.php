<?php $view->extend('WedWeddingBundle::layoutGuest.html.php') ?>

<?php $view['slots']->start('header_includes') ?>
<script type="text/javascript" src="<?php echo $view['assets']->getUrl('js/guest.js') ?>"></script>
<?php $view['slots']->stop() ?>

<?php $view['slots']->start('subheader') ?>
<div class="header_teaser">
    <div class="inner">
        <h3><span>Nota</span>Ser&aacute; excluyente la confirmaci&oacute;n de asistencia de cada invitado antes del 1 de septiembre de 2012 para poder tener acceso al sal&oacute;n.</h3>
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
                            <h3>Nosotros</h3>
                            <div class="ca-content-map">
                                <p>El destino quiso que nos presentaran.</p>
                                <p>Nos conocimos poco a poco, nos divertimos.</p>
                                <p>Y claro, nos enamoramos.</p>
                                <p>Ahora, 5 años después de nuestro primer beso.</p>
                                <p>Nos casamos!</p>
                                <p>Y queremos compartir este momento único con ustedes.</p>
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
<?php $view['slots']->stop() ?>