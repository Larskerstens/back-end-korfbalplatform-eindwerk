<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210526222555 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE club ADD postcode_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE club ADD CONSTRAINT FK_B8EE38727FE358F1 FOREIGN KEY (postcode_id_id) REFERENCES postcode (id)');
        $this->addSql('CREATE INDEX IDX_B8EE38727FE358F1 ON club (postcode_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE club DROP FOREIGN KEY FK_B8EE38727FE358F1');
        $this->addSql('DROP INDEX IDX_B8EE38727FE358F1 ON club');
        $this->addSql('ALTER TABLE club DROP postcode_id_id');
    }
}
