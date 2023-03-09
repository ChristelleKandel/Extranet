<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230309111222 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'ajout de tous les champs user';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_8D93D649F85E0677 ON user');
        $this->addSql('ALTER TABLE user ADD team_name_id INT NOT NULL, ADD beneficiaire_de_id INT DEFAULT NULL, ADD beneficiaire_de2_id INT DEFAULT NULL, ADD permis_id INT DEFAULT NULL, ADD qualification_id INT DEFAULT NULL, ADD statut_entree_id INT DEFAULT NULL, ADD nom VARCHAR(255) NOT NULL, ADD nom_jeune_fille VARCHAR(255) DEFAULT NULL, ADD prenom VARCHAR(255) NOT NULL, ADD sexe VARCHAR(255) NOT NULL, ADD adresse1 VARCHAR(255) DEFAULT NULL, ADD adresse2 VARCHAR(255) DEFAULT NULL, ADD zip_code VARCHAR(255) DEFAULT NULL, ADD ville VARCHAR(255) DEFAULT NULL, ADD email_perso VARCHAR(255) DEFAULT NULL, ADD telephone VARCHAR(255) DEFAULT NULL, ADD date_naissance DATE DEFAULT NULL, ADD lieu_naissance VARCHAR(255) DEFAULT NULL, ADD nationalite VARCHAR(255) DEFAULT NULL, ADD situation_famille VARCHAR(255) DEFAULT NULL, ADD nb_enfants INT DEFAULT NULL, ADD securite_sociale VARCHAR(255) DEFAULT NULL, ADD cmu VARCHAR(255) DEFAULT NULL, ADD cmuc VARCHAR(255) DEFAULT NULL, ADD date_fin_cmuc DATE DEFAULT NULL, ADD id_pole_emploi VARCHAR(255) DEFAULT NULL, ADD date_pe DATE DEFAULT NULL, ADD nom_conseiller_pe VARCHAR(255) DEFAULT NULL, ADD coordonnees_pe VARCHAR(255) DEFAULT NULL, ADD id_caf VARCHAR(255) DEFAULT NULL, ADD reconnaissance_th VARCHAR(255) DEFAULT NULL, ADD nom_ref_rsa VARCHAR(255) DEFAULT NULL, ADD organisme_ref1 VARCHAR(255) DEFAULT NULL, ADD organisme_ref2 VARCHAR(255) DEFAULT NULL, ADD coordonnees_ref1 VARCHAR(255) DEFAULT NULL, ADD coordonnes_ref2 VARCHAR(255) DEFAULT NULL, ADD date_entree DATE NOT NULL, ADD email_insercall VARCHAR(255) DEFAULT NULL, ADD mdp VARCHAR(255) DEFAULT NULL, ADD type_contrat VARCHAR(255) DEFAULT NULL, ADD date_renouvellement DATE DEFAULT NULL, ADD date_fin1 DATE DEFAULT NULL, ADD date_fin2 DATE DEFAULT NULL, ADD situation_sortie VARCHAR(255) DEFAULT NULL, ADD diplome1 VARCHAR(255) DEFAULT NULL, ADD niveau1 VARCHAR(255) DEFAULT NULL, ADD obtenu VARCHAR(255) DEFAULT NULL, ADD diplome2 VARCHAR(255) DEFAULT NULL, ADD niveau2 VARCHAR(255) DEFAULT NULL, ADD obtenu2 VARCHAR(255) DEFAULT NULL, ADD diplome3 VARCHAR(255) DEFAULT NULL, ADD niveau3 VARCHAR(255) DEFAULT NULL, ADD obtenu3 VARCHAR(255) DEFAULT NULL, ADD logement VARCHAR(255) DEFAULT NULL, ADD sante VARCHAR(255) DEFAULT NULL, ADD mobilite VARCHAR(255) DEFAULT NULL, ADD famille VARCHAR(255) DEFAULT NULL, ADD finances VARCHAR(255) DEFAULT NULL, ADD vehicule VARCHAR(255) DEFAULT NULL, ADD notes VARCHAR(255) DEFAULT NULL, ADD qpv_grand_avignon VARCHAR(255) DEFAULT NULL, ADD nom_qpv VARCHAR(255) DEFAULT NULL, ADD eval_rempli VARCHAR(255) DEFAULT NULL, ADD date_sortie DATE DEFAULT NULL, CHANGE username pseudo VARCHAR(180) NOT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6498E6EEDE1 FOREIGN KEY (team_name_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6491E958896 FOREIGN KEY (beneficiaire_de_id) REFERENCES beneficiaire_de (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649DDAB2184 FOREIGN KEY (beneficiaire_de2_id) REFERENCES beneficiaire_de (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6493594A24E FOREIGN KEY (permis_id) REFERENCES permis (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6491A75EE38 FOREIGN KEY (qualification_id) REFERENCES qualifications (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649ED54CD2 FOREIGN KEY (statut_entree_id) REFERENCES statut_social (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D64986CC499D ON user (pseudo)');
        $this->addSql('CREATE INDEX IDX_8D93D6498E6EEDE1 ON user (team_name_id)');
        $this->addSql('CREATE INDEX IDX_8D93D6491E958896 ON user (beneficiaire_de_id)');
        $this->addSql('CREATE INDEX IDX_8D93D649DDAB2184 ON user (beneficiaire_de2_id)');
        $this->addSql('CREATE INDEX IDX_8D93D6493594A24E ON user (permis_id)');
        $this->addSql('CREATE INDEX IDX_8D93D6491A75EE38 ON user (qualification_id)');
        $this->addSql('CREATE INDEX IDX_8D93D649ED54CD2 ON user (statut_entree_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6498E6EEDE1');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6491E958896');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649DDAB2184');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6493594A24E');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6491A75EE38');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649ED54CD2');
        $this->addSql('DROP INDEX UNIQ_8D93D64986CC499D ON user');
        $this->addSql('DROP INDEX IDX_8D93D6498E6EEDE1 ON user');
        $this->addSql('DROP INDEX IDX_8D93D6491E958896 ON user');
        $this->addSql('DROP INDEX IDX_8D93D649DDAB2184 ON user');
        $this->addSql('DROP INDEX IDX_8D93D6493594A24E ON user');
        $this->addSql('DROP INDEX IDX_8D93D6491A75EE38 ON user');
        $this->addSql('DROP INDEX IDX_8D93D649ED54CD2 ON user');
        $this->addSql('ALTER TABLE user DROP team_name_id, DROP beneficiaire_de_id, DROP beneficiaire_de2_id, DROP permis_id, DROP qualification_id, DROP statut_entree_id, DROP nom, DROP nom_jeune_fille, DROP prenom, DROP sexe, DROP adresse1, DROP adresse2, DROP zip_code, DROP ville, DROP email_perso, DROP telephone, DROP date_naissance, DROP lieu_naissance, DROP nationalite, DROP situation_famille, DROP nb_enfants, DROP securite_sociale, DROP cmu, DROP cmuc, DROP date_fin_cmuc, DROP id_pole_emploi, DROP date_pe, DROP nom_conseiller_pe, DROP coordonnees_pe, DROP id_caf, DROP reconnaissance_th, DROP nom_ref_rsa, DROP organisme_ref1, DROP organisme_ref2, DROP coordonnees_ref1, DROP coordonnes_ref2, DROP date_entree, DROP email_insercall, DROP mdp, DROP type_contrat, DROP date_renouvellement, DROP date_fin1, DROP date_fin2, DROP situation_sortie, DROP diplome1, DROP niveau1, DROP obtenu, DROP diplome2, DROP niveau2, DROP obtenu2, DROP diplome3, DROP niveau3, DROP obtenu3, DROP logement, DROP sante, DROP mobilite, DROP famille, DROP finances, DROP vehicule, DROP notes, DROP qpv_grand_avignon, DROP nom_qpv, DROP eval_rempli, DROP date_sortie, CHANGE pseudo username VARCHAR(180) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649F85E0677 ON user (username)');
    }
}
