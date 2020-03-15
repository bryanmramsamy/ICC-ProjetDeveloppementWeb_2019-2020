<?php

require_once('Maison.php');

$maisonDeMathieu = new Maison();

$maisonDeJulie = new Maison();

$maisonDeMathieu->ouvrirPorte();
$maisonDeMathieu->fermerPorte();
$maisonDeMathieu->modifierTemperature(21);

$maisonDeJulie->modifierTemperature(55);