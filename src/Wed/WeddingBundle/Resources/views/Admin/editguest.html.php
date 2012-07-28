<?php $view->extend('WedWeddingBundle::layout.html.php') ?>

<?php $view['slots']->start('container') ?>
<div class="edit-guest-form">
    <form id="edit-guest-form" class="form-2" action="<?php echo $view['router']->generate('guests_save', array("id"=>$ownerId)); ?>" method="post">
        <input type="hidden" name="ownerId" value="<?php echo $ownerId; ?>">
        <h3><span><?php echo (!empty($ownerId)?'Editar ':'Nuevo ') ?>grupo de invitados para ID #<?php echo $ownerId; ?></span></h3>
        <ul><li class="add-guest"><img src="<?php echo $view['assets']->getUrl('images/form2/add_guest.png') ?>" alt="Agregar Invitado" title="Agregar Invitado" /></li></ul>
        <fieldset id="base-guest-fieldset" style="display: none;">
            <input type="hidden" name="guest[]" disabled="disabled">
            <input type="hidden" name="guestId[]" disabled="disabled">
            <p class="first">
                <span class="guest-number">Invitado <strong>#1</strong><img class="remove-guest" src="<?php echo $view['assets']->getUrl('images/form2/remove_guest.png') ?>" alt="Remover Invitado" title="Remover Invitado" /></span>
            </p>
            <p>
                <label>Apellido</label>
                <input class="required" type="text" name="lastname_0" size="30" disabled="disabled" />
            </p>
            <p>
                <label>Nombre</label>
                <input class="required" type="text" name="firstname_0" size="30" disabled="disabled" />
            </p>
        </fieldset>
        <div id="fieldset-container">
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
            <?php if (!empty($guests)): ?>
            <?php $i=1;foreach ($guests as $guest): ?>
                <fieldset class="fieldset-guest">
                    <input type="hidden" name="guest[]">
                    <input type="hidden" name="guestId[]" value="<?php echo $guest->getId(); ?>">
                    <p class="first">
                        <span class="guest-number">Invitado <strong>#<?php echo $i; ?></strong><img class="remove-guest" src="<?php echo $view['assets']->getUrl('images/form2/remove_guest.png') ?>" alt="Remover Invitado" title="Remover Invitado" /></span>
                    </p>
                    <p>
                        <label>Apellido</label>
                        <input class="required" id="lastname_<?php echo $i; ?>" type="text" name="lastname_<?php echo $i; ?>" size="30" value="<?php echo $guest->getLastname(); ?>" />
                    </p>
                    <p>
                        <label>Nombre</label>
                        <input class="required" id="firstname_<?php echo $i; ?>" type="text" name="firstname_<?php echo $i; ?>" size="30" value="<?php echo $guest->getFirstname(); ?>" />
                    </p>
                </fieldset>
                <?php $i++;endforeach; ?>
            <?php else: ?>
                <fieldset class="fieldset-guest">
                    <input type="hidden" name="guest[]">
                    <p class="first">
                        <span class="guest-number">Invitado <strong>#1</strong><img class="remove-guest" src="<?php echo $view['assets']->getUrl('images/form2/remove_guest.png') ?>" alt="Remover Invitado" title="Remover Invitado" /></span>
                    </p>
                    <p>
                        <label>Apellido</label>
                        <input class="required" type="text" name="lastname_1" size="30" />
                    </p>
                    <p>
                        <label>Nombre</label>
                        <input class="required" type="text" name="firstname_1" size="30" />
                    </p>
                </fieldset>
            <?php endif; ?>

        </div>
        <p class="submit"><button value="<?php echo $view['router']->generate('guests_view', array("id"=>$ownerId)); ?>" type="button" id="cancelButton">Cancelar</button><button id="submit-guest-save" type="submit">Guardar</button></p>
    </form>
</div>
<?php $view['slots']->stop() ?>