<?php

namespace avisapp\adminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('avisappadminBundle:Default:index.html.twig', array('name' => $name));
    }
}
