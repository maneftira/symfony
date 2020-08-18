<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegisterFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class)
            ->add('siret', IntegerType::class)
            ->add('nom')
            ->add('prenom')
            ->add('password')
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class, 'required' => true,
                'first_options'  => ['label' => 'Mot de passe'],
                'second_options' => ['label' => 'confirmer mot de passe'],
                'invalid_message' => 'Les champs du mot de passe doivent correspondre'
            ])
            ->add('telephone', IntegerType::class)
            ->add('numSecSociale', IntegerType::class)
            ->add('Envoyer', SubmitType::class, array('attr' => array('class' => 'btn btn-primary mt-3 ')));;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
