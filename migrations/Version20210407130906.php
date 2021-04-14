<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210407130906 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE offer_candidate (offer_id INT NOT NULL, candidate_id INT NOT NULL, INDEX IDX_6B77F38053C674EE (offer_id), INDEX IDX_6B77F38091BD8781 (candidate_id), PRIMARY KEY(offer_id, candidate_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE offer_candidate ADD CONSTRAINT FK_6B77F38053C674EE FOREIGN KEY (offer_id) REFERENCES offer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE offer_candidate ADD CONSTRAINT FK_6B77F38091BD8781 FOREIGN KEY (candidate_id) REFERENCES candidate (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article ADD new_comment_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E6625569EDF FOREIGN KEY (new_comment_id) REFERENCES comment (id)');
        $this->addSql('CREATE INDEX IDX_23A0E6625569EDF ON article (new_comment_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE offer_candidate');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E6625569EDF');
        $this->addSql('DROP INDEX IDX_23A0E6625569EDF ON article');
        $this->addSql('ALTER TABLE article DROP new_comment_id');
    }
}
