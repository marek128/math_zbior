<?php
 include_once('SQLDatabase.php');

 class Uzytkownik
 {
  public $login = NULL;
  public $haslo = NULL;
  public $imie = NULL;
  public $nazwisko = NULL;
 }
 
 function sprawdzDane($p_baza, $p_login, $p_haslo)
 {
  $login = $db->import($login);
 }

?>
