<?php

namespace Fabstei\MeteoritBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MeteoritType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder
            ->add('identifikation')
            ->add('name')
            ->add('ort')
            ->add('latitude')
            ->add('longitude')
            ->add('gewicht')
            ->add('anmerkung')
            ->add('fall')
            ->add('beschreibung')
            ->add('zusammensetzung')
            ->add('altersbestimmung')
            ->add('bandbreite', 'entity', array(
                    'class' => 'FabsteiMeteoritBundle:Bandbreite',
                    'property' => 'name', 'required' => false))
            ->add('gruppe', 'entity', array(
                    'class' => 'FabsteiMeteoritBundle:Gruppe',
                    'property' => 'name', 'required' => false))
            ->add('klasse', 'entity', array(
                    'class' => 'FabsteiMeteoritBundle:Klasse',
                    'property' => 'name', 'required' => false))
            ->add('petrtyp', 'entity', array(
                    'class' => 'FabsteiMeteoritBundle:Petrtyp',
                    'property' => 'name', 'required' => false))
            ->add('strukturtyp', 'entity', array(
                    'class' => 'FabsteiMeteoritBundle:Strukturtyp',
                    'property' => 'name', 'required' => false))
            ->add('typ', 'entity', array(
                    'class' => 'FabsteiMeteoritBundle:Typ',
                    'property' => 'name', 'required' => false));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'flow_step'  => 1,
            'data_class' => 'Fabstei\MeteoritBundle\Entity\Meteorit'
        ));
    }

    public function getName()
    {
        return 'fabstei_meteoritbundle_meteorittype';
    }
}
