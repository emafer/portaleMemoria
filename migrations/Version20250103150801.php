<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250103150801 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE internato_fascicolo (internato_id INT NOT NULL, fascicolo_id INT NOT NULL, INDEX IDX_D9A46C6225990C13 (internato_id), INDEX IDX_D9A46C627FAFF4D9 (fascicolo_id), PRIMARY KEY(internato_id, fascicolo_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE internato_fascicolo ADD CONSTRAINT FK_D9A46C6225990C13 FOREIGN KEY (internato_id) REFERENCES internato (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE internato_fascicolo ADD CONSTRAINT FK_D9A46C627FAFF4D9 FOREIGN KEY (fascicolo_id) REFERENCES fascicolo (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE internato_fascicolo DROP FOREIGN KEY FK_D9A46C6225990C13');
        $this->addSql('ALTER TABLE internato_fascicolo DROP FOREIGN KEY FK_D9A46C627FAFF4D9');
        $this->addSql('DROP TABLE internato_fascicolo');
    }
}
