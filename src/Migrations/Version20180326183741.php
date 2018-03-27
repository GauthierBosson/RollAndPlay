<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180326183741 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE actualites (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, titre VARCHAR(255) NOT NULL, chapo VARCHAR(255) NOT NULL, contenu VARCHAR(255) NOT NULL, date DATE NOT NULL, featuredimage VARCHAR(255) NOT NULL, INDEX IDX_75315B6DA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL, categorielibelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE chat (id INT AUTO_INCREMENT NOT NULL, partie_id INT DEFAULT NULL, pseudo VARCHAR(255) NOT NULL, message VARCHAR(255) NOT NULL, date INT NOT NULL, UNIQUE INDEX UNIQ_659DF2AAE075F7A4 (partie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fiche_personnages (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, caracteristique VARCHAR(255) NOT NULL, competence VARCHAR(255) NOT NULL, inventaire VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE parties (id INT AUTO_INCREMENT NOT NULL, categorie_id INT NOT NULL, user_id INT NOT NULL, resume_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_43631805BCF5E72D (categorie_id), INDEX IDX_43631805A76ED395 (user_id), UNIQUE INDEX UNIQ_43631805D262AF09 (resume_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE resume (id INT AUTO_INCREMENT NOT NULL, partie_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, contenu VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_60C1D0A0E075F7A4 (partie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, login VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE actualites ADD CONSTRAINT FK_75315B6DA76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE chat ADD CONSTRAINT FK_659DF2AAE075F7A4 FOREIGN KEY (partie_id) REFERENCES parties (id)');
        $this->addSql('ALTER TABLE parties ADD CONSTRAINT FK_43631805BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categories (id)');
        $this->addSql('ALTER TABLE parties ADD CONSTRAINT FK_43631805A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE parties ADD CONSTRAINT FK_43631805D262AF09 FOREIGN KEY (resume_id) REFERENCES resume (id)');
        $this->addSql('ALTER TABLE resume ADD CONSTRAINT FK_60C1D0A0E075F7A4 FOREIGN KEY (partie_id) REFERENCES parties (id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE parties DROP FOREIGN KEY FK_43631805BCF5E72D');
        $this->addSql('ALTER TABLE chat DROP FOREIGN KEY FK_659DF2AAE075F7A4');
        $this->addSql('ALTER TABLE resume DROP FOREIGN KEY FK_60C1D0A0E075F7A4');
        $this->addSql('ALTER TABLE parties DROP FOREIGN KEY FK_43631805D262AF09');
        $this->addSql('ALTER TABLE actualites DROP FOREIGN KEY FK_75315B6DA76ED395');
        $this->addSql('ALTER TABLE parties DROP FOREIGN KEY FK_43631805A76ED395');
        $this->addSql('DROP TABLE actualites');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE chat');
        $this->addSql('DROP TABLE fiche_personnages');
        $this->addSql('DROP TABLE parties');
        $this->addSql('DROP TABLE resume');
        $this->addSql('DROP TABLE users');
    }
}
