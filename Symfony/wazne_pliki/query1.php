<?php

/*

http://192.168.1.101:8890/sparql?default-graph-uri=http://localhost:8890/DAV&query=SELECT ?name WHERE
{
	?name rdf:type Ontology1350739352430:Zadanie
}

&format=text/html&timeout=0&debug=on



SELECT ?name WHERE { ?name rdf:type Ontology1350739352430:Zadanie . ?name Ontology1350739352430:WaznaUmiejetnosc Ontology1350739352430:Dodawanie_pamieciowe_liczb_calkowitych }
*/


$requestURL = getUrl();
$answer = request($requestURL);

 print $answer;

?>

    
    
<?php
function getUrl()
{

  $hostURI = "http://192.168.1.101:8890/sparql";
  
  $query2 =  my_urlencode("?default-graph-uri=http://localhost:8890/DAV&query=SELECT ?name WHERE { ?name rdf:type Ontology1350739352430:Zadanie }&format=text/html&timeout=0&debug=on");
  
  
  //WZORCOWE
  $query3 = "http://192.168.1.101:8890/sparql?default-graph-uri=http%3A%2F%2Flocalhost%3A8890%2FDAV&query=SELECT+%3Fname+WHERE+{+%3Fname+rdf%3Atype+Ontology1350739352430%3AZadanie+}&format=text%2Fhtml&timeout=0&debug=on";
  
  
  $query4 = my_urlencode("?default-graph-uri=http://localhost:8890/DAV&query=INSERT INTO  <http://localhost:8890/DAV> { Ontology1350739352430:trudneZadanie rdf:type Ontology1350739352430:Zadanie . }");
  

  $query5 =  my_urlencode("?default-graph-uri=http://localhost:8890/DAV&query=SELECT ?name WHERE { ?name rdf:type Ontology1350739352430:Zadanie . ?name Ontology1350739352430:WaznaUmiejetnosc Ontology1350739352430:Dodawanie_pamieciowe_liczb_calkowitych }&format=text/html&timeout=0&debug=on");


  $query6 = my_urlencode("?default-graph-uri=http://localhost:8890/DAV&query=SELECT ?name WHERE { ?name rdf:type Ontology1350739352430:Zadanie . ?name Ontology1350739352430:WaznaUmiejetnosc Ontology1350739352430:Dodawanie_pamieciowe_liczb_calkowitych }&format=text/html&timeout=0&debug=on");

  $query7 =  my_urlencode("?default-graph-uri=http://localhost:8890/DAV&query=DELETE DATA FROM  <http://localhost:8890/DAV> { Ontology1350739352430:trudneZadanie rdf:type Ontology1350739352430:Zadanie . }");

  
  $main_query = $query7;
  print $main_query . "\n\n\n\n";

   return $hostURI . $main_query;


}
  
  function my_urlencode($input){
   $input=urlencode($input); 
   return str_replace(
     array("%2F", "%3F", "%3D", "%26", "%7B", "%7D" ),
     array("/"  , "?"  , "="  , "&"  , "{"  , "}"   ),
   $input);
}

  function request($url){
 
   // is curl installed?
   if (!function_exists('curl_init')){
      die('CURL is not installed!');
   }
   else { 
   //print "Function curl_init exists\n ";
   }
   
   // get curl handle
   $ch= curl_init();

   // set request url
   curl_setopt($ch, CURLOPT_URL, $url);

   // return response, don't print/echo
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
 
   /* Here you find more options for curl:
   http://www.php.net/curl_setopt */    

   $response = curl_exec($ch);
   
   curl_close($ch);
   
   return $response;
}

?>
