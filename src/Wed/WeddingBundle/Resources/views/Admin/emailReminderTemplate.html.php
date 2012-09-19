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
<div style="font-family:&quot;Tahoma&quot;,&quot;sans-serif&quot;; font-size: 14pt; color: #5e06a6;">Y es por eso que los esperamos este <span style="font-weight: bold;">viernes 21 de septiembre puntual a las 20:30hs</span> en la iglesia (Hipolito Yrigoyen y Quintino Bocayuva).</div>
<div>&nbsp;</div>
<div style='font-family:"Verdana","sans-serif"; font-size: 11pt; color: #2E75A3;'>Accede al sitio con este link: <a href="http://www.labodadelanio.com.ar/" target="_blank"><span style="color:windowtext;text-decoration:none">www.labodadelanio.com.ar</span></a></div>
<div>&nbsp;</div>
<div style='font-family:"Verdana","sans-serif"; font-size: 11pt; font-weight: bold; color: #000000;'>Usuario: <?php echo $user->getEmail(); ?></div>
<div style='font-family:"Verdana","sans-serif"; font-size: 11pt; font-weight: bold; color: #000000;'>Contrase&ntilde;a: <?php echo $user->getPassword(); ?></div>
<div>&nbsp;</div>

<div style='font-family:"Georgia","serif"; font-size: 24pt; font-weight: bold; font-style: italic; color: #F829C6;'>Sole & Luks</div>
<div>&nbsp;</div>
<div style="font-size: 11pt; font-weight: bold;">Este email es informativo, por favor no responder a esta direcci&oacute;n de correo.</div>