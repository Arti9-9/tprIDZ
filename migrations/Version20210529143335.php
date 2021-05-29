<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210529143335 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE equipment_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE functional_unit_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE group_parameter_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE equipment (id INT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(1024) DEFAULT NULL, techical_index DOUBLE PRECISION DEFAULT NULL, reliability DOUBLE PRECISION DEFAULT NULL, date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE functional_unit (id INT NOT NULL, equipment_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, weight DOUBLE PRECISION NOT NULL, appraisal INT NOT NULL, date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_42FBD6DA517FE9FE ON functional_unit (equipment_id)');
        $this->addSql('CREATE TABLE group_parameter (id INT NOT NULL, functional_unit_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, weight DOUBLE PRECISION NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_EA24CDF11B523C99 ON group_parameter (functional_unit_id)');
        $this->addSql('ALTER TABLE functional_unit ADD CONSTRAINT FK_42FBD6DA517FE9FE FOREIGN KEY (equipment_id) REFERENCES equipment (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE group_parameter ADD CONSTRAINT FK_EA24CDF11B523C99 FOREIGN KEY (functional_unit_id) REFERENCES functional_unit (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE functional_unit DROP CONSTRAINT FK_42FBD6DA517FE9FE');
        $this->addSql('ALTER TABLE group_parameter DROP CONSTRAINT FK_EA24CDF11B523C99');
        $this->addSql('DROP SEQUENCE equipment_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE functional_unit_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE group_parameter_id_seq CASCADE');
        $this->addSql('DROP TABLE equipment');
        $this->addSql('DROP TABLE functional_unit');
        $this->addSql('DROP TABLE group_parameter');
    }
}
