<?php

include_once('./ZapytanieSPARQL.php');
include_once('./Prefiksy.php');
include_once('./Model.php');

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
    $tematy = array();
    try
    {
      $rezultat = $this->zapytanie($lZapytanieTekst);
      $linie = array();
      $linie = explode("\n", $rezultat);
      foreach($linie as $linia)
      {
         if(preg_match("/".$gPrefiksModelu."/", $linia))
         {
           $tokeny = preg_split("/#/", $linia);
//            print($tokeny[1] . "\n");
           $tokeny2 = preg_split("/</", $tokeny[1]);
           print($tokeny2[0] . "\n");
           $tematy[] = new Temat($tokeny2[0]);
         }
      }
      return $tematy;
    }
    catch(Exception $e)
    {
      print 'Zlapany wyjatek: ' . $e->getMessage() . "\n";
    }
  }
}

?>
