<?php
/**
 * Created by PhpStorm.
 * User: gauthierbosson
 * Date: 19/03/2018
 * Time: 19:48
 */

namespace App\Controller\RollAndPlay;


use App\Entity\Actualites;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
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
     * @Route("/chat",name="index_chat")
     * @return Response
     */
    public function chat(){
        return $this->render('Partie/partie.html.twig');
    }

}