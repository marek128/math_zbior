<?php

include_once('ZapytanieSPARQL.php');

$gPrefiksModelu = "Ontology1350739352430";
$gHost = 'localhost';
$gGraf = 'localhost';

$gKonfig = new KonfiguracjaZapytania();
$gKonfig->ustawHostUri('http://' . $gHost . ':8890/sparql');
$gKonfig->ustawGrafUri('http://' . $gGraf . ':8890/DAV');


?>
