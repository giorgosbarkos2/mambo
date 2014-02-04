<?php

namespace avisapp\adminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;



class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('avisappadminBundle:Default:login.html.twig');
    }
    
    public function vistaPrincipalAction(){
        return $this->render('avisappadminBundle:Default:principal.html.twig');
    }
    
    
       public function loginAction(Request $request){
        
        
        
        $usuario = $request->request->get('usuario');
        $password = $request->request->get('password');
        $em = $this->getDoctrine()->getManager();
        $admin = $em->getRepository('avisappadminBundle:Usuario')->findOneBy(array('usuario' => $usuario , 'contrasena' => $password));
       
        
        
        if($admin){
            
            return new Response('100');
            
        }else{
            
            
            return new Response('200');
            
        }
        
        
        
        
        
        
    }
    
    
}
