<?php

namespace Fabstei\MeteoritBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BandbreiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('meteorit')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Fabstei\MeteoritBundle\Entity\Bandbreite'
        ));
    }

    public function getName()
    {
        return 'fabstei_meteoritbundle_bandbreitetype';
    }
}
