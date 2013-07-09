<?php

include_once('./DataUtils.php');

$lLogic = 'SELECT ?name WHERE { ?name rdf:type Ontology1350739352430:Zadanie . ?name Ontology1350739352430:WaznaUmiejetnosc Ontology1350739352430:Dodawanie_pamieciowe_liczb_calkowitych }&format=text/html&timeout=0&debug=on';

$lQueryConfig = new QueryConfig(true);
$lQueryConfig->mLogic = $lLogic;

$lQuery = new Query();
$query = $lQuery->getQuery($lQueryConfig);
// print $query;
$lUtils = new DataUtils();

try
{
  $answer = $lUtils->executeQuery($query);
  echo $answer;
}
catch(Exception $e)
{
  echo 'Zlapany wyjatek: ' . $e->getMessage() . "\n";
}


?>
