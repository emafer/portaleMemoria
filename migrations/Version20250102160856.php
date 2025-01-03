<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250102160856 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE documento_documento (id INT AUTO_INCREMENT NOT NULL, documento_di_riferimento_id INT DEFAULT NULL, tipologia_contenuto_id INT DEFAULT NULL, tipologia_documento_id INT DEFAULT NULL, oggetto VARCHAR(255) NOT NULL, data DATE DEFAULT NULL, data_fittizia SMALLINT NOT NULL, note LONGTEXT DEFAULT NULL, protocollo VARCHAR(50) DEFAULT NULL, descrizione VARCHAR(255) DEFAULT NULL, INDEX IDX_72846F9032EA4A71 (documento_di_riferimento_id), INDEX IDX_72846F90B00CD03B (tipologia_contenuto_id), INDEX IDX_72846F909EE21B50 (tipologia_documento_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tipologia_contenuto (id INT AUTO_INCREMENT NOT NULL, descrizione VARCHAR(100) NOT NULL, abbr VARCHAR(4) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tipologia_documento (id INT AUTO_INCREMENT NOT NULL, descrizione VARCHAR(100) NOT NULL, abbr VARCHAR(4) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE documento_documento ADD CONSTRAINT FK_72846F9032EA4A71 FOREIGN KEY (documento_di_riferimento_id) REFERENCES documento_documento (id)');
        $this->addSql('ALTER TABLE documento_documento ADD CONSTRAINT FK_72846F90B00CD03B FOREIGN KEY (tipologia_contenuto_id) REFERENCES tipologia_contenuto (id)');
        $this->addSql('ALTER TABLE documento_documento ADD CONSTRAINT FK_72846F909EE21B50 FOREIGN KEY (tipologia_documento_id) REFERENCES tipologia_documento (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE documento_documento DROP FOREIGN KEY FK_72846F9032EA4A71');
        $this->addSql('ALTER TABLE documento_documento DROP FOREIGN KEY FK_72846F90B00CD03B');
        $this->addSql('ALTER TABLE documento_documento DROP FOREIGN KEY FK_72846F909EE21B50');
        $this->addSql('DROP TABLE documento_documento');
        $this->addSql('DROP TABLE tipologia_contenuto');
        $this->addSql('DROP TABLE tipologia_documento');
    }
}
