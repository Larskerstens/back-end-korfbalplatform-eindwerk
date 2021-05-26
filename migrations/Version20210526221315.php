<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210526221315 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE team ADD club_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE team ADD CONSTRAINT FK_C4E0A61FDF2AB4E5 FOREIGN KEY (club_id_id) REFERENCES club (id)');
        $this->addSql('CREATE INDEX IDX_C4E0A61FDF2AB4E5 ON team (club_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE team DROP FOREIGN KEY FK_C4E0A61FDF2AB4E5');
        $this->addSql('DROP INDEX IDX_C4E0A61FDF2AB4E5 ON team');
        $this->addSql('ALTER TABLE team DROP club_id_id');
    }
}
