<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="<?php echo $view['assets']->getUrl('css/main.css') ?>" rel="stylesheet" type="text/css" />
        <title><?php $view['slots']->output('title', 'Wedding Application') ?></title>
    </head>
    <body>
        <div id="container">
            <?php $view['slots']->output('container') ?>
        </div>
    </body>
</html>
