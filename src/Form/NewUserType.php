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
                'choice_label'=>'Name', 
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
            //Je remplis mon champ dateFin1 à partir du champ dateEntree grâce à un listener
            // ->add('dateFin1', null, [
            //     'label' => 'Date de sortie prévue',
            //     'widget' => 'single_text'
            //     ])
                //A CORRIGER pour une mise à jour dynamique avec JS (car met la date du jour + 4 mois une seule fois)
            -> addEventListener(FormEvents::PRE_SET_DATA, function(FormEvent $event){
                //récupération du formulaire
                $form = $event->getForm();
                //récupération des datas du formulaire
                $data = $event->getData();
                //creation de la date d'entrée à aujourd'hui
                $data->setDateEntree(new \DateTimeImmutable('now'));
                //récupération dans les data de DateEntree grâce à son getter getDateEntree()
                $arrivee = $data->getDateEntree();
                //calcul de la date de sortie
                $sortie = $arrivee->modify('+ 4months - 1day');
                //enregistrement de la date de sortie avec le setter ou directement avec data-> dans le add
                // $data->setDateFin1($sortie);
                // création du champ
                $form->add('dateFin1', null, [
                    'label' => 'Date de sortie prévue',
                    'widget' => 'single_text',
                    'data' => $sortie
                ]);
            })
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
