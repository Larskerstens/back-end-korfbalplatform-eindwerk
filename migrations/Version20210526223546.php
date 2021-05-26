<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210526223546 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE persoon_groep (persoon_id INT NOT NULL, groep_id INT NOT NULL, INDEX IDX_F32124C690FBB45F (persoon_id), INDEX IDX_F32124C69EB44EC5 (groep_id), PRIMARY KEY(persoon_id, groep_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE persoon_groep ADD CONSTRAINT FK_F32124C690FBB45F FOREIGN KEY (persoon_id) REFERENCES persoon (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE persoon_groep ADD CONSTRAINT FK_F32124C69EB44EC5 FOREIGN KEY (groep_id) REFERENCES groep (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE persoon_groep');
    }
}
