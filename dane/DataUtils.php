<?php

include_once('./Query.php');

class DataUtils
{
  public function executeQuery($url)
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
