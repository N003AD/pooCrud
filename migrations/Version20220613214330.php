<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220613214330 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D678BA6189');
        $this->addSql('DROP INDEX IDX_5E90F6D678BA6189 ON inscription');
        $this->addSql('ALTER TABLE inscription DROP a_c_id');
        $this->addSql('ALTER TABLE professeur ADD email VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE inscription ADD a_c_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D678BA6189 FOREIGN KEY (a_c_id) REFERENCES ac (id)');
        $this->addSql('CREATE INDEX IDX_5E90F6D678BA6189 ON inscription (a_c_id)');
        $this->addSql('ALTER TABLE professeur DROP email');
    }
}
