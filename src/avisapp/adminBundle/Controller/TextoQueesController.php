<?php

namespace avisapp\adminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use avisapp\adminBundle\Entity\TextoQuees;
use avisapp\adminBundle\Form\TextoQueesType;

/**
 * TextoQuees controller.
 *
 */
class TextoQueesController extends Controller
{

    /**
     * Lists all TextoQuees entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('avisappadminBundle:TextoQuees')->findAll();
       $cont = 0;
        foreach ($entities as $entity) {
            $cont++;
            $deleteForms[$entity->getId()] = $this->createDeleteForm($entity->getId())->createView();
        }
        
        
        if($cont > 0){
        return $this->render('avisappadminBundle:TextoQuees:index.html.twig', array(
            'entities' => $entities,
            'deleteForms' => $deleteForms,
        ));
        
        
    }else{
        
        $entities = 0;
        $deleteForms =0 ;
        
          return $this->render('avisappadminBundle:TextoQuees:index.html.twig', array(
            'entities' => $entities,
            'deleteForms' => $deleteForms,
        ));
        
        
    }
    }
    /**
     * Creates a new TextoQuees entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new TextoQuees();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_textoquees'));
        }

        return $this->render('avisappadminBundle:TextoQuees:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a TextoQuees entity.
    *
    * @param TextoQuees $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(TextoQuees $entity)
    {
        $form = $this->createForm(new TextoQueesType(), $entity, array(
            'action' => $this->generateUrl('admin_textoquees_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear'));

        return $form;
    }

    /**
     * Displays a form to create a new TextoQuees entity.
     *
     */
    public function newAction()
    {
        $entity = new TextoQuees();
        $form   = $this->createCreateForm($entity);

        return $this->render('avisappadminBundle:TextoQuees:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a TextoQuees entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('avisappadminBundle:TextoQuees')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TextoQuees entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('avisappadminBundle:TextoQuees:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing TextoQuees entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('avisappadminBundle:TextoQuees')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TextoQuees entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('avisappadminBundle:TextoQuees:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a TextoQuees entity.
    *
    * @param TextoQuees $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(TextoQuees $entity)
    {
        $form = $this->createForm(new TextoQueesType(), $entity, array(
            'action' => $this->generateUrl('admin_textoquees_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Editar'));

        return $form;
    }
    /**
     * Edits an existing TextoQuees entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('avisappadminBundle:TextoQuees')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TextoQuees entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_textoquees_edit', array('id' => $id)));
        }

        return $this->render('avisappadminBundle:TextoQuees:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a TextoQuees entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('avisappadminBundle:TextoQuees')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TextoQuees entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_textoquees'));
    }

    /**
     * Creates a form to delete a TextoQuees entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_textoquees_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Eliminar', 'attr' => array('class' => 'btn  btn-danger')))
            ->getForm()
        ;
    }
}
