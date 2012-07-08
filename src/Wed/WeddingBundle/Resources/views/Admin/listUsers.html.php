<?php $view->extend('WedWeddingBundle::layout.html.php') ?>

<?php $view['slots']->start('container') ?>
<div>
    <?php foreach ($users as $user) : ?>
    <ul>
        <li><?php echo $user->getId(); ?></li>
        <li><?php echo $user->getFirstname(); ?></li>
        <li><?php echo $user->getLastname(); ?></li>
    </ul>
    <?php endforeach; ?>
</div>
<?php $view['slots']->stop() ?>

