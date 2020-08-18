<?php

namespace App\Controller;

use App\Entity\Facture;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DossierController extends AbstractController
{
    /**
     * @Route("/dossier", name="dossier")
     */
    public function index()
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $user = $this->getUser();
        $factures= $this->getDoctrine()->getRepository(Facture::class)->findBy(array('User'=>$user));
        return $this->render('dossier/index.html.twig', [
            'factures' => $factures,
        ]);
    }
    /**
     * @Route("/print/{id}", name="print")
     */
    public function print($id)
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $facture= $this->getDoctrine()->getRepository(Facture::class)->findOneBy(array('id'=>$id));
        dump($facture);
        return $this->render('dossier/print.html.twig', [
            'facture' => $facture,
        ]);
    }
}
