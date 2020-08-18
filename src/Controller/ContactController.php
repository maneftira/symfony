<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function contact(Request $request, \Swift_Mailer $mailer)
    {   
        $form = $this->createFormBuilder()
        ->add('Nom')
        ->add('Email')
        ->add('Sujet')
        ->add('Message',TextareaType::class,array('attr'=>array('rows'=>7)))
        ->add('Submit',SubmitType::class)
        ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data=$form->getData();
            $message = (new \Swift_Message('Contact Email'))
            ->setFrom($data['Email'])
            ->setTo('manef.tira@ensi-uma.tn')
            ->setBody(
            'Nom:'. $data['Nom']."\n"
            .' Email:'. $data['Email']."\n"
            .' Sujet:'. $data['Sujet']."\n"
            .' Message:'. $data['Message'])
            ;
            

             if ($mailer->send($message)){
                 $this->addFlash('succ','message envoyer');
                 return $this->redirectToRoute('contact');}

             }

           
        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),]);
    }
}
