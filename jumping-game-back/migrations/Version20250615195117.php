<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250615195117 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE enemy (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, health INT NOT NULL, damage INT NOT NULL, speed DOUBLE PRECISION NOT NULL, size VARCHAR(255) NOT NULL, spawnfrequency DOUBLE PRECISION NOT NULL, imagepath VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE item (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, value INT NOT NULL, duration INT NOT NULL, imagepath VARCHAR(255) NOT NULL, effecttype VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE platform (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, positions DOUBLE PRECISION NOT NULL, positiony DOUBLE PRECISION NOT NULL, width DOUBLE PRECISION NOT NULL, height DOUBLE PRECISION NOT NULL, movement VARCHAR(255) NOT NULL, speed DOUBLE PRECISION NOT NULL, imagepath VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE player (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, lives INT NOT NULL, max_score INT NOT NULL, created_at DATETIME NOT NULL, has_weapon TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE projectile (id INT AUTO_INCREMENT NOT NULL, player_id INT DEFAULT NULL, speed DOUBLE PRECISION NOT NULL, direction VARCHAR(255) NOT NULL, damage INT NOT NULL, createdat DATETIME NOT NULL, imagepath VARCHAR(255) NOT NULL, INDEX IDX_3CFB426D99E6F5DF (player_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE score (id INT AUTO_INCREMENT NOT NULL, player_id INT DEFAULT NULL, value INT NOT NULL, created_at DATETIME NOT NULL, duration INT NOT NULL, INDEX IDX_3299375199E6F5DF (player_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', available_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', delivered_at DATETIME DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE projectile ADD CONSTRAINT FK_3CFB426D99E6F5DF FOREIGN KEY (player_id) REFERENCES player (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE score ADD CONSTRAINT FK_3299375199E6F5DF FOREIGN KEY (player_id) REFERENCES player (id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE projectile DROP FOREIGN KEY FK_3CFB426D99E6F5DF
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE score DROP FOREIGN KEY FK_3299375199E6F5DF
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE enemy
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE item
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE platform
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE player
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE projectile
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE score
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE messenger_messages
        SQL);
    }
}
