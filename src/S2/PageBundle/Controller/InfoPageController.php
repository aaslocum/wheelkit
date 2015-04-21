<?php

namespace S2\PageBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use S2\PageBundle\Entity\InfoPage;
use S2\PageBundle\Form\InfoPageType;

/**
 * InfoPage controller.
 *
 */
class InfoPageController extends Controller
{

    /**
     * Lists all InfoPage entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('S2PageBundle:InfoPage')->findAll();

        return $this->render('S2PageBundle:InfoPage:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new InfoPage entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new InfoPage();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('infopage_show', array('id' => $entity->getId())));
        }

        return $this->render('S2PageBundle:InfoPage:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a InfoPage entity.
     *
     * @param InfoPage $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(InfoPage $entity)
    {
        $form = $this->createForm(new InfoPageType(), $entity, array(
            'action' => $this->generateUrl('infopage_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new InfoPage entity.
     *
     */
    public function newAction()
    {
        $entity = new InfoPage();
        $form   = $this->createCreateForm($entity);

        return $this->render('S2PageBundle:InfoPage:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a InfoPage entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('S2PageBundle:InfoPage')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find InfoPage entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('S2PageBundle:InfoPage:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing InfoPage entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('S2PageBundle:InfoPage')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find InfoPage entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('S2PageBundle:InfoPage:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a InfoPage entity.
    *
    * @param InfoPage $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(InfoPage $entity)
    {
        $form = $this->createForm(new InfoPageType(), $entity, array(
            'action' => $this->generateUrl('infopage_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing InfoPage entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('S2PageBundle:InfoPage')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find InfoPage entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('infopage_edit', array('id' => $id)));
        }

        return $this->render('S2PageBundle:InfoPage:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a InfoPage entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('S2PageBundle:InfoPage')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find InfoPage entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('infopage'));
    }

    /**
     * Creates a form to delete a InfoPage entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('infopage_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
