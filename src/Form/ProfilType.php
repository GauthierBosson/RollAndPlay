<?php
/**
 * Created by PhpStorm.
 * User: gauthierbosson
 * Date: 27/03/2018
 * Time: 18:47
 */

namespace App\Form;


use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfilType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('login', TextType::class, [
                'required' => false,
                'label'    => 'nouveau pseudo',
                'attr'     => [

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