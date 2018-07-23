<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180723083912 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, email VARCHAR(255) NOT NULL, telephone VARCHAR(20) NOT NULL, adresse VARCHAR(255) DEFAULT NULL, code_postale VARCHAR(5) DEFAULT NULL, ville VARCHAR(50) DEFAULT NULL, UNIQUE INDEX UNIQ_C7440455A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE coiffeur (id INT AUTO_INCREMENT NOT NULL, salon_id INT DEFAULT NULL, nom VARCHAR(100) NOT NULL, INDEX IDX_C323A4F54C91BDE4 (salon_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE coiffeur_prestation_composee (coiffeur_id INT NOT NULL, prestation_composee_id INT NOT NULL, INDEX IDX_3718EF9BBD427C57 (coiffeur_id), INDEX IDX_3718EF9BE5FF9437 (prestation_composee_id), PRIMARY KEY(coiffeur_id, prestation_composee_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE disponibilite (id INT AUTO_INCREMENT NOT NULL, coiffeur_id INT DEFAULT NULL, date DATE NOT NULL, heure_debut TIME NOT NULL, heure_fin TIME NOT NULL, etat VARCHAR(25) NOT NULL, archive TINYINT(1) NOT NULL, INDEX IDX_2CBACE2FBD427C57 (coiffeur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etape (id INT AUTO_INCREMENT NOT NULL, prestation_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, duree INT NOT NULL, ressource TINYINT(1) NOT NULL, INDEX IDX_285F75DD9E45C554 (prestation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prestation (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, duree INT NOT NULL, tarif NUMERIC(6, 2) NOT NULL, genre VARCHAR(20) NOT NULL, type_cheveux VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prestation_prestation_composee (prestation_id INT NOT NULL, prestation_composee_id INT NOT NULL, INDEX IDX_3E1840CF9E45C554 (prestation_id), INDEX IDX_3E1840CFE5FF9437 (prestation_composee_id), PRIMARY KEY(prestation_id, prestation_composee_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prestation_client (id INT AUTO_INCREMENT NOT NULL, reservation_id INT DEFAULT NULL, disponibilite_id INT DEFAULT NULL, heure_debut TIME NOT NULL, heure_fin TIME NOT NULL, INDEX IDX_5D393CA8B83297E7 (reservation_id), INDEX IDX_5D393CA82B9D6493 (disponibilite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prestation_client_prestation_composee (prestation_client_id INT NOT NULL, prestation_composee_id INT NOT NULL, INDEX IDX_45A2F4E9DDC3842 (prestation_client_id), INDEX IDX_45A2F4EE5FF9437 (prestation_composee_id), PRIMARY KEY(prestation_client_id, prestation_composee_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prestation_composee (id INT AUTO_INCREMENT NOT NULL, salon_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, tarif NUMERIC(6, 2) NOT NULL, genre VARCHAR(20) NOT NULL, type_cheveux VARCHAR(30) NOT NULL, INDEX IDX_92B03E0C4C91BDE4 (salon_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, numero VARCHAR(25) NOT NULL, created_at DATETIME NOT NULL, tarif NUMERIC(6, 2) NOT NULL, INDEX IDX_42C8495519EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salon (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, code_postale VARCHAR(5) NOT NULL, ville VARCHAR(25) NOT NULL, email VARCHAR(255) NOT NULL, telephone VARCHAR(20) NOT NULL, note INT NOT NULL, horaire LONGTEXT DEFAULT NULL, perimetre NUMERIC(6, 2) DEFAULT NULL, UNIQUE INDEX UNIQ_F268F417A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, roles LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE coiffeur ADD CONSTRAINT FK_C323A4F54C91BDE4 FOREIGN KEY (salon_id) REFERENCES salon (id)');
        $this->addSql('ALTER TABLE coiffeur_prestation_composee ADD CONSTRAINT FK_3718EF9BBD427C57 FOREIGN KEY (coiffeur_id) REFERENCES coiffeur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE coiffeur_prestation_composee ADD CONSTRAINT FK_3718EF9BE5FF9437 FOREIGN KEY (prestation_composee_id) REFERENCES prestation_composee (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE disponibilite ADD CONSTRAINT FK_2CBACE2FBD427C57 FOREIGN KEY (coiffeur_id) REFERENCES coiffeur (id)');
        $this->addSql('ALTER TABLE etape ADD CONSTRAINT FK_285F75DD9E45C554 FOREIGN KEY (prestation_id) REFERENCES prestation (id)');
        $this->addSql('ALTER TABLE prestation_prestation_composee ADD CONSTRAINT FK_3E1840CF9E45C554 FOREIGN KEY (prestation_id) REFERENCES prestation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE prestation_prestation_composee ADD CONSTRAINT FK_3E1840CFE5FF9437 FOREIGN KEY (prestation_composee_id) REFERENCES prestation_composee (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE prestation_client ADD CONSTRAINT FK_5D393CA8B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id)');
        $this->addSql('ALTER TABLE prestation_client ADD CONSTRAINT FK_5D393CA82B9D6493 FOREIGN KEY (disponibilite_id) REFERENCES disponibilite (id)');
        $this->addSql('ALTER TABLE prestation_client_prestation_composee ADD CONSTRAINT FK_45A2F4E9DDC3842 FOREIGN KEY (prestation_client_id) REFERENCES prestation_client (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE prestation_client_prestation_composee ADD CONSTRAINT FK_45A2F4EE5FF9437 FOREIGN KEY (prestation_composee_id) REFERENCES prestation_composee (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE prestation_composee ADD CONSTRAINT FK_92B03E0C4C91BDE4 FOREIGN KEY (salon_id) REFERENCES salon (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495519EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE salon ADD CONSTRAINT FK_F268F417A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495519EB6921');
        $this->addSql('ALTER TABLE coiffeur_prestation_composee DROP FOREIGN KEY FK_3718EF9BBD427C57');
        $this->addSql('ALTER TABLE disponibilite DROP FOREIGN KEY FK_2CBACE2FBD427C57');
        $this->addSql('ALTER TABLE prestation_client DROP FOREIGN KEY FK_5D393CA82B9D6493');
        $this->addSql('ALTER TABLE etape DROP FOREIGN KEY FK_285F75DD9E45C554');
        $this->addSql('ALTER TABLE prestation_prestation_composee DROP FOREIGN KEY FK_3E1840CF9E45C554');
        $this->addSql('ALTER TABLE prestation_client_prestation_composee DROP FOREIGN KEY FK_45A2F4E9DDC3842');
        $this->addSql('ALTER TABLE coiffeur_prestation_composee DROP FOREIGN KEY FK_3718EF9BE5FF9437');
        $this->addSql('ALTER TABLE prestation_prestation_composee DROP FOREIGN KEY FK_3E1840CFE5FF9437');
        $this->addSql('ALTER TABLE prestation_client_prestation_composee DROP FOREIGN KEY FK_45A2F4EE5FF9437');
        $this->addSql('ALTER TABLE prestation_client DROP FOREIGN KEY FK_5D393CA8B83297E7');
        $this->addSql('ALTER TABLE coiffeur DROP FOREIGN KEY FK_C323A4F54C91BDE4');
        $this->addSql('ALTER TABLE prestation_composee DROP FOREIGN KEY FK_92B03E0C4C91BDE4');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455A76ED395');
        $this->addSql('ALTER TABLE salon DROP FOREIGN KEY FK_F268F417A76ED395');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE coiffeur');
        $this->addSql('DROP TABLE coiffeur_prestation_composee');
        $this->addSql('DROP TABLE disponibilite');
        $this->addSql('DROP TABLE etape');
        $this->addSql('DROP TABLE prestation');
        $this->addSql('DROP TABLE prestation_prestation_composee');
        $this->addSql('DROP TABLE prestation_client');
        $this->addSql('DROP TABLE prestation_client_prestation_composee');
        $this->addSql('DROP TABLE prestation_composee');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE salon');
        $this->addSql('DROP TABLE user');
    }
}
