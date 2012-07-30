<?php $view->extend('::baseGuest.html.php') ?>

<?php $view['slots']->start('header') ?>
<div class="topbar clearfix">
    <div class="inner">
        <ul class="nav">
            <li><a href="<?php echo $view['router']->generate('guest_index'); ?>">Home</a></li>
        </ul>
        <!-- /- .nav -->
        <ul class="nav-user">
            <li><a href="#">Hola <?php echo $user->getEmail();?></a></li>
        </ul>

        <ul class="atpsocials right">
            <li title="Facebook Luks"><a class="facebook" target="_blank" href="http://www.facebook.com/lucas.campanella"><img src="<?php echo $view['assets']->getUrl('images/guest/sociables/facebook.png') ?>" alt="" /></a></li>
            <li title="Twitter Luks"><a class="twitter" target="_blank" href="http://twitter.com/1uks"><img src="<?php echo $view['assets']->getUrl('images/guest/sociables/twitter.png') ?>" alt="" /></a></li>
            <li title="Facebook Sole"><a class="facebook" target="_blank" href="http://www.facebook.com/Buggyta"><img src="<?php echo $view['assets']->getUrl('images/guest/sociables/facebook.png') ?>" alt="" /></a></li>
            <li title="Twitter Sole"><a class="twitter" target="_blank" href="http://twitter.com/buggytta"><img src="<?php echo $view['assets']->getUrl('images/guest/sociables/twitter.png') ?>" alt="" /></a></li>
            <li title="Cerrar Sesi&oacute;n"><a class="logout" href="<?php echo $view['router']->generate('_security_logout'); ?>"><img src="<?php echo $view['assets']->getUrl('images/guest/logout.png') ?>" title="Cerrar Sesi&oacute;n" alt="Cerrar Sesi&oacute;n" /></a></li>
        </ul>
        <!-- /- .atpsocials -->
    </div>
</div>
<!-- /- .topbar -->

<div id="head">
    <div class="logo">
        <h1 id="site-title"><a href="<?php echo $view['router']->generate('guest_index'); ?>"><span>Sole</span><span class="ampersand">&amp;</span>Luks</a></h1>
        <h2 id="site-description">Amor. Love. Amour. Amore. Liebe.</h2>
    </div>
    <!-- /- .logo -->

    <div class="topmenu">
        <nav>
            <ul class="sf-menu">
                <!--<li><a href="index.html">Home</a>
                   <ul>
                       <li><a href="index.html">carousel-slider</a></li>
                       <li><a href="index1.html">onebyone-slider</a></li>
                   </ul>
               </li>
               <li><a href="aboutus.html">About Us</a></li>
               <li><a href="services.html">Services</a></li>
               <li><a href="product.html">Product</a></li>
               <li><a href="blog.html">Blog</a>
                   <ul>
                       <li><a href="blog_single.html">Blog Single Page</a></li>
                   </ul>
               </li>
               <li><a href="galleria.html">Gallery</a>
                   <ul>
                       <li><a href="galleria.html">Galleria</a></li>
                   </ul>
               </li>
               <li><a href="contact.html">Contact</a></li>-->
                <li><a href="<?php echo $view['router']->generate('guest_confirmation'); ?>" class="zocial confirm">Confirmar Asistencia</a></li>
                <li><a href="<?php echo $view['router']->generate('guest_choose_menu'); ?>" class="zocial choosemenu">Elegir Menu</a></li>
            </ul>
        </nav>
    </div>
    <!-- /- .menu -->
</div>
<!-- /- #head -->
<?php $view['slots']->stop() ?>