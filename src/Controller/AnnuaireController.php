<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\AutoEntreprise;



class AnnuaireController extends AbstractController
{
    /**
     * @Route("/annuaire", name="annuaire")
     */
    public function index(Request $request)
    {   $list=array();
        $form = $this->createFormBuilder()
        ->add('ville')
        ->add('secteur')
        ->add('submit',SubmitType::class)
        ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $data = $form->getData();
            $ville=$data['ville'];
            $secteur=$data['secteur'];
            $list = $this->getDoctrine()->getRepository(AutoEntreprise::class)->findBy(array('municipaliteAffaire' => $ville,'domaine'=>$secteur));
            return $this->render('annuaire/index.html.twig', [
                'form' => $form->createView(),
                'list' =>$list,
    
            ]);
        } 




        return $this->render('annuaire/index.html.twig', [
            'form' => $form->createView(),
            'list' =>$list,

        ]);
    }
}

