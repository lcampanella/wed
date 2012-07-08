<?php $view->extend('WedWeddingBundle::layout.html.php') ?>

<?php $view['slots']->start('container') ?>
<div class="edit-user-form">
    <form id="form2" action="<?php echo $view['router']->generate('users_save'); ?>" method="post">
        <h3><span>Nuevo usuario</span></h3>
        <fieldset>
            <?php if (!empty($errors)): ?>
                <?php foreach ($errors as $error): ?>
                <li><?php echo $error->getMessage() ?></li>
                <?php endforeach; ?>
            <?php endif; ?>
            <p>
                <label for="lastname">Apellido</label>
                <input type="text" name="lastname" id="lastname" size="30" />
            </p>
            <p>
                <label for="firstname">Nombre</label>
                <input type="text" name="firstname" id="firstname" size="30" />
            </p>
            <p>
                <label for="email">E-mail</label>
                <input type="text" name="email" id="email" size="30" />
            </p>
            <p class="submit"><button type="submit">Guardar</button></p>
        </fieldset>
    </form>
</div>
<?php $view['slots']->stop() ?>