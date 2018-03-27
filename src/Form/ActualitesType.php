<?php
/**
 * Created by PhpStorm.
 * User: WEBENOO
 * Date: 27/03/2018
 * Time: 11:13
 */

namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class ActualitesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre', TextType::class,[
                'required' => true,
                'label' => 'Votre titre',
                'attr' => [
                    'class' => 'titre'
                ]
            ])
            ->add('chapo', TextType::class,[
                'required' => true,
                'label' => 'Votre Sous-titre',
                'attr' => [
                    'class' => 'chapo'
                ]
            ])
            ->add('contenu', TextareaType::class,[
                'required' => true,
                'label' => 'Votre contenu',
                'attr' => [
                    'class' => 'contenu'
                ]
            ])
            ->add('featuredimage', FileType::class,[
                'required' => false,
                'label' => 'Votre image de profil',
                'attr' => [
                    'class' => 'image'
                ]
            ])
            ->add('envoi' , SubmitType::class, [
                'attr' => [
                    'class' => 'envoi'
                ]
            ]);
    }

}