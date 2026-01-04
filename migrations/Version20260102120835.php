<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260102120835 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE projet_technologie (projet_id INT NOT NULL, technologie_id INT NOT NULL, PRIMARY KEY(projet_id, technologie_id))');
        $this->addSql('CREATE INDEX IDX_76BB624AC18272 ON projet_technologie (projet_id)');
        $this->addSql('CREATE INDEX IDX_76BB624A261A27D2 ON projet_technologie (technologie_id)');
        $this->addSql('ALTER TABLE projet_technologie ADD CONSTRAINT FK_76BB624AC18272 FOREIGN KEY (projet_id) REFERENCES projet (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE projet_technologie ADD CONSTRAINT FK_76BB624A261A27D2 FOREIGN KEY (technologie_id) REFERENCES technologie (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE projet DROP CONSTRAINT fk_50159ca951f3c1bc');
        $this->addSql('DROP INDEX idx_50159ca951f3c1bc');
        $this->addSql('ALTER TABLE projet DROP techno_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE projet_technologie DROP CONSTRAINT FK_76BB624AC18272');
        $this->addSql('ALTER TABLE projet_technologie DROP CONSTRAINT FK_76BB624A261A27D2');
        $this->addSql('DROP TABLE projet_technologie');
        $this->addSql('ALTER TABLE projet ADD techno_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE projet ADD CONSTRAINT fk_50159ca951f3c1bc FOREIGN KEY (techno_id) REFERENCES technologie (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_50159ca951f3c1bc ON projet (techno_id)');
    }
}
