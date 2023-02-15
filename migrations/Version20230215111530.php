<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230215111530 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Ajout des relations entre les tables Users et les autres';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE users ADD beneficiaire_de_id INT DEFAULT NULL, ADD beneficiaire_de2_id INT DEFAULT NULL, ADD permis_id INT DEFAULT NULL, ADD qualification_id INT DEFAULT NULL, ADD statut_entree_id INT DEFAULT NULL, DROP beneficiaire_de, DROP beneficiaire_de2, DROP statut_entree, DROP qualification, DROP permis');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E91E958896 FOREIGN KEY (beneficiaire_de_id) REFERENCES beneficiaire_de (id)');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E9DDAB2184 FOREIGN KEY (beneficiaire_de2_id) REFERENCES beneficiaire_de (id)');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E93594A24E FOREIGN KEY (permis_id) REFERENCES permis (id)');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E91A75EE38 FOREIGN KEY (qualification_id) REFERENCES qualifications (id)');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E9ED54CD2 FOREIGN KEY (statut_entree_id) REFERENCES statut_social (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1483A5E91E958896 ON users (beneficiaire_de_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1483A5E9DDAB2184 ON users (beneficiaire_de2_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1483A5E93594A24E ON users (permis_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1483A5E91A75EE38 ON users (qualification_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1483A5E9ED54CD2 ON users (statut_entree_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E91E958896');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E9DDAB2184');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E93594A24E');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E91A75EE38');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E9ED54CD2');
        $this->addSql('DROP INDEX UNIQ_1483A5E91E958896 ON users');
        $this->addSql('DROP INDEX UNIQ_1483A5E9DDAB2184 ON users');
        $this->addSql('DROP INDEX UNIQ_1483A5E93594A24E ON users');
        $this->addSql('DROP INDEX UNIQ_1483A5E91A75EE38 ON users');
        $this->addSql('DROP INDEX UNIQ_1483A5E9ED54CD2 ON users');
        $this->addSql('ALTER TABLE users ADD beneficiaire_de VARCHAR(255) DEFAULT NULL, ADD beneficiaire_de2 VARCHAR(255) DEFAULT NULL, ADD statut_entree VARCHAR(255) DEFAULT NULL, ADD qualification VARCHAR(255) DEFAULT NULL, ADD permis VARCHAR(255) DEFAULT NULL, DROP beneficiaire_de_id, DROP beneficiaire_de2_id, DROP permis_id, DROP qualification_id, DROP statut_entree_id');
    }
}
