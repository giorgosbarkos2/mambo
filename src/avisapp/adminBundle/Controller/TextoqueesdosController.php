<?php

namespace avisapp\adminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use avisapp\adminBundle\Entity\Textoqueesdos;
use avisapp\adminBundle\Form\TextoqueesdosType;

/**
 * Textoqueesdos controller.
 *
 */
class TextoqueesdosController extends Controller
{

    /**
     * Lists all Textoqueesdos entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('avisappadminBundle:Textoqueesdos')->findAll();
       $cont = 0;
        foreach ($entities as $entity) {
            $cont++;
            $deleteForms[$entity->getId()] = $this->createDeleteForm($entity->getId())->createView();
        }
        
        
        if($cont > 0){
        return $this->render('avisappadminBundle:Textoqueesdos:index.html.twig', array(
            'entities' => $entities,
            'deleteForms' => $deleteForms,
        ));
        
        
    }else{
        
        $entities = 0;
        $deleteForms =0 ;
        
          return $this->render('avisappadminBundle:Textoqueesdos:index.html.twig', array(
            'entities' => $entities,
            'deleteForms' => $deleteForms,
        ));
        
        
    }
       
    }
    /**
     * Creates a new Textoqueesdos entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Textoqueesdos();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_textoqueesdos'));
        }

        return $this->render('avisappadminBundle:Textoqueesdos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Textoqueesdos entity.
    *
    * @param Textoqueesdos $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Textoqueesdos $entity)
    {
        $form = $this->createForm(new TextoqueesdosType(), $entity, array(
            'action' => $this->generateUrl('admin_textoqueesdos_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Guardar'));

        return $form;
    }

    /**
     * Displays a form to create a new Textoqueesdos entity.
     *
     */
    public function newAction()
    {
        $entity = new Textoqueesdos();
        $form   = $this->createCreateForm($entity);

        return $this->render('avisappadminBundle:Textoqueesdos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Textoqueesdos entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('avisappadminBundle:Textoqueesdos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Textoqueesdos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('avisappadminBundle:Textoqueesdos:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Textoqueesdos entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('avisappadminBundle:Textoqueesdos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Textoqueesdos entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('avisappadminBundle:Textoqueesdos:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Textoqueesdos entity.
    *
    * @param Textoqueesdos $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Textoqueesdos $entity)
    {
        $form = $this->createForm(new TextoqueesdosType(), $entity, array(
            'action' => $this->generateUrl('admin_textoqueesdos_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Editar'));

        return $form;
    }
    /**
     * Edits an existing Textoqueesdos entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('avisappadminBundle:Textoqueesdos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Textoqueesdos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_textoqueesdos_edit', array('id' => $id)));
        }

        return $this->render('avisappadminBundle:Textoqueesdos:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Textoqueesdos entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('avisappadminBundle:Textoqueesdos')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Textoqueesdos entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_textoqueesdos'));
    }

    /**
     * Creates a form to delete a Textoqueesdos entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_textoqueesdos_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Eliminar', 'attr' => array('class' => 'btn  btn-danger')))
            ->getForm()
        ;
    }
}
