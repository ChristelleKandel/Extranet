<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230221154252 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Modification des relations OneToOne par ManyToOne';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE users DROP INDEX UNIQ_1483A5E9DDAB2184, ADD INDEX IDX_1483A5E9DDAB2184 (beneficiaire_de2_id)');
        $this->addSql('ALTER TABLE users DROP INDEX UNIQ_1483A5E93594A24E, ADD INDEX IDX_1483A5E93594A24E (permis_id)');
        $this->addSql('ALTER TABLE users DROP INDEX UNIQ_1483A5E91A75EE38, ADD INDEX IDX_1483A5E91A75EE38 (qualification_id)');
        $this->addSql('ALTER TABLE users DROP INDEX UNIQ_1483A5E91E958896, ADD INDEX IDX_1483A5E91E958896 (beneficiaire_de_id)');
        $this->addSql('ALTER TABLE users DROP INDEX UNIQ_1483A5E9ED54CD2, ADD INDEX IDX_1483A5E9ED54CD2 (statut_entree_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE users DROP INDEX IDX_1483A5E91E958896, ADD UNIQUE INDEX UNIQ_1483A5E91E958896 (beneficiaire_de_id)');
        $this->addSql('ALTER TABLE users DROP INDEX IDX_1483A5E9DDAB2184, ADD UNIQUE INDEX UNIQ_1483A5E9DDAB2184 (beneficiaire_de2_id)');
        $this->addSql('ALTER TABLE users DROP INDEX IDX_1483A5E93594A24E, ADD UNIQUE INDEX UNIQ_1483A5E93594A24E (permis_id)');
        $this->addSql('ALTER TABLE users DROP INDEX IDX_1483A5E91A75EE38, ADD UNIQUE INDEX UNIQ_1483A5E91A75EE38 (qualification_id)');
        $this->addSql('ALTER TABLE users DROP INDEX IDX_1483A5E9ED54CD2, ADD UNIQUE INDEX UNIQ_1483A5E9ED54CD2 (statut_entree_id)');
    }
}
