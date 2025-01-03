<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250102114439 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE indirizzo (id INT AUTO_INCREMENT NOT NULL, comune_id INT DEFAULT NULL, anagrafica_id INT NOT NULL, start DATE DEFAULT NULL, end DATE DEFAULT NULL, indirizzo VARCHAR(255) NOT NULL, INDEX IDX_172DACA9885878B0 (comune_id), INDEX IDX_172DACA97E92415C (anagrafica_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE indirizzo ADD CONSTRAINT FK_172DACA9885878B0 FOREIGN KEY (comune_id) REFERENCES comune (id)');
        $this->addSql('ALTER TABLE indirizzo ADD CONSTRAINT FK_172DACA97E92415C FOREIGN KEY (anagrafica_id) REFERENCES anagrafica (id)');
     }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE indirizzo DROP FOREIGN KEY FK_172DACA9885878B0');
        $this->addSql('ALTER TABLE indirizzo DROP FOREIGN KEY FK_172DACA97E92415C');
        $this->addSql('DROP TABLE indirizzo');
    }
}
