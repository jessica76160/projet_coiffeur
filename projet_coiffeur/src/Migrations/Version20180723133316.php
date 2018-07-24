<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180723133316 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE prestation_composee CHANGE genre genre VARCHAR(20) DEFAULT NULL, CHANGE type_cheveux type_cheveux VARCHAR(30) DEFAULT NULL');
        $this->addSql('ALTER TABLE salon ADD longitude VARCHAR(255) NOT NULL, ADD latitude NUMERIC(10, 0) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE prestation_composee CHANGE genre genre VARCHAR(20) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE type_cheveux type_cheveux VARCHAR(30) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE salon DROP longitude, DROP latitude');
    }
}
