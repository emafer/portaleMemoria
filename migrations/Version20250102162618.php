<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250102162618 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE documento_anagrafica_anagrafica (documento_anagrafica_id INT NOT NULL, anagrafica_id INT NOT NULL, INDEX IDX_BC701B96672855AF (documento_anagrafica_id), INDEX IDX_BC701B967E92415C (anagrafica_id), PRIMARY KEY(documento_anagrafica_id, anagrafica_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE documento_anagrafica_anagrafica ADD CONSTRAINT FK_BC701B96672855AF FOREIGN KEY (documento_anagrafica_id) REFERENCES documento_anagrafica (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE documento_anagrafica_anagrafica ADD CONSTRAINT FK_BC701B967E92415C FOREIGN KEY (anagrafica_id) REFERENCES anagrafica (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE documento_anagrafica ADD documento_id INT NOT NULL');
        $this->addSql('ALTER TABLE documento_anagrafica ADD CONSTRAINT FK_2103BDBB45C0CF75 FOREIGN KEY (documento_id) REFERENCES documento_documento (id)');
        $this->addSql('CREATE INDEX IDX_2103BDBB45C0CF75 ON documento_anagrafica (documento_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE documento_anagrafica_anagrafica DROP FOREIGN KEY FK_BC701B96672855AF');
        $this->addSql('ALTER TABLE documento_anagrafica_anagrafica DROP FOREIGN KEY FK_BC701B967E92415C');
        $this->addSql('DROP TABLE documento_anagrafica_anagrafica');
        $this->addSql('ALTER TABLE documento_anagrafica DROP FOREIGN KEY FK_2103BDBB45C0CF75');
        $this->addSql('DROP INDEX IDX_2103BDBB45C0CF75 ON documento_anagrafica');
        $this->addSql('ALTER TABLE documento_anagrafica DROP documento_id');
    }
}
