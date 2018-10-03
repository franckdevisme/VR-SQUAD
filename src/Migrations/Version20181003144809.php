<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181003144809 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE application DROP FOREIGN KEY fk_application_formation');
        $this->addSql('DROP INDEX fk_application_formation_idx ON application');
        $this->addSql('ALTER TABLE application DROP idformation');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE application ADD idformation INT NOT NULL');
        $this->addSql('ALTER TABLE application ADD CONSTRAINT fk_application_formation FOREIGN KEY (idformation) REFERENCES formation (idformation) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX fk_application_formation_idx ON application (idformation)');
    }
}
