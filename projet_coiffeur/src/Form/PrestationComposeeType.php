<?php

namespace App\Form;

use App\Entity\PrestationComposee;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PrestationComposeeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('tarif')
            ->add('genre')
            ->add('type_cheveux')
            ->add('salon')
            ->add('coiffeurs')
            ->add('prestations')
            ->add('prestationClients')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PrestationComposee::class,
        ]);
    }
}
