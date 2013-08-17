<?php

class Query
{
  public function getQuery(QueryConfig $pConfig)
  {
    return $pConfig->mHostUri . '?default-graph-uri=' .
           Query::queryEncode($pConfig->mGraphUri . '&query=' . $pConfig->mLogic);
  }
  
  private static function queryEncode($pInput)
  {
    $lInput = urlencode($pInput); 
    return str_replace(
      array("%2F", "%3F", "%3D", "%26", "%7B", "%7D" ),
      array("/"  , "?"  , "="  , "&"  , "{"  , "}"   ),
      $lInput);
  }
}

class QueryConfig
{
  public $mHostUri;
  public $mGraphUri;
  public $mLogic;
  
  public function __construct()
  {
    $this->mHostUri = 'http://localhost:8890/sparql';
    $this->mGraphUri = 'http://localhost:8890/DAV';
    $this->mLogic = null;
  }

  public function setHostUri($pHostUri)
  {
    $this->mHostUri = $pHostUri;
  }

  public function setGraphUri($pGraphUri)
  {
    $this->mGraphUri = $pGraphUri;
  }
}
?>