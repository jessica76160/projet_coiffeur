<?php

namespace App\Form;

use App\Entity\PrestationClient;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PrestationClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('heure_debut')
            ->add('heure_fin')
            // ->add('reservation')
            // ->add('disponibilite')
            // ->add('prestationsComposee')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PrestationClient::class,
        ]);
    }
}
