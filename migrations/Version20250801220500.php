<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250801220500 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE calculate_histroy_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE calculatekk_histroy_id_seq CASCADE');
        $this->addSql('DROP TABLE calculate_histroy');
        $this->addSql('DROP TABLE calculatekk_histroy');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE calculate_histroy_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE calculatekk_histroy_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE calculate_histroy (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE calculatekk_histroy (id INT NOT NULL, PRIMARY KEY(id))');
    }
}
