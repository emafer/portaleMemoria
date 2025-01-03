<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250102162331 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE documento_anagrafica (id INT AUTO_INCREMENT NOT NULL, tipo_relazione_id INT NOT NULL, INDEX IDX_2103BDBBC85127B9 (tipo_relazione_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE documento_anagrafica_anagrafica (documento_anagrafica_id INT NOT NULL, anagrafica_id INT NOT NULL, INDEX IDX_BC701B96672855AF (documento_anagrafica_id), INDEX IDX_BC701B967E92415C (anagrafica_id), PRIMARY KEY(documento_anagrafica_id, anagrafica_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE documento_note_matita (id INT AUTO_INCREMENT NOT NULL, documento_id INT NOT NULL, testo_nota_matita VARCHAR(255) NOT NULL, INDEX IDX_9FB4E0F645C0CF75 (documento_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tipologia_relazione_anagrafica_documento (id INT AUTO_INCREMENT NOT NULL, nome VARCHAR(50) NOT NULL, abbr VARCHAR(4) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE documento_anagrafica ADD CONSTRAINT FK_2103BDBBC85127B9 FOREIGN KEY (tipo_relazione_id) REFERENCES tipologia_relazione_anagrafica_documento (id)');
        $this->addSql('ALTER TABLE documento_anagrafica_anagrafica ADD CONSTRAINT FK_BC701B96672855AF FOREIGN KEY (documento_anagrafica_id) REFERENCES documento_anagrafica (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE documento_anagrafica_anagrafica ADD CONSTRAINT FK_BC701B967E92415C FOREIGN KEY (anagrafica_id) REFERENCES anagrafica (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE documento_note_matita ADD CONSTRAINT FK_9FB4E0F645C0CF75 FOREIGN KEY (documento_id) REFERENCES documento_documento (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE documento_anagrafica DROP FOREIGN KEY FK_2103BDBBC85127B9');
        $this->addSql('ALTER TABLE documento_anagrafica_anagrafica DROP FOREIGN KEY FK_BC701B96672855AF');
        $this->addSql('ALTER TABLE documento_anagrafica_anagrafica DROP FOREIGN KEY FK_BC701B967E92415C');
        $this->addSql('ALTER TABLE documento_note_matita DROP FOREIGN KEY FK_9FB4E0F645C0CF75');
        $this->addSql('DROP TABLE documento_anagrafica');
        $this->addSql('DROP TABLE documento_anagrafica_anagrafica');
        $this->addSql('DROP TABLE documento_note_matita');
        $this->addSql('DROP TABLE tipologia_relazione_anagrafica_documento');
    }
}
