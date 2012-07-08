<?php $view->extend('WedWeddingBundle::layout.html.php') ?>

<?php $view['slots']->start('container') ?>
<h2>
    Welcome to the Admin Homepage <?php echo $app->getUser()->getUsername(); ?>!
</h2>
<ul>
    <li>Index</li>
    <li><a href="<?php echo $view['router']->generate('users_list'); ?>">Indice Usuarios</a></li>
    <li>Nuevos invitados</li>
</ul>
<?php $view['slots']->stop() ?>