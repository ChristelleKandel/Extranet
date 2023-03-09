<?php

namespace App\Form;

use DateTime;
use App\Entity\Team;
use App\Entity\Users;
use App\Data\SearchData;
use App\Entity\Qualifications;
use App\Repository\TeamRepository;
use App\Repository\UsersRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;


class SearchFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('searchBar', TextType::class, [
                'label' =>  'Rechercher par prenom',
                'required' => false,
                'attr' => ['placeholder' => 'Rechercher par prenom']
            ])
            ->add('qualif', EntityType::class, [
                'class'=>Qualifications::class, 
                'choice_label'=>'nomQualification', 
                'required' => false,
                'label' => 'Trier par qualification',
                'placeholder' => 'choisir',
                'expanded' => true,
                'multiple' => true
            ])
            ->add('team', EntityType::class, [
                'class'=>Team::class, 
                'choice_label'=>'name', 
                'required' => false,
                'label' => 'Niveau',
                'placeholder' => 'choisir',
                //  'expanded' => true,
                //  'multiple' => true
            ])
            ->add('enPoste', CheckboxType::class, [
                'label' => "Toujours en poste",
                'required' => false
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
