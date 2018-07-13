<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180713115148 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE coiffeur ADD salon_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE coiffeur ADD CONSTRAINT FK_C323A4F54C91BDE4 FOREIGN KEY (salon_id) REFERENCES salon (id)');
        $this->addSql('CREATE INDEX IDX_C323A4F54C91BDE4 ON coiffeur (salon_id)');
        $this->addSql('ALTER TABLE etape CHANGE prestation_id prestation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE prestation_composee CHANGE salon_id salon_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE coiffeur DROP FOREIGN KEY FK_C323A4F54C91BDE4');
        $this->addSql('DROP INDEX IDX_C323A4F54C91BDE4 ON coiffeur');
        $this->addSql('ALTER TABLE coiffeur DROP salon_id');
        $this->addSql('ALTER TABLE etape CHANGE prestation_id prestation_id INT NOT NULL');
        $this->addSql('ALTER TABLE prestation_composee CHANGE salon_id salon_id INT NOT NULL');
    }
}
