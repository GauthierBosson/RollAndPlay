<?php
/**
 * Created by PhpStorm.
 * User: gauthierbosson
 * Date: 19/03/2018
 * Time: 19:48
 */

namespace App\Controller\RollAndPlay;


use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class IndexController
{
    /**
     * @Route("/")
     * @return Response
     */
    public function index() {
        return new Response("<html><body><h1>PAGE D'ACCUEIL</h1></body></html>");
    }
}