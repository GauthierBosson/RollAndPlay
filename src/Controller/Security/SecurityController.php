<?php
/**
 * Created by PhpStorm.
 * User: gauthierbosson
 * Date: 21/03/2018
 * Time: 09:35
 */

namespace App\Controller\Security;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends Controller
{
    /**
     * Inscription d'un utilisateur
     * @Route("/inscription", name="security_inscription", methods={"GET", "POST"})
     */
    public function inscription() {

    }
}