<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class InformeController extends AbstractController
{
    /**
     * @Route("/informe", name="informe")
     */
    public function index()
    {
        return $this->render('informe/index.html.twig', [
            'controller_name' => 'InformeController',
        ]);
    }
    /**
     * @Route("/jeCreate", name="jeCreate")
     */
    public function jecreate()
    {
        return $this->render('informe/create.html.twig', [
            'controller_name' => 'JeCreateController',
        ]);
    }
    /**
     * @Route("/jeGére", name="jeGére")
     */
    public function jeGére()
    {
        return $this->render('informe/gére.html.twig', [
            'controller_name' => 'JeCreateController',
        ]);
    }
    /**
     * @Route("/jeDev", name="jeDev")
     */
    public function jeDev()
    {
        return $this->render('informe/developpe.html.twig', [
            'controller_name' => 'JeCreateController',
        ]);
    }
    /**
     * @Route("/Services", name="Services")
     */
    public function Services()
    {
        return $this->render('informe/service.html.twig', [
            'controller_name' => 'JeCreateController',
        ]);
    }
    /**
     * @Route("/outils", name="outils")
     */
    public function outils()
    {
        return $this->render('informe/outils.html.twig', [
            'controller_name' => 'JeCreateController',
        ]);
    }
}
