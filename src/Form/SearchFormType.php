<?php

namespace App\Form;

use DateTime;
use App\Entity\Team;
use App\Entity\Users;
use App\Entity\Qualifications;
use App\Repository\TeamRepository;
use App\Repository\UsersRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use App\Data\SearchData;


class SearchFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('searchBar', TextType::class, [
                'label' => false,
                'required' => false,
                'attr' => ['placeholder' => 'Rechercher']
            ])
            ->add('nom')
            ->add('prenom', null, ['label' => 'Prénom'])
            ->add('qualif', EntityType::class, [
                'class'=>Qualifications::class, 
                'choice_label'=>'nomQualification', 
                'required' => false,
                'label' => 'Qualification chez Insercall',
                'placeholder' => 'choisir',
                'expanded' => true,
                'multiple' => false
            ])
            ->add('team', EntityType::class, [
                'class'=>Team::class, 
                'choice_label'=>'name', 
                'required' => false,
                'label' => 'Team',
                'placeholder' => 'choisir',
                //  'expanded' => true,
                //  'multiple' => true
            ])
            ;
}
            
            
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SearchData::class,
            'method' => 'GET',
            'csrf_protection' => false
        ]);
    }
    public function getBlockPrefix()
    {
        return '';
    }
}
