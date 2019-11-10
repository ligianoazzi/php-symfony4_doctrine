<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191103160504 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE animal ADD raca_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE animal ADD CONSTRAINT FK_6AAB231FE13B435A FOREIGN KEY (raca_id) REFERENCES raca (id)');
        $this->addSql('CREATE INDEX IDX_6AAB231FE13B435A ON animal (raca_id)');
        $this->addSql('ALTER TABLE raca ADD especie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE raca ADD CONSTRAINT FK_DD027FB6E70ED95B FOREIGN KEY (especie_id) REFERENCES especie (id)');
        $this->addSql('CREATE INDEX IDX_DD027FB6E70ED95B ON raca (especie_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE animal DROP FOREIGN KEY FK_6AAB231FE13B435A');
        $this->addSql('DROP INDEX IDX_6AAB231FE13B435A ON animal');
        $this->addSql('ALTER TABLE animal DROP raca_id');
        $this->addSql('ALTER TABLE raca DROP FOREIGN KEY FK_DD027FB6E70ED95B');
        $this->addSql('DROP INDEX IDX_DD027FB6E70ED95B ON raca');
        $this->addSql('ALTER TABLE raca DROP especie_id');
    }
}
