<?php

namespace App\Controller;

use App\Entity\Actualites;
use App\Form\ActualitesType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ActualiteController extends Controller
{
    use Helper;



    /**
     * @Route("/actualite/{titre}_{id}.html", name="actualite")
     */
    public function index($id, Request $request)
    {
        $actualite = $this->getDoctrine()
            ->getRepository(Actualites::class)
            ->findOneBy(array( 'id' => $id ));

        if (!$actualite) :
            return $this->redirectToRoute('index',[],Response::HTTP_MOVED_PERMANENTLY);
        endif;

        return $this->render('Actualite/actualitedetails.html.twig', [
            'actualite' => $actualite,
            'controller_name' => 'ActualiteController',
        ]);
    }

    /**
     *
     * @Route("/ajout-actualite" , name="ajout_actualite")
     */
    public function addActualites(Request $request){

        $rpActu = $this->getDoctrine()->getRepository(Actualites::class);
        $actualite = $rpActu->findAll();

        $actu = new Actualites();
        $actu->setDate(time());

        $actu->setUser($this->getUser());

        $form = $this->createForm(ActualitesType::class,$actu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $image = $actu->getFeaturedimage();
            $actu = $form->getData();

            $filename   = $this->slugify($actu->getTitre() ).'.'.$image->guessExtension();
            $image->move(
                $this->getParameter('articles_assets-dir'),
                $filename
            );
            $actu->setFeaturedimage($filename);

            $em = $this->getDoctrine()->getManager();
            $em->persist($actu);
            $em->flush();

            return $this->redirectToRoute('actualite', [
                'actu' =>  $actualite,
                'id' => $actu->getId(),
                'titre' => $this->slugify($actu->getTitre())
            ]);

        }
        return $this->render('Actualite/ajout_actualite.html.twig',[
            'form' => $form->createView(),
        ]);
    }
}
