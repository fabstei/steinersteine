<?php

namespace Fabstei\MeteoritBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class MeteoritTestController extends Controller
{
    /**
     * @Route("/meteorit")
     * @Template()
     */
    public function indexAction()
    {
        return array('name' => 'Fabian');
    }
}
