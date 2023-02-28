<?php

namespace App\Form;

use DateTime;
use App\Entity\Team;
use App\Entity\Users;
use App\Entity\Permis;
use App\Entity\StatutSocial;
use App\Entity\BeneficiaireDe;
use App\Entity\Qualifications;
use App\Repository\TeamRepository;
use App\Repository\UsersRepository;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class SelectUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            -> addEventListener(FormEvents::PRE_SET_DATA, function(FormEvent $event){
                //récupération du formulaire
                $form = $event->getForm();
                //récupération des datas du formulaire
                $data = $event->getData();

                //récupération de la qualification
                // if (null !== $data->getQualification()){
                //     $qualif = $data->getQualification();
                // }else{
                //     $qualif = null;
                // }
                // dd($data->getQualification());
                // + court : 
                // $qualif = $data->getQualification() ?? null;

                //Création de la liste des prénoms liés à la qualification choisie
                // $prenoms = $qualif === null ? [] : UsersRepository::class->findByQualification($qualif);
                // $prenoms = UsersRepository::class->findByQualification($qualif);
                // dd($prenoms);
                // création du champ prénom 
                $form->add('prenom', EntityType::class, [
                    'class'=> Users::class, 
                    'choice_label' => 'prenom', 
                    'placeholder' => 'Choisir',
                    // 'choices' => $prenoms
                ]);
            })
            
            ->add('nom', EntityType::class, [
                'class'=>Users::class, 
                'choice_label' => 'nom', 
                'placeholder' => 'Choisir',
                'query_builder' => function(UsersRepository $users){
                    return $users->findAllUsersByNameAscQueryBuilder();
                },
            ])
            ->add('teamName', EntityType::class, [
                'class'=>Team::class, 
                'choice_label'=>'Name', 
                'label' => 'Nom de la team',
                'placeholder' => 'choisir'
                ])
            ->add('qualification', EntityType::class, [
                'class'=>Qualifications::class, 
                'choice_label'=>'nomQualification', 
                'label' => 'Qualification chez Insercall',
                'placeholder' => 'choisir',
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
