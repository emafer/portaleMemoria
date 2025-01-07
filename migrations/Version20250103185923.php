<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250103185923 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE anagrafica (id INT AUTO_INCREMENT NOT NULL, cognome VARCHAR(255) NOT NULL, nome VARCHAR(255) DEFAULT NULL, secondo_nome VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE archivio (id INT AUTO_INCREMENT NOT NULL, descrizione VARCHAR(255) NOT NULL, abbr VARCHAR(40) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE campo (id INT AUTO_INCREMENT NOT NULL, comune_id INT NOT NULL, nome VARCHAR(255) NOT NULL, data_creazione DATE DEFAULT NULL, INDEX IDX_291737AA885878B0 (comune_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comune (id INT AUTO_INCREMENT NOT NULL, provincia_id INT NOT NULL, stato_id INT NOT NULL, nome VARCHAR(255) NOT NULL, INDEX IDX_79106A504E7121AF (provincia_id), INDEX IDX_79106A506A65DCA5 (stato_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dati_vitali (id INT AUTO_INCREMENT NOT NULL, anagrafica_id INT NOT NULL, data_di_nascita DATE DEFAULT NULL, data_di_morte DATE DEFAULT NULL, UNIQUE INDEX UNIQ_1BEE1B647E92415C (anagrafica_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE documento_anagrafica (id INT AUTO_INCREMENT NOT NULL, anagrafica_id INT DEFAULT NULL, tipo_relazione_id INT NOT NULL, documento_id INT NOT NULL, INDEX IDX_2103BDBB7E92415C (anagrafica_id), INDEX IDX_2103BDBBC85127B9 (tipo_relazione_id), INDEX IDX_2103BDBB45C0CF75 (documento_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE documento_documento (id INT AUTO_INCREMENT NOT NULL, documento_di_riferimento_id INT DEFAULT NULL, tipologia_contenuto_id INT DEFAULT NULL, tipologia_documento_id INT DEFAULT NULL, oggetto VARCHAR(255) NOT NULL, data DATE DEFAULT NULL, data_fittizia SMALLINT NOT NULL, note LONGTEXT DEFAULT NULL, protocollo VARCHAR(50) DEFAULT NULL, descrizione VARCHAR(255) DEFAULT NULL, INDEX IDX_72846F9032EA4A71 (documento_di_riferimento_id), INDEX IDX_72846F90B00CD03B (tipologia_contenuto_id), INDEX IDX_72846F909EE21B50 (tipologia_documento_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE documento_note_matita (id INT AUTO_INCREMENT NOT NULL, documento_id INT NOT NULL, testo_nota_matita VARCHAR(255) NOT NULL, INDEX IDX_9FB4E0F645C0CF75 (documento_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE faldone (id INT AUTO_INCREMENT NOT NULL, archivio_id INT NOT NULL, descrizione VARCHAR(255) NOT NULL, classificazione VARCHAR(50) NOT NULL, note LONGTEXT DEFAULT NULL, INDEX IDX_DB09DFA5C3B3A27F (archivio_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fascicolo (id INT AUTO_INCREMENT NOT NULL, faldone_id INT NOT NULL, nome VARCHAR(255) NOT NULL, note LONGTEXT DEFAULT NULL, INDEX IDX_6CAE6249C68E3B14 (faldone_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE indirizzo (id INT AUTO_INCREMENT NOT NULL, comune_id INT DEFAULT NULL, anagrafica_id INT NOT NULL, start DATE DEFAULT NULL, end DATE DEFAULT NULL, indirizzo VARCHAR(255) NOT NULL, INDEX IDX_172DACA9885878B0 (comune_id), INDEX IDX_172DACA97E92415C (anagrafica_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE internato (id INT AUTO_INCREMENT NOT NULL, anagrafica_id INT NOT NULL, morto_shoah SMALLINT NOT NULL, UNIQUE INDEX UNIQ_1416A9BA7E92415C (anagrafica_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE internato_fascicolo (internato_id INT NOT NULL, fascicolo_id INT NOT NULL, INDEX IDX_D9A46C6225990C13 (internato_id), INDEX IDX_D9A46C627FAFF4D9 (fascicolo_id), PRIMARY KEY(internato_id, fascicolo_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE provincia (id INT AUTO_INCREMENT NOT NULL, nome VARCHAR(255) NOT NULL, regione VARCHAR(255) NOT NULL, sigla VARCHAR(2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ruolo (id INT AUTO_INCREMENT NOT NULL, nome VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stato (id INT AUTO_INCREMENT NOT NULL, nome VARCHAR(255) NOT NULL, cittadinanza VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tipo_relazione (id INT AUTO_INCREMENT NOT NULL, opposto_id INT DEFAULT NULL, nome VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_BDE60B0699CA9BD5 (opposto_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tipologia_contenuto (id INT AUTO_INCREMENT NOT NULL, descrizione VARCHAR(100) NOT NULL, abbr VARCHAR(4) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tipologia_documento (id INT AUTO_INCREMENT NOT NULL, descrizione VARCHAR(100) NOT NULL, abbr VARCHAR(4) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tipologia_relazione_anagrafica_documento (id INT AUTO_INCREMENT NOT NULL, nome VARCHAR(50) NOT NULL, abbr VARCHAR(4) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id VARCHAR(255) NOT NULL, username VARCHAR(180) NOT NULL, username_canonical VARCHAR(180) NOT NULL, email VARCHAR(180) NOT NULL, email_canonical VARCHAR(180) NOT NULL, enabled TINYINT(1) NOT NULL, salt VARCHAR(255) DEFAULT NULL, password VARCHAR(255) NOT NULL, last_login DATETIME DEFAULT NULL, confirmation_token VARCHAR(180) DEFAULT NULL, password_requested_at DATETIME DEFAULT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', UNIQUE INDEX UNIQ_8D93D64992FC23A8 (username_canonical), UNIQUE INDEX UNIQ_8D93D649A0D96FBF (email_canonical), UNIQUE INDEX UNIQ_8D93D649C05FB297 (confirmation_token), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE campo ADD CONSTRAINT FK_291737AA885878B0 FOREIGN KEY (comune_id) REFERENCES comune (id)');
        $this->addSql('ALTER TABLE comune ADD CONSTRAINT FK_79106A504E7121AF FOREIGN KEY (provincia_id) REFERENCES provincia (id)');
        $this->addSql('ALTER TABLE comune ADD CONSTRAINT FK_79106A506A65DCA5 FOREIGN KEY (stato_id) REFERENCES stato (id)');
        $this->addSql('ALTER TABLE dati_vitali ADD CONSTRAINT FK_1BEE1B647E92415C FOREIGN KEY (anagrafica_id) REFERENCES anagrafica (id)');
        $this->addSql('ALTER TABLE documento_anagrafica ADD CONSTRAINT FK_2103BDBB7E92415C FOREIGN KEY (anagrafica_id) REFERENCES anagrafica (id)');
        $this->addSql('ALTER TABLE documento_anagrafica ADD CONSTRAINT FK_2103BDBBC85127B9 FOREIGN KEY (tipo_relazione_id) REFERENCES tipologia_relazione_anagrafica_documento (id)');
        $this->addSql('ALTER TABLE documento_anagrafica ADD CONSTRAINT FK_2103BDBB45C0CF75 FOREIGN KEY (documento_id) REFERENCES documento_documento (id)');
        $this->addSql('ALTER TABLE documento_documento ADD CONSTRAINT FK_72846F9032EA4A71 FOREIGN KEY (documento_di_riferimento_id) REFERENCES documento_documento (id)');
        $this->addSql('ALTER TABLE documento_documento ADD CONSTRAINT FK_72846F90B00CD03B FOREIGN KEY (tipologia_contenuto_id) REFERENCES tipologia_contenuto (id)');
        $this->addSql('ALTER TABLE documento_documento ADD CONSTRAINT FK_72846F909EE21B50 FOREIGN KEY (tipologia_documento_id) REFERENCES tipologia_documento (id)');
        $this->addSql('ALTER TABLE documento_note_matita ADD CONSTRAINT FK_9FB4E0F645C0CF75 FOREIGN KEY (documento_id) REFERENCES documento_documento (id)');
        $this->addSql('ALTER TABLE faldone ADD CONSTRAINT FK_DB09DFA5C3B3A27F FOREIGN KEY (archivio_id) REFERENCES archivio (id)');
        $this->addSql('ALTER TABLE fascicolo ADD CONSTRAINT FK_6CAE6249C68E3B14 FOREIGN KEY (faldone_id) REFERENCES faldone (id)');
        $this->addSql('ALTER TABLE indirizzo ADD CONSTRAINT FK_172DACA9885878B0 FOREIGN KEY (comune_id) REFERENCES comune (id)');
        $this->addSql('ALTER TABLE indirizzo ADD CONSTRAINT FK_172DACA97E92415C FOREIGN KEY (anagrafica_id) REFERENCES anagrafica (id)');
        $this->addSql('ALTER TABLE internato ADD CONSTRAINT FK_1416A9BA7E92415C FOREIGN KEY (anagrafica_id) REFERENCES anagrafica (id)');
        $this->addSql('ALTER TABLE internato_fascicolo ADD CONSTRAINT FK_D9A46C6225990C13 FOREIGN KEY (internato_id) REFERENCES internato (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE internato_fascicolo ADD CONSTRAINT FK_D9A46C627FAFF4D9 FOREIGN KEY (fascicolo_id) REFERENCES fascicolo (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tipo_relazione ADD CONSTRAINT FK_BDE60B0699CA9BD5 FOREIGN KEY (opposto_id) REFERENCES tipo_relazione (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE campo DROP FOREIGN KEY FK_291737AA885878B0');
        $this->addSql('ALTER TABLE comune DROP FOREIGN KEY FK_79106A504E7121AF');
        $this->addSql('ALTER TABLE comune DROP FOREIGN KEY FK_79106A506A65DCA5');
        $this->addSql('ALTER TABLE dati_vitali DROP FOREIGN KEY FK_1BEE1B647E92415C');
        $this->addSql('ALTER TABLE documento_anagrafica DROP FOREIGN KEY FK_2103BDBB7E92415C');
        $this->addSql('ALTER TABLE documento_anagrafica DROP FOREIGN KEY FK_2103BDBBC85127B9');
        $this->addSql('ALTER TABLE documento_anagrafica DROP FOREIGN KEY FK_2103BDBB45C0CF75');
        $this->addSql('ALTER TABLE documento_documento DROP FOREIGN KEY FK_72846F9032EA4A71');
        $this->addSql('ALTER TABLE documento_documento DROP FOREIGN KEY FK_72846F90B00CD03B');
        $this->addSql('ALTER TABLE documento_documento DROP FOREIGN KEY FK_72846F909EE21B50');
        $this->addSql('ALTER TABLE documento_note_matita DROP FOREIGN KEY FK_9FB4E0F645C0CF75');
        $this->addSql('ALTER TABLE faldone DROP FOREIGN KEY FK_DB09DFA5C3B3A27F');
        $this->addSql('ALTER TABLE fascicolo DROP FOREIGN KEY FK_6CAE6249C68E3B14');
        $this->addSql('ALTER TABLE indirizzo DROP FOREIGN KEY FK_172DACA9885878B0');
        $this->addSql('ALTER TABLE indirizzo DROP FOREIGN KEY FK_172DACA97E92415C');
        $this->addSql('ALTER TABLE internato DROP FOREIGN KEY FK_1416A9BA7E92415C');
        $this->addSql('ALTER TABLE internato_fascicolo DROP FOREIGN KEY FK_D9A46C6225990C13');
        $this->addSql('ALTER TABLE internato_fascicolo DROP FOREIGN KEY FK_D9A46C627FAFF4D9');
        $this->addSql('ALTER TABLE tipo_relazione DROP FOREIGN KEY FK_BDE60B0699CA9BD5');
        $this->addSql('DROP TABLE anagrafica');
        $this->addSql('DROP TABLE archivio');
        $this->addSql('DROP TABLE campo');
        $this->addSql('DROP TABLE comune');
        $this->addSql('DROP TABLE dati_vitali');
        $this->addSql('DROP TABLE documento_anagrafica');
        $this->addSql('DROP TABLE documento_documento');
        $this->addSql('DROP TABLE documento_note_matita');
        $this->addSql('DROP TABLE faldone');
        $this->addSql('DROP TABLE fascicolo');
        $this->addSql('DROP TABLE indirizzo');
        $this->addSql('DROP TABLE internato');
        $this->addSql('DROP TABLE internato_fascicolo');
        $this->addSql('DROP TABLE provincia');
        $this->addSql('DROP TABLE ruolo');
        $this->addSql('DROP TABLE stato');
        $this->addSql('DROP TABLE tipo_relazione');
        $this->addSql('DROP TABLE tipologia_contenuto');
        $this->addSql('DROP TABLE tipologia_documento');
        $this->addSql('DROP TABLE tipologia_relazione_anagrafica_documento');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
