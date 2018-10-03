<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181003105806 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE auteur (idauteur INT AUTO_INCREMENT NOT NULL, id INT DEFAULT NULL, INDEX fk_auteur_User1_idx (id), PRIMARY KEY(idauteur)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contenu_formation (idcontenu_formation INT AUTO_INCREMENT NOT NULL, idtest INT DEFAULT NULL, idimage INT DEFAULT NULL, idvideo INT DEFAULT NULL, idformation INT DEFAULT NULL, idContenutext INT DEFAULT NULL, INDEX fk_contenu_formation_fonmation1_idx (idformation), INDEX fk_contenu_formation_contenu_img1_idx (idimage), INDEX fk_contenu_formation_contenu_video1_idx (idvideo), INDEX fk_contenu_formation_Contenutext1_idx (idContenutext), INDEX fk_contenu_formation_ContenuTest1_idx (idtest), PRIMARY KEY(idcontenu_formation)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE auteur ADD CONSTRAINT FK_55AB140BF396750 FOREIGN KEY (id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE contenu_formation ADD CONSTRAINT FK_B129B67CBB08FAC FOREIGN KEY (idtest) REFERENCES contenutest (idtest)');
        $this->addSql('ALTER TABLE contenu_formation ADD CONSTRAINT FK_B129B67CBE363E00 FOREIGN KEY (idContenutext) REFERENCES contenutext (idContenutext)');
        $this->addSql('ALTER TABLE contenu_formation ADD CONSTRAINT FK_B129B67C13386846 FOREIGN KEY (idimage) REFERENCES contenu_img (idcontenu_img)');
        $this->addSql('ALTER TABLE contenu_formation ADD CONSTRAINT FK_B129B67CAAC2B635 FOREIGN KEY (idvideo) REFERENCES contenu_video (idvideo)');
        $this->addSql('ALTER TABLE contenu_formation ADD CONSTRAINT FK_B129B67C3E5B884A FOREIGN KEY (idformation) REFERENCES formation (idformation)');
        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY fk_formation_user1');
        $this->addSql('DROP INDEX fk_formation_user1_idx ON formation');
        $this->addSql('ALTER TABLE formation ADD idauteur INT DEFAULT NULL, DROP auter_id');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BF61E71CEC FOREIGN KEY (idauteur) REFERENCES auteur (idauteur)');
        $this->addSql('CREATE INDEX fk_formation_auteur1_idx ON formation (idauteur)');
        $this->addSql('ALTER TABLE formation_has_contenu_img RENAME INDEX fk_formation_has_contenu_img_formation1_idx TO IDX_C9779C0361A6A891');
        $this->addSql('ALTER TABLE formation_has_contenu_img RENAME INDEX fk_formation_has_contenu_img_contenu_img1_idx TO IDX_C9779C033D0276FF');
        $this->addSql('ALTER TABLE formation_has_contenu_video RENAME INDEX fk_formation_has_contenu_video_formation1_idx TO IDX_395E9D5261A6A891');
        $this->addSql('ALTER TABLE formation_has_contenu_video RENAME INDEX fk_formation_has_contenu_video_contenu_video1_idx TO IDX_395E9D52AD0EA261');
        $this->addSql('ALTER TABLE formation_has_contenutest RENAME INDEX fk_formation_has_contenutest_formation1_idx TO IDX_E7A1335961A6A891');
        $this->addSql('ALTER TABLE formation_has_contenutest RENAME INDEX fk_formation_has_contenutest_contenutest1_idx TO IDX_E7A13359FDBE8267');
        $this->addSql('ALTER TABLE formation_has_contenutext RENAME INDEX fk_formation_has_contenutext_formation1_idx TO IDX_455EA9261A6A891');
        $this->addSql('ALTER TABLE formation_has_contenutext RENAME INDEX fk_formation_has_contenutext_contenutext1_idx TO IDX_455EA928A543A08');
        $this->addSql('ALTER TABLE feedback ADD dateadd DATE NOT NULL');
        $this->addSql('ALTER TABLE user ADD prenom VARCHAR(255) DEFAULT NULL, ADD poste VARCHAR(255) DEFAULT NULL, ADD nom VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY FK_404021BF61E71CEC');
        $this->addSql('DROP TABLE auteur');
        $this->addSql('DROP TABLE contenu_formation');
        $this->addSql('ALTER TABLE feedback DROP dateadd');
        $this->addSql('DROP INDEX fk_formation_auteur1_idx ON formation');
        $this->addSql('ALTER TABLE formation ADD auter_id INT NOT NULL, DROP idauteur');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT fk_formation_user1 FOREIGN KEY (auter_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX fk_formation_user1_idx ON formation (auter_id)');
        $this->addSql('ALTER TABLE formation_has_contenu_img RENAME INDEX idx_c9779c033d0276ff TO fk_formation_has_contenu_img_contenu_img1_idx');
        $this->addSql('ALTER TABLE formation_has_contenu_img RENAME INDEX idx_c9779c0361a6a891 TO fk_formation_has_contenu_img_formation1_idx');
        $this->addSql('ALTER TABLE formation_has_contenu_video RENAME INDEX idx_395e9d52ad0ea261 TO fk_formation_has_contenu_video_contenu_video1_idx');
        $this->addSql('ALTER TABLE formation_has_contenu_video RENAME INDEX idx_395e9d5261a6a891 TO fk_formation_has_contenu_video_formation1_idx');
        $this->addSql('ALTER TABLE formation_has_contenutest RENAME INDEX idx_e7a13359fdbe8267 TO fk_formation_has_contenutest_contenutest1_idx');
        $this->addSql('ALTER TABLE formation_has_contenutest RENAME INDEX idx_e7a1335961a6a891 TO fk_formation_has_contenutest_formation1_idx');
        $this->addSql('ALTER TABLE formation_has_contenutext RENAME INDEX idx_455ea928a543a08 TO fk_formation_has_contenutext_contenutext1_idx');
        $this->addSql('ALTER TABLE formation_has_contenutext RENAME INDEX idx_455ea9261a6a891 TO fk_formation_has_contenutext_formation1_idx');
        $this->addSql('ALTER TABLE user DROP prenom, DROP poste, DROP nom');
    }
}
