<?php
 include_once('SQLDatabase.php');

 class Uzytkownik
 {
  public $login = NULL;
  public $haslo = NULL;
  public $email = NULL;
  public $imie = NULL;
  public $nazwisko = NULL;
 }
 
 class FunkcjeKonta
 {
  public static function sprawdzPrzyLogowaniu($db, $login, $haslo)
  {
   $login = $db->import($login);

   try
   {
    $wynik = $db->wybierz('uzytkownicy', array('hash'), "WHERE login='$login'");
   }
   catch (Exception $e)
   {
    print $e;
    return FALSE;
   }

   if ($wynik->koniec())
    return FALSE;

   $a = $wynik->podajWiersz();

   if ($a['hash'] != sha1($haslo))
    return FALSE;

   return TRUE;
  }
  
  public static function sprawdzPoprawnosc($login, $dane)
  {
   if ($login == "")
    return "Login nie może być pusty!";
   if (!preg_match("/^[^@]+@(([^@.]+)\.)*[^@.]+$/", $dane->email))
    return "E-mail niepoprawny!";
   if (strlen($dane->haslo) < 4)
    return "Hasło nie może być krótsze niż 4 znaki!";
   return "";
  }

  public static function zarejestruj($db, $login, $dane)
  {
   print ("zarehdkh");
   $login = $db->import($login);

   $hash = sha1($dane->haslo);
   $wartosci = array();
   $wartosci['login']         = $login;
   $wartosci['hash']          = $hash;
   $wartosci['email']         = $db->import($dane->email);
   $wartosci['imie']          = $db->import($dane->imie);
   $wartosci['nazwisko']      = $db->import($dane->nazwisko);

   var_dump($wartosci);
   try
   {
     $db->wstaw('uzytkownicy', $wartosci);
   }
   catch (Exception $e)
   {
      print $e;
     return false;
   }
   return true;
  }
 }
?>
