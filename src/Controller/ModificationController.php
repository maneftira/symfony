<?php

namespace App\Controller;

use App\Entity\AutoEntreprise;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\AutoEntrepriseType;
use Symfony\Component\HttpFoundation\Request;

class ModificationController extends AbstractController
{
    /**
     * @Route("/modification", name="modification")
     */
    public function modifier(Request $request)
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $user = $this->getUser();
        $data = new AutoEntreprise();
        $entityManager = $this->getDoctrine()->getManager();
        $entreprise = $this->getDoctrine()->getRepository(AutoEntreprise::class)->findOneBy(array('siret' => $user->getSiret()));
        $form = $this->createForm(AutoEntrepriseType::class, $entreprise);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $entityManager->persist($data);
            $entityManager->flush();
            return $this->redirectToRoute('gestion');
        }


        return $this->render('modification/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
