<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class PaiementController extends AbstractController
{
    /**
     * @Route("/paiement", name="paiement")
     */
    public function index()
    {
        $time = new \DateTime();
        $curYear = date('Y'); 
        $date=null;
        if($time < new \DateTime("31-3-".$curYear) ){
            $date=new \DateTime("31-3-".$curYear);
        }
        else if($time > new \DateTime("31-3-".$curYear) and $time < new \DateTime("30-6-".$curYear)  ){
            $date=new \DateTime("30-6-".$curYear);
        }
        else if($time > new \DateTime("30-6-".$curYear) and $time < new \DateTime("30-9-".$curYear)  ){
            $date=new \DateTime("30-9-".$curYear);
        }else {
            $date=new \DateTime("31-12-".$curYear);
        }
        $form = $this->createFormBuilder()
        ->add('chiffre',NumberType::class)
        ->add('valider',SubmitType::class)
        ->getForm();
        return $this->render('paiement/index.html.twig', [
            'date' => $date,
            'form'=>$form->createView(),
        ]);
    }
}
