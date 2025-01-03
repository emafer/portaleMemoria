<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250102155845 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE faldone (id INT AUTO_INCREMENT NOT NULL, archivio_id INT NOT NULL, descrizione VARCHAR(255) NOT NULL, classificazione VARCHAR(50) NOT NULL, note LONGTEXT DEFAULT NULL, INDEX IDX_DB09DFA5C3B3A27F (archivio_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fascicolo (id INT AUTO_INCREMENT NOT NULL, faldone_id INT NOT NULL, nome VARCHAR(255) NOT NULL, note LONGTEXT DEFAULT NULL, INDEX IDX_6CAE6249C68E3B14 (faldone_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE internato (id INT AUTO_INCREMENT NOT NULL, anagrafica_id INT NOT NULL, morto_shoah SMALLINT NOT NULL, UNIQUE INDEX UNIQ_1416A9BA7E92415C (anagrafica_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE faldone ADD CONSTRAINT FK_DB09DFA5C3B3A27F FOREIGN KEY (archivio_id) REFERENCES archivio (id)');
        $this->addSql('ALTER TABLE fascicolo ADD CONSTRAINT FK_6CAE6249C68E3B14 FOREIGN KEY (faldone_id) REFERENCES faldone (id)');
        $this->addSql('ALTER TABLE internato ADD CONSTRAINT FK_1416A9BA7E92415C FOREIGN KEY (anagrafica_id) REFERENCES anagrafica (id)');
        $this->addSql('DROP INDEX IDX_79106A50A9A74515 ON comune');
        $this->addSql('DROP INDEX IDX_79106A501FF88B6A ON comune');
        $this->addSql('ALTER TABLE comune ADD provincia_id_id INT NOT NULL, ADD stato_id_id INT NOT NULL, DROP provincia_id, DROP stato_id');
        $this->addSql('ALTER TABLE comune ADD CONSTRAINT FK_79106A501FF88B6A FOREIGN KEY (provincia_id_id) REFERENCES provincia (id)');
        $this->addSql('ALTER TABLE comune ADD CONSTRAINT FK_79106A50A9A74515 FOREIGN KEY (stato_id_id) REFERENCES stato (id)');
        $this->addSql('CREATE INDEX IDX_79106A50A9A74515 ON comune (stato_id_id)');
        $this->addSql('CREATE INDEX IDX_79106A501FF88B6A ON comune (provincia_id_id)');
        $this->addSql('DROP INDEX UNIQ_1BEE1B64F4849EB6 ON dati_vitali');
        $this->addSql('ALTER TABLE dati_vitali CHANGE anagrafica_id anagrafica_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE dati_vitali ADD CONSTRAINT FK_1BEE1B64F4849EB6 FOREIGN KEY (anagrafica_id_id) REFERENCES anagrafica (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1BEE1B64F4849EB6 ON dati_vitali (anagrafica_id_id)');
        $this->addSql('DROP INDEX UNIQ_BDE60B0699CA9BD5 ON tipo_relazione');
        $this->addSql('ALTER TABLE tipo_relazione CHANGE opposto opposto_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tipo_relazione ADD CONSTRAINT FK_BDE60B0699CA9BD5 FOREIGN KEY (opposto_id) REFERENCES tipo_relazione (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_BDE60B0699CA9BD5 ON tipo_relazione (opposto_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE faldone DROP FOREIGN KEY FK_DB09DFA5C3B3A27F');
        $this->addSql('ALTER TABLE fascicolo DROP FOREIGN KEY FK_6CAE6249C68E3B14');
        $this->addSql('ALTER TABLE internato DROP FOREIGN KEY FK_1416A9BA7E92415C');
        $this->addSql('DROP TABLE faldone');
        $this->addSql('DROP TABLE fascicolo');
        $this->addSql('DROP TABLE internato');
        $this->addSql('ALTER TABLE tipo_relazione DROP FOREIGN KEY FK_BDE60B0699CA9BD5');
        $this->addSql('DROP INDEX UNIQ_BDE60B0699CA9BD5 ON tipo_relazione');
        $this->addSql('ALTER TABLE tipo_relazione CHANGE opposto_id opposto INT DEFAULT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_BDE60B0699CA9BD5 ON tipo_relazione (opposto)');
        $this->addSql('ALTER TABLE comune DROP FOREIGN KEY FK_79106A501FF88B6A');
        $this->addSql('ALTER TABLE comune DROP FOREIGN KEY FK_79106A50A9A74515');
        $this->addSql('DROP INDEX IDX_79106A501FF88B6A ON comune');
        $this->addSql('DROP INDEX IDX_79106A50A9A74515 ON comune');
        $this->addSql('ALTER TABLE comune ADD provincia_id INT NOT NULL, ADD stato_id INT NOT NULL, DROP provincia_id_id, DROP stato_id_id');
        $this->addSql('CREATE INDEX IDX_79106A501FF88B6A ON comune (provincia_id)');
        $this->addSql('CREATE INDEX IDX_79106A50A9A74515 ON comune (stato_id)');
        $this->addSql('ALTER TABLE dati_vitali DROP FOREIGN KEY FK_1BEE1B64F4849EB6');
        $this->addSql('DROP INDEX UNIQ_1BEE1B64F4849EB6 ON dati_vitali');
        $this->addSql('ALTER TABLE dati_vitali CHANGE anagrafica_id_id anagrafica_id INT NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1BEE1B64F4849EB6 ON dati_vitali (anagrafica_id)');
    }
}
