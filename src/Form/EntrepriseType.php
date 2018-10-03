<?php

namespace App\Form;

use App\Entity\Entreprise;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EntrepriseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomEntreprise')
            ->add('adresse')
            ->add('cp')
            ->add('ville')
            ->add('pays')
            ->add('typeDeSouscription')
            ->add('debutDeLaSouscription')
            ->add('expirationDeLaSouscription')
            ->add('isvalide')
            ->add('idrole')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Entreprise::class,
        ]);
    }
}
