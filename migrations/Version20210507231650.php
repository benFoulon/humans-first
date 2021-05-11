<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210507231650 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E6625569EDF');
        $this->addSql('DROP INDEX IDX_23A0E6625569EDF ON article');
        $this->addSql('ALTER TABLE article DROP new_comment_id, DROP udpdated_date');
        $this->addSql('ALTER TABLE comment DROP mail');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article ADD new_comment_id INT DEFAULT NULL, ADD udpdated_date DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E6625569EDF FOREIGN KEY (new_comment_id) REFERENCES comment (id)');
        $this->addSql('CREATE INDEX IDX_23A0E6625569EDF ON article (new_comment_id)');
        $this->addSql('ALTER TABLE comment ADD mail VARCHAR(150) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
