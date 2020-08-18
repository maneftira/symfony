<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\AutoEntreprise;


class AddController extends AbstractController
{
    /**
     * @Route("/add/{id}", name="add")
     */
    public function add($id, Request $request,\Swift_Mailer $mailer)
    {

        $form = $this->createFormBuilder()
            ->add('Siret', integerType::class)
            ->add('submit', SubmitType::class)
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $var = $form->getData();
            $siret = $var['Siret'];
            $entreprise = $this->getDoctrine()->getRepository(AutoEntreprise::class)->findOneBy(array('id' => $id));
            $entreprise->setSiret($siret);
            $entreprise->setTypeDemande('activé');
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($entreprise);
            $entityManager->flush();
            $message = (new \Swift_Message('Cessatipn'))
                ->setFrom('')
                ->setTo( $entreprise->getEmail())
                ->setBody('siret:'.$siret);
            return $this->redirectToRoute('demandes');
        }

        return $this->render('add/index.html.twig', [

            'form' => $form->createView(),
        ]);
    }
}
