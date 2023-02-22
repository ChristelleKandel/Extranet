<?php

namespace App\Form;

use App\Entity\Team;
use App\Entity\Users;
use App\Entity\Qualifications;
use App\Repository\TeamRepository;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class NewUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prenom', null, ['label' => 'Prénom'])
            ->add('sexe', ChoiceType::class, [
                'choices' => [
                    'F' => 'F',
                    'M' => 'M',
                ]
            ])
            ->add('teamName', EntityType::class, [
                'class'=>Team::class, 
                'choice_label'=> fn($team) =>  $team->getNiveau() . ' - ' . $team->getName(), 
                'label' => 'Nom de la team',
                'choice_attr' => [
                    '0' => ['data-color' => "monBleu"],
                    '1' => ['data-color' => "monOrange"],
                    '2' => ['data-color' => 'monVert'],
                    '3' => ['data-color' => "monViolet"]
                ],
                ])
            ->add('emailInsercall', EmailType::class, ['label' => 'Email Insercall', 'data' => '@insercall.com'])
            ->add('pseudo', null, ['label' => 'Pseudo Insercall'])
            ->add('mdp', null, ['label' => 'Mot de passe Insercall'])
            ->add('qualification', EntityType::class, [
                'class'=>Qualifications::class, 
                'choice_label'=>'nomQualification', 
                'label' => 'Qualification chez Insercall',
                ])
            ->add('dateEntree', null, [
                'label' => 'Date d\'arrivée',
                'widget' => 'single_text'
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
