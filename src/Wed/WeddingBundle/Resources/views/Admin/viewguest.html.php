<?php $view->extend('WedWeddingBundle::layout.html.php') ?>

<?php $view['slots']->start('container') ?>
<!--<div class="view-guest-container">
    <h2><span>Invitados de ID #<?php /*echo $ownerId; */?></span></h2>
    <p><a class="edit-guest-button" href="<?php /*echo $view['router']->generate('guests_edit', array('id'=>$ownerId)); */?>">Editar invitados</a></p>
    <div>
        <?php /*foreach ($guests as $guest) :*/?>
        <ul class="view-guest-row">
            <li class="view-guest-cell"><?php /*echo $guest->getLastname(); */?></li>
            <li class="view-guest-cell"><?php /*echo $guest->getFirstname(); */?></li>
        </ul>
        <?php /*endforeach; */?>
    </div>
</div>-->
<div class="view-guest-menu">
    <ul>
        <li><a href="<?php echo $view['router']->generate('guests_edit', array('id'=>$ownerId)); ?>"><img src="<?php echo $view['assets']->getUrl('images/pencil_edit.png') ?>" alt="Editar invitados" title="Editar invitados" /></a></li>
    </ul>
</div>
<div>
    <?php foreach ($guests as $guest) :?>
    <ul class="view-guest-list">
        <li class="view-guest-lastname"><span><?php echo $guest->getLastname(); ?></span></li>
        <li class="view-guest-firstname"><span><?php echo $guest->getFirstname(); ?></span></li>
        <li class="view-guest-firstname"><span><?php echo $guest->getMenu()->getName(); ?></span></li>
        <li class="view-guest-firstname"><span><?php echo $guest->getConfirmed(); ?></span></li>
    </ul>
    <?php endforeach; ?>
</div>
<?php $view['slots']->stop() ?>