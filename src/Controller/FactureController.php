<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Facture;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\FactureType;
use App\Form\ArticleType;
use Symfony\Component\HttpFoundation\Request;

class FactureController extends AbstractController
{
    /**
     * @Route("/facture", name="facture")
     */
    public function facture(Request $request)


    {   $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $user = $this->getUser();
        $facture = new Facture();    
        $article=new Article();
        $article->setNom('Nom');
        $article->setDescription('Description');
        $article->setPrixU(00);
        $article->setQuantite(00);
        $facture->addArticle($article);
        $form = $this->createForm(FactureType::class,$facture);

        $form->handleRequest($request);
        if ($form->isSubmitted() ) {
            
            $entityManager = $this->getDoctrine()->getManager();
            $facture=$form->getData();
            $facture->setUser($user);
            foreach ($facture->getArticles() as $art) {
                $art->setFacture($facture);
            }
            $entityManager->persist($facture);
            $entityManager->flush();
            return $this->redirectToRoute('gestion');
          

        }
            
       
            
          
        return $this->render('facture/index.html.twig', [
            'form' => $form->createView(),
        ]);
        }
}
