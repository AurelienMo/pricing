<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211111134145 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cfg_category_course (id VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cfg_course (id VARCHAR(255) NOT NULL, cfg_category_course_id VARCHAR(255) DEFAULT NULL, name VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_5ECCD1CD6C6603C6 (cfg_category_course_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cfg_project (id VARCHAR(255) NOT NULL, cfg_course_id VARCHAR(255) DEFAULT NULL, cfg_tarification_id VARCHAR(255) DEFAULT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, number INT NOT NULL, INDEX IDX_78933775F5C7BAB8 (cfg_course_id), INDEX IDX_789337759E7BD353 (cfg_tarification_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cfg_tarification (id VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, code VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cfg_course ADD CONSTRAINT FK_5ECCD1CD6C6603C6 FOREIGN KEY (cfg_category_course_id) REFERENCES cfg_category_course (id)');
        $this->addSql('ALTER TABLE cfg_project ADD CONSTRAINT FK_78933775F5C7BAB8 FOREIGN KEY (cfg_course_id) REFERENCES cfg_course (id)');
        $this->addSql('ALTER TABLE cfg_project ADD CONSTRAINT FK_789337759E7BD353 FOREIGN KEY (cfg_tarification_id) REFERENCES cfg_tarification (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cfg_course DROP FOREIGN KEY FK_5ECCD1CD6C6603C6');
        $this->addSql('ALTER TABLE cfg_project DROP FOREIGN KEY FK_78933775F5C7BAB8');
        $this->addSql('ALTER TABLE cfg_project DROP FOREIGN KEY FK_789337759E7BD353');
        $this->addSql('DROP TABLE cfg_category_course');
        $this->addSql('DROP TABLE cfg_course');
        $this->addSql('DROP TABLE cfg_project');
        $this->addSql('DROP TABLE cfg_tarification');
    }
}
