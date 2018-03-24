<?php
/**
 * Created by PhpStorm.
 * User: gauthierbosson
 * Date: 24/03/2018
 * Time: 13:28
 */

namespace App\Form;


use App\Entity\Parties;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PartieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('nom',TextType::class,[
                'required' => true,
                'label'    => 'Votre titre ',
                'attr'     => [
                    'placeholder' => 'Votre titre'
                ]
            ])
            /*->add('categorie', EntityType::class, [
                'class' => Categories::class,
                'choice_label' => 'categorielibelle',
                'expanded'  => false,
                'multiple'  => false,
                'label'     => false,
                'attr'          => [
                    'class'         =>  'form-control'
                ]
            ])*/
            ->add('description' , TextareaType::class,[
                'required' => true,
                'label'    => 'Votre description :',
                'attr'     => [
                    'placeholder' => 'Votre description'
                ]
            ])
            ->add('envoi',SubmitType::class, [

                'attr'=> [
                    'class' => 'envoi'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Parties::class,
        ));
    }
}