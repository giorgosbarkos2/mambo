<?php

namespace avisapp\adminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UsuarioType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
<<<<<<< HEAD
        
 
          
        $builder
            ->add('usuario' , 'text' , array('label' => 'nombre Usuario' , 'attr' => array('class' => 'caca' , 'id' => 'caca2')))
            ->add('contrasena' , 'text')
            ->add('rol' , 'text' )
                
                
=======
        $builder
            ->add('usuario')
            ->add('contrasena')
            ->add('rol')
>>>>>>> a83850510a8c87da0f9ed2969c695f04cf8ff70c
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'avisapp\adminBundle\Entity\Usuario'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'avisapp_adminbundle_usuario';
    }
}
