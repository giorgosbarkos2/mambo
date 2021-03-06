<?php

namespace avisapp\adminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use avisapp\adminBundle\Entity\calugaBeneficio;
use avisapp\adminBundle\Form\calugaBeneficioType;

/**
 * calugaBeneficio controller.
 *
 */
class calugaBeneficioController extends Controller
{

    /**
     * Lists all calugaBeneficio entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('avisappadminBundle:calugaBeneficio')->findAll();
       $cont = 0;
        foreach ($entities as $entity) {
        $cont = $cont + 1 ;    
            $deleteForms[$entity->getId()] = $this->createDeleteForm($entity->getId())->createView();
        }
        
        
        if($cont > 0 ){
        return $this->render('avisappadminBundle:calugaBeneficio:index.html.twig', array(
            'entities' => $entities,
            'deleteForms' => $deleteForms,
        ));
        }else{
            
            $entities = 0;
             $deleteForms=0;
             
            return $this->render('avisappadminBundle:calugaBeneficio:index.html.twig', array(
            'entities' => $entities,
            'deleteForms' => $deleteForms,
        ));
            
            
        }
    }
    /**
     * Creates a new calugaBeneficio entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new calugaBeneficio();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_calugabeneficio'));
        }

        return $this->render('avisappadminBundle:calugaBeneficio:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a calugaBeneficio entity.
    *
    * @param calugaBeneficio $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(calugaBeneficio $entity)
    {
        $form = $this->createForm(new calugaBeneficioType(), $entity, array(
            'action' => $this->generateUrl('admin_calugabeneficio_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Guardar'));

        return $form;
    }

    /**
     * Displays a form to create a new calugaBeneficio entity.
     *
     */
    public function newAction()
    {
        $entity = new calugaBeneficio();
        $form   = $this->createCreateForm($entity);

        return $this->render('avisappadminBundle:calugaBeneficio:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a calugaBeneficio entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('avisappadminBundle:calugaBeneficio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find calugaBeneficio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('avisappadminBundle:calugaBeneficio:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing calugaBeneficio entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('avisappadminBundle:calugaBeneficio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find calugaBeneficio entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('avisappadminBundle:calugaBeneficio:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a calugaBeneficio entity.
    *
    * @param calugaBeneficio $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(calugaBeneficio $entity)
    {
        $form = $this->createForm(new calugaBeneficioType(), $entity, array(
            'action' => $this->generateUrl('admin_calugabeneficio_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Editar', 'attr' => array('class' => 'btn btn-primary')));

        return $form;
    }
    /**
     * Edits an existing calugaBeneficio entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('avisappadminBundle:calugaBeneficio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find calugaBeneficio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_calugabeneficio_edit', array('id' => $id)));
        }

        return $this->render('avisappadminBundle:calugaBeneficio:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a calugaBeneficio entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('avisappadminBundle:calugaBeneficio')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find calugaBeneficio entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_calugabeneficio'));
    }

    /**
     * Creates a form to delete a calugaBeneficio entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_calugabeneficio_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Eliminar', 'attr' => array('class' => 'btn  btn-danger')))
            ->getForm()
        ;
    }
}
