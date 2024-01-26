<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240124083114 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE brand (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE color (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE material (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pen (id INT AUTO_INCREMENT NOT NULL, type_id INT NOT NULL, brand_id INT NOT NULL, material_id INT NOT NULL, name VARCHAR(20) NOT NULL, price DOUBLE PRECISION NOT NULL, description VARCHAR(255) NOT NULL, ref VARCHAR(4000) NOT NULL, UNIQUE INDEX UNIQ_193062FF146F3EA3 (ref), INDEX IDX_193062FFC54C8C93 (type_id), INDEX IDX_193062FF44F5D008 (brand_id), INDEX IDX_193062FFE308AC6F (material_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pen_color (pen_id INT NOT NULL, color_id INT NOT NULL, INDEX IDX_8844BCAA9CBC84D (pen_id), INDEX IDX_8844BCA7ADA1FB5 (color_id), PRIMARY KEY(pen_id, color_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pen ADD CONSTRAINT FK_193062FFC54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE pen ADD CONSTRAINT FK_193062FF44F5D008 FOREIGN KEY (brand_id) REFERENCES brand (id)');
        $this->addSql('ALTER TABLE pen ADD CONSTRAINT FK_193062FFE308AC6F FOREIGN KEY (material_id) REFERENCES material (id)');
        $this->addSql('ALTER TABLE pen_color ADD CONSTRAINT FK_8844BCAA9CBC84D FOREIGN KEY (pen_id) REFERENCES pen (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pen_color ADD CONSTRAINT FK_8844BCA7ADA1FB5 FOREIGN KEY (color_id) REFERENCES color (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pen DROP FOREIGN KEY FK_193062FFC54C8C93');
        $this->addSql('ALTER TABLE pen DROP FOREIGN KEY FK_193062FF44F5D008');
        $this->addSql('ALTER TABLE pen DROP FOREIGN KEY FK_193062FFE308AC6F');
        $this->addSql('ALTER TABLE pen_color DROP FOREIGN KEY FK_8844BCAA9CBC84D');
        $this->addSql('ALTER TABLE pen_color DROP FOREIGN KEY FK_8844BCA7ADA1FB5');
        $this->addSql('DROP TABLE brand');
        $this->addSql('DROP TABLE color');
        $this->addSql('DROP TABLE material');
        $this->addSql('DROP TABLE pen');
        $this->addSql('DROP TABLE pen_color');
        $this->addSql('DROP TABLE type');
    }
}
