<?php

namespace App\Form;

use App\Entity\Article;
use App\Entity\Facture;
use App\Form\ArticleType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class FactureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',TextType::class,array('attr'=>array('placeholder'=>'Nom')))
            ->add('adresse',TextType::class,array('attr'=>array('placeholder'=>'Adresse')))
            ->add('codeP',IntegerType::class,array('attr'=>array('placeholder'=>'Code Postale')))
            ->add('telephone',IntegerType::class,array('attr'=>array('placeholder'=>'Téléphone')))
            ->add('nom2',TextType::class,array('attr'=>array('placeholder'=>'Nom 2')))
            ->add('factureNb',IntegerType::class,array('attr'=>array('placeholder'=>'Num de facture ')))
            ->add('date',DateType::class,array('attr'=>array('placeholder'=>'Date')))
            ->add(
                'articles',
                CollectionType::class,
                array(
                    'entry_type' => ArticleType::class,
                    'allow_add' => true,
                    'prototype' => true,
                    'allow_delete' => true

                )
            )
            ->add('montantP',NumberType::class,array('attr'=>array('placeholder'=>'Montant Payé')))
            ->add('submit',SubmitType::class);

    }       

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Facture::class,
        ]);
    }
}
