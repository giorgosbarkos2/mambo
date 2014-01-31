<?php

namespace avisapp\paginasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use avisapp\adminBundle\Entity\Slider;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $slider = $em->getRepository('avisappadminBundle:Slider')->findAll();
        return $this->render('avisapppaginasBundle:Default:index.html.twig', array('slider' => $slider));
    }
}
