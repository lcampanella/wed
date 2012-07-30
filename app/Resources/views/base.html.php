<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php $view['slots']->output('title', 'Admin - Sole &amp; Luks') ?></title>
        <link rel="shortcut icon" href="<?php echo $view['assets']->getUrl('images/favicon.ico') ?>" />
        <link href="<?php echo $view['assets']->getUrl('css/main.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo $view['assets']->getUrl('css/blitzer.css') ?>" rel="stylesheet" type="text/css" />
        <script src="<?php echo $view['assets']->getUrl('js/lib/jquery-1.7.2.min.js') ?>" type="text/javascript"></script>
        <script src="<?php echo $view['assets']->getUrl('js/lib/jquery-ui-1.8.22.blitzer.min.js') ?>" type="text/javascript"></script>
        <script src="<?php echo $view['assets']->getUrl('js/lib/jquery.easy-confirm-dialog.js') ?>" type="text/javascript"></script>
        <script src="<?php echo $view['assets']->getUrl('js/lib/validation/jquery.validate.js') ?>" type="text/javascript"></script>
        <script src="<?php echo $view['assets']->getUrl('js/lib/validation/messages_es.js') ?>" type="text/javascript"></script>
        <script src="<?php echo $view['assets']->getUrl('js/main.js') ?>" type="text/javascript"></script>
    </head>
    <body>
        <div id="headermenu">
            <ul class="header-menu">
                <li><a href="<?php echo $view['router']->generate('users_list'); ?>">Listado Usuarios</a></li>
            </ul>
            <?php $view['slots']->output('headermenu') ?>
        </div>
        <div id="container">
            <?php $view['slots']->output('container') ?>
        </div>
    </body>
</html>
