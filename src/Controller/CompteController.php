<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;



class CompteController extends AbstractController
{
    /**
     * @Route("/compte", name="compte")
     */
    public function Compte(Request $request,UserPasswordEncoderInterface $encoder)

    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $user = $this->getUser();
        $user2 = new User();
        $user2 = $user;
       
       
       
        $formPassword = $this->createFormBuilder()
        ->add('mot_de_Passe')
        ->add('submit',SubmitType::class)
        ->setMethod('PUT')
        ->getForm();

        $form = $this->createFormBuilder()
            ->add('telephone', integerType::class)
            ->add('submit',SubmitType::class)
            ->setMethod('PUT')
            ->getForm();
        $formEmail = $this->createFormBuilder()
        ->add('email', EmailType::class)
        ->add('submit',SubmitType::class)
        ->setMethod('PUT')
        ->getForm();
        
       

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $var = $form->getData();
            dump($var);
            $user2->setTelephone($var['telephone']);
            $entityManager->persist($user);
            $entityManager->flush();
            return $this->redirectToRoute('compte');

        }

        $formEmail->handleRequest($request);
        if ($formEmail->isSubmitted() && $formEmail->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $var2 = $formEmail->getData();
            $user2->setEmail($var2['email']);
            $entityManager->persist($user2);
            $entityManager->flush();
            return $this->redirectToRoute('compte');

        }
        $formPassword->handleRequest($request);
        if ($formPassword->isSubmitted() && $formPassword->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $var2 = $formPassword->getData();
            $user2->setPassword($encoder->encodePassword($user2,$var2['mot_de_Passe']));
            $entityManager->persist($user2);
            $entityManager->flush();
            return $this->redirectToRoute('compte');
           
        }

        return $this->render('compte/index.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
            'formEmail' => $formEmail->createView(),
            'formPassword' => $formPassword->createView(),
        ]);
    }
}
