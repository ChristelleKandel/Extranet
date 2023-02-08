<?php

namespace App\Entity;

use App\Repository\UsersRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UsersRepository::class)]
class Users
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nomJeuneFille = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $sexe = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adresse1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adresse2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $zipCode = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ville = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $emailPerso = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $telephone = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateNaissance = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lieuNaissance = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nationalite = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $situationFamille = null;

    #[ORM\Column(nullable: true)]
    private ?int $nbEnfants = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $securiteSociale = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $CMU = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $CMUC = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateFinCMUC = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $idPoleEmploi = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $datePE = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nomConseillerPE = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $coordonneesPE = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $idCAF = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $reconnaissanceTH = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $beneficiaireDe = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nomRefRSA = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $beneficiaireDe2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $organismeRef1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $organismeRef2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $coordonneesRef1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $coordonnesRef2 = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateEntree = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $emailInsercall = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $pseudo = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $mdp = null;

    #[ORM\ManyToOne(inversedBy: 'users')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Team $teamName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $typeContrat = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $statutEntree = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateRenouvellement = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateFin1 = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateFin2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $qualification = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $situationSortie = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $diplome1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $niveau1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $obtenu = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $diplome2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $niveau2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $obtenu2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $diplome3 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $niveau3 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $obtenu3 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $logement = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $sante = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $mobilite = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $famille = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $finances = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $permis = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $vehicule = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $notes = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $qpvGrandAvignon = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nomQPV = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $evalRempli = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateSortie = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getNomJeuneFille(): ?string
    {
        return $this->nomJeuneFille;
    }

    public function setNomJeuneFille(?string $nomJeuneFille): self
    {
        $this->nomJeuneFille = $nomJeuneFille;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getAdresse1(): ?string
    {
        return $this->adresse1;
    }

    public function setAdresse1(?string $adresse1): self
    {
        $this->adresse1 = $adresse1;

        return $this;
    }

    public function getAdresse2(): ?string
    {
        return $this->adresse2;
    }

    public function setAdresse2(?string $adresse2): self
    {
        $this->adresse2 = $adresse2;

        return $this;
    }

    public function getZipCode(): ?string
    {
        return $this->zipCode;
    }

    public function setZipCode(?string $zipCode): self
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getEmailPerso(): ?string
    {
        return $this->emailPerso;
    }

    public function setEmailPerso(?string $emailPerso): self
    {
        $this->emailPerso = $emailPerso;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(?\DateTimeInterface $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getLieuNaissance(): ?string
    {
        return $this->lieuNaissance;
    }

    public function setLieuNaissance(?string $lieuNaissance): self
    {
        $this->lieuNaissance = $lieuNaissance;

        return $this;
    }

    public function getNationalite(): ?string
    {
        return $this->nationalite;
    }

    public function setNationalite(?string $nationalite): self
    {
        $this->nationalite = $nationalite;

        return $this;
    }

    public function getSituationFamille(): ?string
    {
        return $this->situationFamille;
    }

    public function setSituationFamille(?string $situationFamille): self
    {
        $this->situationFamille = $situationFamille;

        return $this;
    }

    public function getNbEnfants(): ?int
    {
        return $this->nbEnfants;
    }

    public function setNbEnfants(?int $nbEnfants): self
    {
        $this->nbEnfants = $nbEnfants;

        return $this;
    }

    public function getSecuriteSociale(): ?string
    {
        return $this->securiteSociale;
    }

    public function setSecuriteSociale(?string $securiteSociale): self
    {
        $this->securiteSociale = $securiteSociale;

        return $this;
    }

    public function getCMU(): ?string
    {
        return $this->CMU;
    }

    public function setCMU(?string $CMU): self
    {
        $this->CMU = $CMU;

        return $this;
    }

    public function getCMUC(): ?string
    {
        return $this->CMUC;
    }

    public function setCMUC(?string $CMUC): self
    {
        $this->CMUC = $CMUC;

        return $this;
    }

    public function getDateFinCMUC(): ?\DateTimeInterface
    {
        return $this->dateFinCMUC;
    }

    public function setDateFinCMUC(?\DateTimeInterface $dateFinCMUC): self
    {
        $this->dateFinCMUC = $dateFinCMUC;

        return $this;
    }

    public function getIdPoleEmploi(): ?string
    {
        return $this->idPoleEmploi;
    }

    public function setIdPoleEmploi(?string $idPoleEmploi): self
    {
        $this->idPoleEmploi = $idPoleEmploi;

        return $this;
    }

    public function getDatePE(): ?\DateTimeInterface
    {
        return $this->datePE;
    }

    public function setDatePE(?\DateTimeInterface $datePE): self
    {
        $this->datePE = $datePE;

        return $this;
    }

    public function getNomConseillerPE(): ?string
    {
        return $this->nomConseillerPE;
    }

    public function setNomConseillerPE(?string $nomConseillerPE): self
    {
        $this->nomConseillerPE = $nomConseillerPE;

        return $this;
    }

    public function getCoordonneesPE(): ?string
    {
        return $this->coordonneesPE;
    }

    public function setCoordonneesPE(?string $coordonneesPE): self
    {
        $this->coordonneesPE = $coordonneesPE;

        return $this;
    }

    public function getIdCAF(): ?string
    {
        return $this->idCAF;
    }

    public function setIdCAF(?string $idCAF): self
    {
        $this->idCAF = $idCAF;

        return $this;
    }

    public function getReconnaissanceTH(): ?string
    {
        return $this->reconnaissanceTH;
    }

    public function setReconnaissanceTH(?string $reconnaissanceTH): self
    {
        $this->reconnaissanceTH = $reconnaissanceTH;

        return $this;
    }

    public function getBeneficiaireDe(): ?string
    {
        return $this->beneficiaireDe;
    }

    public function setBeneficiaireDe(?string $beneficiaireDe): self
    {
        $this->beneficiaireDe = $beneficiaireDe;

        return $this;
    }

    public function getNomRefRSA(): ?string
    {
        return $this->nomRefRSA;
    }

    public function setNomRefRSA(?string $nomRefRSA): self
    {
        $this->nomRefRSA = $nomRefRSA;

        return $this;
    }

    public function getBeneficiaireDe2(): ?string
    {
        return $this->beneficiaireDe2;
    }

    public function setBeneficiaireDe2(?string $beneficiaireDe2): self
    {
        $this->beneficiaireDe2 = $beneficiaireDe2;

        return $this;
    }

    public function getOrganismeRef1(): ?string
    {
        return $this->organismeRef1;
    }

    public function setOrganismeRef1(?string $organismeRef1): self
    {
        $this->organismeRef1 = $organismeRef1;

        return $this;
    }

    public function getOrganismeRef2(): ?string
    {
        return $this->organismeRef2;
    }

    public function setOrganismeRef2(?string $organismeRef2): self
    {
        $this->organismeRef2 = $organismeRef2;

        return $this;
    }

    public function getCoordonneesRef1(): ?string
    {
        return $this->coordonneesRef1;
    }

    public function setCoordonneesRef1(?string $coordonneesRef1): self
    {
        $this->coordonneesRef1 = $coordonneesRef1;

        return $this;
    }

    public function getCoordonnesRef2(): ?string
    {
        return $this->coordonnesRef2;
    }

    public function setCoordonnesRef2(?string $coordonnesRef2): self
    {
        $this->coordonnesRef2 = $coordonnesRef2;

        return $this;
    }

    public function getDateEntree(): ?\DateTimeInterface
    {
        return $this->dateEntree;
    }

    public function setDateEntree(\DateTimeInterface $dateEntree): self
    {
        $this->dateEntree = $dateEntree;

        return $this;
    }

    public function getEmailInsercall(): ?string
    {
        return $this->emailInsercall;
    }

    public function setEmailInsercall(?string $emailInsercall): self
    {
        $this->emailInsercall = $emailInsercall;

        return $this;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(?string $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function setMdp(?string $mdp): self
    {
        $this->mdp = $mdp;

        return $this;
    }

    public function getTeamName(): ?Team
    {
        return $this->teamName;
    }

    public function setTeamName(?Team $teamName): self
    {
        $this->teamName = $teamName;

        return $this;
    }

    public function getTypeContrat(): ?string
    {
        return $this->typeContrat;
    }

    public function setTypeContrat(?string $typeContrat): self
    {
        $this->typeContrat = $typeContrat;

        return $this;
    }

    public function getStatutEntree(): ?string
    {
        return $this->statutEntree;
    }

    public function setStatutEntree(?string $statutEntree): self
    {
        $this->statutEntree = $statutEntree;

        return $this;
    }

    public function getDateRenouvellement(): ?\DateTimeInterface
    {
        return $this->dateRenouvellement;
    }

    public function setDateRenouvellement(?\DateTimeInterface $dateRenouvellement): self
    {
        $this->dateRenouvellement = $dateRenouvellement;

        return $this;
    }

    public function getDateFin1(): ?\DateTimeInterface
    {
        return $this->dateFin1;
    }

    public function setDateFin1(?\DateTimeInterface $dateFin1): self
    {
        $this->dateFin1 = $dateFin1;

        return $this;
    }

    public function getDateFin2(): ?\DateTimeInterface
    {
        return $this->dateFin2;
    }

    public function setDateFin2(?\DateTimeInterface $dateFin2): self
    {
        $this->dateFin2 = $dateFin2;

        return $this;
    }

    public function getQualification(): ?string
    {
        return $this->qualification;
    }

    public function setQualification(?string $qualification): self
    {
        $this->qualification = $qualification;

        return $this;
    }

    public function getSituationSortie(): ?string
    {
        return $this->situationSortie;
    }

    public function setSituationSortie(?string $situationSortie): self
    {
        $this->situationSortie = $situationSortie;

        return $this;
    }

    public function getDiplome1(): ?string
    {
        return $this->diplome1;
    }

    public function setDiplome1(?string $diplome1): self
    {
        $this->diplome1 = $diplome1;

        return $this;
    }

    public function getNiveau1(): ?string
    {
        return $this->niveau1;
    }

    public function setNiveau1(?string $niveau1): self
    {
        $this->niveau1 = $niveau1;

        return $this;
    }

    public function getObtenu(): ?string
    {
        return $this->obtenu;
    }

    public function setObtenu(?string $obtenu): self
    {
        $this->obtenu = $obtenu;

        return $this;
    }

    public function getDiplome2(): ?string
    {
        return $this->diplome2;
    }

    public function setDiplome2(?string $diplome2): self
    {
        $this->diplome2 = $diplome2;

        return $this;
    }

    public function getNiveau2(): ?string
    {
        return $this->niveau2;
    }

    public function setNiveau2(?string $niveau2): self
    {
        $this->niveau2 = $niveau2;

        return $this;
    }

    public function getObtenu2(): ?string
    {
        return $this->obtenu2;
    }

    public function setObtenu2(?string $obtenu2): self
    {
        $this->obtenu2 = $obtenu2;

        return $this;
    }

    public function getDiplome3(): ?string
    {
        return $this->diplome3;
    }

    public function setDiplome3(?string $diplome3): self
    {
        $this->diplome3 = $diplome3;

        return $this;
    }

    public function getNiveau3(): ?string
    {
        return $this->niveau3;
    }

    public function setNiveau3(?string $niveau3): self
    {
        $this->niveau3 = $niveau3;

        return $this;
    }

    public function getObtenu3(): ?string
    {
        return $this->obtenu3;
    }

    public function setObtenu3(?string $obtenu3): self
    {
        $this->obtenu3 = $obtenu3;

        return $this;
    }

    public function getLogement(): ?string
    {
        return $this->logement;
    }

    public function setLogement(?string $logement): self
    {
        $this->logement = $logement;

        return $this;
    }

    public function getSante(): ?string
    {
        return $this->sante;
    }

    public function setSante(?string $sante): self
    {
        $this->sante = $sante;

        return $this;
    }

    public function getMobilite(): ?string
    {
        return $this->mobilite;
    }

    public function setMobilite(?string $mobilite): self
    {
        $this->mobilite = $mobilite;

        return $this;
    }

    public function getFamille(): ?string
    {
        return $this->famille;
    }

    public function setFamille(?string $famille): self
    {
        $this->famille = $famille;

        return $this;
    }

    public function getFinances(): ?string
    {
        return $this->finances;
    }

    public function setFinances(?string $finances): self
    {
        $this->finances = $finances;

        return $this;
    }

    public function getPermis(): ?string
    {
        return $this->permis;
    }

    public function setPermis(?string $permis): self
    {
        $this->permis = $permis;

        return $this;
    }

    public function getVehicule(): ?string
    {
        return $this->vehicule;
    }

    public function setVehicule(?string $vehicule): self
    {
        $this->vehicule = $vehicule;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;

        return $this;
    }

    public function getQpvGrandAvignon(): ?string
    {
        return $this->qpvGrandAvignon;
    }

    public function setQpvGrandAvignon(?string $qpvGrandAvignon): self
    {
        $this->qpvGrandAvignon = $qpvGrandAvignon;

        return $this;
    }

    public function getNomQPV(): ?string
    {
        return $this->nomQPV;
    }

    public function setNomQPV(?string $nomQPV): self
    {
        $this->nomQPV = $nomQPV;

        return $this;
    }

    public function getEvalRempli(): ?string
    {
        return $this->evalRempli;
    }

    public function setEvalRempli(?string $evalRempli): self
    {
        $this->evalRempli = $evalRempli;

        return $this;
    }

    public function getDateSortie(): ?\DateTimeInterface
    {
        return $this->dateSortie;
    }

    public function setDateSortie(?\DateTimeInterface $dateSortie): self
    {
        $this->dateSortie = $dateSortie;

        return $this;
    }
    // On crée un fonction pour récupérer le nom complet
    public function getFullName(): string 
    {
        return $this->getPrenom().' '.$this->getNom();
    }
    
}
