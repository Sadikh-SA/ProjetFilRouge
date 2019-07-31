<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190725082855 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE caissier DROP FOREIGN KEY FK_1F038BC236F71800');
        $this->addSql('ALTER TABLE admin_partenaire DROP FOREIGN KEY FK_FAC105F6BBF91D3B');
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY FK_CFF65260BBF91D3B');
        $this->addSql('ALTER TABLE partenaire DROP FOREIGN KEY FK_32FFA373BBF91D3B');
        $this->addSql('DROP TABLE admin_partenaire');
        $this->addSql('DROP TABLE caissier');
        $this->addSql('DROP TABLE super_admin');
        $this->addSql('DROP INDEX IDX_CFF65260BBF91D3B ON compte');
        $this->addSql('ALTER TABLE compte DROP super_admin_id, CHANGE code_banque code_bank INT NOT NULL, CHANGE num_compte num_comp VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE partenaire DROP FOREIGN KEY FK_32FFA373A76B6C5F');
        $this->addSql('DROP INDEX IDX_32FFA373BBF91D3B ON partenaire');
        $this->addSql('DROP INDEX IDX_32FFA373A76B6C5F ON partenaire');
        $this->addSql('ALTER TABLE partenaire DROP super_admin_id, DROP id_profil_id, CHANGE id_compte_id id_compte_id INT NOT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD id_profil_id INT NOT NULL, ADD id_parte_id INT DEFAULT NULL, ADD nom VARCHAR(255) NOT NULL, ADD prenom VARCHAR(255) NOT NULL, ADD email VARCHAR(255) NOT NULL, ADD tel DOUBLE PRECISION NOT NULL, ADD status VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B3A76B6C5F FOREIGN KEY (id_profil_id) REFERENCES profil (id)');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B36B2814EB FOREIGN KEY (id_parte_id) REFERENCES partenaire (id)');
        $this->addSql('CREATE INDEX IDX_1D1C63B3A76B6C5F ON utilisateur (id_profil_id)');
        $this->addSql('CREATE INDEX IDX_1D1C63B36B2814EB ON utilisateur (id_parte_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE admin_partenaire (id INT AUTO_INCREMENT NOT NULL, super_admin_id INT DEFAULT NULL, id_profil_id INT NOT NULL, id_part_id INT NOT NULL, nom VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, prenom VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, INDEX IDX_FAC105F6A76B6C5F (id_profil_id), INDEX IDX_FAC105F6BBF91D3B (super_admin_id), INDEX IDX_FAC105F6927EE29C (id_part_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE caissier (id INT AUTO_INCREMENT NOT NULL, id_profil_id INT NOT NULL, id_admin_part_id INT NOT NULL, compte_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, prenom VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, adresse VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, INDEX IDX_1F038BC236F71800 (id_admin_part_id), INDEX IDX_1F038BC2A76B6C5F (id_profil_id), INDEX IDX_1F038BC2F2C56620 (compte_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE super_admin (id INT AUTO_INCREMENT NOT NULL, id_profil_id INT NOT NULL, nom VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, prenom VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, INDEX IDX_BC8C2783A76B6C5F (id_profil_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE admin_partenaire ADD CONSTRAINT FK_FAC105F6927EE29C FOREIGN KEY (id_part_id) REFERENCES partenaire (id)');
        $this->addSql('ALTER TABLE admin_partenaire ADD CONSTRAINT FK_FAC105F6A76B6C5F FOREIGN KEY (id_profil_id) REFERENCES profil (id)');
        $this->addSql('ALTER TABLE admin_partenaire ADD CONSTRAINT FK_FAC105F6BBF91D3B FOREIGN KEY (super_admin_id) REFERENCES super_admin (id)');
        $this->addSql('ALTER TABLE caissier ADD CONSTRAINT FK_1F038BC236F71800 FOREIGN KEY (id_admin_part_id) REFERENCES admin_partenaire (id)');
        $this->addSql('ALTER TABLE caissier ADD CONSTRAINT FK_1F038BC2A76B6C5F FOREIGN KEY (id_profil_id) REFERENCES profil (id)');
        $this->addSql('ALTER TABLE caissier ADD CONSTRAINT FK_1F038BC2F2C56620 FOREIGN KEY (compte_id) REFERENCES compte (id)');
        $this->addSql('ALTER TABLE super_admin ADD CONSTRAINT FK_BC8C2783A76B6C5F FOREIGN KEY (id_profil_id) REFERENCES profil (id)');
        $this->addSql('ALTER TABLE compte ADD super_admin_id INT DEFAULT NULL, CHANGE code_bank code_banque INT NOT NULL, CHANGE num_comp num_compte VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT FK_CFF65260BBF91D3B FOREIGN KEY (super_admin_id) REFERENCES super_admin (id)');
        $this->addSql('CREATE INDEX IDX_CFF65260BBF91D3B ON compte (super_admin_id)');
        $this->addSql('ALTER TABLE partenaire ADD super_admin_id INT DEFAULT NULL, ADD id_profil_id INT NOT NULL, CHANGE id_compte_id id_compte_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE partenaire ADD CONSTRAINT FK_32FFA373A76B6C5F FOREIGN KEY (id_profil_id) REFERENCES profil (id)');
        $this->addSql('ALTER TABLE partenaire ADD CONSTRAINT FK_32FFA373BBF91D3B FOREIGN KEY (super_admin_id) REFERENCES super_admin (id)');
        $this->addSql('CREATE INDEX IDX_32FFA373BBF91D3B ON partenaire (super_admin_id)');
        $this->addSql('CREATE INDEX IDX_32FFA373A76B6C5F ON partenaire (id_profil_id)');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B3A76B6C5F');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B36B2814EB');
        $this->addSql('DROP INDEX IDX_1D1C63B3A76B6C5F ON utilisateur');
        $this->addSql('DROP INDEX IDX_1D1C63B36B2814EB ON utilisateur');
        $this->addSql('ALTER TABLE utilisateur DROP id_profil_id, DROP id_parte_id, DROP nom, DROP prenom, DROP email, DROP tel, DROP status');
    }
}
