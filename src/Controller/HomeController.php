<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{

    /**
     * @Route("/" , name ="Homepage")
     */

    public function home()
    {
        return $this->render(

            'home.html.twig'
        );
    }
    /**
     * @Route("/inscription" , name ="inscrit")
     */

    public function pageinscription()
    {
        return $this->render(

            'Inscription.html.twig'


        );
    }
}
