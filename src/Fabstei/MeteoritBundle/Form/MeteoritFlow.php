<?php

namespace Fabstei\MeteoritBundle\Form;

use Craue\FormFlowBundle\Form\FormFlow;

class MeteoritFlow extends FormFlow {

    protected $maxSteps = 3;
    
    
    
    protected function loadStepDescriptions() {
        return array(
            'Bla',
            'Blu',
            'Blo',
        );
    }
}