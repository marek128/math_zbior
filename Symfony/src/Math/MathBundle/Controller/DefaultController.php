<?php

namespace Math\MathBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MathMathBundle:Default:index.html.php');
    }
}
