<?php

namespace App\Form;

use App\Entity\Team;
use App\Entity\Users;
use App\Repository\TeamRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class NewUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prenom', null, ['label' => 'Prénom'])
            ->add('teamName', EntityType::class, [
                'class'=>Team::class, 
                'choice_label'=>'Name', 
                'label' => 'Nom de la team',
                'query_builder' => function(TeamRepository $teamrepo){
                    return $teamrepo->createQueryBuilder('c')
                    ->orderBy('c.Name', 'ASC');
                }
                ])
            ->add('emailInsercall', EmailType::class, ['label' => 'Email Insercall'])
            ->add('pseudo', null, ['label' => 'Pseudo Insercall'])
            ->add('mdp', null, ['label' => 'Mot de passe Insercall'])
            ->add('dateEntree')
            ->add('dateSortie')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
