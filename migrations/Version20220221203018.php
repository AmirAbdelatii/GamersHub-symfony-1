<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220221203018 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE teams ADD match1_id INT DEFAULT NULL, CHANGE matchs_id matchs_id INT NOT NULL, CHANGE verified verified TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE teams ADD CONSTRAINT FK_96C22258B9F6E4DE FOREIGN KEY (match1_id) REFERENCES matchs (id)');
        $this->addSql('CREATE INDEX IDX_96C22258B9F6E4DE ON teams (match1_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE game CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE image image VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE matchs CHANGE result result VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE teams DROP FOREIGN KEY FK_96C22258B9F6E4DE');
        $this->addSql('DROP INDEX IDX_96C22258B9F6E4DE ON teams');
        $this->addSql('ALTER TABLE teams DROP match1_id, CHANGE matchs_id matchs_id INT DEFAULT NULL, CHANGE team_name team_name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE verified verified TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE username username VARCHAR(180) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE roles roles LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:json)\', CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE email email VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE second_name second_name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}