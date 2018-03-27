<?php
/**
 * Created by PhpStorm.
 * User: gauthierbosson
 * Date: 19/03/2018
 * Time: 19:48
 */

namespace App\Controller\RollAndPlay;

use App\Controller\Helper;
use App\Entity\FichePersonnages;
use App\Entity\Parties;
use App\Entity\Resume;
use App\Entity\Users;
use App\Form\ChatType;
use App\Entity\Actualites;
use App\Entity\Chat;
use App\Form\FichePersoType;
use App\Form\ResumeType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends Controller
{
    use Helper;
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
     * @Route("/lobby", name="index_lobby")
     * @return Response
     */
    public function lobby() {
        $repository = $this->getDoctrine()
            ->getRepository(Parties::class);
        $user = $this->getUser();
        $parties = $repository->findBy(array('user' => $user->getId()));
        $partie = new Parties();
        return $this->render('Partie/lobby_partie.html.twig', [
            'nom' => $this->slugify($partie->getNom()),
            'parties' => $parties
        ]);
    }

    /**
     * @Route("lobby/partie/{nom}_{id}.html", name="index_partie",
     *     requirements={"idarticle"="\d+"} )
     */
    public function partie($id , Request $request , Request $request2) {
        $partie = $this->getDoctrine()
            ->getRepository(Parties::class)
            ->findBy(array( 'id' => $id ));

        if (!$partie) :
            return $this->redirectToRoute('index_lobby',[],Response::HTTP_MOVED_PERMANENTLY);
        endif;

        // recuperer bdd
        $rp = $this->getDoctrine()->getRepository(Chat::class);
        $message = $rp->getMessage()
        ;
        $rpPerso = $this->getDoctrine()->getRepository(FichePersonnages::class);

        $fiche = $rpPerso->findAll();

        $rpResume = $this->getDoctrine()->getRepository(Resume::class);

        $Resume = $rpResume->getResume();

        // nouveau msg
        $nvmessages = new Chat();
        $auteur = $this->getDoctrine()->getRepository(Users::class)->find(1);
        $nvmessages->setPseudo('Theodac');
        $nvmessages->setDate(time());
        $form = $this->createForm(ChatType::class , $nvmessages);

        // fiche perso
        $ficheperso = new FichePersonnages();
        $formperso = $this->createForm(FichePersoType::class , $ficheperso);
        $form->handleRequest($request);
        $formperso->handleRequest($request2);

        // resume

        $resume = new Resume();
        $resume->setDate(time());
        $formresume = $this->createForm(ResumeType::class , $resume);
        $formresume->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) :

            $nvmessages = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($nvmessages);
            $em->flush();

        endif;
        if ($formperso->isSubmitted() && $formperso->isValid()) :

            $ficheperso = $formperso->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($ficheperso);
            $em->flush();

        endif;
        if ($formresume->isSubmitted() && $formresume->isValid()) :

            $resume = $formresume->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($resume);
            $em->flush();

        endif;

        return $this->render('Partie/partie.html.twig',[
            'form' => $form->createView(),
            'message' => $message ,
            'formperso' => $formperso->createView(),
            'fiche' => $fiche ,
            'formresume' => $formresume->createView(),
            'resume' => $Resume

        ]);
    }

}