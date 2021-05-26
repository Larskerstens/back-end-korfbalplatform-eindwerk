<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210526223001 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE persoon ADD postcode_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE persoon ADD CONSTRAINT FK_D8419A4B7FE358F1 FOREIGN KEY (postcode_id_id) REFERENCES postcode (id)');
        $this->addSql('CREATE INDEX IDX_D8419A4B7FE358F1 ON persoon (postcode_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE persoon DROP FOREIGN KEY FK_D8419A4B7FE358F1');
        $this->addSql('DROP INDEX IDX_D8419A4B7FE358F1 ON persoon');
        $this->addSql('ALTER TABLE persoon DROP postcode_id_id');
    }
}
