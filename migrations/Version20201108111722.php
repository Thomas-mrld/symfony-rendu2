<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201108111722 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE axe ADD ecole_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE axe ADD CONSTRAINT FK_6C6A1E2C77EF1B1E FOREIGN KEY (ecole_id) REFERENCES ecole (id)');
        $this->addSql('CREATE INDEX IDX_6C6A1E2C77EF1B1E ON axe (ecole_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE axe DROP FOREIGN KEY FK_6C6A1E2C77EF1B1E');
        $this->addSql('DROP INDEX IDX_6C6A1E2C77EF1B1E ON axe');
        $this->addSql('ALTER TABLE axe DROP ecole_id');
    }
}
