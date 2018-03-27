<?php

namespace App\Controller;

use App\Entity\Actualites;
use App\Form\ActualitesType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ActualiteController extends Controller
{
    use Helper;
    /**
     * @Route("/actualite", name="actualite")
     */
    public function index()
    {
        return $this->render('actualite/index.html.twig', [
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
        }
        return $this->render('Actualite/ajout_actualite.html.twig',[
            'form' => $form->createView(),
            'actu' =>  $actualite
        ]);
    }
}
