<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191216131322 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE entreprise (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, activite VARCHAR(255) DEFAULT NULL, site VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE stage ADD mon_entreprise_id INT NOT NULL, ADD ma_formation_id INT NOT NULL');
        $this->addSql('ALTER TABLE stage ADD CONSTRAINT FK_C27C93696A172489 FOREIGN KEY (mon_entreprise_id) REFERENCES entreprise (id)');
        $this->addSql('ALTER TABLE stage ADD CONSTRAINT FK_C27C93697F1E5652 FOREIGN KEY (ma_formation_id) REFERENCES formation (id)');
        $this->addSql('CREATE INDEX IDX_C27C93696A172489 ON stage (mon_entreprise_id)');
        $this->addSql('CREATE INDEX IDX_C27C93697F1E5652 ON stage (ma_formation_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE stage DROP FOREIGN KEY FK_C27C93696A172489');
        $this->addSql('DROP TABLE entreprise');
        $this->addSql('ALTER TABLE stage DROP FOREIGN KEY FK_C27C93697F1E5652');
        $this->addSql('DROP INDEX IDX_C27C93696A172489 ON stage');
        $this->addSql('DROP INDEX IDX_C27C93697F1E5652 ON stage');
        $this->addSql('ALTER TABLE stage DROP mon_entreprise_id, DROP ma_formation_id');
    }
}
