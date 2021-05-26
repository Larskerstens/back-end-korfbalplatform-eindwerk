<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210526224155 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE training ADD team_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE training ADD CONSTRAINT FK_D5128A8FB842D717 FOREIGN KEY (team_id_id) REFERENCES team (id)');
        $this->addSql('CREATE INDEX IDX_D5128A8FB842D717 ON training (team_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE training DROP FOREIGN KEY FK_D5128A8FB842D717');
        $this->addSql('DROP INDEX IDX_D5128A8FB842D717 ON training');
        $this->addSql('ALTER TABLE training DROP team_id_id');
    }
}
