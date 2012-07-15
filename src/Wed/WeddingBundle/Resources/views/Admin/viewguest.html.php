<?php $view->extend('WedWeddingBundle::layout.html.php') ?>

<?php $view['slots']->start('container') ?>
<div class="view-guest-container">
    <h2><span>Invitados de ID #<?php echo $ownerId; ?></span></h2>
    <p><a class="edit-guest-button" href="<?php echo $view['router']->generate('guests_edit', array('id'=>$ownerId)); ?>">Editar invitados</a></p>
    <div>
        <?php foreach ($guests as $guest) :?>
        <ul class="view-guest-row">
            <li class="view-guest-cell"><?php echo $guest->getLastname(); ?></li>
            <li class="view-guest-cell"><?php echo $guest->getFirstname(); ?></li>
        </ul>
        <?php endforeach; ?>
    </div>
</div>
<?php $view['slots']->stop() ?>