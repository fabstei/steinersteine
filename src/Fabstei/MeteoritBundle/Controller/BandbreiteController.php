<?php

namespace Fabstei\MeteoritBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Fabstei\MeteoritBundle\Entity\Bandbreite;
use Fabstei\MeteoritBundle\Form\BandbreiteType;

/**
 * Bandbreite controller.
 *
 * @Route("/bandbreite")
 */
class BandbreiteController extends Controller
{
    /**
     * Lists all Bandbreite entities.
     *
     * @Route("/", name="bandbreite")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('FabsteiMeteoritBundle:Bandbreite')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new Bandbreite entity.
     *
     * @Route("/", name="bandbreite_create")
     * @Method("POST")
     * @Template("FabsteiMeteoritBundle:Bandbreite:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Bandbreite();
        $form = $this->createForm(new BandbreiteType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('bandbreite_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Bandbreite entity.
     *
     * @Route("/new", name="bandbreite_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Bandbreite();
        $form   = $this->createForm(new BandbreiteType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Bandbreite entity.
     *
     * @Route("/{id}", name="bandbreite_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FabsteiMeteoritBundle:Bandbreite')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Bandbreite entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Bandbreite entity.
     *
     * @Route("/{id}/edit", name="bandbreite_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FabsteiMeteoritBundle:Bandbreite')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Bandbreite entity.');
        }

        $editForm = $this->createForm(new BandbreiteType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Bandbreite entity.
     *
     * @Route("/{id}", name="bandbreite_update")
     * @Method("PUT")
     * @Template("FabsteiMeteoritBundle:Bandbreite:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FabsteiMeteoritBundle:Bandbreite')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Bandbreite entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new BandbreiteType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('bandbreite_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Bandbreite entity.
     *
     * @Route("/{id}", name="bandbreite_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('FabsteiMeteoritBundle:Bandbreite')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Bandbreite entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('bandbreite'));
    }

    /**
     * Creates a form to delete a Bandbreite entity by id.
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
