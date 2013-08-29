<?php

class ZapytanieSPARQL
{
  public function zapytanie(KonfiguracjaZapytania $pKonfig)
  {
    return $pKonfig->mHostUri . '?default-graph-uri=' .
           ZapytanieSPARQL::zakoduj($pKonfig->mGrafUri . '&query=' . $pKonfig->mLogika);
  }
  
  private static function zakoduj($pInput)
  {
    $lInput = urlencode($pInput); 
    return str_replace(
      array("%2F", "%3F", "%3D", "%26", "%7B", "%7D" ),
      array("/"  , "?"  , "="  , "&"  , "{"  , "}"   ),
      $lInput);
  }
}

class KonfiguracjaZapytania
{
  public $mHostUri;
  public $mGrafUri;
  public $mLogika;
  
  public function __construct()
  {
    $this->mHostUri = 'http://localhost:8890/sparql';
    $this->mGrafUri = 'http://localhost:8890/DAV';
    $this->mLogika = null;
  }

  public function ustawHostUri($pHostUri)
  {
    $this->mHostUri = $pHostUri;
  }

  public function ustawGrafUri($pGrafUri)
  {
    $this->mGrafUri = $pGrafUri;
  }
}
?>