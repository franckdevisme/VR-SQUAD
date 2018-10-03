<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181002095943 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE feedback CHANGE dateadd dateadd DATE NOT NULL');
        $this->addSql('ALTER TABLE formation CHANGE display_pour_user display_pour_user BLOB NOT NULL, CHANGE isvalide isvalide BLOB NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE feedback CHANGE dateadd dateadd DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE Formation CHANGE display_pour_user display_pour_user TINYINT(1) NOT NULL, CHANGE isvalide isvalide TINYINT(1) NOT NULL');
    }
}
