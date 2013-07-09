<?php $view->extend('MarekWitajBundle::layout.html.php') ?>
<?php $view['slots']->set('title', 'Typical') ?>Typowa strona
<?php
use Marek\WitajBundle\MojaKlasa;

$obj = new MojaKlasa();
print $obj->say();
?>

