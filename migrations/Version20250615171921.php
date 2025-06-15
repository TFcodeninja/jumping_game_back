<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250615171921 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE projectile ADD player_id INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE projectile ADD CONSTRAINT FK_3CFB426D99E6F5DF FOREIGN KEY (player_id) REFERENCES player (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_3CFB426D99E6F5DF ON projectile (player_id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE projectile DROP FOREIGN KEY FK_3CFB426D99E6F5DF
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_3CFB426D99E6F5DF ON projectile
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE projectile DROP player_id
        SQL);
    }
}
