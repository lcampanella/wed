<?php $view->extend('WedWeddingBundle::layout.html.php') ?>

<?php $view['slots']->start('container') ?>
<div class="edit-user-form">
    <form id="edit-user-form" class="form-2" action="<?php echo $view['router']->generate('users_save'); ?>" method="post">
        <input type="hidden" name="isEdit" value="<?php echo (!empty($user)?'1':'0') ?>">
        <input type="hidden" name="userId" value="<?php echo (!empty($user)?$user->getId():'') ?>">
        <h3><span><?php echo (!empty($user)?'Editar ':'Nuevo ') ?>Usuario</span></h3>
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
            <?php if (!empty($user)): ?>
            <p>
                <label for="lastname">Apellido</label>
                <input class="required" type="text" name="lastname" id="lastname" size="30" value="<?php echo $user->getLastname(); ?>" />
            </p>
            <p>
                <label for="firstname">Nombre</label>
                <input class="required" type="text" name="firstname" id="firstname" size="30" value="<?php echo $user->getFirstname(); ?>" />
            </p>
            <p>
                <label for="email">E-mail</label>
                <input class="required email" type="text" name="email" id="email" size="30" value="<?php echo $user->getEmail(); ?>" />
            </p>
            <p>
                <span>Password: <?php echo $user->getPassword(); ?></span>
            </p>
            <?php else: ?>
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
            <?php endif; ?>
            <p class="submit"><button value="<?php echo $view['router']->generate('admin_home');?>" type="button" id="cancelButton">Cancelar</button><button type="submit" id="saveUserButton">Guardar</button></p>
        </fieldset>
    </form>
</div>
<?php $view['slots']->stop() ?>