<?php
/**
 * Created by PhpStorm.
 * User: WEBENOO
 * Date: 25/03/2018
 * Time: 17:57
 */

namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class FichePersoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',TextType::class, [
                'required' => true,
                'label' => 'Nom de votre personnage : ',
                'attr' => [
                    'class' => 'nom',
                    'placeholder' => 'Votre nom'
                ]
            ])
            ->add('image',FileType::class,[
                'required' => false,
                'label' => 'Image de votre personnage',
                'attr' => [
                    'class' => 'image'
                ]
            ])
            ->add('description', TextareaType::class , [
                'required' => false,
                'label' => 'Votre description :',
                'attr' => [
                    'class' => 'description'
                ]
            ])
            ->add('caracteristique', TextareaType::class , [
                'required' => false,
                'label' => 'Caracteristique :',
                'attr' => [
                    'class' => 'caracteristique'
                ]
            ])
            ->add('competence' , TextareaType::class , [
                'required' => false,
                'label' => 'Competence : ',
                'attr' => [
                    'class' => 'competence'
                ]
            ])
            ->add('inventaire' , TextareaType::class , [
                'required' => false,
                'label' => 'Inventaire :',
                'attr' => [
                    'class' => 'inventaire'
                ]
            ])
            ->add('envoi' , SubmitType::class , [
                'attr' => [
                    'class' => 'envoi'
                ]
            ]);

    }

}