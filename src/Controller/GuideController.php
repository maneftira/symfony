<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GuideController extends AbstractController
{
    /**
     * @Route("/auto-entrepreneur", name="guide1")
     */
    public function index()
    {
        return $this->render('guide/index.html.twig', [
            'controller_name' => 'GuideController',
        ]);
    }
    /**
     * @Route("/conseils", name="guide2")
     */
    public function index2()
    {
        return $this->render('guide/conseils.html.twig', [
        ]);
    }
    /**
     * @Route("/businessPlan", name="guide3")
     */
    public function index3()
    {
        return $this->render('guide/businessPlan.html.twig', [
        ]);
    }
    /**
     * @Route("/choix", name="guide4")
     */
    public function index4()
    {
        return $this->render('guide/choixJ.html.twig', [
        ]);
    }
    /**
     * @Route("/cotisation", name="guide5")
     */
    public function index5()
    {
        return $this->render('guide/cotisation.html.twig', [
        ]);
    }
    /**
     * @Route("/assurance", name="guide6")
     */
    public function index6()
    {
        return $this->render('guide/assurance.html.twig', [
        ]);
    }
    /**
     * @Route("/assurer", name="guide7")
     */
    public function index7()
    {
        return $this->render('guide/gestion.html.twig', [
        ]);
    }
    /**
     * @Route("/obligation", name="guide8")
     */
    public function index8()
    {
        return $this->render('guide/obligation.html.twig', [
        ]);
    }
    /**
     * @Route("/fiscalité", name="guide9")
     */
    public function index9()
    {
        return $this->render('guide/fiscalité.html.twig', [
        ]);
    }
    /**
     * @Route("/inter", name="guide10")
     */
    public function index10()
    {
        return $this->render('guide/inter.html.twig', [
        ]);
    }
    /**
     * @Route("/demarche", name="guide11")
     */
    public function index11()
    {
        return $this->render('guide/demarche.html.twig', [
        ]);
    }
}
