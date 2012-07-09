<?php $view->extend('WedWeddingBundle::layout.html.php') ?>

<?php $view['slots']->start('container') ?>
<div class="edit-guest-form">
    <form id="form2" action="<?php echo $view['router']->generate('guests_save'); ?>" method="post">
        <input type="hidden" name="ownerId" value="<?php echo $ownerId; ?>">
        <h3><span>Nuevo grupo de invitados para ID #<?php echo $ownerId; ?></span></h3>
        <ul><li class="add-guest"><img src="<?php echo $view['assets']->getUrl('images/form2/add_guest.png') ?>" alt="Agregar Invitado" title="Agregar Invitado" /></li></ul>
        <fieldset id="base-guest-fieldset" style="display: none;">
            <input type="hidden" name="guest[]" disabled="disabled">
            <p class="first">
                <span class="guest-number">Invitado <strong>#1</strong><img src="<?php echo $view['assets']->getUrl('images/form2/remove_guest.png') ?>" alt="Remover Invitado" title="Remover Invitado" /></span>
            </p>
            <p>
                <label for="lastname">Apellido</label>
                <input type="text" name="lastname[]" size="30" disabled="disabled" />
            </p>
            <p>
                <label for="firstname">Nombre</label>
                <input type="text" name="firstname[]" size="30" disabled="disabled" />
            </p>
        </fieldset>
        <div id="fieldset-container">
            <fieldset id="guest-fieldset" class="fieldset-guest">
                <?php if ($view['session']->hasFlash('notice')): ?>
                <div class="flash-notice">
                    <?php echo $view['session']->getFlash('notice') ?>
                </div>
                <?php endif; ?>
                <div class="flash-notice">
                    <?php echo $errors['message']; ?>
                </div>
                <?php if (!empty($errors['errors'])): ?>
                <ul>
                    <?php foreach ($errors['errors'] as $error): ?>
                    <li><?php echo $error->getMessage(); ?></li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
                <input type="hidden" name="guest[]">
                <p class="first">
                    <span class="guest-number">Invitado <strong>#1</strong><img src="<?php echo $view['assets']->getUrl('images/form2/remove_guest.png') ?>" alt="Remover Invitado" title="Remover Invitado" /></span>
                </p>
                <p>
                    <label for="lastname">Apellido</label>
                    <input type="text" name="lastname[]" size="30" />
                </p>
                <p>
                    <label for="firstname">Nombre</label>
                    <input type="text" name="firstname[]" size="30" />
                </p>
            </fieldset>
        </div>
        <p class="submit"><button type="submit">Guardar</button></p>
    </form>
</div>
<?php $view['slots']->stop() ?>