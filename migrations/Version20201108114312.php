<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201108114312 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD axe_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6492E30CD41 FOREIGN KEY (axe_id) REFERENCES axe (id)');
        $this->addSql('CREATE INDEX IDX_8D93D6492E30CD41 ON user (axe_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6492E30CD41');
        $this->addSql('DROP INDEX IDX_8D93D6492E30CD41 ON user');
        $this->addSql('ALTER TABLE user DROP axe_id');
    }
}
