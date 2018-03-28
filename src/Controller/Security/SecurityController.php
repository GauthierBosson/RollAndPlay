<?php
/**
 * Created by PhpStorm.
 * User: gauthierbosson
 * Date: 21/03/2018
 * Time: 09:35
 */

namespace App\Controller\Security;

use App\Entity\Users;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends Controller
{
    /**
     * Inscription d'un utilisateur
     * @Route("/inscription", name="security_inscription", methods={"GET", "POST"})
     */
    public function inscription(Request $request , UserPasswordEncoderInterface $passwordEncoder) {
        $inscription = new Users();
        $inscription->setRoles('ROLE_MJ');
        $form = $this->createForm(UserType::class, $inscription);


        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()):

            $password = $passwordEncoder->encodePassword($inscription ,  $inscription-> getPassword());
            $inscription->setPassword($password);
            $inscription = $form->getData();
        $em = $this->getDoctrine()->getManager();
        $em->persist($inscription);
        $em->flush();
        return $this->redirectToRoute('security_connexion');
        endif;
        return $this->render('Inscription/inscription.html.twig', [
            'form' => $form->createView()
        ]);

    }

    /**
     * Connexion d'un utilisateur
     * @Route("/connexion", name="security_connexion")
     */
    public function connexion(Request $request, AuthenticationUtils $authenticationUtils)
    {
        # Récupération du message d'erreur s'il y en a un.
        $error = $authenticationUtils->getLastAuthenticationError();

        # Dernier email saisie par l'utilisateur.
        $lastEmail = $authenticationUtils->getLastUsername();

        # Affichage du Formulaire
        return $this->render('security/connexion.html.twig', array(
            'last_email' => $lastEmail,
            'error' => $error,
        ));
    }
}