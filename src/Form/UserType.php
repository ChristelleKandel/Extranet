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
            ->add('nomJeuneFille', null, ['label' => 'Nom de jeune fille'])
            ->add('sexe')
            ->add('adresse1', null, ['label' => 'Adresse'])
            ->add('adresse2', null, ['label' => 'Adresse suite'])
            ->add('zipCode', null, ['label' => 'Code postal'])
            ->add('ville')
            ->add('emailPerso', EmailType::class, ['label' => 'Email personnel'])
            ->add('telephone', null, ['label' => 'Téléphone'])
            ->add('dateNaissance', BirthdayType::class)
            ->add('lieuNaissance')
            ->add('nationalite')
            ->add('situationFamille')
            ->add('nbEnfants')
            ->add('securiteSociale')
            ->add('CMU')
            ->add('CMUC')
            ->add('dateFinCMUC')
            ->add('idPoleEmploi', null, ['label' => 'Identifiant Pôle Emploi'])
            ->add('datePE', DateType::class, ['label' => 'Inscription à Pôle Emploi'])
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
            ->add('dateRenouvellement', DateType::class, ['label' => 'Date de renouvellement'])
            ->add('dateFin2', DateType::class, ['label' => 'Date de fin du renouvellement'])
            ->add('qualification', EntityType::class, [
                'class'=>Qualifications::class, 
                'choice_label'=>'nomQualification', 
                'label' => 'Qualification chez Insercall',
                ])
            ->add('situationSortie', TextareaType::class)
            ->add('diplome1')
            ->add('niveau1')
            ->add('obtenu')
            ->add('diplome2')
            ->add('niveau2')
            ->add('obtenu2')
            ->add('diplome3')
            ->add('niveau3')
            ->add('obtenu3')
            ->add('logement', TextareaType::class)
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
