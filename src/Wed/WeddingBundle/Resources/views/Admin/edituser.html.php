<?php $view->extend('WedWeddingBundle::layout.html.php') ?>

<?php $view['slots']->start('container') ?>
<div class="edit-user-form">
    <form id="edit-user-form" class="form-2" action="<?php echo $view['router']->generate('users_save'); ?>" method="post">
        <h3><span>Nuevo usuario</span></h3>
        <fieldset>
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
            <p>
                <label for="lastname">Apellido</label>
                <input class="required" type="text" name="lastname" id="lastname" size="30" />
            </p>
            <p>
                <label for="firstname">Nombre</label>
                <input class="required" type="text" name="firstname" id="firstname" size="30" />
            </p>
            <p>
                <label for="email">E-mail</label>
                <input class="required email" type="text" name="email" id="email" size="30" />
            </p>
            <p class="submit"><button type="submit">Guardar</button></p>
        </fieldset>
    </form>
</div>
<?php $view['slots']->stop() ?>