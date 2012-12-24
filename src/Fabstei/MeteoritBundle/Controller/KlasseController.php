<?php

namespace Fabstei\MeteoritBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Fabstei\MeteoritBundle\Entity\Klasse;
use Fabstei\MeteoritBundle\Form\KlasseType;

/**
 * Klasse controller.
 *
 * @Route("/klasse")
 */
class KlasseController extends Controller
{
    /**
     * Lists all Klasse entities.
     *
     * @Route("/", name="klasse")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('FabsteiMeteoritBundle:Klasse')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new Klasse entity.
     *
     * @Route("/", name="klasse_create")
     * @Method("POST")
     * @Template("FabsteiMeteoritBundle:Klasse:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Klasse();
        $form = $this->createForm(new KlasseType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('klasse_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Klasse entity.
     *
     * @Route("/new", name="klasse_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Klasse();
        $form   = $this->createForm(new KlasseType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Klasse entity.
     *
     * @Route("/{id}", name="klasse_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FabsteiMeteoritBundle:Klasse')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Klasse entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Klasse entity.
     *
     * @Route("/{id}/edit", name="klasse_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FabsteiMeteoritBundle:Klasse')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Klasse entity.');
        }

        $editForm = $this->createForm(new KlasseType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Klasse entity.
     *
     * @Route("/{id}", name="klasse_update")
     * @Method("PUT")
     * @Template("FabsteiMeteoritBundle:Klasse:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FabsteiMeteoritBundle:Klasse')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Klasse entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new KlasseType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('klasse_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Klasse entity.
     *
     * @Route("/{id}", name="klasse_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('FabsteiMeteoritBundle:Klasse')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Klasse entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('klasse'));
    }

    /**
     * Creates a form to delete a Klasse entity by id.
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
