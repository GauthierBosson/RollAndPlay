<?php
/**
 * Created by PhpStorm.
 * User: gauthierbosson
 * Date: 22/03/2018
 * Time: 20:44
 */

namespace App\Controller;

use Symfony\Component\Security\Http\Session;
use App\Entity\Parties;
use App\Form\PartieType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PartieController extends Controller
{
    use Helper;

    /**
     * @Route("/creer-une-partie", name="add_partie")
     */
    public function addpartie(Request $request) {
        $partie = new Parties();
        $form = $this->createForm(PartieType::class, $partie);
        $user = $this->getUser();
        $partie->setUser($user);


        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()):
            $partie = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($partie);
            $em->flush();

            return $this->redirectToRoute('index_partie', [
                'nom' => $this->slugify($partie->getNom()),
                'id'               => $partie->getId()
            ]);
        endif;
        return $this->render('Partie/creer_partie.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /*public function verifyRight() {
        $data = $this->getUser();
        $password = $this->getUser()->getId();

        if(openssl_encrypt($data, 'AES-128-ECB', $password) == openssl_decrypt()):
    }*/
}