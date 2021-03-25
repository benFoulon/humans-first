<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210316144155 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, publication_date DATE NOT NULL, title VARCHAR(190) NOT NULL, excerpt LONGTEXT NOT NULL, content LONGTEXT NOT NULL, udpdated_date DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE candidate (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(110) NOT NULL, lastname VARCHAR(110) NOT NULL, mail VARCHAR(190) NOT NULL, phone VARCHAR(15) NOT NULL, town VARCHAR(190) NOT NULL, cv LONGBLOB NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(150) NOT NULL, mail VARCHAR(150) NOT NULL, content LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(110) NOT NULL, lastname VARCHAR(110) NOT NULL, type VARCHAR(100) NOT NULL, town VARCHAR(190) NOT NULL, business_name VARCHAR(190) NOT NULL, mail VARCHAR(190) NOT NULL, phone VARCHAR(15) NOT NULL, object VARCHAR(190) NOT NULL, content LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE offer (id INT AUTO_INCREMENT NOT NULL, publication_date DATE NOT NULL, reference VARCHAR(10) NOT NULL, title VARCHAR(190) NOT NULL, description LONGTEXT NOT NULL, profile LONGTEXT NOT NULL, location VARCHAR(190) NOT NULL, vacant_position INT DEFAULT NULL, experience LONGTEXT NOT NULL, status VARCHAR(190) DEFAULT NULL, date_start VARCHAR(190) NOT NULL, contract_type VARCHAR(190) NOT NULL, weekly_work_time VARCHAR(190) NOT NULL, remuneration LONGTEXT NOT NULL, further_information LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE spontaneous_candidacy (id INT AUTO_INCREMENT NOT NULL, fisrtname VARCHAR(110) NOT NULL, lastname VARCHAR(110) NOT NULL, mail VARCHAR(190) NOT NULL, phone VARCHAR(15) NOT NULL, town VARCHAR(190) NOT NULL, highest_qualification VARCHAR(190) NOT NULL, activity_domain VARCHAR(190) NOT NULL, cv LONGBLOB NOT NULL, motivation_letter LONGBLOB NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE candidate');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE offer');
        $this->addSql('DROP TABLE spontaneous_candidacy');
    }
}
