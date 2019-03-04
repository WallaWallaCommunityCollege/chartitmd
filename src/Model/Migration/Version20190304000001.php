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
final class Version20190304000001 extends AbstractMigration {
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
        $this->addSql('DROP TABLE IF EXISTS arterial_blood_gas_lab_report');
        $this->addSql('DROP TABLE IF EXISTS chemistry_chems');
        $this->addSql('DROP TABLE IF EXISTS chemistry_lab_report');
        $this->addSql('DROP TABLE IF EXISTS diagnostic_cardiology');
        $this->addSql('DROP TABLE IF EXISTS diagnostic_imaging');
        $this->addSql('DROP TABLE IF EXISTS gender');
        $this->addSql('DROP TABLE IF EXISTS hematology_lab_report');
        $this->addSql('DROP TABLE IF EXISTS hematology_names');
        $this->addSql('DROP TABLE IF EXISTS intake');
        $this->addSql('DROP TABLE IF EXISTS measured_values');
        $this->addSql('DROP TABLE IF EXISTS medication_administration');
        $this->addSql('DROP TABLE IF EXISTS microbiology_lab_report');
        $this->addSql('DROP TABLE IF EXISTS microbiology_names');
        $this->addSql('DROP TABLE IF EXISTS migrations');
        $this->addSql('DROP TABLE IF EXISTS output');
        $this->addSql('DROP TABLE IF EXISTS patients');
        $this->addSql('DROP TABLE IF EXISTS permission');
        $this->addSql('DROP TABLE IF EXISTS role');
        $this->addSql('DROP TABLE IF EXISTS role_hierarchy');
        $this->addSql('DROP TABLE IF EXISTS role_permission');
        $this->addSql('DROP TABLE IF EXISTS urinalysis_lab_report');
        $this->addSql('DROP TABLE IF EXISTS urinalysis_report_fields');
        $this->addSql('DROP TABLE IF EXISTS user_role');
        $this->addSql('DROP TABLE IF EXISTS vital_signs');
    }
    public function getDescription(): string {
        return 'Initial drop and creation of database tables';
    }
    /**
     * @param Schema $schema
     *
     * @throws DBALException
     * @throws AbortMigration
     */
    public function up(Schema $schema): void {
        // this up() migration is auto-generated, please modify it to your needs
        $this->down($schema);
        $this->abortIf(
            $this->connection->getDatabasePlatform()
                             ->getName() !== 'mysql',
            'Migration can only be executed safely on \'mysql\'.'
        );
        $this->addSql(
            'CREATE DATABASE IF NOT EXISTS chartitmd DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci'
        );
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
            'CREATE TABLE gender (
          gender_id BIGINT AUTO_INCREMENT NOT NULL, 
          gender_identity VARCHAR(20) NOT NULL COLLATE utf8mb4_general_ci, 
          gender_pronoun VARCHAR(20) NOT NULL COLLATE utf8mb4_general_ci, 
          gender_sex VARCHAR(20) NOT NULL COLLATE utf8mb4_general_ci, 
          INDEX gender_id (gender_id), 
          PRIMARY KEY(gender_id)
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
          INDEX patient_id (patient_id), 
          INDEX gender_id (gender_id), 
          PRIMARY KEY(patient_id)
        ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\''
        );
        $this->addSql(
            'CREATE TABLE permission (
          id INT UNSIGNED AUTO_INCREMENT NOT NULL, 
          name VARCHAR(100) NOT NULL COLLATE utf8_general_ci, 
          status TINYINT(1) DEFAULT \'1\' NOT NULL, 
          created_at DATETIME NOT NULL, 
          updated_at DATETIME DEFAULT NULL, 
          UNIQUE INDEX idx_role_name (name), 
          PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\''
        );
        $this->addSql(
            'CREATE TABLE role (
          id INT UNSIGNED AUTO_INCREMENT NOT NULL, 
          name VARCHAR(50) NOT NULL COLLATE utf8_general_ci, 
          status TINYINT(1) DEFAULT \'1\' NOT NULL, 
          created_at DATETIME NOT NULL, 
          updated_at DATETIME DEFAULT NULL, 
          UNIQUE INDEX idx_role_name (name), 
          PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\''
        );
        $this->addSql(
            'CREATE TABLE role_hierarchy (
          id INT UNSIGNED AUTO_INCREMENT NOT NULL, 
          parent_role_id INT UNSIGNED NOT NULL, 
          child_role_id INT UNSIGNED NOT NULL, 
          created_at DATETIME NOT NULL, 
          UNIQUE INDEX idx_role_hierarchy_unique (parent_role_id, child_role_id), 
          INDEX fk_role_hierarchy_child (child_role_id), 
          INDEX IDX_AB8EFB72A44B56EA (parent_role_id), 
          PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\''
        );
        $this->addSql(
            'CREATE TABLE role_permission (
          id INT UNSIGNED AUTO_INCREMENT NOT NULL, 
          role_id INT UNSIGNED NOT NULL, 
          permission_id INT UNSIGNED NOT NULL, 
          created_at DATETIME NOT NULL, 
          UNIQUE INDEX idx_role_permission_unique (role_id, permission_id), 
          INDEX fk_role_permission_permission (permission_id), 
          INDEX IDX_6F7DF886D60322AC (role_id), 
          PRIMARY KEY(id)
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
        $this->addSql(
            'CREATE TABLE user_role (
          id INT UNSIGNED AUTO_INCREMENT NOT NULL, 
          role_id INT UNSIGNED NOT NULL, 
          user_id INT UNSIGNED NOT NULL, 
          created_at DATETIME NOT NULL, 
          UNIQUE INDEX idx_user_role_unique (user_id, role_id), 
          INDEX fk_user_role_role (role_id), 
          PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\''
        );
        $this->addSql(
            'CREATE TABLE vital_signs (
          vital_sign_report_id BIGINT AUTO_INCREMENT NOT NULL, 
          patient_id BIGINT NOT NULL, 
          blood_pressure_top_number INT NOT NULL, 
          blood_pressure_bottom_number BIGINT NOT NULL, 
          pulse BIGINT NOT NULL, 
          respiration BIGINT NOT NULL, 
          temperature NUMERIC(10, 0) NOT NULL, 
          temperature_method VARCHAR(50) NOT NULL COLLATE utf8mb4_general_ci, 
          oxygen_saturation BIGINT NOT NULL, 
          pain INT NOT NULL, 
          pain_location VARCHAR(11) NOT NULL COLLATE utf8mb4_general_ci, 
          time DATETIME NOT NULL, 
          INDEX patient_id (patient_id), 
          PRIMARY KEY(vital_sign_report_id)
        ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\''
        );
    }
}
