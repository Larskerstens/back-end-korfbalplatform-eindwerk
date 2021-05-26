<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210526225117 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE wedstrijd ADD team_id_id INT DEFAULT NULL, ADD club_thuis_id INT DEFAULT NULL, ADD club_uit_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE wedstrijd ADD CONSTRAINT FK_4720FB2FB842D717 FOREIGN KEY (team_id_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE wedstrijd ADD CONSTRAINT FK_4720FB2FD99D7236 FOREIGN KEY (club_thuis_id) REFERENCES club (id)');
        $this->addSql('ALTER TABLE wedstrijd ADD CONSTRAINT FK_4720FB2F269DBF8E FOREIGN KEY (club_uit_id) REFERENCES club (id)');
        $this->addSql('CREATE INDEX IDX_4720FB2FB842D717 ON wedstrijd (team_id_id)');
        $this->addSql('CREATE INDEX IDX_4720FB2FD99D7236 ON wedstrijd (club_thuis_id)');
        $this->addSql('CREATE INDEX IDX_4720FB2F269DBF8E ON wedstrijd (club_uit_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE wedstrijd DROP FOREIGN KEY FK_4720FB2FB842D717');
        $this->addSql('ALTER TABLE wedstrijd DROP FOREIGN KEY FK_4720FB2FD99D7236');
        $this->addSql('ALTER TABLE wedstrijd DROP FOREIGN KEY FK_4720FB2F269DBF8E');
        $this->addSql('DROP INDEX IDX_4720FB2FB842D717 ON wedstrijd');
        $this->addSql('DROP INDEX IDX_4720FB2FD99D7236 ON wedstrijd');
        $this->addSql('DROP INDEX IDX_4720FB2F269DBF8E ON wedstrijd');
        $this->addSql('ALTER TABLE wedstrijd DROP team_id_id, DROP club_thuis_id, DROP club_uit_id');
    }
}
