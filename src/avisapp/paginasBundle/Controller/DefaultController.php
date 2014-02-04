<?php

namespace avisapp\paginasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use avisapp\adminBundle\Entity\Slider;
use avisapp\adminBundle\Entity\Caluga;
use avisapp\adminBundle\Entity\TextoQuees;
use avisapp\adminBundle\Entity\calugaBeneficio;
class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $slider = $em->getRepository('avisappadminBundle:Slider')->findAll();
        $caluga = $em->getRepository('avisappadminBundle:Caluga')->findAll();
        $textoquees = $em->getRepository('avisappadminBundle:TextoQuees')->findAll();
        $calugabeneficio = $em->getRepository('avisappadminBundle:calugaBeneficio')->findAll();
        return $this->render('avisapppaginasBundle:Default:index.html.twig', array('slider' => $slider, 'caluga' => $caluga, 'textoquees'=>$textoquees));
    }
}
