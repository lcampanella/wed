<?php $view->extend('WedWeddingBundle::layout.html.php') ?>

<?php $view['slots']->start('container') ?>
<div class="notice-success ui-state-highlight ui-corner-all" style="display: none"></div>
<div class="notice-error" style="display: none"></div>
<div class="admin-list-submenu">
    <span><button type="button" id="buttonSpoolEmails" class="confirm button medium red" value="<?php echo $view['router']->generate('admin_spool_emails'); ?>">Enviar E-mails</button></span>
</div>
<div class="admin-list-submenu">
    <span><button type="button" id="buttonSpoolEmailsRemember" class="confirm button medium red" value="<?php echo $view['router']->generate('admin_spool_reminder_emails'); ?>">Enviar Recordatorio E-mails</button></span>
</div>
<div class="user-list-menu">
    <ul>
        <li><a href="<?php echo $view['router']->generate('users_edit'); ?>"><img src="<?php echo $view['assets']->getUrl('images/form2/add_guest.png') ?>" alt="Agregar Usuario" title="Agregar Usuario" /></a></li>
    </ul>
</div>
<div>
    <?php foreach ($users as $user) : ?>
    <ul class="users-list dohover">
        <li class="user-id"><span><?php echo $user->getId(); ?></span></li>
        <li class="user-lastname"><span><?php echo $user->getLastname(); ?></span></li>
        <li class="user-firstname"><span><?php echo $user->getFirstname(); ?></span></li>
        <li class="user-email"><span><?php echo $user->getEmail(); ?></span></li>
        <li class="user-guests"><span>
            <a href="<?php echo $view['router']->generate('users_edit', array('id'=>$user->getId())); ?>"><img src="<?php echo $view['assets']->getUrl('images/doc_edit.png') ?>" alt="Editar Usuario" title="Editar Usuario" /></a>
            <a href="<?php echo $view['router']->generate('guests_view', array('id'=>$user->getId())); ?>"><img src="<?php echo $view['assets']->getUrl('images/silhouette.png') ?>" alt="Ver Invitados" title="Ver Invitados" /></a>
            <a href="<?php echo $view['router']->generate('admin_user_spool_email', array('id'=>$user->getId())); ?>" class="spoolEmailForUser"><img src="<?php echo $view['assets']->getUrl('images/email.png') ?>" alt="Spool E-mail" title="Spool E-mail" /></a>
        </span></li>
    </ul>
    <?php endforeach; ?>
</div>
<?php $view['slots']->stop() ?>

