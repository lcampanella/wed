<?php
$guestCount = count($guests);
$i = 1;
?>
<div style='font-family:"Verdana","sans-serif"; font-size: 11pt; font-weight: bold; color: #FF42AC;'>
    <?php if ($guestCount > 0): ?>
        <?php foreach($guests as $guest): ?>
            <?php echo $guest->getFirstname().(($i+1)==$guestCount?' y ': ($i<$guestCount?', ':'')) ?>
        <?php $i++; endforeach; ?>
    <?php endif; ?>
</div>
<div>&nbsp;</div>
<div style='font-family:"Tahoma","sans-serif"; font-size: 18pt; font-weight: bold; font-style: italic; color: #8B16EB;'>Nos Casamos!!!</div>
<div style='font-family:"Tahoma","sans-serif"; font-size: 14pt; color: #5e06a6;'>Nos ha llegado uno de los momentos m&aacute;s felices de la vida y queremos compartirlo.</div>
<div>&nbsp;</div>
<div style='font-family:"Verdana","sans-serif"; font-size: 11pt; color: #000000;'>Con este usuario y contrase&ntilde;a</div>
<div style='font-family:"Verdana","sans-serif"; font-size: 11pt; font-weight: bold; color: #000000;'>Usuario: <?php echo $user->getEmail(); ?></div>
<div style='font-family:"Verdana","sans-serif"; font-size: 11pt; font-weight: bold; color: #000000;'>Contrase&ntilde;a: <?php echo $user->getPassword(); ?></div>
<div>&nbsp;</div>
<div style='font-family:"Verdana","sans-serif"; font-size: 11pt; color: #2E75A3;'>Entr&aacute; a este link: <a href="http://www.labodadelanio.com.ar/" target="_blank"><span style="color:windowtext;text-decoration:none">www.labodadelanio.com.ar</span></a></div>
<div style='font-family:"Verdana","sans-serif"; font-size: 11pt; color: #2E75A3;'>Y enterate de los detalles.</div>
<div>&nbsp;</div>
<div style='font-family:"Georgia","serif"; font-size: 24pt; font-weight: bold; font-style: italic; color: #F829C6;'>Sole & Luks</div>
<div>&nbsp;</div>
<div style="font-size: 11pt; font-weight: bold;">Este email es informativo, por favor no responder a esta direcci&oacute;n de correo.</div>