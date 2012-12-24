<?php

namespace Fabstei\MeteoritBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Fabstei\MeteoritBundle\Entity\Gruppe;
use Fabstei\MeteoritBundle\Form\GruppeType;

/**
 * Gruppe controller.
 *
 * @Route("/gruppe")
 */
class GruppeController extends Controller
{
    /**
     * Lists all Gruppe entities.
     *
     * @Route("/", name="gruppe")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('FabsteiMeteoritBundle:Gruppe')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new Gruppe entity.
     *
     * @Route("/", name="gruppe_create")
     * @Method("POST")
     * @Template("FabsteiMeteoritBundle:Gruppe:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Gruppe();
        $form = $this->createForm(new GruppeType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('gruppe_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Gruppe entity.
     *
     * @Route("/new", name="gruppe_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Gruppe();
        $form   = $this->createForm(new GruppeType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Gruppe entity.
     *
     * @Route("/{id}", name="gruppe_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FabsteiMeteoritBundle:Gruppe')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Gruppe entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Gruppe entity.
     *
     * @Route("/{id}/edit", name="gruppe_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FabsteiMeteoritBundle:Gruppe')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Gruppe entity.');
        }

        $editForm = $this->createForm(new GruppeType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Gruppe entity.
     *
     * @Route("/{id}", name="gruppe_update")
     * @Method("PUT")
     * @Template("FabsteiMeteoritBundle:Gruppe:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FabsteiMeteoritBundle:Gruppe')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Gruppe entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new GruppeType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('gruppe_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Gruppe entity.
     *
     * @Route("/{id}", name="gruppe_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('FabsteiMeteoritBundle:Gruppe')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Gruppe entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('gruppe'));
    }

    /**
     * Creates a form to delete a Gruppe entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
