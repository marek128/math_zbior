<?php

namespace Math\MathBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AddController extends Controller
{
    public function indexTaskAction()
    {
        return $this->render('MathMathBundle:Add:addTaskIndex.html.php');
    }
    public function indexSubjectAction()
    {
        return $this->render('MathMathBundle:Add:addSubjectIndex.html.php');
    }
}
