<?php

include_once('./ZapytanieSPARQL.php');
include_once('./Prefiksy.php');

class BazaWiedzy
{
  public $format = 'text/html';
  public function zapytanie($url)
  {
    if (!function_exists('curl_init'))
      throw new Exception("curl nie zainstalowany");

    $ch= curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
 
    ob_start();
    curl_exec($ch);
    $response = ob_get_clean();
    curl_close($ch);

    return $response;
  }
  
  public function pobierzTematy()
  {
    global $gPrefiksModelu;
    $lLogika = 'SELECT ?name WHERE { ?name rdf:type ' . $gPrefiksModelu . ':Dzial}&format='. $this->format .
      '&timeout=0&debug=on';
    global $gKonfig;

    $gKonfig->mLogika = $lLogika;
    $lZapytanieObiekt = new ZapytanieSPARQL();
    
    $lZapytanieTekst = $lZapytanieObiekt->zapytanie($gKonfig);
//     print $lZapytanieTekst;
    
    try
    {
      $rezultat = $this->zapytanie($lZapytanieTekst);
      $linie = array();
      $linie = explode("tt", $rezultat);
      foreach($linie as $linia)
      {
         print "Oto linia: " . $linia;
      }
      
    }
    catch(Exception $e)
    {
      print 'Zlapany wyjatek: ' . $e->getMessage() . "\n";
    }
  }
}

?>
