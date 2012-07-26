<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="<?php echo $view['assets']->getUrl('css/guest/style.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo $view['assets']->getUrl('css/guest/shortcodes.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo $view['assets']->getUrl('css/guest/dark.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo $view['assets']->getUrl('css/login.css') ?>" rel="stylesheet" type="text/css" />
        <script src="<?php echo $view['assets']->getUrl('js/lib/jquery-1.7.2.min.js') ?>" type="text/javascript"></script>
        <title><?php $view['slots']->output('title', 'Login') ?></title>
    </head>
    <body>
        <div id="container" class="body_overlay">
            <?php $view['slots']->output('container') ?>
        </div>
    </body>
</html>
