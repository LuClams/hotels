<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221102110441 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE slideimage ADD CONSTRAINT FK_AFD89A90FC68ACC0 FOREIGN KEY (hostel_id) REFERENCES hostel (id)');
        $this->addSql('CREATE INDEX IDX_AFD89A90FC68ACC0 ON slideimage (hostel_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE slideimage DROP FOREIGN KEY FK_AFD89A90FC68ACC0');
        $this->addSql('DROP INDEX IDX_AFD89A90FC68ACC0 ON slideimage');
    }
}
