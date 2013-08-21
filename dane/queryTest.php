<?php

include_once('./DataUtils.php');

$lLogic = 'SELECT ?name WHERE { ?name rdf:type Ontology1350739352430:Zadanie . ?name Ontology1350739352430:WaznaUmiejetnosc Ontology1350739352430:Dodawanie_pamieciowe_liczb_calkowitych }&format=text/html&timeout=0&debug=on';

$lQueryConfig = new QueryConfig();
$lHost = '192.168.1.102';

$lQueryConfig->setHostUri('http://' . $lHost . ':8890/sparql');
$lQueryConfig->setGraphUri('http://' . 'localhost' . ':8890/DAV');
$lQueryConfig->mLogic = $lLogic;

$lQuery = new Query();

$query = $lQuery->getQuery($lQueryConfig);
print $query . "\n----------------------------------------------------\n";
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
