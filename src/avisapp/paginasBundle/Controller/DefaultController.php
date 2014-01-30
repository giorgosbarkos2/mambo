<?php

namespace avisapp\paginasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('avisapppaginasBundle:Default:index.html.twig');
    }
}
