<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190217102333 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE scheduled_activity ADD room_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE scheduled_activity ADD CONSTRAINT FK_DDA14B8554177093 FOREIGN KEY (room_id) REFERENCES room (id)');
        $this->addSql('CREATE INDEX IDX_DDA14B8554177093 ON scheduled_activity (room_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE scheduled_activity DROP FOREIGN KEY FK_DDA14B8554177093');
        $this->addSql('DROP INDEX IDX_DDA14B8554177093 ON scheduled_activity');
        $this->addSql('ALTER TABLE scheduled_activity DROP room_id');
    }
}
