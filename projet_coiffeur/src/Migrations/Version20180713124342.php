<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180713124342 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE prestation_client_prestation_composee (prestation_client_id INT NOT NULL, prestation_composee_id INT NOT NULL, INDEX IDX_45A2F4E9DDC3842 (prestation_client_id), INDEX IDX_45A2F4EE5FF9437 (prestation_composee_id), PRIMARY KEY(prestation_client_id, prestation_composee_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE prestation_client_prestation_composee ADD CONSTRAINT FK_45A2F4E9DDC3842 FOREIGN KEY (prestation_client_id) REFERENCES prestation_client (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE prestation_client_prestation_composee ADD CONSTRAINT FK_45A2F4EE5FF9437 FOREIGN KEY (prestation_composee_id) REFERENCES prestation_composee (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE disponibilite CHANGE coiffeur_id coiffeur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE prestation_client DROP FOREIGN KEY FK_5D393CA8E5FF9437');
        $this->addSql('DROP INDEX IDX_5D393CA8E5FF9437 ON prestation_client');
        $this->addSql('ALTER TABLE prestation_client DROP prestation_composee_id, CHANGE disponibilite_id disponibilite_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE prestation_client_prestation_composee');
        $this->addSql('ALTER TABLE disponibilite CHANGE coiffeur_id coiffeur_id INT NOT NULL');
        $this->addSql('ALTER TABLE prestation_client ADD prestation_composee_id INT NOT NULL, CHANGE disponibilite_id disponibilite_id INT NOT NULL');
        $this->addSql('ALTER TABLE prestation_client ADD CONSTRAINT FK_5D393CA8E5FF9437 FOREIGN KEY (prestation_composee_id) REFERENCES prestation_composee (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_5D393CA8E5FF9437 ON prestation_client (prestation_composee_id)');
    }
}
