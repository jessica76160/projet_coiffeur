<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180713095159 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE coiffeur_prestation_composee (coiffeur_id INT NOT NULL, prestation_composee_id INT NOT NULL, INDEX IDX_3718EF9BBD427C57 (coiffeur_id), INDEX IDX_3718EF9BE5FF9437 (prestation_composee_id), PRIMARY KEY(coiffeur_id, prestation_composee_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prestation_prestation_composee (prestation_id INT NOT NULL, prestation_composee_id INT NOT NULL, INDEX IDX_3E1840CF9E45C554 (prestation_id), INDEX IDX_3E1840CFE5FF9437 (prestation_composee_id), PRIMARY KEY(prestation_id, prestation_composee_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE coiffeur_prestation_composee ADD CONSTRAINT FK_3718EF9BBD427C57 FOREIGN KEY (coiffeur_id) REFERENCES coiffeur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE coiffeur_prestation_composee ADD CONSTRAINT FK_3718EF9BE5FF9437 FOREIGN KEY (prestation_composee_id) REFERENCES prestation_composee (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE prestation_prestation_composee ADD CONSTRAINT FK_3E1840CF9E45C554 FOREIGN KEY (prestation_id) REFERENCES prestation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE prestation_prestation_composee ADD CONSTRAINT FK_3E1840CFE5FF9437 FOREIGN KEY (prestation_composee_id) REFERENCES prestation_composee (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE disponibilite ADD coiffeur_id INT NOT NULL');
        $this->addSql('ALTER TABLE disponibilite ADD CONSTRAINT FK_2CBACE2FBD427C57 FOREIGN KEY (coiffeur_id) REFERENCES coiffeur (id)');
        $this->addSql('CREATE INDEX IDX_2CBACE2FBD427C57 ON disponibilite (coiffeur_id)');
        $this->addSql('ALTER TABLE etape ADD prestation_id INT NOT NULL');
        $this->addSql('ALTER TABLE etape ADD CONSTRAINT FK_285F75DD9E45C554 FOREIGN KEY (prestation_id) REFERENCES prestation (id)');
        $this->addSql('CREATE INDEX IDX_285F75DD9E45C554 ON etape (prestation_id)');
        $this->addSql('ALTER TABLE prestation_client ADD reservation_id INT DEFAULT NULL, ADD disponibilite_id INT NOT NULL, ADD prestation_composee_id INT NOT NULL');
        $this->addSql('ALTER TABLE prestation_client ADD CONSTRAINT FK_5D393CA8B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id)');
        $this->addSql('ALTER TABLE prestation_client ADD CONSTRAINT FK_5D393CA82B9D6493 FOREIGN KEY (disponibilite_id) REFERENCES disponibilite (id)');
        $this->addSql('ALTER TABLE prestation_client ADD CONSTRAINT FK_5D393CA8E5FF9437 FOREIGN KEY (prestation_composee_id) REFERENCES prestation_composee (id)');
        $this->addSql('CREATE INDEX IDX_5D393CA8B83297E7 ON prestation_client (reservation_id)');
        $this->addSql('CREATE INDEX IDX_5D393CA82B9D6493 ON prestation_client (disponibilite_id)');
        $this->addSql('CREATE INDEX IDX_5D393CA8E5FF9437 ON prestation_client (prestation_composee_id)');
        $this->addSql('ALTER TABLE prestation_composee ADD salon_id INT NOT NULL');
        $this->addSql('ALTER TABLE prestation_composee ADD CONSTRAINT FK_92B03E0C4C91BDE4 FOREIGN KEY (salon_id) REFERENCES salon (id)');
        $this->addSql('CREATE INDEX IDX_92B03E0C4C91BDE4 ON prestation_composee (salon_id)');
        $this->addSql('ALTER TABLE reservation ADD client_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495519EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('CREATE INDEX IDX_42C8495519EB6921 ON reservation (client_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE coiffeur_prestation_composee');
        $this->addSql('DROP TABLE prestation_prestation_composee');
        $this->addSql('ALTER TABLE disponibilite DROP FOREIGN KEY FK_2CBACE2FBD427C57');
        $this->addSql('DROP INDEX IDX_2CBACE2FBD427C57 ON disponibilite');
        $this->addSql('ALTER TABLE disponibilite DROP coiffeur_id');
        $this->addSql('ALTER TABLE etape DROP FOREIGN KEY FK_285F75DD9E45C554');
        $this->addSql('DROP INDEX IDX_285F75DD9E45C554 ON etape');
        $this->addSql('ALTER TABLE etape DROP prestation_id');
        $this->addSql('ALTER TABLE prestation_client DROP FOREIGN KEY FK_5D393CA8B83297E7');
        $this->addSql('ALTER TABLE prestation_client DROP FOREIGN KEY FK_5D393CA82B9D6493');
        $this->addSql('ALTER TABLE prestation_client DROP FOREIGN KEY FK_5D393CA8E5FF9437');
        $this->addSql('DROP INDEX IDX_5D393CA8B83297E7 ON prestation_client');
        $this->addSql('DROP INDEX IDX_5D393CA82B9D6493 ON prestation_client');
        $this->addSql('DROP INDEX IDX_5D393CA8E5FF9437 ON prestation_client');
        $this->addSql('ALTER TABLE prestation_client DROP reservation_id, DROP disponibilite_id, DROP prestation_composee_id');
        $this->addSql('ALTER TABLE prestation_composee DROP FOREIGN KEY FK_92B03E0C4C91BDE4');
        $this->addSql('DROP INDEX IDX_92B03E0C4C91BDE4 ON prestation_composee');
        $this->addSql('ALTER TABLE prestation_composee DROP salon_id');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495519EB6921');
        $this->addSql('DROP INDEX IDX_42C8495519EB6921 ON reservation');
        $this->addSql('ALTER TABLE reservation DROP client_id');
    }
}
