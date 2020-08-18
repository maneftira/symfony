<?php

namespace App\Controller;

use App\Entity\AutoEntreprise;
use App\Form\AutoEntrepriseType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;



class CreateController extends AbstractController
{
    /**
     * @Route("/create", name="create")
     */
    public function create(Request $request)
    {
        $data = new AutoEntreprise();
        $form = $this->createForm(AutoEntrepriseType::class, $data);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $data->setTypeDemande('activation');
            dump($data);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($data);
            $entityManager->flush();
            return $this->redirectToRoute('register');
        }
        return $this->render('create/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
