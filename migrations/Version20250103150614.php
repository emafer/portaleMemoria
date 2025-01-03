<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250103150614 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE documento_anagrafica ADD anagrafica_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE documento_anagrafica ADD CONSTRAINT FK_2103BDBB7E92415C FOREIGN KEY (anagrafica_id) REFERENCES anagrafica (id)');
        $this->addSql('CREATE INDEX IDX_2103BDBB7E92415C ON documento_anagrafica (anagrafica_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE documento_anagrafica DROP FOREIGN KEY FK_2103BDBB7E92415C');
        $this->addSql('DROP INDEX IDX_2103BDBB7E92415C ON documento_anagrafica');
        $this->addSql('ALTER TABLE documento_anagrafica DROP anagrafica_id');
    }
}
