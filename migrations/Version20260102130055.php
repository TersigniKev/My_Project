<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260102130055 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE picture (id SERIAL NOT NULL, url VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE projet_picture (projet_id INT NOT NULL, picture_id INT NOT NULL, PRIMARY KEY(projet_id, picture_id))');
        $this->addSql('CREATE INDEX IDX_94F112F8C18272 ON projet_picture (projet_id)');
        $this->addSql('CREATE INDEX IDX_94F112F8EE45BDBF ON projet_picture (picture_id)');
        $this->addSql('ALTER TABLE projet_picture ADD CONSTRAINT FK_94F112F8C18272 FOREIGN KEY (projet_id) REFERENCES projet (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE projet_picture ADD CONSTRAINT FK_94F112F8EE45BDBF FOREIGN KEY (picture_id) REFERENCES picture (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE projet_picture DROP CONSTRAINT FK_94F112F8C18272');
        $this->addSql('ALTER TABLE projet_picture DROP CONSTRAINT FK_94F112F8EE45BDBF');
        $this->addSql('DROP TABLE picture');
        $this->addSql('DROP TABLE projet_picture');
    }
}
