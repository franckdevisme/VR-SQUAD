<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181002154805 extends AbstractMigration
{
    public function down(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE formation_has_contenu_img');
        $this->addSql('DROP TABLE formation_has_contenu_video');
        $this->addSql('DROP TABLE formation_has_contenutest');
        $this->addSql('DROP TABLE formation_has_contenutext');
    }

    public function up(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE formation_has_contenu_img (formation_idformation INT NOT NULL, contenu_img_idcontenu_img INT NOT NULL, INDEX fk_formation_has_contenu_img_contenu_img1_idx (contenu_img_idcontenu_img), INDEX fk_formation_has_contenu_img_formation1_idx (formation_idformation), PRIMARY KEY(formation_idformation, contenu_img_idcontenu_img)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation_has_contenu_video (formation_idformation INT NOT NULL, contenu_video_idvideo INT NOT NULL, INDEX fk_formation_has_contenu_video_contenu_video1_idx (contenu_video_idvideo), INDEX fk_formation_has_contenu_video_formation1_idx (formation_idformation), PRIMARY KEY(formation_idformation, contenu_video_idvideo)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation_has_contenutest (formation_idformation INT NOT NULL, contenutest_idtest INT NOT NULL, INDEX fk_formation_has_contenutest_contenutest1_idx (contenutest_idtest), INDEX fk_formation_has_contenutest_formation1_idx (formation_idformation), PRIMARY KEY(formation_idformation, contenutest_idtest)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation_has_contenutext (formation_idformation INT NOT NULL, contenutext_idContenutext INT NOT NULL, INDEX fk_formation_has_contenutext_contenutext1_idx (contenutext_idContenutext), INDEX fk_formation_has_contenutext_formation1_idx (formation_idformation), PRIMARY KEY(formation_idformation, contenutext_idContenutext)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE formation_has_contenu_img ADD CONSTRAINT fk_formation_has_contenu_img_contenu_img1 FOREIGN KEY (contenu_img_idcontenu_img) REFERENCES contenu_img (idcontenu_img) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE formation_has_contenu_img ADD CONSTRAINT fk_formation_has_contenu_img_formation1 FOREIGN KEY (formation_idformation) REFERENCES formation (idformation) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE formation_has_contenu_video ADD CONSTRAINT fk_formation_has_contenu_video_contenu_video1 FOREIGN KEY (contenu_video_idvideo) REFERENCES contenu_video (idvideo) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE formation_has_contenu_video ADD CONSTRAINT fk_formation_has_contenu_video_formation1 FOREIGN KEY (formation_idformation) REFERENCES formation (idformation) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE formation_has_contenutest ADD CONSTRAINT fk_formation_has_contenutest_contenutest1 FOREIGN KEY (contenutest_idtest) REFERENCES contenutest (idtest) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE formation_has_contenutest ADD CONSTRAINT fk_formation_has_contenutest_formation1 FOREIGN KEY (formation_idformation) REFERENCES formation (idformation) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE formation_has_contenutext ADD CONSTRAINT fk_formation_has_contenutext_contenutext1 FOREIGN KEY (contenutext_idContenutext) REFERENCES contenutext (idContenutext) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE formation_has_contenutext ADD CONSTRAINT fk_formation_has_contenutext_formation1 FOREIGN KEY (formation_idformation) REFERENCES formation (idformation) ON UPDATE NO ACTION ON DELETE NO ACTION');
    }
}
