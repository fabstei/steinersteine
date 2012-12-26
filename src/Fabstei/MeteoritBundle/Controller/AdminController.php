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
 * @Route("/admin")
 */
class AdminController extends Controller
{
    /**
     * Lists all Meteorit entities.
     *
     * @Route("/", name="admin_home")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $bandbreite = $em->getRepository('FabsteiMeteoritBundle:Bandbreite')->findAll();
        $gruppe = $em->getRepository('FabsteiMeteoritBundle:Gruppe')->findAll();
        $klasse = $em->getRepository('FabsteiMeteoritBundle:Klasse')->findAll();
        $petrtyp = $em->getRepository('FabsteiMeteoritBundle:Petrtyp')->findAll();
        $strukturtyp = $em->getRepository('FabsteiMeteoritBundle:StrukturTyp')->findAll();
        $typ = $em->getRepository('FabsteiMeteoritBundle:Typ')->findAll();

        return array(
            'bandbreite' => $bandbreite,
            'gruppe' => $gruppe,
            'klasse' => $klasse,
            'petrtyp' => $petrtyp,
            'strukturtyp' => $strukturtyp,
            'typ' => $typ,
        );
    }
}
