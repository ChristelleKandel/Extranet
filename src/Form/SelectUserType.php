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
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class SelectUserType extends AbstractType
{
    public function __construct(private UsersRepository $usersRepository){}
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('qualification', EntityType::class, [
                'class'=>Qualifications::class, 
                'choice_label'=>'nomQualification', 
                'label' => 'Qualification chez Insercall',
                'placeholder' => 'choisir',
            ]);

        $formModifier = function (FormInterface $form, Qualifications $qualif = null) {
            //Création de la liste des prénoms liés à la qualification choisie
            $prenoms = $qualif === null ? [] : $this->usersRepository->findByQualification($qualif);
            // création du champ prénom 
            $form->add('prenom', EntityType::class, [
                'class'=> Users::class, 
                'label' => 'prenom',
                'choice_label' => 'fullName', 
                'disabled' => $qualif === null,
                'placeholder' => 'Choisir',
                'choices' => $prenoms
            ]);
        };
        $builder
            ->addEventListener(FormEvents::PRE_SET_DATA, function(FormEvent $event) use ($formModifier){
                $form = $event->getForm();
                $data = $event->getData();                
                $formModifier($form, $data->getQualification());
            });
        $builder
            ->get('qualification')->addEventListener(FormEvents::POST_SUBMIT, function(FormEvent $event) use ($formModifier){
            $qualif = $event->getForm()->getData();
            $formModifier($event->getForm()->getParent(), $qualif);
            });
        }        
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
