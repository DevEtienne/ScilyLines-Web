<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221215142557 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bateau_equipement (id INT AUTO_INCREMENT NOT NULL, bateau_id INT DEFAULT NULL, equipement_id INT DEFAULT NULL, quantite INT NOT NULL, INDEX IDX_A2B506B1A9706509 (bateau_id), INDEX IDX_A2B506B1806F0F5C (equipement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE beateau_categorie (id INT AUTO_INCREMENT NOT NULL, bateau_id INT DEFAULT NULL, categorie_id INT DEFAULT NULL, nb_max INT NOT NULL, INDEX IDX_ED1D6C74A9706509 (bateau_id), INDEX IDX_ED1D6C74BCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation_type (id INT AUTO_INCREMENT NOT NULL, type_id INT DEFAULT NULL, reservation_id INT DEFAULT NULL, nombre INT NOT NULL, INDEX IDX_9AE79A41C54C8C93 (type_id), INDEX IDX_9AE79A41B83297E7 (reservation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bateau_equipement ADD CONSTRAINT FK_A2B506B1A9706509 FOREIGN KEY (bateau_id) REFERENCES bateau (id)');
        $this->addSql('ALTER TABLE bateau_equipement ADD CONSTRAINT FK_A2B506B1806F0F5C FOREIGN KEY (equipement_id) REFERENCES equipement (id)');
        $this->addSql('ALTER TABLE beateau_categorie ADD CONSTRAINT FK_ED1D6C74A9706509 FOREIGN KEY (bateau_id) REFERENCES bateau (id)');
        $this->addSql('ALTER TABLE beateau_categorie ADD CONSTRAINT FK_ED1D6C74BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE reservation_type ADD CONSTRAINT FK_9AE79A41C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE reservation_type ADD CONSTRAINT FK_9AE79A41B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id)');
        $this->addSql('ALTER TABLE participer DROP FOREIGN KEY FK_EDBE16F8B83297E7');
        $this->addSql('ALTER TABLE participer DROP FOREIGN KEY FK_EDBE16F8C54C8C93');
        $this->addSql('ALTER TABLE proposer DROP FOREIGN KEY FK_21866C15A9706509');
        $this->addSql('ALTER TABLE proposer DROP FOREIGN KEY FK_21866C15806F0F5C');
        $this->addSql('ALTER TABLE contenir DROP FOREIGN KEY FK_3C914DFDBCF5E72D');
        $this->addSql('ALTER TABLE contenir DROP FOREIGN KEY FK_3C914DFDA9706509');
        $this->addSql('DROP TABLE participer');
        $this->addSql('DROP TABLE proposer');
        $this->addSql('DROP TABLE contenir');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE participer (id INT AUTO_INCREMENT NOT NULL, type_id INT DEFAULT NULL, reservation_id INT DEFAULT NULL, nombre INT NOT NULL, INDEX IDX_EDBE16F8B83297E7 (reservation_id), INDEX IDX_EDBE16F8C54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE proposer (id INT AUTO_INCREMENT NOT NULL, bateau_id INT DEFAULT NULL, equipement_id INT DEFAULT NULL, quantite INT NOT NULL, INDEX IDX_21866C15806F0F5C (equipement_id), INDEX IDX_21866C15A9706509 (bateau_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE contenir (id INT AUTO_INCREMENT NOT NULL, bateau_id INT DEFAULT NULL, categorie_id INT DEFAULT NULL, nb_max INT NOT NULL, INDEX IDX_3C914DFDA9706509 (bateau_id), INDEX IDX_3C914DFDBCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE participer ADD CONSTRAINT FK_EDBE16F8B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id)');
        $this->addSql('ALTER TABLE participer ADD CONSTRAINT FK_EDBE16F8C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE proposer ADD CONSTRAINT FK_21866C15A9706509 FOREIGN KEY (bateau_id) REFERENCES bateau (id)');
        $this->addSql('ALTER TABLE proposer ADD CONSTRAINT FK_21866C15806F0F5C FOREIGN KEY (equipement_id) REFERENCES equipement (id)');
        $this->addSql('ALTER TABLE contenir ADD CONSTRAINT FK_3C914DFDBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE contenir ADD CONSTRAINT FK_3C914DFDA9706509 FOREIGN KEY (bateau_id) REFERENCES bateau (id)');
        $this->addSql('ALTER TABLE bateau_equipement DROP FOREIGN KEY FK_A2B506B1A9706509');
        $this->addSql('ALTER TABLE bateau_equipement DROP FOREIGN KEY FK_A2B506B1806F0F5C');
        $this->addSql('ALTER TABLE beateau_categorie DROP FOREIGN KEY FK_ED1D6C74A9706509');
        $this->addSql('ALTER TABLE beateau_categorie DROP FOREIGN KEY FK_ED1D6C74BCF5E72D');
        $this->addSql('ALTER TABLE reservation_type DROP FOREIGN KEY FK_9AE79A41C54C8C93');
        $this->addSql('ALTER TABLE reservation_type DROP FOREIGN KEY FK_9AE79A41B83297E7');
        $this->addSql('DROP TABLE bateau_equipement');
        $this->addSql('DROP TABLE beateau_categorie');
        $this->addSql('DROP TABLE reservation_type');
    }
}
