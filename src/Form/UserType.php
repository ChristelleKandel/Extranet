<?php

namespace App\Form;

use App\Entity\Team;
use App\Entity\Users;
use App\Entity\Permis;
use App\Entity\StatutSocial;
use App\Entity\BeneficiaireDe;
use App\Entity\Qualifications;
use App\Repository\TeamRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', null, ['disabled'=> true])
            ->add('prenom', null, ['label' => 'Prénom', 'disabled'=> true])
            ->add('teamName', EntityType::class, [
                'class'=>Team::class, 
                'choice_label'=>'Name', 
                'label' => 'Nom de la team',
                'disabled'=> true,
                'choice_attr' => [
                    '0' => ['data-color' => "monBleu"],
                    '1' => ['data-color' => "monOrange"],
                    '2' => ['data-color' => 'monVert'],
                    '3' => ['data-color' => "monViolet"]
                ],
                ])
            ->add('emailInsercall', EmailType::class, ['label' => 'Email Insercall', 'disabled'=> true])
            ->add('pseudo', null, [
                'label' => 'Pseudo Insercall',
                'attr' => array ('readonly' => true)
                ])
            ->add('dateEntree', null, [
                'widget' => 'single_text',
                'disabled'=> true, 
                'label' => 'Date d\'arrivée',
            ])
            ->add('dateFin1', null, [
                'label' => 'Date de sortie prévue',
                'disabled'=> true,
                'widget' => 'single_text'])
            ->add('nomJeuneFille', null, ['label' => 'Nom de jeune fille'])
            ->add('adresse1', null, ['label' => 'Adresse'])
            ->add('adresse2', null, ['label' => 'Adresse suite'])
            ->add('zipCode', null, ['label' => 'Code postal'])
            ->add('ville')
            ->add('emailPerso', EmailType::class, ['label' => 'Email personnel'])
            ->add('telephone', null, ['label' => 'Téléphone'])
            ->add('dateNaissance', BirthdayType::class, ['label' => 'Date de naissance', 'required' => false, 'by_reference' => true])
            ->add('lieuNaissance')
            ->add('nationalite')
            ->add('situationFamille')
            ->add('nbEnfants')
            ->add('securiteSociale')
            ->add('CMU')
            ->add('CMUC')
            ->add('dateFinCMUC')
            ->add('idPoleEmploi', null, ['label' => 'Identifiant Pôle Emploi'])
            ->add('datePE', DateType::class, ['label' => 'Inscription à Pôle Emploi', 'required' => false, 'by_reference' => true])
            ->add('nomConseillerPE', null, ['label' => 'Conseiller Pôle Emploi'])
            ->add('coordonneesPE', null, ['label' => 'Coordonnées Pôle Emploi'])
            ->add('idCAF', null, ['label' => 'Identifiant CAF'])
            ->add('reconnaissanceTH', null, ['label' => 'Reconnaissance TH'])
            ->add('nomRefRSA', null, ['label' => 'Nom du référent RSA'])
            ->add('beneficiaireDe', EntityType::class, [
                'class'=>BeneficiaireDe::class, 
                'choice_label'=>'nomOrganisme', 
                'label' => 'Bénéficiaire de ',
                ])
            ->add('organismeRef1', null, ['label' => 'Organisme de référence'])
            ->add('coordonneesRef1', null, ['label' => 'Coordonnées de l\'organisme'])
            ->add('beneficiaireDe2', EntityType::class, [
                'class'=>BeneficiaireDe::class, 
                'choice_label'=>'nomOrganisme', 
                'label' => 'Bénéficiaire aussi de ',
                ])
            ->add('organismeRef2', null, ['label' => 'Organisme de référence'])
            ->add('coordonnesRef2', null, ['label' => 'Coordonnées de l\'organisme'])
            ->add('dateEntree', DateType::class, ['label' => 'Date d\'arrivée'])
            ->add('dateFin1', DateType::class, ['label' => 'Date de sortie prévue'])
            ->add('typeContrat')
            ->add('statutEntree', EntityType::class, [
                'class'=>StatutSocial::class, 
                'choice_label'=>'nomStatut', 
                'label' => 'Statut à l\entrée',
                ])
            ->add('dateRenouvellement', DateType::class, ['label' => 'Date de renouvellement', 'required' => false, 'by_reference' => true])
            ->add('dateFin2', DateType::class, ['label' => 'Date de fin du renouvellement', 'required' => false, 'by_reference' => true])
            ->add('qualification', EntityType::class, [
                'class'=>Qualifications::class, 
                'choice_label'=>'nomQualification', 
                'label' => 'Qualification chez Insercall',
                ])
            ->add('situationSortie', TextareaType::class, ['required' => false])
            ->add('diplome1')
            ->add('niveau1')
            ->add('obtenu')
            ->add('diplome2')
            ->add('niveau2')
            ->add('obtenu2')
            ->add('diplome3')
            ->add('niveau3')
            ->add('obtenu3')
            ->add('logement', TextareaType::class, ['required' => false])
            ->add('sante', TextareaType::class)
            ->add('mobilite', TextareaType::class)
            ->add('famille', TextareaType::class)
            ->add('finances', TextareaType::class)
            ->add('permis', EntityType::class, [
                'class'=>Permis::class, 
                'choice_label'=>'typePermis', 
                'label' => 'Permis',
                ])
            ->add('vehicule')
            ->add('notes', TextareaType::class)
            ->add('qpvGrandAvignon')
            ->add('nomQPV')
            ->add('evalRempli')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
