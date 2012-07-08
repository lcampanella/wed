<?php $view->extend('WedWeddingBundle::layout.html.php') ?>

<?php $view['slots']->start('container') ?>
<div class="edit-guest-form">
    <form id="form2" action="<?php echo $view['router']->generate('guests_save'); ?>" method="post">
        <input type="hidden" name="ownerId" value="<?php echo $ownerId; ?>">
        <h3><span>Nuevo grupo de invitados para ID #<?php echo $ownerId; ?></span></h3>
        <ul><li class="add-guest"><img src="<?php echo $view['assets']->getUrl('images/form2/add_guest.png') ?>" alt="Agregar Invitado" title="Agregar Invitado" /></li></ul>
        <fieldset>
            <input type="hidden" name="guest[]">
            <p class="first">
                <span>Invitado #1<img src="<?php echo $view['assets']->getUrl('images/form2/remove_guest.png') ?>" alt="Remover Invitado" title="Remover Invitado" /></span>
            </p>
            <p>
                <label for="lastname">Apellido</label>
                <input type="text" name="lastname[]" id="lastname" size="30" />
            </p>
            <p>
                <label for="firstname">Nombre</label>
                <input type="text" name="firstname[]" id="firstname" size="30" />
            </p>
        </fieldset>
        <fieldset>
            <input type="hidden" name="guest[]">
            <p class="first">
                <span>Invitado #1<img src="<?php echo $view['assets']->getUrl('images/form2/remove_guest.png') ?>" alt="Remover Invitado" title="Remover Invitado" /></span>
            </p>
            <p>
                <label for="lastname">Apellido</label>
                <input type="text" name="lastname[]" id="lastname" size="30" />
            </p>
            <p>
                <label for="firstname">Nombre</label>
                <input type="text" name="firstname[]" id="firstname" size="30" />
            </p>
            <p class="submit"><button type="submit">Guardar</button></p>
        </fieldset>
    </form>
</div>
<?php $view['slots']->stop() ?>