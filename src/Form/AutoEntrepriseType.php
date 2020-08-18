<?php

namespace App\Form;

use App\Entity\AutoEntreprise;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AutoEntrepriseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('sex', ChoiceType::class, [
                'choices' => [
                    'Homme' => 'Homme',
                    'Femme' => 'Femme',
                ], 'multiple'     => false,
                'expanded'     => true,
                'label_attr' => array(
                    'class' => 'radio-inline '
                ),
            ])
            ->add('nationnalite')
            ->add('DateN', DateType::class)
            ->add('LieuN')
            ->add('adresse')
            ->add('municipalite')
            ->add('codePostal', IntegerType::class)
            ->add('adresseAffaire')
            ->add('municipaliteAffaire')
            ->add('codePostalAffaire', IntegerType::class)
            ->add('dateActivite', DateTYPE::class)
            ->add('saisonniere', ChoiceType::class, [
                'choices' => [
                    'oui' => true,
                    'non' => false,
                ], 'multiple'     => false,
                'expanded'     => true,
                'label_attr' => array(
                    'class' => 'radio-inline'
                ),
            ])
            ->add('domaine')
            ->add('activites')
            ->add('numSecScoiale', IntegerType::class)
            ->add('activiteSimulat',ChoiceType::class, [
                'choices'  => [
                    'non' => 'hhhhh',
                
                ],
            ])
            ->add('regimeAssurance',ChoiceType::class, [
                'choices'  => [
                    'non' => 'hhhh',
                    
                ],
            ])
            ->add('telephone', IntegerType::class)
            ->add('fax', IntegerType::class)
            ->add('email', EmailType::class)
            ->add('fait')
            ->add('date', DateType::class)

            ->add('Envoyer',SubmitType::class,array('attr'=>array('class'=>'btn btn-primary ')));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => AutoEntreprise::class,
        ]);
    }
}
