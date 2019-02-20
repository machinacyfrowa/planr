<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190217215041 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE activity ADD course_id INT DEFAULT NULL, ADD tutor_id INT DEFAULT NULL, ADD division_id INT DEFAULT NULL, DROP name, DROP student_group, DROP lecturer');
        $this->addSql('ALTER TABLE activity ADD CONSTRAINT FK_AC74095A591CC992 FOREIGN KEY (course_id) REFERENCES course (id)');
        $this->addSql('ALTER TABLE activity ADD CONSTRAINT FK_AC74095A208F64F1 FOREIGN KEY (tutor_id) REFERENCES tutor (id)');
        $this->addSql('ALTER TABLE activity ADD CONSTRAINT FK_AC74095A41859289 FOREIGN KEY (division_id) REFERENCES division (id)');
        $this->addSql('CREATE INDEX IDX_AC74095A591CC992 ON activity (course_id)');
        $this->addSql('CREATE INDEX IDX_AC74095A208F64F1 ON activity (tutor_id)');
        $this->addSql('CREATE INDEX IDX_AC74095A41859289 ON activity (division_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE activity DROP FOREIGN KEY FK_AC74095A591CC992');
        $this->addSql('ALTER TABLE activity DROP FOREIGN KEY FK_AC74095A208F64F1');
        $this->addSql('ALTER TABLE activity DROP FOREIGN KEY FK_AC74095A41859289');
        $this->addSql('DROP INDEX IDX_AC74095A591CC992 ON activity');
        $this->addSql('DROP INDEX IDX_AC74095A208F64F1 ON activity');
        $this->addSql('DROP INDEX IDX_AC74095A41859289 ON activity');
        $this->addSql('ALTER TABLE activity ADD name VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD student_group VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD lecturer VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, DROP course_id, DROP tutor_id, DROP division_id');
    }
}
