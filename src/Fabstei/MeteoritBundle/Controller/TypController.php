<?php

namespace Fabstei\MeteoritBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Fabstei\MeteoritBundle\Entity\Typ;
use Fabstei\MeteoritBundle\Form\TypType;

/**
 * Typ controller.
 *
 * @Route("/typ")
 */
class TypController extends Controller
{
    /**
     * Lists all Typ entities.
     *
     * @Route("/", name="typ")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('FabsteiMeteoritBundle:Typ')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new Typ entity.
     *
     * @Route("/", name="typ_create")
     * @Method("POST")
     * @Template("FabsteiMeteoritBundle:Typ:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Typ();
        $form = $this->createForm(new TypType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('typ_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Typ entity.
     *
     * @Route("/new", name="typ_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Typ();
        $form   = $this->createForm(new TypType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Typ entity.
     *
     * @Route("/{id}", name="typ_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FabsteiMeteoritBundle:Typ')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Typ entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Typ entity.
     *
     * @Route("/{id}/edit", name="typ_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FabsteiMeteoritBundle:Typ')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Typ entity.');
        }

        $editForm = $this->createForm(new TypType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Typ entity.
     *
     * @Route("/{id}", name="typ_update")
     * @Method("PUT")
     * @Template("FabsteiMeteoritBundle:Typ:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('FabsteiMeteoritBundle:Typ')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Typ entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new TypType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('typ_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Typ entity.
     *
     * @Route("/{id}", name="typ_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('FabsteiMeteoritBundle:Typ')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Typ entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('typ'));
    }

    /**
     * Creates a form to delete a Typ entity by id.
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
