<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210607104057 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE reliabilities_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE reliabilities_igr_p_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE techical_indexs_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE reliabilities (id INT NOT NULL, equipments_id INT DEFAULT NULL, value DOUBLE PRECISION DEFAULT NULL, date DATE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_4C20261ABD251DD7 ON reliabilities (equipments_id)');
        $this->addSql('CREATE TABLE reliabilities_igr_p (id INT NOT NULL, group_parametr_id INT DEFAULT NULL, value DOUBLE PRECISION NOT NULL, date DATE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_71E46D5DAA105910 ON reliabilities_igr_p (group_parametr_id)');
        $this->addSql('CREATE TABLE techical_indexs (id INT NOT NULL, equipment_id INT DEFAULT NULL, value DOUBLE PRECISION NOT NULL, date DATE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_1B2972D0517FE9FE ON techical_indexs (equipment_id)');
        $this->addSql('ALTER TABLE reliabilities ADD CONSTRAINT FK_4C20261ABD251DD7 FOREIGN KEY (equipments_id) REFERENCES equipment (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE reliabilities_igr_p ADD CONSTRAINT FK_71E46D5DAA105910 FOREIGN KEY (group_parametr_id) REFERENCES group_parameter (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE techical_indexs ADD CONSTRAINT FK_1B2972D0517FE9FE FOREIGN KEY (equipment_id) REFERENCES equipment (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE group_parameter ALTER weight SET NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE reliabilities_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE reliabilities_igr_p_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE techical_indexs_id_seq CASCADE');
        $this->addSql('DROP TABLE reliabilities');
        $this->addSql('DROP TABLE reliabilities_igr_p');
        $this->addSql('DROP TABLE techical_indexs');
        $this->addSql('ALTER TABLE group_parameter ALTER weight DROP NOT NULL');
    }
}
