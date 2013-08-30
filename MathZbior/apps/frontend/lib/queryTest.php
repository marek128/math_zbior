<?php

include_once('./BazaWiedzy.php');

$lLogic = 'SELECT ?name WHERE { ?name rdf:type Ontology1350739352430:Zadanie . ?name Ontology1350739352430:WaznaUmiejetnosc Ontology1350739352430:Dodawanie_pamieciowe_liczb_calkowitych }&format=text/html&timeout=0&debug=on';

$lQueryConfig = new KonfiguracjaZapytania();
$lHost = 'localhost';

$lQueryConfig->ustawHostUri('http://' . $lHost . ':8890/sparql');
$lQueryConfig->ustawGrafUri('http://' . 'localhost' . ':8890/DAV');
$lQueryConfig->mLogika = $lLogic;

$lQuery = new ZapytanieSPARQL();

$query = $lQuery->zapytanie($lQueryConfig);
print $query . "\n----------------------------------------------------\n";
$lUtils = new BazaWiedzy();

try
{
  $answer = $lUtils->zapytanie($query);
  echo $answer;
}
catch(Exception $e)
{
  echo 'Zlapany wyjatek: ' . $e->getMessage() . "\n";
}


?>
