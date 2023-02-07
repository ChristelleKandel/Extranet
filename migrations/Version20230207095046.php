<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230207095046 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Création de la table USERS avec sa foreign Key vers Team';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, team_name_id INT NOT NULL, nom VARCHAR(255) NOT NULL, nom_jeune_fille VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) NOT NULL, sexe VARCHAR(255) NOT NULL, adresse1 VARCHAR(255) DEFAULT NULL, adresse2 VARCHAR(255) DEFAULT NULL, zip_code VARCHAR(255) DEFAULT NULL, ville VARCHAR(255) DEFAULT NULL, email_perso VARCHAR(255) DEFAULT NULL, telephone VARCHAR(255) DEFAULT NULL, date_naissance DATE DEFAULT NULL, lieu_naissance VARCHAR(255) DEFAULT NULL, nationalite VARCHAR(255) DEFAULT NULL, situation_famille VARCHAR(255) DEFAULT NULL, nb_enfants INT DEFAULT NULL, securite_sociale VARCHAR(255) DEFAULT NULL, cmu VARCHAR(255) DEFAULT NULL, cmuc VARCHAR(255) DEFAULT NULL, date_fin_cmuc DATE DEFAULT NULL, id_pole_emploi VARCHAR(255) DEFAULT NULL, date_pe DATE DEFAULT NULL, nom_conseiller_pe VARCHAR(255) DEFAULT NULL, coordonnees_pe VARCHAR(255) DEFAULT NULL, id_caf VARCHAR(255) DEFAULT NULL, reconnaissance_th VARCHAR(255) DEFAULT NULL, beneficiaire_de VARCHAR(255) DEFAULT NULL, nom_ref_rsa VARCHAR(255) DEFAULT NULL, beneficiaire_de2 VARCHAR(255) DEFAULT NULL, organisme_ref1 VARCHAR(255) DEFAULT NULL, organisme_ref2 VARCHAR(255) DEFAULT NULL, coordonnees_ref1 VARCHAR(255) DEFAULT NULL, coordonnes_ref2 VARCHAR(255) DEFAULT NULL, date_entree DATE NOT NULL, email_insercall VARCHAR(255) DEFAULT NULL, pseudo VARCHAR(255) DEFAULT NULL, mdp VARCHAR(255) DEFAULT NULL, type_contrat VARCHAR(255) DEFAULT NULL, statut_entree VARCHAR(255) DEFAULT NULL, date_renouvellement DATE DEFAULT NULL, date_fin1 DATE DEFAULT NULL, date_fin2 DATE DEFAULT NULL, qualification VARCHAR(255) DEFAULT NULL, situation_sortie VARCHAR(255) DEFAULT NULL, diplome1 VARCHAR(255) DEFAULT NULL, niveau1 VARCHAR(255) DEFAULT NULL, obtenu VARCHAR(255) DEFAULT NULL, diplome2 VARCHAR(255) DEFAULT NULL, niveau2 VARCHAR(255) DEFAULT NULL, obtenu2 VARCHAR(255) DEFAULT NULL, diplome3 VARCHAR(255) DEFAULT NULL, niveau3 VARCHAR(255) DEFAULT NULL, obtenu3 VARCHAR(255) DEFAULT NULL, logement VARCHAR(255) DEFAULT NULL, sante VARCHAR(255) DEFAULT NULL, mobilite VARCHAR(255) DEFAULT NULL, famille VARCHAR(255) DEFAULT NULL, finances VARCHAR(255) DEFAULT NULL, permis VARCHAR(255) DEFAULT NULL, vehicule VARCHAR(255) DEFAULT NULL, notes VARCHAR(255) DEFAULT NULL, qpv_grand_avignon VARCHAR(255) DEFAULT NULL, nom_qpv VARCHAR(255) DEFAULT NULL, eval_rempli VARCHAR(255) DEFAULT NULL, INDEX IDX_1483A5E98E6EEDE1 (team_name_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E98E6EEDE1 FOREIGN KEY (team_name_id) REFERENCES team (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E98E6EEDE1');
        $this->addSql('DROP TABLE users');
    }
}
