<?php
/**
 * Created by PhpStorm.
 * User: WEBENOO
 * Date: 26/03/2018
 * Time: 20:39
 */

namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class ResumeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre',TextType::class , [
                'required' => true,
                'label' => 'Titre du résumé',
                'attr' => [
                    'class' => 'titreResume'
                ]
            ])
            ->add('contenu',TextareaType::class,[
                'required' => true,
                'label' => 'Contenu de votre resumé',
                'attr' =>[
                    'class' => 'contenu'
                ]
            ])
            ->add('envoi' ,SubmitType::class,[
                'attr' => [
                    'class' => 'btn btn-primary btn-block send',
                    'onclick' =>'reload()'
                ]
            ]);
    }
}