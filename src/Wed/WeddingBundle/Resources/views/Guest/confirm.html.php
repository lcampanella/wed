<?php $view->extend('WedWeddingBundle::layoutGuest.html.php') ?>

<?php $view['slots']->start('header_includes') ?>
<script type="text/javascript" src="<?php echo $view['assets']->getUrl('js/guest.confirmation.js') ?>"></script>
<?php $view['slots']->stop() ?>

<?php $view['slots']->start('subheader') ?>
<div id="subheader">
    <div class="inner">
        <div class="subtitle">
            <h2>Confirmar Asistencia</h2>
        </div>
        <div class="subdesc">
            <h4>Por favor confirme la asistencia de cada invitado.</h4>
        </div>
    </div>
</div>
<!-- /-#subheader -->
<?php $view['slots']->stop() ?>

<?php $view['slots']->start('content') ?>
<div class="pagemid">
    <div class="maincontent ">
        <div id="breadcrumbs">
            <span class="breadcrumbs">
                <a class="breadcrumbs-begin" rel="home" href="#">Home</a>
                <span class="breadcrumbs-separator">/</span>
                <a title="Product" href="#">Confirmar</a>
            </span>
        </div>
        <!-- /-#breadcrumbs -->

        <div id="main">
            <div class="entry-content">

                <div class="product">

                    <div class="product_details">
                        <header>
                            <div class="notice-success" style="display: none"></div>
                            <h2 class="entry-title"><a href="blog_single.html">Invitados</a></h2>
                            <div class="product-confirm-title">
                                <span>Confirmar</span>
                            </div>
                            <form id="confirm-guests-form" action="<?php echo $view['router']->generate('guest_save_confirmation'); ?>" method="post">
                                <?php foreach ( $guests as $guest) : ?>
                                <input type="hidden" name="checkbox_<?php echo $guest->getId(); ?>" value="<?php echo ($guest->getConfirmed()?'1':'0') ?>">
                                <div class="product-meta">
                                    <ul>
                                        <li><?php echo $guest->getFullname() ?></li>
                                        <li><input type="checkbox" name="confirmed_<?php echo $guest->getId(); ?>"<?php echo ($guest->getConfirmed()?' checked':'') ?>></li>
                                    </ul>
                                </div>
                                <?php endforeach; ?>
                            </form>
                        </header>
                        <section>
                            <p>Aclaraci&oacute;n: debe tildar el/los invitado(s) que desee confirmar a la fiesta y presionar el boton "Confirmar".</p>
                            <a id="button-confirm-guests" class="button medium red" href="#"><span>Confirmar</span></a>
                        </section>

                    </div>
                </div>
<!--                <div class="divider"></div>-->

            </div>
            <!-- /- .entry-content -->
        </div>
        <!-- /- #main -->

        <div class="clear"></div>
    </div>
    <!-- /- .maincontent -->
</div>
<!-- /- .pagemid -->
<?php $view['slots']->stop() ?>