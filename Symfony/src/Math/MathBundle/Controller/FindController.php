<?php

namespace Math\MathBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FindController extends Controller
{
    public function indexTaskAction()
    {
        return $this->render('MathMathBundle:Find:findTaskIndex.html.php');
    }
    public function indexSubjectAction()
    {
        return $this->render('MathMathBundle:Find:findSubjectIndex.html.php');
    }
}
