<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221031141007 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE booking DROP INDEX UNIQ_E00CEDDE8B7E4006, ADD INDEX IDX_E00CEDDE8B7E4006 (booker_id)');
        $this->addSql('ALTER TABLE booking DROP INDEX UNIQ_E00CEDDE54177093, ADD INDEX IDX_E00CEDDE54177093 (room_id)');
        $this->addSql('ALTER TABLE booking CHANGE start_date start_date DATETIME NOT NULL, CHANGE end_date end_date DATETIME NOT NULL, CHANGE amount amount DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE contact ADD name VARCHAR(255) NOT NULL, ADD email VARCHAR(255) NOT NULL, ADD message LONGTEXT NOT NULL, ADD sent_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE room ADD hostel_id INT NOT NULL, ADD supervisor_id INT DEFAULT NULL, ADD countrooms INT NOT NULL, CHANGE price price DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE room ADD CONSTRAINT FK_729F519BFC68ACC0 FOREIGN KEY (hostel_id) REFERENCES hostel (id)');
        $this->addSql('ALTER TABLE room ADD CONSTRAINT FK_729F519B19E9AC5F FOREIGN KEY (supervisor_id) REFERENCES supervisor (id)');
        $this->addSql('CREATE INDEX IDX_729F519BFC68ACC0 ON room (hostel_id)');
        $this->addSql('CREATE INDEX IDX_729F519B19E9AC5F ON room (supervisor_id)');
        $this->addSql('ALTER TABLE slideimage ADD CONSTRAINT FK_AFD89A9054177093 FOREIGN KEY (room_id) REFERENCES room (id)');
        $this->addSql('ALTER TABLE supervisor ADD CONSTRAINT FK_4D9192F8A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE supervisor ADD CONSTRAINT FK_4D9192F8FC68ACC0 FOREIGN KEY (hostel_id) REFERENCES hostel (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE booking DROP INDEX IDX_E00CEDDE8B7E4006, ADD UNIQUE INDEX UNIQ_E00CEDDE8B7E4006 (booker_id)');
        $this->addSql('ALTER TABLE booking DROP INDEX IDX_E00CEDDE54177093, ADD UNIQUE INDEX UNIQ_E00CEDDE54177093 (room_id)');
        $this->addSql('ALTER TABLE booking CHANGE start_date start_date VARCHAR(255) NOT NULL COMMENT \'(DC2Type:dateinterval)\', CHANGE end_date end_date VARCHAR(255) NOT NULL COMMENT \'(DC2Type:dateinterval)\', CHANGE amount amount INT NOT NULL');
        $this->addSql('ALTER TABLE contact DROP name, DROP email, DROP message, DROP sent_at');
        $this->addSql('ALTER TABLE room DROP FOREIGN KEY FK_729F519BFC68ACC0');
        $this->addSql('ALTER TABLE room DROP FOREIGN KEY FK_729F519B19E9AC5F');
        $this->addSql('DROP INDEX IDX_729F519BFC68ACC0 ON room');
        $this->addSql('DROP INDEX IDX_729F519B19E9AC5F ON room');
        $this->addSql('ALTER TABLE room DROP hostel_id, DROP supervisor_id, DROP countrooms, CHANGE price price INT NOT NULL');
        $this->addSql('ALTER TABLE slideimage DROP FOREIGN KEY FK_AFD89A9054177093');
        $this->addSql('ALTER TABLE supervisor DROP FOREIGN KEY FK_4D9192F8A76ED395');
        $this->addSql('ALTER TABLE supervisor DROP FOREIGN KEY FK_4D9192F8FC68ACC0');
    }
}
