<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="pl" xml:lang="pl" xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title><?php $view['slots']->output('title', 'Hello Application') ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel='stylesheet' href='<?php print $view['assets']->getUrl("css/myStyle.css"); ?>'
    type='text/css' media='all' />
  </head>
  <body>
    <?php $view['slots']->output('_content') ?>
  </body>
</html>
