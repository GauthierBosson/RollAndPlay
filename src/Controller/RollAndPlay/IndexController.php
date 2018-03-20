<?php
/**
 * Created by PhpStorm.
 * User: gauthierbosson
 * Date: 19/03/2018
 * Time: 19:48
 */

namespace App\Controller\RollAndPlay;


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
        return $this->render('base.html.twig');
    }

    /**
     * @Route("/inscription",name="index_inscription")
     * @return Response
     */
    public function inscription(){
        return $this->render('Inscription/inscription.html.twig');
    }
}