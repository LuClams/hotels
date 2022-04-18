<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220417182447 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE booking ADD booker_id INT NOT NULL, ADD room_id INT NOT NULL, ADD start_date VARCHAR(255) NOT NULL COMMENT \'(DC2Type:dateinterval)\', ADD end_date VARCHAR(255) NOT NULL COMMENT \'(DC2Type:dateinterval)\', ADD amount INT NOT NULL');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDE8B7E4006 FOREIGN KEY (booker_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDE54177093 FOREIGN KEY (room_id) REFERENCES room (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E00CEDDE8B7E4006 ON booking (booker_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E00CEDDE54177093 ON booking (room_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDE8B7E4006');
        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDE54177093');
        $this->addSql('DROP INDEX UNIQ_E00CEDDE8B7E4006 ON booking');
        $this->addSql('DROP INDEX UNIQ_E00CEDDE54177093 ON booking');
        $this->addSql('ALTER TABLE booking DROP booker_id, DROP room_id, DROP start_date, DROP end_date, DROP amount');
    }
}
