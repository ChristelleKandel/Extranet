<?php

namespace App\Form;

use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('nomJeuneFille', null, ['label' => 'Nom de jeune fille'])
            ->add('prenom', null, ['label' => 'Prénom'])
            ->add('sexe')
            ->add('adresse1', null, ['label' => 'Adresse'])
            ->add('adresse2', null, ['label' => 'Adresse suite'])
            ->add('zipCode', null, ['label' => 'Code postal'])
            ->add('ville')
            ->add('emailPerso', null, ['label' => 'Email personnel'])
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
            ->add('beneficiaireDe')
            ->add('organismeRef1', null, ['label' => 'Organisme de référence'])
            ->add('coordonneesRef1', null, ['label' => 'Coordonnées de l\'organisme'])
            ->add('beneficiaireDe2', null, ['label' => 'Bénéficiaire aussi de'])
            ->add('organismeRef2', null, ['label' => 'Organisme de référence'])
            ->add('coordonnesRef2', null, ['label' => 'Coordonnées de l\'organisme'])
            ->add('dateEntree', DateType::class, ['label' => 'Date d\'arrivée'])
            ->add('dateFin1', DateType::class, ['label' => 'Date de sortie prévue'])
            ->add('typeContrat')
            ->add('statutEntree')
            ->add('dateRenouvellement', DateType::class, ['label' => 'Date de renouvellement'])
            ->add('dateFin2', DateType::class, ['label' => 'Date de fin du renouvellement'])
            ->add('qualification')
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
            ->add('permis')
            ->add('vehicule')
            ->add('notes', TextareaType::class)
            ->add('qpvGrandAvignon')
            ->add('nomQPV')
            ->add('evalRempli')
            // ->add('teamName')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
