<?php $view->extend('::baseLogin.html.php') ?>

<?php $view['slots']->start('title') ?>
Login
<?php $view['slots']->stop() ?>

<?php $view['slots']->start('container') ?>

<div class="login-wrapper">
    <?php if ($error): ?>
    <div class="error"><?php echo $error->getMessage(); ?></div>
    <?php endif; ?>
    <form action="<?php echo $view['router']->generate('_security_check'); ?>" method="post" id="login">
        <div>
            <label for="username">E-mail</label>
            <input type="text" id="username" name="_username" value="" />
        </div>

        <div>
            <label for="password">Contrase&ntilde;a</label>
            <input type="password" id="password" name="_password" />
        </div>

        <button type="submit" class="button medium red"><span>Enviar</span></button>
    </form>
</div>

<?php $view['slots']->stop() ?>