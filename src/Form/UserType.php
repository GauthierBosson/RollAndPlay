<?php
/**
 * Created by PhpStorm.
 * User: gauthierbosson
 * Date: 21/03/2018
 * Time: 09:36
 */

namespace App\Form;


use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('login',TextType::class,[
                'required' => true,
                'label'    => 'Votre pseudo ',
                'attr'     => [
                    'placeholder' => 'Votre Pseudo'
                ]
            ])
            ->add('password', PasswordType::class, [
                'required' => true,
                'label'    => 'Votre mot de passe :',
                'attr'     => [
                    'placeholder' => 'Votre mot de passe'
                ]
            ])
            ->add('email' , EmailType::class,[
                'required' => true,
                'label'    => 'Votre e-mail :',
                'attr'     => [
                    'placeholder' => 'Votre e-mail'
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
            'data_class' => Users::class,
        ));
    }
}