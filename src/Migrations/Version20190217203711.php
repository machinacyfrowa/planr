<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190217203711 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE activity (id INT AUTO_INCREMENT NOT NULL, room_id INT DEFAULT NULL, begin DATETIME NOT NULL, end DATETIME NOT NULL, name VARCHAR(255) NOT NULL, student_group VARCHAR(255) NOT NULL, lecturer VARCHAR(255) NOT NULL, INDEX IDX_AC74095A54177093 (room_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE activity ADD CONSTRAINT FK_AC74095A54177093 FOREIGN KEY (room_id) REFERENCES room (id)');
        $this->addSql('DROP TABLE scheduled_activity');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE scheduled_activity (id INT AUTO_INCREMENT NOT NULL, room_id INT DEFAULT NULL, begin DATETIME NOT NULL, end DATETIME NOT NULL, name VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, student_group VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, lecturer VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, INDEX IDX_DDA14B8554177093 (room_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE scheduled_activity ADD CONSTRAINT FK_DDA14B8554177093 FOREIGN KEY (room_id) REFERENCES room (id)');
        $this->addSql('DROP TABLE activity');
    }
}
