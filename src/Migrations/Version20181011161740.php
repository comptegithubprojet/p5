<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181011161740 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE challenger_pack');
        $this->addSql('DROP TABLE consulting');
        $this->addSql('DROP TABLE design');
        $this->addSql('DROP TABLE expert_pack');
        $this->addSql('DROP TABLE inbound_marketing');
        $this->addSql('DROP TABLE starter_pack');
        $this->addSql('ALTER TABLE user ADD email VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE challenger_pack (id INT AUTO_INCREMENT NOT NULL, devis_id INT DEFAULT NULL, `case` TINYINT(1) NOT NULL, designation LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci, charge DOUBLE PRECISION DEFAULT NULL, prix_ht DOUBLE PRECISION DEFAULT NULL, prix_tva DOUBLE PRECISION DEFAULT NULL, prix_ttc DOUBLE PRECISION DEFAULT NULL, UNIQUE INDEX UNIQ_751BB1C241DEFADA (devis_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE consulting (id INT AUTO_INCREMENT NOT NULL, devis_id INT DEFAULT NULL, `case` TINYINT(1) NOT NULL, designation LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci, charge DOUBLE PRECISION DEFAULT NULL, prix_ht DOUBLE PRECISION DEFAULT NULL, prix_tva DOUBLE PRECISION DEFAULT NULL, prix_ttc DOUBLE PRECISION DEFAULT NULL, UNIQUE INDEX UNIQ_CEBF92C741DEFADA (devis_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE design (id INT AUTO_INCREMENT NOT NULL, devis_id INT DEFAULT NULL, `case` TINYINT(1) NOT NULL, designation LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci, charge DOUBLE PRECISION DEFAULT NULL, prix_ht DOUBLE PRECISION DEFAULT NULL, prix_tva DOUBLE PRECISION DEFAULT NULL, prix_ttc DOUBLE PRECISION DEFAULT NULL, UNIQUE INDEX UNIQ_CD4F5A3041DEFADA (devis_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE expert_pack (id INT AUTO_INCREMENT NOT NULL, devis_id INT DEFAULT NULL, `case` TINYINT(1) NOT NULL, designation LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci, charge DOUBLE PRECISION DEFAULT NULL, prix_ht DOUBLE PRECISION DEFAULT NULL, prix_tva DOUBLE PRECISION DEFAULT NULL, prix_ttc DOUBLE PRECISION DEFAULT NULL, UNIQUE INDEX UNIQ_20AF740041DEFADA (devis_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inbound_marketing (id INT AUTO_INCREMENT NOT NULL, devis_id INT DEFAULT NULL, `case` TINYINT(1) NOT NULL, designation LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci, charge DOUBLE PRECISION DEFAULT NULL, prix_ht DOUBLE PRECISION DEFAULT NULL, prix_tva DOUBLE PRECISION DEFAULT NULL, prix_ttc DOUBLE PRECISION DEFAULT NULL, UNIQUE INDEX UNIQ_4EACABD741DEFADA (devis_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE starter_pack (id INT AUTO_INCREMENT NOT NULL, devis_id INT DEFAULT NULL, `case` TINYINT(1) NOT NULL, designation LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci, charge DOUBLE PRECISION DEFAULT NULL, prix_ht DOUBLE PRECISION DEFAULT NULL, prix_tva DOUBLE PRECISION DEFAULT NULL, prix_ttc DOUBLE PRECISION DEFAULT NULL, UNIQUE INDEX UNIQ_3D2DB9C041DEFADA (devis_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE challenger_pack ADD CONSTRAINT FK_751BB1C241DEFADA FOREIGN KEY (devis_id) REFERENCES devis (id)');
        $this->addSql('ALTER TABLE consulting ADD CONSTRAINT FK_CEBF92C741DEFADA FOREIGN KEY (devis_id) REFERENCES devis (id)');
        $this->addSql('ALTER TABLE design ADD CONSTRAINT FK_CD4F5A3041DEFADA FOREIGN KEY (devis_id) REFERENCES devis (id)');
        $this->addSql('ALTER TABLE expert_pack ADD CONSTRAINT FK_20AF740041DEFADA FOREIGN KEY (devis_id) REFERENCES devis (id)');
        $this->addSql('ALTER TABLE inbound_marketing ADD CONSTRAINT FK_4EACABD741DEFADA FOREIGN KEY (devis_id) REFERENCES devis (id)');
        $this->addSql('ALTER TABLE starter_pack ADD CONSTRAINT FK_3D2DB9C041DEFADA FOREIGN KEY (devis_id) REFERENCES devis (id)');
        $this->addSql('ALTER TABLE user DROP email');
    }
}
