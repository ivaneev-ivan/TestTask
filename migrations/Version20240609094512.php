<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240609094512 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__item_image AS SELECT id, item_id, img FROM item_image');
        $this->addSql('DROP TABLE item_image');
        $this->addSql('CREATE TABLE item_image (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, item_id INTEGER NOT NULL, img VARCHAR(255) NOT NULL, CONSTRAINT FK_EF9A1F8F126F525E FOREIGN KEY (item_id) REFERENCES item (id) ON UPDATE NO ACTION ON DELETE NO ACTION NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO item_image (id, item_id, img) SELECT id, item_id, img FROM __temp__item_image');
        $this->addSql('DROP TABLE __temp__item_image');
        $this->addSql('CREATE INDEX IDX_EF9A1F8F126F525E ON item_image (item_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__item_image AS SELECT id, item_id, img FROM item_image');
        $this->addSql('DROP TABLE item_image');
        $this->addSql('CREATE TABLE item_image (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, item_id INTEGER NOT NULL, img BLOB NOT NULL, CONSTRAINT FK_EF9A1F8F126F525E FOREIGN KEY (item_id) REFERENCES item (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO item_image (id, item_id, img) SELECT id, item_id, img FROM __temp__item_image');
        $this->addSql('DROP TABLE __temp__item_image');
        $this->addSql('CREATE INDEX IDX_EF9A1F8F126F525E ON item_image (item_id)');
    }
}
