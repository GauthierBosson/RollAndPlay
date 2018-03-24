<?php
/**
 * Created by PhpStorm.
 * User: WEBENOO
 * Date: 23/03/2018
 * Time: 19:32
 */

namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;

class ChatType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('message',TextareaType::class , [
                'required' => true ,
                'attr'    => [
                    'class' => 'message'
                ]

            ])
            ->add('envoyer',SubmitType::class , [
                'attr' => [
                    'class' => 'message'
                ]
            ]);
    }
}