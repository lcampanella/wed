<?php $view->extend('WedWeddingBundle::layout.html.php') ?>

<?php $view['slots']->start('container') ?>
<div>
    <?php foreach ($users as $user) : ?>
    <ul class="users-list">
        <li class="user-id"><?php echo $user->getId(); ?></li>
        <li class="user-firstname"><?php echo $user->getFirstname(); ?></li>
        <li class="user-lastname"><?php echo $user->getLastname(); ?></li>
        <li class="user-guests"><a href="<?php echo $view['router']->generate('guests_edit', array('id'=>$user->getId())); ?>">Invitados</a></li>
    </ul>
    <?php endforeach; ?>
</div>
<?php $view['slots']->stop() ?>

