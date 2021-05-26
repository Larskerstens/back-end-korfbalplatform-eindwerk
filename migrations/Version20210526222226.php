<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210526222226 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE persoon ADD team_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE persoon ADD CONSTRAINT FK_D8419A4BB842D717 FOREIGN KEY (team_id_id) REFERENCES team (id)');
        $this->addSql('CREATE INDEX IDX_D8419A4BB842D717 ON persoon (team_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE persoon DROP FOREIGN KEY FK_D8419A4BB842D717');
        $this->addSql('DROP INDEX IDX_D8419A4BB842D717 ON persoon');
        $this->addSql('ALTER TABLE persoon DROP team_id_id');
    }
}
