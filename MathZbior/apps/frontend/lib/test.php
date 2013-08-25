<?php
include_once('Uzytkownik.php');

$baza = new SQLBaza();

$zmienna = FunkcjeKonta::sprawdzPrzyLogowaniu($baza, 'ANowak', 'password');

if($zmienna == TRUE)
  print "Tak";
else
  print "Nie";

?>

