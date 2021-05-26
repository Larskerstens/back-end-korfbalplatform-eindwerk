<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210526230419 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE groep ADD agenda_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE groep ADD CONSTRAINT FK_27025694EA67784A FOREIGN KEY (agenda_id) REFERENCES agenda (id)');
        $this->addSql('CREATE INDEX IDX_27025694EA67784A ON groep (agenda_id)');
        $this->addSql('ALTER TABLE training ADD agenda_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE training ADD CONSTRAINT FK_D5128A8FEA67784A FOREIGN KEY (agenda_id) REFERENCES agenda (id)');
        $this->addSql('CREATE INDEX IDX_D5128A8FEA67784A ON training (agenda_id)');
        $this->addSql('ALTER TABLE wedstrijd ADD agenda_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE wedstrijd ADD CONSTRAINT FK_4720FB2FEA67784A FOREIGN KEY (agenda_id) REFERENCES agenda (id)');
        $this->addSql('CREATE INDEX IDX_4720FB2FEA67784A ON wedstrijd (agenda_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE groep DROP FOREIGN KEY FK_27025694EA67784A');
        $this->addSql('DROP INDEX IDX_27025694EA67784A ON groep');
        $this->addSql('ALTER TABLE groep DROP agenda_id');
        $this->addSql('ALTER TABLE training DROP FOREIGN KEY FK_D5128A8FEA67784A');
        $this->addSql('DROP INDEX IDX_D5128A8FEA67784A ON training');
        $this->addSql('ALTER TABLE training DROP agenda_id');
        $this->addSql('ALTER TABLE wedstrijd DROP FOREIGN KEY FK_4720FB2FEA67784A');
        $this->addSql('DROP INDEX IDX_4720FB2FEA67784A ON wedstrijd');
        $this->addSql('ALTER TABLE wedstrijd DROP agenda_id');
    }
}
