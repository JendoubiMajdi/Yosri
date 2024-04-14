<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240413100248 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reservations_equipements (reservations_id INT NOT NULL, equipements_id INT NOT NULL, INDEX IDX_2A6AE999D9A7F869 (reservations_id), INDEX IDX_2A6AE999852CCFF5 (equipements_id), PRIMARY KEY(reservations_id, equipements_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reservations_equipements ADD CONSTRAINT FK_2A6AE999D9A7F869 FOREIGN KEY (reservations_id) REFERENCES reservations (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservations_equipements ADD CONSTRAINT FK_2A6AE999852CCFF5 FOREIGN KEY (equipements_id) REFERENCES equipements (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE equipements DROP FOREIGN KEY FK_3F02D86BD9A7F869');
        $this->addSql('DROP INDEX IDX_3F02D86BD9A7F869 ON equipements');
        $this->addSql('ALTER TABLE equipements DROP reservations_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservations_equipements DROP FOREIGN KEY FK_2A6AE999D9A7F869');
        $this->addSql('ALTER TABLE reservations_equipements DROP FOREIGN KEY FK_2A6AE999852CCFF5');
        $this->addSql('DROP TABLE reservations_equipements');
        $this->addSql('ALTER TABLE equipements ADD reservations_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE equipements ADD CONSTRAINT FK_3F02D86BD9A7F869 FOREIGN KEY (reservations_id) REFERENCES reservations (id)');
        $this->addSql('CREATE INDEX IDX_3F02D86BD9A7F869 ON equipements (reservations_id)');
    }
}
