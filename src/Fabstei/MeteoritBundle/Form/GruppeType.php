<?php

namespace Fabstei\MeteoritBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GruppeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Fabstei\MeteoritBundle\Entity\Gruppe'
        ));
    }

    public function getName()
    {
        return 'fabstei_meteoritbundle_gruppetype';
    }
}
