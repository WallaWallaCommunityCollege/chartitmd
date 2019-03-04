<?php
declare(strict_types=1);

namespace ChartItMD\Model\Migration;

use Doctrine\DBAL\DBALException;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;
use Doctrine\Migrations\Exception\AbortMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190304034902 extends AbstractMigration {
    /**
     * @param Schema $schema
     *
     * @throws DBALException
     * @throws AbortMigration
     */
    public function down(Schema $schema): void {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf(
            $this->connection->getDatabasePlatform()
                             ->getName() !== 'mysql',
            'Migration can only be executed safely on \'mysql\'.'
        );
        $this->addSql('ALTER TABLE patient_height DROP FOREIGN KEY FK_FE030CF56B899279');
        $this->addSql('ALTER TABLE patient_weight DROP FOREIGN KEY FK_C83BCBB6B899279');
        $this->addSql('ALTER TABLE vital_signs DROP FOREIGN KEY FK_D79431356B899279');
        $this->addSql('ALTER TABLE user_role DROP FOREIGN KEY FK_2DE8C6A3A76ED395');
        $this->addSql(
            'CREATE TABLE arterial_blood_gas_lab_report (
          report_id BIGINT AUTO_INCREMENT NOT NULL, 
          abg_name VARCHAR(50) NOT NULL COLLATE utf8mb4_general_ci, 
          range_minimum NUMERIC(10, 0) NOT NULL, 
          range_maximum NUMERIC(10, 0) NOT NULL, 
          unit_name VARCHAR(50) NOT NULL COLLATE utf8mb4_general_ci, 
          date DATE NOT NULL, 
          PRIMARY KEY(report_id)
        ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\''
        );
        $this->addSql(
            'CREATE TABLE chemistry_chems (
          chemical_id BIGINT AUTO_INCREMENT NOT NULL, 
          chemical_name VARCHAR(50) NOT NULL COLLATE utf8mb4_general_ci, 
          INDEX chemical_id (chemical_id), 
          PRIMARY KEY(chemical_id)
        ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\''
        );
        $this->addSql(
            'CREATE TABLE chemistry_lab_report (
          report_id BIGINT AUTO_INCREMENT NOT NULL, 
          chemical_id BIGINT NOT NULL, 
          range_minimum NUMERIC(10, 0) NOT NULL, 
          range_maximum NUMERIC(10, 0) NOT NULL, 
          unit_name VARCHAR(50) NOT NULL COLLATE utf8mb4_general_ci, 
          date DATE NOT NULL, 
          INDEX chemical_id (chemical_id), 
          PRIMARY KEY(report_id)
        ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\''
        );
        $this->addSql(
            'CREATE TABLE diagnostic_cardiology (
          diagnosis_id BIGINT AUTO_INCREMENT NOT NULL, 
          patient_id BIGINT NOT NULL, 
          purpose VARCHAR(100) NOT NULL COLLATE utf8mb4_general_ci, 
          findings VARCHAR(250) NOT NULL COLLATE utf8mb4_general_ci, 
          electrocardiogram VARCHAR(250) NOT NULL COLLATE utf8mb4_general_ci, 
          date DATETIME NOT NULL, 
          INDEX patient_id (patient_id), 
          PRIMARY KEY(diagnosis_id)
        ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\''
        );
        $this->addSql(
            'CREATE TABLE diagnostic_imaging (
          diagnosis_id BIGINT AUTO_INCREMENT NOT NULL, 
          patient_id BIGINT NOT NULL, 
          purpose VARCHAR(50) NOT NULL COLLATE utf8mb4_general_ci, 
          findings VARCHAR(250) NOT NULL COLLATE utf8mb4_general_ci, 
          image_link VARCHAR(250) NOT NULL COLLATE utf8mb4_general_ci, 
          time_taken DATETIME NOT NULL, 
          INDEX patient_id (patient_id), 
          PRIMARY KEY(diagnosis_id)
        ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\''
        );
        $this->addSql(
            'CREATE TABLE hematology_lab_report (
          report_id BIGINT AUTO_INCREMENT NOT NULL, 
          hematology_id BIGINT NOT NULL, 
          range_minimum NUMERIC(10, 0) NOT NULL, 
          range_maximum NUMERIC(10, 0) NOT NULL, 
          unit_name VARCHAR(50) NOT NULL COLLATE utf8mb4_general_ci, 
          date DATETIME NOT NULL, 
          INDEX hematology_id (hematology_id), 
          PRIMARY KEY(report_id)
        ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\''
        );
        $this->addSql(
            'CREATE TABLE hematology_names (
          name_id BIGINT AUTO_INCREMENT NOT NULL, 
          hematology_name VARCHAR(50) NOT NULL COLLATE utf8mb4_general_ci, 
          INDEX name_id (name_id), 
          PRIMARY KEY(name_id)
        ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\''
        );
        $this->addSql(
            'CREATE TABLE intake (
          report_id BIGINT AUTO_INCREMENT NOT NULL, 
          patient_id BIGINT NOT NULL, 
          orally VARCHAR(8) NOT NULL COLLATE utf8mb4_general_ci, 
          intravenous BIGINT NOT NULL, 
          blood INT NOT NULL, 
          other INT NOT NULL, 
          intravenous_piggyback INT NOT NULL, 
          tube_fluordeoxyglucose INT NOT NULL, 
          total_parental_nutrition INT NOT NULL, 
          lipids INT NOT NULL, 
          time DATETIME NOT NULL, 
          INDEX patient_id (patient_id), 
          PRIMARY KEY(report_id)
        ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\''
        );
        $this->addSql(
            'CREATE TABLE measured_values (
          measured_value_id BIGINT AUTO_INCREMENT NOT NULL, 
          measured_value_type VARCHAR(50) NOT NULL COLLATE utf8mb4_general_ci, 
          measured_value_value NUMERIC(10, 0) NOT NULL, 
          measured_value_unit VARCHAR(50) NOT NULL COLLATE utf8mb4_general_ci, 
          measured_value_timestamp DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, 
          measured_value_measurer_id BIGINT NOT NULL, 
          PRIMARY KEY(measured_value_id)
        ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\''
        );
        $this->addSql(
            'CREATE TABLE medication_administration (
          admin_id BIGINT AUTO_INCREMENT NOT NULL, 
          patient_id BIGINT NOT NULL, 
          medication VARCHAR(50) NOT NULL COLLATE utf8mb4_general_ci, 
          amount INT NOT NULL, 
          route VARCHAR(50) NOT NULL COLLATE utf8mb4_general_ci, 
          time_taken DATE NOT NULL, 
          INDEX patient_id (patient_id), 
          PRIMARY KEY(admin_id)
        ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\''
        );
        $this->addSql(
            'CREATE TABLE microbiology_lab_report (
          report_id BIGINT AUTO_INCREMENT NOT NULL, 
          name_id BIGINT NOT NULL, 
          range_minimum NUMERIC(10, 0) NOT NULL, 
          range_maximum NUMERIC(10, 0) NOT NULL, 
          unit_name VARCHAR(50) NOT NULL COLLATE utf8mb4_general_ci, 
          date DATETIME NOT NULL, 
          INDEX name_id (name_id), 
          PRIMARY KEY(report_id)
        ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\''
        );
        $this->addSql(
            'CREATE TABLE microbiology_names (
          name_id BIGINT AUTO_INCREMENT NOT NULL, 
          microbiology_name VARCHAR(50) NOT NULL COLLATE utf8mb4_general_ci, 
          INDEX name_id (name_id), 
          PRIMARY KEY(name_id)
        ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\''
        );
        $this->addSql(
            'CREATE TABLE migrations (
          version BIGINT NOT NULL, 
          migration_name VARCHAR(100) DEFAULT NULL COLLATE utf8_general_ci, 
          start_time DATETIME DEFAULT NULL, 
          end_time DATETIME DEFAULT NULL, 
          breakpoint TINYINT(1) DEFAULT \'0\' NOT NULL, 
          PRIMARY KEY(version)
        ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\''
        );
        $this->addSql(
            'CREATE TABLE output (
          report_id BIGINT AUTO_INCREMENT NOT NULL, 
          patient_id BIGINT NOT NULL, 
          urine BIGINT DEFAULT NULL, 
          emesis BIGINT DEFAULT NULL, 
          drains BIGINT DEFAULT NULL, 
          nasogastric_tube BIGINT DEFAULT NULL, 
          stool BIGINT DEFAULT NULL, 
          ostomy BIGINT DEFAULT NULL, 
          unmeasured BIGINT DEFAULT NULL, 
          incontinent BIGINT DEFAULT NULL, 
          blood BIGINT DEFAULT NULL, 
          estimated_blood_loss BIGINT DEFAULT NULL, 
          time DATETIME NOT NULL, 
          INDEX patient_id (patient_id), 
          PRIMARY KEY(report_id)
        ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\''
        );
        $this->addSql(
            'CREATE TABLE patients (
          patient_id BIGINT AUTO_INCREMENT NOT NULL, 
          gender_id BIGINT NOT NULL, 
          patient_firstname VARCHAR(50) NOT NULL COLLATE utf8mb4_general_ci, 
          patient_lastname VARCHAR(50) NOT NULL COLLATE utf8mb4_general_ci, 
          patient_dob DATE NOT NULL, 
          age BIGINT NOT NULL, 
          weight NUMERIC(20, 1) NOT NULL, 
          height NUMERIC(20, 1) NOT NULL, 
          INDEX gender_id (gender_id), 
          INDEX patient_id (patient_id), 
          PRIMARY KEY(patient_id)
        ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\''
        );
        $this->addSql(
            'CREATE TABLE urinalysis_lab_report (
          report_id BIGINT AUTO_INCREMENT NOT NULL, 
          item_id BIGINT NOT NULL, 
          range_minimum NUMERIC(10, 0) NOT NULL, 
          range_maximum NUMERIC(10, 0) NOT NULL, 
          unit_name VARCHAR(50) NOT NULL COLLATE utf8mb4_general_ci, 
          date DATETIME NOT NULL, 
          INDEX item_id (item_id), 
          PRIMARY KEY(report_id)
        ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\''
        );
        $this->addSql(
            'CREATE TABLE urinalysis_report_fields (
          item_id BIGINT AUTO_INCREMENT NOT NULL, 
          report_name VARCHAR(50) NOT NULL COLLATE utf8mb4_general_ci, 
          INDEX item_id (item_id), 
          PRIMARY KEY(item_id)
        ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\''
        );
        $this->addSql('DROP TABLE patient');
        $this->addSql('DROP TABLE patient_height');
        $this->addSql('DROP TABLE patient_weight');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP INDEX gender_all ON gender');
        $this->addSql('ALTER TABLE gender DROP PRIMARY KEY');
        $this->addSql(
            'ALTER TABLE 
          gender 
        ADD 
          gender_id BIGINT AUTO_INCREMENT NOT NULL, 
        ADD 
          gender_identity VARCHAR(20) NOT NULL COLLATE utf8mb4_general_ci, 
        ADD 
          gender_pronoun VARCHAR(20) NOT NULL COLLATE utf8mb4_general_ci, 
        ADD 
          gender_sex VARCHAR(20) NOT NULL COLLATE utf8mb4_general_ci, 
        DROP 
          id, 
        DROP 
          created_at, 
        DROP 
          identity, 
        DROP 
          pronoun, 
        DROP 
          assigned_sex'
        );
        $this->addSql('CREATE INDEX gender_id ON gender (gender_id)');
        $this->addSql('ALTER TABLE gender ADD PRIMARY KEY (gender_id)');
        $this->addSql(
            'ALTER TABLE 
          permission 
        DROP 
          description, 
          CHANGE id id INT UNSIGNED AUTO_INCREMENT NOT NULL, 
          CHANGE status status TINYINT(1) DEFAULT \'1\' NOT NULL'
        );
        $this->addSql('DROP INDEX idx_name ON permission');
        $this->addSql('CREATE UNIQUE INDEX idx_role_name ON permission (name)');
        $this->addSql(
            'ALTER TABLE 
          role 
        DROP 
          description, 
          CHANGE id id INT UNSIGNED AUTO_INCREMENT NOT NULL, 
          CHANGE status status TINYINT(1) DEFAULT \'1\' NOT NULL'
        );
        $this->addSql('DROP INDEX idx_name ON role');
        $this->addSql('CREATE UNIQUE INDEX idx_role_name ON role (name)');
        $this->addSql('ALTER TABLE role_hierarchy DROP FOREIGN KEY FK_AB8EFB72DD62C21B');
        $this->addSql('ALTER TABLE role_hierarchy DROP FOREIGN KEY FK_AB8EFB72727ACA70');
        $this->addSql('DROP INDEX idx_parent_child ON role_hierarchy');
        $this->addSql('DROP INDEX fk_child_id ON role_hierarchy');
        $this->addSql('DROP INDEX fk_parent_id ON role_hierarchy');
        $this->addSql('ALTER TABLE role_hierarchy DROP PRIMARY KEY');
        $this->addSql(
            'ALTER TABLE 
          role_hierarchy 
        ADD 
          id INT UNSIGNED AUTO_INCREMENT NOT NULL, 
        ADD 
          parent_role_id INT UNSIGNED NOT NULL, 
        ADD 
          child_role_id INT UNSIGNED NOT NULL, 
        DROP 
          child_id, 
        DROP 
          parent_id'
        );
        $this->addSql(
            'CREATE UNIQUE INDEX idx_role_hierarchy_unique ON role_hierarchy (parent_role_id, child_role_id)'
        );
        $this->addSql('CREATE INDEX IDX_AB8EFB72A44B56EA ON role_hierarchy (parent_role_id)');
        $this->addSql('CREATE INDEX fk_role_hierarchy_child ON role_hierarchy (child_role_id)');
        $this->addSql('ALTER TABLE role_hierarchy ADD PRIMARY KEY (id)');
        $this->addSql(
            'ALTER TABLE 
          role_permission 
        DROP 
          INDEX idx_role_permission, 
        ADD 
          UNIQUE INDEX idx_role_permission_unique (role_id, permission_id)'
        );
        $this->addSql('ALTER TABLE role_permission DROP FOREIGN KEY FK_6F7DF886FED90CCA');
        $this->addSql('ALTER TABLE role_permission DROP FOREIGN KEY FK_6F7DF886D60322AC');
        $this->addSql('ALTER TABLE role_permission DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE role_permission DROP FOREIGN KEY FK_6F7DF886FED90CCA');
        $this->addSql('ALTER TABLE role_permission DROP FOREIGN KEY FK_6F7DF886D60322AC');
        $this->addSql(
            'ALTER TABLE 
          role_permission 
        ADD 
          id INT UNSIGNED AUTO_INCREMENT NOT NULL, 
          CHANGE permission_id permission_id INT UNSIGNED NOT NULL, 
          CHANGE role_id role_id INT UNSIGNED NOT NULL'
        );
        $this->addSql('ALTER TABLE role_permission ADD PRIMARY KEY (id)');
        $this->addSql('DROP INDEX fk_role_id ON role_permission');
        $this->addSql('CREATE INDEX IDX_6F7DF886D60322AC ON role_permission (role_id)');
        $this->addSql('DROP INDEX fk_permission_id ON role_permission');
        $this->addSql('CREATE INDEX fk_role_permission_permission ON role_permission (permission_id)');
        $this->addSql(
            'ALTER TABLE 
          role_permission 
        ADD 
          CONSTRAINT FK_6F7DF886FED90CCA FOREIGN KEY (permission_id) REFERENCES permission (id)'
        );
        $this->addSql(
            'ALTER TABLE 
          role_permission 
        ADD 
          CONSTRAINT FK_6F7DF886D60322AC FOREIGN KEY (role_id) REFERENCES role (id)'
        );
        $this->addSql(
            'ALTER TABLE 
          user_role 
        DROP 
          INDEX idx_user_role, 
        ADD 
          UNIQUE INDEX idx_user_role_unique (user_id, role_id)'
        );
        $this->addSql('ALTER TABLE user_role DROP FOREIGN KEY FK_2DE8C6A3D60322AC');
        $this->addSql('DROP INDEX fk_user_id ON user_role');
        $this->addSql('ALTER TABLE user_role DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE user_role DROP FOREIGN KEY FK_2DE8C6A3D60322AC');
        $this->addSql(
            'ALTER TABLE 
          user_role 
        ADD 
          id INT UNSIGNED AUTO_INCREMENT NOT NULL, 
          CHANGE role_id role_id INT UNSIGNED NOT NULL, 
          CHANGE user_id user_id INT UNSIGNED NOT NULL'
        );
        $this->addSql('ALTER TABLE user_role ADD PRIMARY KEY (id)');
        $this->addSql('DROP INDEX fk_role_id ON user_role');
        $this->addSql('CREATE INDEX fk_user_role_role ON user_role (role_id)');
        $this->addSql(
            'ALTER TABLE 
          user_role 
        ADD 
          CONSTRAINT FK_2DE8C6A3D60322AC FOREIGN KEY (role_id) REFERENCES role (id)'
        );
        $this->addSql('ALTER TABLE vital_signs DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE vital_signs DROP FOREIGN KEY FK_D79431356B899279');
        $this->addSql(
            'ALTER TABLE 
          vital_signs 
        ADD 
          vital_sign_report_id BIGINT AUTO_INCREMENT NOT NULL, 
        ADD 
          blood_pressure_top_number INT NOT NULL, 
        ADD 
          blood_pressure_bottom_number BIGINT NOT NULL, 
        ADD 
          pulse BIGINT NOT NULL, 
        ADD 
          respiration BIGINT NOT NULL, 
        DROP 
          id, 
        DROP 
          diastolic, 
        DROP 
          oxygen_location, 
        DROP 
          pulse_rate, 
        DROP 
          respiration_rate, 
        DROP 
          systolic, 
          CHANGE patient_id patient_id BIGINT NOT NULL, 
          CHANGE oxygen_saturation oxygen_saturation BIGINT NOT NULL, 
          CHANGE temperature temperature NUMERIC(10, 0) NOT NULL, 
          CHANGE temperature_method temperature_method VARCHAR(50) NOT NULL COLLATE utf8mb4_general_ci, 
          CHANGE pain pain INT NOT NULL, 
          CHANGE pain_location pain_location VARCHAR(11) NOT NULL COLLATE utf8mb4_general_ci, 
          CHANGE created_at time DATETIME NOT NULL'
        );
        $this->addSql('ALTER TABLE vital_signs ADD PRIMARY KEY (vital_sign_report_id)');
        $this->addSql('DROP INDEX fk_patient_id ON vital_signs');
        $this->addSql('CREATE INDEX patient_id ON vital_signs (patient_id)');
        $this->addSql(
            'ALTER TABLE 
          vital_signs 
        ADD 
          CONSTRAINT FK_D79431356B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)'
        );
    }
    public function getDescription(): string {
        return '';
    }
    /**
     * @param Schema $schema
     *
     * @throws DBALException
     * @throws AbortMigration
     */
    public function up(Schema $schema): void {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf(
            $this->connection->getDatabasePlatform()
                             ->getName() !== 'mysql',
            'Migration can only be executed safely on \'mysql\'.'
        );
        $this->addSql(
            'CREATE TABLE patient (
          id BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\', 
          gender_id BINARY(22) DEFAULT NULL COMMENT \'(DC2Type:uuid64)\', 
          created_at DATETIME NOT NULL, 
          dob DATE DEFAULT NULL, 
          first_name VARCHAR(50) NOT NULL, 
          last_name VARCHAR(50) NOT NULL, 
          updated_at DATETIME DEFAULT NULL, 
          INDEX gender_id (gender_id), 
          PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB'
        );
        $this->addSql(
            'CREATE TABLE patient_height (
          id BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\', 
          patient_id BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\', 
          created_at DATETIME NOT NULL, 
          height NUMERIC(4, 1) NOT NULL, 
          INDEX fk_patient_id (patient_id), 
          PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB'
        );
        $this->addSql(
            'CREATE TABLE patient_weight (
          id BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\', 
          patient_id BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\', 
          created_at DATETIME NOT NULL, 
          weight NUMERIC(4, 1) NOT NULL, 
          INDEX fk_patient_id (patient_id), 
          PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB'
        );
        $this->addSql(
            'CREATE TABLE user (
          id BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\', 
          created_at DATETIME NOT NULL, 
          name VARCHAR(100) NOT NULL, 
          password VARCHAR(255) NOT NULL, 
          updated_at DATETIME DEFAULT NULL, 
          UNIQUE INDEX idx_name (name), 
          PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB'
        );
        $this->addSql(
            'ALTER TABLE 
          patient 
        ADD 
          CONSTRAINT FK_1ADAD7EB708A0E0 FOREIGN KEY (gender_id) REFERENCES gender (id)'
        );
        $this->addSql(
            'ALTER TABLE 
          patient_height 
        ADD 
          CONSTRAINT FK_FE030CF56B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)'
        );
        $this->addSql(
            'ALTER TABLE 
          patient_weight 
        ADD 
          CONSTRAINT FK_C83BCBB6B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)'
        );
        $this->addSql('DROP TABLE arterial_blood_gas_lab_report');
        $this->addSql('DROP TABLE chemistry_chems');
        $this->addSql('DROP TABLE chemistry_lab_report');
        $this->addSql('DROP TABLE diagnostic_cardiology');
        $this->addSql('DROP TABLE diagnostic_imaging');
        $this->addSql('DROP TABLE hematology_lab_report');
        $this->addSql('DROP TABLE hematology_names');
        $this->addSql('DROP TABLE intake');
        $this->addSql('DROP TABLE measured_values');
        $this->addSql('DROP TABLE medication_administration');
        $this->addSql('DROP TABLE microbiology_lab_report');
        $this->addSql('DROP TABLE microbiology_names');
        $this->addSql('DROP TABLE migrations');
        $this->addSql('DROP TABLE output');
        $this->addSql('DROP TABLE patients');
        $this->addSql('DROP TABLE urinalysis_lab_report');
        $this->addSql('DROP TABLE urinalysis_report_fields');
        $this->addSql('ALTER TABLE gender MODIFY gender_id BIGINT NOT NULL');
        $this->addSql('DROP INDEX gender_id ON gender');
        $this->addSql('ALTER TABLE gender DROP PRIMARY KEY');
        $this->addSql(
            'ALTER TABLE 
          gender 
        ADD 
          id BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\', 
        ADD 
          created_at DATETIME NOT NULL, 
        ADD 
          identity VARCHAR(20) NOT NULL, 
        ADD 
          pronoun VARCHAR(20) NOT NULL, 
        ADD 
          assigned_sex VARCHAR(20) NOT NULL, 
        DROP 
          gender_id, 
        DROP 
          gender_identity, 
        DROP 
          gender_pronoun, 
        DROP 
          gender_sex'
        );
        $this->addSql('CREATE UNIQUE INDEX gender_all ON gender (identity, pronoun, assigned_sex)');
        $this->addSql('ALTER TABLE gender ADD PRIMARY KEY (id)');
        $this->addSql(
            'ALTER TABLE 
          permission 
        ADD 
          description VARCHAR(255) DEFAULT NULL, 
          CHANGE id id BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\', 
          CHANGE status status TINYINT(1) NOT NULL'
        );
        $this->addSql('DROP INDEX idx_role_name ON permission');
        $this->addSql('CREATE UNIQUE INDEX idx_name ON permission (name)');
        $this->addSql(
            'ALTER TABLE 
          role 
        ADD 
          description VARCHAR(255) DEFAULT NULL, 
          CHANGE id id BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\', 
          CHANGE status status TINYINT(1) NOT NULL'
        );
        $this->addSql('DROP INDEX idx_role_name ON role');
        $this->addSql('CREATE UNIQUE INDEX idx_name ON role (name)');
        $this->addSql('ALTER TABLE role_hierarchy MODIFY id INT UNSIGNED NOT NULL');
        $this->addSql('DROP INDEX idx_role_hierarchy_unique ON role_hierarchy');
        $this->addSql('DROP INDEX IDX_AB8EFB72A44B56EA ON role_hierarchy');
        $this->addSql('DROP INDEX fk_role_hierarchy_child ON role_hierarchy');
        $this->addSql('ALTER TABLE role_hierarchy DROP PRIMARY KEY');
        $this->addSql(
            'ALTER TABLE 
          role_hierarchy 
        ADD 
          child_id BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\', 
        ADD 
          parent_id BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\', 
        DROP 
          id, 
        DROP 
          parent_role_id, 
        DROP 
          child_role_id'
        );
        $this->addSql(
            'ALTER TABLE 
          role_hierarchy 
        ADD 
          CONSTRAINT FK_AB8EFB72DD62C21B FOREIGN KEY (child_id) REFERENCES role (id)'
        );
        $this->addSql(
            'ALTER TABLE 
          role_hierarchy 
        ADD 
          CONSTRAINT FK_AB8EFB72727ACA70 FOREIGN KEY (parent_id) REFERENCES role (id)'
        );
        $this->addSql('CREATE INDEX idx_parent_child ON role_hierarchy (parent_id, child_id)');
        $this->addSql('CREATE INDEX fk_child_id ON role_hierarchy (child_id)');
        $this->addSql('CREATE INDEX fk_parent_id ON role_hierarchy (parent_id)');
        $this->addSql('ALTER TABLE role_hierarchy ADD PRIMARY KEY (child_id, parent_id)');
        $this->addSql(
            'ALTER TABLE 
          role_permission 
        DROP 
          INDEX idx_role_permission_unique, 
        ADD 
          INDEX idx_role_permission (role_id, permission_id)'
        );
        $this->addSql('ALTER TABLE role_permission MODIFY id INT UNSIGNED NOT NULL');
        $this->addSql('ALTER TABLE role_permission DROP PRIMARY KEY');
        $this->addSql(
            'ALTER TABLE 
          role_permission 
        DROP 
          id, 
          CHANGE role_id role_id BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\', 
          CHANGE permission_id permission_id BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\''
        );
        $this->addSql(
            'ALTER TABLE 
          role_permission 
        ADD 
          CONSTRAINT FK_6F7DF886FED90CCA FOREIGN KEY (permission_id) REFERENCES permission (id)'
        );
        $this->addSql(
            'ALTER TABLE 
          role_permission 
        ADD 
          CONSTRAINT FK_6F7DF886D60322AC FOREIGN KEY (role_id) REFERENCES role (id)'
        );
        $this->addSql('ALTER TABLE role_permission ADD PRIMARY KEY (permission_id, role_id)');
        $this->addSql('DROP INDEX fk_role_permission_permission ON role_permission');
        $this->addSql('CREATE INDEX fk_permission_id ON role_permission (permission_id)');
        $this->addSql('DROP INDEX idx_6f7df886d60322ac ON role_permission');
        $this->addSql('CREATE INDEX fk_role_id ON role_permission (role_id)');
        $this->addSql(
            'ALTER TABLE 
          user_role 
        DROP 
          INDEX idx_user_role_unique, 
        ADD 
          INDEX idx_user_role (user_id, role_id)'
        );
        $this->addSql('ALTER TABLE user_role MODIFY id INT UNSIGNED NOT NULL');
        $this->addSql('ALTER TABLE user_role DROP PRIMARY KEY');
        $this->addSql(
            'ALTER TABLE 
          user_role 
        DROP 
          id, 
          CHANGE role_id role_id BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\', 
          CHANGE user_id user_id BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\''
        );
        $this->addSql(
            'ALTER TABLE 
          user_role 
        ADD 
          CONSTRAINT FK_2DE8C6A3D60322AC FOREIGN KEY (role_id) REFERENCES role (id)'
        );
        $this->addSql(
            'ALTER TABLE 
          user_role 
        ADD 
          CONSTRAINT FK_2DE8C6A3A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)'
        );
        $this->addSql('CREATE INDEX fk_user_id ON user_role (user_id)');
        $this->addSql('ALTER TABLE user_role ADD PRIMARY KEY (role_id, user_id)');
        $this->addSql('DROP INDEX fk_user_role_role ON user_role');
        $this->addSql('CREATE INDEX fk_role_id ON user_role (role_id)');
        $this->addSql('ALTER TABLE vital_signs MODIFY vital_sign_report_id BIGINT NOT NULL');
        $this->addSql('ALTER TABLE vital_signs DROP PRIMARY KEY');
        $this->addSql(
            'ALTER TABLE 
          vital_signs 
        ADD 
          id BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\', 
        ADD 
          diastolic NUMERIC(3, 0) NOT NULL, 
        ADD 
          oxygen_location CHAR(20) NOT NULL, 
        ADD 
          pulse_rate SMALLINT UNSIGNED NOT NULL, 
        ADD 
          respiration_rate SMALLINT UNSIGNED NOT NULL, 
        ADD 
          systolic NUMERIC(3, 0) NOT NULL, 
        DROP 
          vital_sign_report_id, 
        DROP 
          blood_pressure_top_number, 
        DROP 
          blood_pressure_bottom_number, 
        DROP 
          pulse, 
        DROP 
          respiration, 
          CHANGE patient_id patient_id BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\', 
          CHANGE temperature temperature NUMERIC(4, 1) NOT NULL, 
          CHANGE temperature_method temperature_method CHAR(20) NOT NULL, 
          CHANGE oxygen_saturation oxygen_saturation SMALLINT UNSIGNED NOT NULL, 
          CHANGE pain pain SMALLINT UNSIGNED NOT NULL, 
          CHANGE pain_location pain_location CHAR(20) NOT NULL, 
          CHANGE time created_at DATETIME NOT NULL'
        );
        $this->addSql(
            'ALTER TABLE 
          vital_signs 
        ADD 
          CONSTRAINT FK_D79431356B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)'
        );
        $this->addSql('ALTER TABLE vital_signs ADD PRIMARY KEY (id)');
        $this->addSql('DROP INDEX patient_id ON vital_signs');
        $this->addSql('CREATE INDEX fk_patient_id ON vital_signs (patient_id)');
    }
}
