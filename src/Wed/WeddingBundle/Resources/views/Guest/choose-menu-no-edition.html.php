<?php $view->extend('WedWeddingBundle::layoutGuest.html.php') ?>

<?php $view['slots']->start('header_includes') ?>
<script type="text/javascript" src="<?php echo $view['assets']->getUrl('js/guest.confirmation.js') ?>"></script>
<?php $view['slots']->stop() ?>

<?php $view['slots']->start('subheader') ?>
<div id="subheader">
    <div class="inner">
        <div class="subtitle">
            <h2>Men&uacute;es</h2>
        </div>
        <div class="subdesc">
            <h4>Aqu&iacute; podr&aacute; ver el men&uacute; elegido para cada invitado.</h4>
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
                                <?php foreach ( $guests as $guest) : ?>
                                <div class="product-meta">
                                    <ul>
                                        <li><?php echo $guest->getFullname() ?></li>
                                        <li><?php echo $guest->getMenu()->getName() ?></li>
                                    </ul>
                                </div>
                                <?php endforeach; ?>
                            </header>
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