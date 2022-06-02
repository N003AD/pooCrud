<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220602182947 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE inscriptions (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE annee_scolaire ADD inscriptions_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE annee_scolaire ADD CONSTRAINT FK_97150C2B8E2AD382 FOREIGN KEY (inscriptions_id) REFERENCES inscription (id)');
        $this->addSql('CREATE INDEX IDX_97150C2B8E2AD382 ON annee_scolaire (inscriptions_id)');
        $this->addSql('ALTER TABLE classe ADD r_p_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE classe ADD CONSTRAINT FK_8F87BF96BF54E9CD FOREIGN KEY (r_p_id) REFERENCES rp (id)');
        $this->addSql('CREATE INDEX IDX_8F87BF96BF54E9CD ON classe (r_p_id)');
        $this->addSql('ALTER TABLE demande ADD inscription_id INT DEFAULT NULL, ADD r_p_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE demande ADD CONSTRAINT FK_2694D7A55DAC5993 FOREIGN KEY (inscription_id) REFERENCES inscription (id)');
        $this->addSql('ALTER TABLE demande ADD CONSTRAINT FK_2694D7A5BF54E9CD FOREIGN KEY (r_p_id) REFERENCES rp (id)');
        $this->addSql('CREATE INDEX IDX_2694D7A55DAC5993 ON demande (inscription_id)');
        $this->addSql('CREATE INDEX IDX_2694D7A5BF54E9CD ON demande (r_p_id)');
        $this->addSql('ALTER TABLE inscription ADD annee_scolaire_id INT DEFAULT NULL, ADD a_c_id INT DEFAULT NULL, ADD etudiant_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D69331C741 FOREIGN KEY (annee_scolaire_id) REFERENCES annee_scolaire (id)');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D678BA6189 FOREIGN KEY (a_c_id) REFERENCES ac (id)');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D6DDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (id)');
        $this->addSql('CREATE INDEX IDX_5E90F6D69331C741 ON inscription (annee_scolaire_id)');
        $this->addSql('CREATE INDEX IDX_5E90F6D678BA6189 ON inscription (a_c_id)');
        $this->addSql('CREATE INDEX IDX_5E90F6D6DDEAB1A3 ON inscription (etudiant_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE inscriptions');
        $this->addSql('ALTER TABLE annee_scolaire DROP FOREIGN KEY FK_97150C2B8E2AD382');
        $this->addSql('DROP INDEX IDX_97150C2B8E2AD382 ON annee_scolaire');
        $this->addSql('ALTER TABLE annee_scolaire DROP inscriptions_id');
        $this->addSql('ALTER TABLE classe DROP FOREIGN KEY FK_8F87BF96BF54E9CD');
        $this->addSql('DROP INDEX IDX_8F87BF96BF54E9CD ON classe');
        $this->addSql('ALTER TABLE classe DROP r_p_id');
        $this->addSql('ALTER TABLE demande DROP FOREIGN KEY FK_2694D7A55DAC5993');
        $this->addSql('ALTER TABLE demande DROP FOREIGN KEY FK_2694D7A5BF54E9CD');
        $this->addSql('DROP INDEX IDX_2694D7A55DAC5993 ON demande');
        $this->addSql('DROP INDEX IDX_2694D7A5BF54E9CD ON demande');
        $this->addSql('ALTER TABLE demande DROP inscription_id, DROP r_p_id');
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D69331C741');
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D678BA6189');
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D6DDEAB1A3');
        $this->addSql('DROP INDEX IDX_5E90F6D69331C741 ON inscription');
        $this->addSql('DROP INDEX IDX_5E90F6D678BA6189 ON inscription');
        $this->addSql('DROP INDEX IDX_5E90F6D6DDEAB1A3 ON inscription');
        $this->addSql('ALTER TABLE inscription DROP annee_scolaire_id, DROP a_c_id, DROP etudiant_id');
    }
}
