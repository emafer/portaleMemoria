<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250102110930 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE anagrafica (id INT AUTO_INCREMENT NOT NULL, cognome VARCHAR(255) NOT NULL, nome VARCHAR(255) DEFAULT NULL, secondo_nome VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
         $this->addSql('CREATE TABLE comune (id INT AUTO_INCREMENT NOT NULL, provincia_id INT NOT NULL, stato_id INT NOT NULL, nome VARCHAR(255) NOT NULL, INDEX IDX_79106A501FF88B6A (provincia_id), INDEX IDX_79106A50A9A74515 (stato_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dati_vitali (id INT AUTO_INCREMENT NOT NULL, anagrafica_id INT NOT NULL, data_di_nascita DATE DEFAULT NULL, data_di_morte DATE DEFAULT NULL, UNIQUE INDEX UNIQ_1BEE1B64F4849EB6 (anagrafica_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE provincia (id INT AUTO_INCREMENT NOT NULL, nome VARCHAR(255) NOT NULL, regione VARCHAR(255) NOT NULL, sigla VARCHAR(2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ruolo (id INT AUTO_INCREMENT NOT NULL, nome VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stato (id INT AUTO_INCREMENT NOT NULL, nome VARCHAR(255) NOT NULL, cittadinanza VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tipo_relazione (id INT AUTO_INCREMENT NOT NULL, opposto INT DEFAULT NULL, nome VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_BDE60B0699CA9BD5 (opposto), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comune ADD CONSTRAINT FK_79106A501FF88B6A FOREIGN KEY (provincia_id) REFERENCES provincia (id)');
        $this->addSql('ALTER TABLE comune ADD CONSTRAINT FK_79106A50A9A74515 FOREIGN KEY (stato_id) REFERENCES stato (id)');
        $this->addSql('ALTER TABLE dati_vitali ADD CONSTRAINT FK_1BEE1B64F4849EB6 FOREIGN KEY (anagrafica_id) REFERENCES anagrafica (id)');
        $this->addSql('ALTER TABLE tipo_relazione ADD CONSTRAINT FK_BDE60B0699CA9BD5 FOREIGN KEY (opposto) REFERENCES tipo_relazione (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comune DROP FOREIGN KEY FK_79106A501FF88B6A');
        $this->addSql('ALTER TABLE comune DROP FOREIGN KEY FK_79106A50A9A74515');
        $this->addSql('ALTER TABLE dati_vitali DROP FOREIGN KEY FK_1BEE1B64F4849EB6');
        $this->addSql('ALTER TABLE tipo_relazione DROP FOREIGN KEY FK_BDE60B0699CA9BD5');
        $this->addSql('DROP TABLE anagrafica');
        $this->addSql('DROP TABLE comune');
        $this->addSql('DROP TABLE dati_vitali');
        $this->addSql('DROP TABLE provincia');
        $this->addSql('DROP TABLE ruolo');
        $this->addSql('DROP TABLE stato');
        $this->addSql('DROP TABLE tipo_relazione');
    }
}
