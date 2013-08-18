<?php

namespace Math\MathBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Math\MathBundle\Utils;


class FindController extends Controller
{
    public function indexTaskAction()
    {
        $l_database = new Database();
        $l_text = $l_database->getYourName();
        return $this->render('MathMathBundle:Find:findTaskIndex.html.php', array(
          'name'=>$l_text
        ));
    }
    public function indexSubjectAction()
    {
        return $this->render('MathMathBundle:Find:findSubjectIndex.html.php');
    }
}
