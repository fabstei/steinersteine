<?php

namespace Fabstei\MeteoritBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Fabstei\MeteoritBundle\Entity\Meteorit;
use Fabstei\MeteoritBundle\Form\MeteoritType;

/**
 * Meteorit controller.
 *
 * @Route("/")
 */
class MeteoritController extends Controller
{
    /**
     * Lists all Meteorit entities.
     *
     * @Route("/", name="home")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('FabsteiMeteoritBundle:Meteorit')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new Meteorit entity.
     *
     * @Route("/admin/meteorit/create", name="meteorit_create")
     * @Method("POST")
     * @Template("FabsteiMeteoritBundle:Meteorit:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Meteorit();
        $form = $this->createForm(new MeteoritType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('meteorit_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Meteorit entity.
     *
     * @Route("/admin/meteorit/new", name="meteorit_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Meteorit();
        $form   = $this->createForm(new MeteoritType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Meteorit entity.
     *
     * @Route("/{id}", name="meteorit_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FabsteiMeteoritBundle:Meteorit')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Meteorit entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Meteorit entity.
     *
     * @Route("/admin/meteorit/{id}/edit", name="meteorit_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FabsteiMeteoritBundle:Meteorit')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Meteorit entity.');
        }

        $editForm = $this->createForm(new MeteoritType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }

    /**
     * Edits an existing Meteorit entity.
     *
     * @Route("/admin/meteorit/{id}", name="meteorit_update")
     * @Method("POST")
     * @Template("FabsteiMeteoritBundle:Meteorit:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FabsteiMeteoritBundle:Meteorit')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Meteorit entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new MeteoritType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('meteorit_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Meteorit entity.
     *
     * @Route("/admin/meteorit/{id}", name="meteorit_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('FabsteiMeteoritBundle:Meteorit')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Meteorit entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl(''));
    }

    /**
     * Creates a form to delete a Meteorit entity by id.
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
