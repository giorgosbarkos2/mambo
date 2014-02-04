<?php

namespace avisapp\adminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TextoQueesType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
<<<<<<< HEAD
            ->add('texto', 'textarea')
=======
            ->add('texto' , 'textarea')
>>>>>>> 0e246a116a9cc13d6500ad10b3d453fca7d9b9dc
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'avisapp\adminBundle\Entity\TextoQuees'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'avisapp_adminbundle_textoquees';
    }
}
