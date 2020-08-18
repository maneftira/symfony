<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\AutoEntreprise;


class GestionController extends AbstractController
{
    /**
     * @Route("/gestion", name="gestion")
     */
    public function gestion(Request $request)

    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $user = $this->getUser();
        $entityManager = $this->getDoctrine()->getManager();
        $entreprise = $this->getDoctrine()->getRepository(AutoEntreprise::class)->findOneBy(array('siret' => $user->getSiret()));
        $form = $this->createFormBuilder()
            ->add('submit', SubmitType::class)
            ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entreprise->setTypeDemande('cessation');
            $entityManager->persist($entreprise);
            $entityManager->flush();
        }
        return $this->render('gestion/index.html.twig', ['form' => $form->createView(),]);
    }
}