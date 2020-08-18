<?php

namespace App\Controller;

use App\Entity\AutoEntreprise;
use App\Entity\User;
use App\Form\RegisterFormType;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class RegisterController extends AbstractController
{
    /**
     * @Route("/register", name="register")
     */
    public function register(Request $request,UserPasswordEncoderInterface $encoder)
    {
        $user = new User();
        $form = $this->createForm(RegisterFormType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $user->setNumSecSociale($data->getNumSecSociale());
            $user->setNom($data->getNom());
            $user->setPrenom($data->getPrenom());
            $user->setEmail($data->getEmail());
            $user->setRoles(['ROLE_USER']);
            $user->setTelephone($data->getTelephone());
            $user->setSiret($data->getSiret());
            $user->setEntreprise($this->getDoctrine()->getRepository(AutoEntreprise::class)->findOneBy(array('siret' =>$data->getSiret() )));
            $user->setPassword($encoder->encodePassword($user,$data->getpassword()));  
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($data);
            $entityManager->flush();
            return $this->redirectToRoute('app_login');}

       
        return $this->render('register/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    }
