<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250102160002 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE campo (id INT AUTO_INCREMENT NOT NULL, comune_id INT NOT NULL, nome VARCHAR(255) NOT NULL, data_creazione DATE DEFAULT NULL, INDEX IDX_291737AA885878B0 (comune_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE campo ADD CONSTRAINT FK_291737AA885878B0 FOREIGN KEY (comune_id) REFERENCES comune (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE campo DROP FOREIGN KEY FK_291737AA885878B0');
        $this->addSql('DROP TABLE campo');
    }
}
