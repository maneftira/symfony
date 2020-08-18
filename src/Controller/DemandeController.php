<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\AutoEntreprise;
use App\Entity\User;

class DemandeController extends AbstractController
{
    /**
     * @Route("/demandes", name="demandes")
     */
    public function Demandes()
    {
        $demandes = $this->getDoctrine()->getRepository(AutoEntreprise::class)->findBy(array('TypeDemande' => 'activation'));
        dump($demandes);
        $cessations = $this->getDoctrine()->getRepository(AutoEntreprise::class)->findBy(array('TypeDemande' => 'cessation'));

        




        return $this->render('demande/index.html.twig', [
            'demandes' => $demandes,
            'cessations' => $cessations,

        ]);
    }
    /**
     * @Route("/delete/{id}", name="delete")
     */
    public function Delete($id,\Swift_Mailer $mailer)
    {



        $entreprise = $this->getDoctrine()->getRepository(AutoEntreprise::class)->findOneBy(array('id' => $id));
        $user=$this->getDoctrine()->getRepository(User::class)->findOneBy(array('siert' => $entreprise->getSiret()));
        $entityManager = $this->getDoctrine()->getManager();
        $message = (new \Swift_Message('Cessatipn'))
        ->setFrom('')
        ->setTo($user->getEmail())
        ->setBody('cessation terminée');
        $entityManager->remove($entreprise);
        $entityManager->flush();
        $mailer->send($message);
        $demandes = $this->getDoctrine()->getRepository(AutoEntreprise::class)->findBy(array('TypeDemande' => 'activation'));
        $cessations = $this->getDoctrine()->getRepository(AutoEntreprise::class)->findBy(array('TypeDemande' => 'cessation'));
        return $this->render('demande/index.html.twig', [
            'demandes' => $demandes,
            'cessations' => $cessations,
        ]);
    }

    
}