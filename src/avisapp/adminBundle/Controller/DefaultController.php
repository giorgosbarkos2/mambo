<?php

namespace avisapp\adminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('avisappadminBundle:Default:login.html.twig');
    }
    
    public function vistaPrincipalAction(){
        return $this->render('avisappadminBundle:Default:principal.html.twig');
    }
}
