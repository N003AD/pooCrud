<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220531123359 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ac ADD email VARCHAR(180) NOT NULL, ADD roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', ADD password VARCHAR(255) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E98478FBE7927C74 ON ac (email)');
        $this->addSql('ALTER TABLE personne ADD discr VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE professeur CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE professeur ADD CONSTRAINT FK_17A55299BF396750 FOREIGN KEY (id) REFERENCES personne (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_E98478FBE7927C74 ON ac');
        $this->addSql('ALTER TABLE ac DROP email, DROP roles, DROP password');
        $this->addSql('ALTER TABLE personne DROP discr');
        $this->addSql('ALTER TABLE professeur DROP FOREIGN KEY FK_17A55299BF396750');
        $this->addSql('ALTER TABLE professeur CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT NOT NULL COLLATE `utf8mb4_bin`');
    }
}
