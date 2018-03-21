<?php
/**
 * Created by PhpStorm.
 * User: gauthierbosson
 * Date: 21/03/2018
 * Time: 09:35
 */

namespace App\Controller\Security;

use App\Entity\Users;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends Controller
{
    /**
     * Inscription d'un utilisateur
     * @Route("/inscription", name="security_inscription", methods={"GET", "POST"})
     */
    public function inscription(Request $request) {
        $inscription = new Users();
        $inscription->setRoles('ROLE_MJ');
        $form = $this->createFormBuilder($inscription)
                    ->add('login',TextType::class,[
                        'required' => true,
                        'label'    => 'Votre pseudo ',
                        'attr'     => [
                            'placeholder' => 'Votre Pseudo'
                        ]
                    ])
                    ->add('password', PasswordType::class , [
                        'required' => true,
                        'label'    => 'Votre mot de passe :',
                        'attr'     => [
                            'placeholder' => 'Votre mot de passe'
                        ]
                    ])
                    ->add('email' , EmailType::class ,[
                        'required' => true,
                        'label'    => 'Votre e-mail :',
                        'attr'     => [
                            'placeholder' => 'Votre e-mail'
                        ]
                    ])
                    ->add('envoi',SubmitType::class , [

                        'attr'=> [
                            'class' => 'envoi'
                        ]
                    ])
                    ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()):
            $inscription = $form->getData();
        $em = $this->getDoctrine()->getManager();
        $em->persist($inscription);
        $em->flush();
        endif;
        return $this->render('Inscription/inscription.html.twig', [
            'form' => $form->createView()
        ]);

    }
}