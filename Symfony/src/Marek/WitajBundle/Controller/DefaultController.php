<?php

namespace Marek\WitajBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MarekWitajBundle:Default:index.html.php');
    }
    public function question1Action()
    {
        return $this->render('MarekWitajBundle:Default:question1.html.php',
          array('url' => $this->get('router')->generate('marek_witaj_homepage')));
    }
    public function typicalAction()
    {
        return $this->render('MarekWitajBundle:Default:typical.html.php');
    }
}
