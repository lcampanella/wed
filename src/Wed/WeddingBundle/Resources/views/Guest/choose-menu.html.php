<?php $view->extend('WedWeddingBundle::layoutGuest.html.php') ?>

<?php $view['slots']->start('header_includes') ?>
<script type="text/javascript" src="<?php echo $view['assets']->getUrl('js/guest.confirmation.js') ?>"></script>
<?php $view['slots']->stop() ?>

<?php $view['slots']->start('subheader') ?>
<div id="subheader">
    <div class="inner">
        <div class="subtitle">
            <h2>Elegir Men&uacute;</h2>
        </div>
        <div class="subdesc">
            <h4>Por favor seleccione el tipo de men&uacute; de cada invitado.</h4>
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
                <a class="breadcrumbs-begin" rel="home" href="<?php echo $view['router']->generate('guest_index'); ?>">Home</a>
                <span class="breadcrumbs-separator">/</span>
                <a title="Product" href="">Menu</a>
            </span>
        </div>
        <!-- /-#breadcrumbs -->

        <div id="main">
            <div class="entry-content">

                <div class="product">

                    <div class="product_details">
                        <?php if(!empty($guests)) : ?>
                            <header>
                                <div class="notice-success" style="display: none"></div>
                                <div class="notice-error" style="display: none"></div>
                                <h2 class="entry-title"><a href="">Invitados</a></h2>
                                <div class="product-confirm-title">
                                    <span>Menu</span>
                                </div>
                                <form id="choosemenu-guests-form" action="<?php echo $view['router']->generate('guest_save_menu'); ?>" method="post">
                                    <?php foreach ( $guests as $guest) : ?>
                                    <div class="product-meta">
                                        <ul>
                                            <li><?php echo $guest->getFullname() ?></li>
                                            <li>
                                                <select name="menu_<?php echo $guest->getId(); ?>" id="menu_<?php echo $guest->getId(); ?>">
                                                <?php foreach ($menues as $menu): ?>
                                                    <option value="<?php echo $menu->getId();?>"<?php echo ($guest->getMenu()->getId()==$menu->getId()?' selected':'') ?>><?php echo $menu->getName();?></option>
                                                <?php endforeach; ?>
                                                </select>
                                            </li>
                                        </ul>
                                    </div>
                                    <?php endforeach; ?>
                                </form>
                            </header>
                            <section>
    <!--                            <p>Aclaraci&oacute;n: debe tildar el/los invitado(s) que desee confirmar a la fiesta y presionar el boton "Confirmar".</p>-->
                                <button id="button-menu-guests" class="button medium red"><span>Guardar</span></button>
                            </section>
                        <?php else : ?>
                        <p>No existen invitados asociados con este usuario.</p>
                        <?php endif; ?>

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