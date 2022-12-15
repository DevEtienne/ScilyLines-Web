<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221215115158 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bateau (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, longueur DOUBLE PRECISION NOT NULL, largeur DOUBLE PRECISION NOT NULL, vitesse DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, cp INT NOT NULL, ville VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contenir (id INT AUTO_INCREMENT NOT NULL, bateau_id INT DEFAULT NULL, categorie_id INT DEFAULT NULL, nb_max INT NOT NULL, INDEX IDX_3C914DFDA9706509 (bateau_id), INDEX IDX_3C914DFDBCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipement (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE liaison (id INT AUTO_INCREMENT NOT NULL, port_id INT DEFAULT NULL, secteur_id INT DEFAULT NULL, duree TIME NOT NULL, INDEX IDX_225AC3776E92A9C (port_id), INDEX IDX_225AC379F7E4405 (secteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE participer (id INT AUTO_INCREMENT NOT NULL, type_id INT DEFAULT NULL, reservation_id INT DEFAULT NULL, nombre INT NOT NULL, INDEX IDX_EDBE16F8C54C8C93 (type_id), INDEX IDX_EDBE16F8B83297E7 (reservation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE periode (id INT AUTO_INCREMENT NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE port (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE proposer (id INT AUTO_INCREMENT NOT NULL, bateau_id INT DEFAULT NULL, equipement_id INT DEFAULT NULL, quantite INT NOT NULL, INDEX IDX_21866C15A9706509 (bateau_id), INDEX IDX_21866C15806F0F5C (equipement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, traversee_id INT DEFAULT NULL, INDEX IDX_42C8495519EB6921 (client_id), INDEX IDX_42C84955ED2BB15B (traversee_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE secteur (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tarifer (id INT AUTO_INCREMENT NOT NULL, liaison_id INT DEFAULT NULL, type_id INT DEFAULT NULL, periode_id INT DEFAULT NULL, tarif DOUBLE PRECISION NOT NULL, INDEX IDX_6904C4FFED31185 (liaison_id), INDEX IDX_6904C4FFC54C8C93 (type_id), INDEX IDX_6904C4FFF384C1CF (periode_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE traversee (id INT AUTO_INCREMENT NOT NULL, bateau_id INT DEFAULT NULL, liaison_id INT DEFAULT NULL, date DATE NOT NULL, heure TIME NOT NULL, INDEX IDX_B688F501A9706509 (bateau_id), INDEX IDX_B688F501ED31185 (liaison_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, categorie_id INT DEFAULT NULL, libelle VARCHAR(255) NOT NULL, INDEX IDX_8CDE5729BCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE contenir ADD CONSTRAINT FK_3C914DFDA9706509 FOREIGN KEY (bateau_id) REFERENCES bateau (id)');
        $this->addSql('ALTER TABLE contenir ADD CONSTRAINT FK_3C914DFDBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE liaison ADD CONSTRAINT FK_225AC3776E92A9C FOREIGN KEY (port_id) REFERENCES port (id)');
        $this->addSql('ALTER TABLE liaison ADD CONSTRAINT FK_225AC379F7E4405 FOREIGN KEY (secteur_id) REFERENCES secteur (id)');
        $this->addSql('ALTER TABLE participer ADD CONSTRAINT FK_EDBE16F8C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE participer ADD CONSTRAINT FK_EDBE16F8B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id)');
        $this->addSql('ALTER TABLE proposer ADD CONSTRAINT FK_21866C15A9706509 FOREIGN KEY (bateau_id) REFERENCES bateau (id)');
        $this->addSql('ALTER TABLE proposer ADD CONSTRAINT FK_21866C15806F0F5C FOREIGN KEY (equipement_id) REFERENCES equipement (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495519EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955ED2BB15B FOREIGN KEY (traversee_id) REFERENCES traversee (id)');
        $this->addSql('ALTER TABLE tarifer ADD CONSTRAINT FK_6904C4FFED31185 FOREIGN KEY (liaison_id) REFERENCES liaison (id)');
        $this->addSql('ALTER TABLE tarifer ADD CONSTRAINT FK_6904C4FFC54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE tarifer ADD CONSTRAINT FK_6904C4FFF384C1CF FOREIGN KEY (periode_id) REFERENCES periode (id)');
        $this->addSql('ALTER TABLE traversee ADD CONSTRAINT FK_B688F501A9706509 FOREIGN KEY (bateau_id) REFERENCES bateau (id)');
        $this->addSql('ALTER TABLE traversee ADD CONSTRAINT FK_B688F501ED31185 FOREIGN KEY (liaison_id) REFERENCES liaison (id)');
        $this->addSql('ALTER TABLE type ADD CONSTRAINT FK_8CDE5729BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contenir DROP FOREIGN KEY FK_3C914DFDA9706509');
        $this->addSql('ALTER TABLE contenir DROP FOREIGN KEY FK_3C914DFDBCF5E72D');
        $this->addSql('ALTER TABLE liaison DROP FOREIGN KEY FK_225AC3776E92A9C');
        $this->addSql('ALTER TABLE liaison DROP FOREIGN KEY FK_225AC379F7E4405');
        $this->addSql('ALTER TABLE participer DROP FOREIGN KEY FK_EDBE16F8C54C8C93');
        $this->addSql('ALTER TABLE participer DROP FOREIGN KEY FK_EDBE16F8B83297E7');
        $this->addSql('ALTER TABLE proposer DROP FOREIGN KEY FK_21866C15A9706509');
        $this->addSql('ALTER TABLE proposer DROP FOREIGN KEY FK_21866C15806F0F5C');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495519EB6921');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955ED2BB15B');
        $this->addSql('ALTER TABLE tarifer DROP FOREIGN KEY FK_6904C4FFED31185');
        $this->addSql('ALTER TABLE tarifer DROP FOREIGN KEY FK_6904C4FFC54C8C93');
        $this->addSql('ALTER TABLE tarifer DROP FOREIGN KEY FK_6904C4FFF384C1CF');
        $this->addSql('ALTER TABLE traversee DROP FOREIGN KEY FK_B688F501A9706509');
        $this->addSql('ALTER TABLE traversee DROP FOREIGN KEY FK_B688F501ED31185');
        $this->addSql('ALTER TABLE type DROP FOREIGN KEY FK_8CDE5729BCF5E72D');
        $this->addSql('DROP TABLE bateau');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE contenir');
        $this->addSql('DROP TABLE equipement');
        $this->addSql('DROP TABLE liaison');
        $this->addSql('DROP TABLE participer');
        $this->addSql('DROP TABLE periode');
        $this->addSql('DROP TABLE port');
        $this->addSql('DROP TABLE proposer');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE secteur');
        $this->addSql('DROP TABLE tarifer');
        $this->addSql('DROP TABLE traversee');
        $this->addSql('DROP TABLE type');
    }
}
