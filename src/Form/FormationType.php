<?php

namespace App\Form;

use App\Entity\Formation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class FormationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomFormation', TextType::class , array('label' => 'Nom de la formation :','attr' => array('class' => 'form-control')))
            ->add('description',TextType::class , array('label' => 'Nom de la formation :','attr' => array('class' => 'form-control')))
            ->add('dateDePublication',DateType::class , array('label' => 'Nom de la formation :','attr' => array('class' => 'form-control')))
            ->add('nombreDeLessons',TextType::class , array('label' => 'Nom de la formation :','attr' => array('class' => 'form-control')))
            ->add('tags',TextType::class , array('label' => 'Nom de la formation :','attr' => array('class' => 'form-control')))
            ->add('version',TextType::class , array('label' => 'Nom de la formation :','attr' => array('class' => 'form-control')))
            ->add('dateUpdate',TextType::class , array('label' => 'Nom de la formation :','attr' => array('class' => 'form-control')))
            ->add('nombreDeVue',TextType::class , array('label' => 'Nom de la formation :','attr' => array('class' => 'form-control')))
            ->add('devicesCompatible',TextType::class , array('label' => 'Nom de la formation :','attr' => array('class' => 'form-control')))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Formation::class,
        ]);
    }
}
