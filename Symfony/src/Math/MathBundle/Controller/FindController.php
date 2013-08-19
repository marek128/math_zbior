<?php

namespace Math\MathBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Math\MathBundle\Utils;
use Symfony\Component\HttpFoundation\Request;


class FindController extends Controller
{
    public function indexTaskAction()
    {
        $request = Request::createFromGlobals();
//         var_dump($request);
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
