<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="pl" xml:lang="pl" xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title><?php $view['slots']->output('title', 'Mat Zbiór Wyszukiwarka') ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel='stylesheet' href='<?php print $view['assets']->getUrl("css/myStyle.css"); ?>'
    type='text/css' media='all' />
  </head>
  <body>
    <div id="main">
      <div id="head"><h2>Mat Zbiór</h2></div>
      <div id="main_menu">
        <a href="<?php print $this->get('router')->generate('math_find_task');?>">Szukaj zadania</a>
        <a href="<?php print $this->get('router')->generate('math_add_task');?>">Dodaj zadanie</a>
        <a href="<?php print $this->get('router')->generate('math_find_subject');?>">Szukaj tematu</a>
        <a href="<?php print $this->get('router')->generate('math_add_subject');?>">Dodaj temat</a>
      </div>
      <div id="content">Tutaj 
        <?php $view['slots']->output('_content') ?><br/>
      </div>
      <div id="footer">Stopka</div>
    </div>
  </body>
</html>
