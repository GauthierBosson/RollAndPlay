<?php
/**
 * Created by PhpStorm.
 * User: gauthierbosson
 * Date: 19/03/2018
 * Time: 19:48
 */

namespace App\Controller\RollAndPlay;

use App\Form\ChatType;
use App\Entity\Actualites;
use App\Entity\Chat;
use App\Entity\Users;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends Controller
{
    /**
     * @Route("/")
     * @return Response
     */
    public function index() {
         $repositories =  $this->getDoctrine()
                                ->getRepository(Actualites::class);

        $actualites = $repositories->findAll();
        return $this->render('index.html.twig',[
            'actualites' => $actualites
        ]);
    }


    /**
     * @Route("/lobby")
     * @return Response
     */
    public function lobby() {
        return $this->render('Partie/lobby_partie.html.twig');
    }

    /**
     * @Route("lobby/partie/{nom}_{id}.html", name="index_partie",
     *     requirements={"idarticle"="\d+"} )
     */
    public function partie(Request $request) {

        // recuperer bdd
        $rp = $this->getDoctrine()->getRepository(Chat::class);
        $message = $rp->getMessage()
        ;


        // nouveau msg
        $nvmessages = new Chat();
        $auteur = $this->getDoctrine()->getRepository(Users::class)->find(1);
        $nvmessages->setPseudo('Theodac');
        $nvmessages->setDate(time());

        $form = $this->createForm(ChatType::class , $nvmessages);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) :

            $nvmessages = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($nvmessages);
            $em->flush();

        endif;

        return $this->render('Partie/partie.html.twig',[
            'form' => $form->createView(),
            'message' => $message ,

        ]);
    }

}