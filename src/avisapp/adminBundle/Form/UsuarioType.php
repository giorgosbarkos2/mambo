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
        $builder
              
            ->add('usuario' , 'text' , array('label' => 'Nombre usuario:' , 'attr' => array('class' => 'form-control') , 'label_attr' => array(  'class' => 'usuario')))
            ->add('contrasena' , 'text', array('label' => 'Ingrese contraseña:', 'attr' => array('class' => 'form-control')))
            ->add('rol' , 'text', array('label' => 'Ingrese rol de usuario:', 'attr' => array('class' => 'form-control')))
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
