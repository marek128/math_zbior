<?php

include_once('./ZapytanieSPARQL.php');

class BazaWiedzy
{
  public function zapytanie($url)
  {
    if (!function_exists('curl_init'))
      throw new Exception("curl nie zainstalowany");

    $ch= curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
 
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
  }
}


?>
