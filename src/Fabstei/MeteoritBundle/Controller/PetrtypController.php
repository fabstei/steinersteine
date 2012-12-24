<?php

namespace Fabstei\MeteoritBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Fabstei\MeteoritBundle\Entity\Petrtyp;
use Fabstei\MeteoritBundle\Form\PetrtypType;

/**
 * Petrtyp controller.
 *
 * @Route("/petrtyp")
 */
class PetrtypController extends Controller
{
    /**
     * Lists all Petrtyp entities.
     *
     * @Route("/", name="petrtyp")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('FabsteiMeteoritBundle:Petrtyp')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new Petrtyp entity.
     *
     * @Route("/", name="petrtyp_create")
     * @Method("POST")
     * @Template("FabsteiMeteoritBundle:Petrtyp:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Petrtyp();
        $form = $this->createForm(new PetrtypType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('petrtyp_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Petrtyp entity.
     *
     * @Route("/new", name="petrtyp_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Petrtyp();
        $form   = $this->createForm(new PetrtypType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Petrtyp entity.
     *
     * @Route("/{id}", name="petrtyp_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FabsteiMeteoritBundle:Petrtyp')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Petrtyp entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Petrtyp entity.
     *
     * @Route("/{id}/edit", name="petrtyp_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FabsteiMeteoritBundle:Petrtyp')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Petrtyp entity.');
        }

        $editForm = $this->createForm(new PetrtypType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Petrtyp entity.
     *
     * @Route("/{id}", name="petrtyp_update")
     * @Method("PUT")
     * @Template("FabsteiMeteoritBundle:Petrtyp:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FabsteiMeteoritBundle:Petrtyp')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Petrtyp entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new PetrtypType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('petrtyp_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Petrtyp entity.
     *
     * @Route("/{id}", name="petrtyp_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('FabsteiMeteoritBundle:Petrtyp')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Petrtyp entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('petrtyp'));
    }

    /**
     * Creates a form to delete a Petrtyp entity by id.
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
