<?php

namespace avisapp\adminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use avisapp\adminBundle\Entity\Caluga;
use avisapp\adminBundle\Form\CalugaType;

/**
 * Caluga controller.
 *
 */
class CalugaController extends Controller
{

    /**
     * Lists all Caluga entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('avisappadminBundle:Caluga')->findAll();
        
        $cont = 0;
        
        foreach ($entities as $entity) {
            $cont++;
            $deleteForms[$entity->getId()] = $this->createDeleteForm($entity->getId())->createView();
        }
            
        
        if($cont > 0){
            
    
        return $this->render('avisappadminBundle:Caluga:index.html.twig', array(
            'entities' => $entities,
            'deleteForms' => $deleteForms,
        ));
        
            }else{
                
                
                $entities = 0;
                 $deleteForms = 0;
                 return $this->render('avisappadminBundle:Caluga:index.html.twig', array(
            'entities' => $entities,
            'deleteForms' => $deleteForms,
        ));
                
                
            }
    }
    /**
     * Creates a new Caluga entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Caluga();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_caluga_show', array('id' => $entity->getId())));
        }

        return $this->render('avisappadminBundle:Caluga:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Caluga entity.
    *
    * @param Caluga $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Caluga $entity)
    {
        $form = $this->createForm(new CalugaType(), $entity, array(
            'action' => $this->generateUrl('admin_caluga_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Caluga entity.
     *
     */
    public function newAction()
    {
        $entity = new Caluga();
        $form   = $this->createCreateForm($entity);

        return $this->render('avisappadminBundle:Caluga:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Caluga entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('avisappadminBundle:Caluga')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Caluga entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('avisappadminBundle:Caluga:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Caluga entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('avisappadminBundle:Caluga')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Caluga entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('avisappadminBundle:Caluga:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Caluga entity.
    *
    * @param Caluga $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Caluga $entity)
    {
        $form = $this->createForm(new CalugaType(), $entity, array(
            'action' => $this->generateUrl('admin_caluga_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Caluga entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('avisappadminBundle:Caluga')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Caluga entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_caluga_edit', array('id' => $id)));
        }

        return $this->render('avisappadminBundle:Caluga:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Caluga entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('avisappadminBundle:Caluga')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Caluga entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_caluga'));
    }

    /**
     * Creates a form to delete a Caluga entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_caluga_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Borrar Caluga', 'attr'=> array('class' =>  'btn btn-danger')))
            ->getForm()
        ;
    }
}
