<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240606183708 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE item (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, color_id INTEGER NOT NULL, text CLOB NOT NULL, CONSTRAINT FK_1F1B251E7ADA1FB5 FOREIGN KEY (color_id) REFERENCES color (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_1F1B251E7ADA1FB5 ON item (color_id)');
        $this->addSql('CREATE TABLE item_image (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, item_id INTEGER NOT NULL, img BLOB NOT NULL, CONSTRAINT FK_EF9A1F8F126F525E FOREIGN KEY (item_id) REFERENCES item (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_EF9A1F8F126F525E ON item_image (item_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE item');
        $this->addSql('DROP TABLE item_image');
    }
}
