<?php
declare(strict_types=1);

namespace ChartItMD\Model\Migration;

use Doctrine\DBAL\DBALException;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Initialize database.
 */
final class Version20190527083259 extends AbstractMigration {
    /**
     * @param Schema $schema
     *
     * @throws DBALException
     */
    public function down(Schema $schema): void {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf(
            'mysql' !== $this->connection->getDatabasePlatform()
                                         ->getName(),
            'Migration can only be executed safely on \'mysql\'.'
        );
        $this->addSql('DROP TABLE blood_pressure');
        $this->addSql('DROP TABLE gender');
        $this->addSql('DROP TABLE height');
        $this->addSql('DROP TABLE location');
        $this->addSql('DROP TABLE measurement_range');
        $this->addSql('DROP TABLE method');
        $this->addSql('DROP TABLE oxygen_saturation');
        $this->addSql('DROP TABLE pain');
        $this->addSql('DROP TABLE patient');
        $this->addSql('DROP TABLE permission');
        $this->addSql('DROP TABLE pulse');
        $this->addSql('DROP TABLE respiration');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE role_hierarchy');
        $this->addSql('DROP TABLE role_permission');
        $this->addSql('DROP TABLE temperature');
        $this->addSql('DROP TABLE unit_of_measurement');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_role');
        $this->addSql('DROP TABLE vital_signs');
        $this->addSql('DROP TABLE weight');
    }
    /** @noinspection PhpMissingParentCallCommonInspection */
    /**
     * @return string
     */
    public function getDescription(): string {
        return 'Initialize database';
    }
    /**
     * @param Schema $schema
     *
     * @throws DBALException
     */
    public function up(Schema $schema): void {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf(
            'mysql' !== $this->connection->getDatabasePlatform()
                                         ->getName(),
            'Migration can only be executed safely on \'mysql\'.'
        );
        $this->addSql(
            'CREATE TABLE blood_pressure (
          id BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\',
          location BINARY(22) DEFAULT NULL COMMENT \'(DC2Type:uuid64)\',
          measured_in BINARY(22) DEFAULT NULL COMMENT \'(DC2Type:uuid64)\',
          method_used BINARY(22) DEFAULT NULL COMMENT \'(DC2Type:uuid64)\',
          patient_id BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\',
          created_by BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\',
          diastolic SMALLINT UNSIGNED NOT NULL,
          systolic SMALLINT UNSIGNED NOT NULL,
          created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\',
          INDEX IDX_FEC195C25E9E89CB (location),
          INDEX IDX_FEC195C26B899279 (patient_id),
          INDEX idx_created_at (created_at),
          INDEX IDX_FEC195C26593196E (method_used),
          INDEX IDX_FEC195C2DE12AB56 (created_by),
          INDEX IDX_FEC195C2CA379860 (measured_in),
          PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci ENGINE = InnoDB COMMENT = \'\''
        );
        $this->addSql(
            'CREATE TABLE gender (
          id BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\',
          created_by BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\',
          assigned_sex VARCHAR(20) NOT NULL COLLATE utf8mb4_unicode_520_ci,
          identity VARCHAR(20) NOT NULL COLLATE utf8mb4_unicode_520_ci,
          pronoun VARCHAR(20) NOT NULL COLLATE utf8mb4_unicode_520_ci,
          created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\',
          INDEX idx_created_at (created_at),
          UNIQUE INDEX gender_all (identity, pronoun, assigned_sex),
          INDEX IDX_C7470A42DE12AB56 (created_by),
          PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci ENGINE = InnoDB COMMENT = \'\''
        );
        $this->addSql(
            'CREATE TABLE height (
          id BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\',
          patient_id BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\',
          created_by BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\',
          measured_in BINARY(22) DEFAULT NULL COMMENT \'(DC2Type:uuid64)\',
          height NUMERIC(4, 1) NOT NULL,
          created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\',
          INDEX IDX_F54DE50FDE12AB56 (created_by),
          INDEX IDX_F54DE50FCA379860 (measured_in),
          INDEX idx_created_at (created_at),
          INDEX IDX_F54DE50F6B899279 (patient_id),
          PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci ENGINE = InnoDB COMMENT = \'\''
        );
        $this->addSql(
            'CREATE TABLE location (
          id BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\',
          created_by BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\',
          abbreviation VARCHAR(15) DEFAULT NULL COLLATE utf8mb4_unicode_520_ci,
          description VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_520_ci,
          name VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_520_ci,
          created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\',
          INDEX idx_created_at (created_at),
          INDEX IDX_5E9E89CBDE12AB56 (created_by),
          UNIQUE INDEX UNIQ_5E9E89CB5E237E06 (name),
          PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci ENGINE = InnoDB COMMENT = \'\''
        );
        $this->addSql(
            'CREATE TABLE measurement_range (
          id BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\',
          created_by BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\',
          maximum DOUBLE PRECISION NOT NULL,
          minimum DOUBLE PRECISION NOT NULL,
          sigma_minus1 DOUBLE PRECISION NOT NULL,
          sigma_minus2 DOUBLE PRECISION DEFAULT NULL,
          sigma_minus3 DOUBLE PRECISION DEFAULT NULL,
          sigma_plus1 DOUBLE PRECISION NOT NULL,
          sigma_plus2 DOUBLE PRECISION DEFAULT NULL,
          sigma_plus3 DOUBLE PRECISION DEFAULT NULL,
          description VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_520_ci,
          name VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_520_ci,
          created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\',
          INDEX idx_created_at (created_at),
          INDEX IDX_8F98ADCFDE12AB56 (created_by),
          UNIQUE INDEX UNIQ_8F98ADCF5E237E06 (name),
          PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci ENGINE = InnoDB COMMENT = \'\''
        );
        $this->addSql(
            'CREATE TABLE method (
          id BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\',
          created_by BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\',
          abbreviation VARCHAR(15) DEFAULT NULL COLLATE utf8mb4_unicode_520_ci,
          description VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_520_ci,
          name VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_520_ci,
          created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\',
          INDEX idx_created_at (created_at),
          INDEX IDX_5E593A60DE12AB56 (created_by),
          UNIQUE INDEX UNIQ_5E593A605E237E06 (name),
          PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci ENGINE = InnoDB COMMENT = \'\''
        );
        $this->addSql(
            'CREATE TABLE oxygen_saturation (
          id BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\',
          measured_in BINARY(22) DEFAULT NULL COMMENT \'(DC2Type:uuid64)\',
          patient_id BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\',
          created_by BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\',
          location BINARY(22) DEFAULT NULL COMMENT \'(DC2Type:uuid64)\',
          method_used BINARY(22) DEFAULT NULL COMMENT \'(DC2Type:uuid64)\',
          saturation SMALLINT UNSIGNED NOT NULL,
          created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\',
          INDEX idx_created_at (created_at),
          INDEX IDX_B99A6B5D6B899279 (patient_id),
          INDEX IDX_B99A6B5DDE12AB56 (created_by),
          INDEX IDX_B99A6B5D6593196E (method_used),
          INDEX IDX_B99A6B5DCA379860 (measured_in),
          INDEX IDX_B99A6B5D5E9E89CB (location),
          PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci ENGINE = InnoDB COMMENT = \'\''
        );
        $this->addSql(
            'CREATE TABLE pain (
          id BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\',
          location_id BINARY(22) DEFAULT NULL COMMENT \'(DC2Type:uuid64)\',
          patient_id BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\',
          created_by BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\',
          rating SMALLINT UNSIGNED NOT NULL,
          created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\',
          INDEX idx_created_at (created_at),
          INDEX IDX_1D5B4226DE12AB56 (created_by),
          INDEX IDX_1D5B422664D218E (location_id),
          INDEX IDX_1D5B42266B899279 (patient_id),
          PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci ENGINE = InnoDB COMMENT = \'\''
        );
        $this->addSql(
            'CREATE TABLE patient (
          id BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\',
          gender_id BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\',
          created_by BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\',
          date_of_birth DATETIME NOT NULL,
          first_name VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_520_ci,
          last_name VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_520_ci,
          updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\',
          created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\',
          INDEX IDX_1ADAD7EB708A0E0 (gender_id),
          INDEX idx_created_at (created_at),
          INDEX IDX_1ADAD7EBDE12AB56 (created_by),
          PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci ENGINE = InnoDB COMMENT = \'\''
        );
        $this->addSql(
            'CREATE TABLE permission (
          id BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\',
          created_by BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\',
          created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\',
          description VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_520_ci,
          name VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_520_ci,
          status TINYINT(1) NOT NULL,
          updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\',
          INDEX idx_created_at (created_at),
          INDEX IDX_E04992AADE12AB56 (created_by),
          UNIQUE INDEX UNIQ_E04992AA5E237E06 (name),
          PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci ENGINE = InnoDB COMMENT = \'\''
        );
        $this->addSql(
            'CREATE TABLE pulse (
          id BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\',
          created_by BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\',
          location BINARY(22) DEFAULT NULL COMMENT \'(DC2Type:uuid64)\',
          measured_in BINARY(22) DEFAULT NULL COMMENT \'(DC2Type:uuid64)\',
          method_used BINARY(22) DEFAULT NULL COMMENT \'(DC2Type:uuid64)\',
          patient_id BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\',
          rate SMALLINT UNSIGNED NOT NULL,
          created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\',
          INDEX IDX_1B16CADACA379860 (measured_in),
          INDEX IDX_1B16CADA6B899279 (patient_id),
          INDEX IDX_1B16CADA5E9E89CB (location),
          INDEX idx_created_at (created_at),
          INDEX IDX_1B16CADADE12AB56 (created_by),
          INDEX IDX_1B16CADA6593196E (method_used),
          PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci ENGINE = InnoDB COMMENT = \'\''
        );
        $this->addSql(
            'CREATE TABLE respiration (
          id BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\',
          created_by BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\',
          location BINARY(22) DEFAULT NULL COMMENT \'(DC2Type:uuid64)\',
          measured_in BINARY(22) DEFAULT NULL COMMENT \'(DC2Type:uuid64)\',
          method_used BINARY(22) DEFAULT NULL COMMENT \'(DC2Type:uuid64)\',
          patient_id BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\',
          rate SMALLINT UNSIGNED NOT NULL,
          created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\',
          INDEX IDX_88DBFC38CA379860 (measured_in),
          INDEX IDX_88DBFC386B899279 (patient_id),
          INDEX IDX_88DBFC385E9E89CB (location),
          INDEX idx_created_at (created_at),
          INDEX IDX_88DBFC38DE12AB56 (created_by),
          INDEX IDX_88DBFC386593196E (method_used),
          PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci ENGINE = InnoDB COMMENT = \'\''
        );
        $this->addSql(
            'CREATE TABLE role (
          id BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\',
          created_by BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\',
          created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\',
          description VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_520_ci,
          name VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_520_ci,
          status TINYINT(1) NOT NULL,
          updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\',
          INDEX idx_created_at (created_at),
          INDEX IDX_57698A6ADE12AB56 (created_by),
          UNIQUE INDEX UNIQ_57698A6A5E237E06 (name),
          PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci ENGINE = InnoDB COMMENT = \'\''
        );
        $this->addSql(
            'CREATE TABLE role_hierarchy (
          child_id BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\',
          parent_id BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\',
          created_by BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\',
          created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\',
          INDEX IDX_AB8EFB72727ACA70 (parent_id),
          INDEX IDX_AB8EFB72DD62C21B (child_id),
          INDEX idx_parent_child (parent_id, child_id),
          INDEX idx_created_at (created_at),
          INDEX IDX_AB8EFB72DE12AB56 (created_by),
          PRIMARY KEY(child_id, parent_id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci ENGINE = InnoDB COMMENT = \'\''
        );
        $this->addSql(
            'CREATE TABLE role_permission (
          permission_id BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\',
          role_id BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\',
          created_by BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\',
          created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\',
          INDEX IDX_6F7DF886D60322AC (role_id),
          INDEX IDX_6F7DF886FED90CCA (permission_id),
          INDEX idx_role_permission (role_id, permission_id),
          INDEX idx_created_at (created_at),
          INDEX IDX_6F7DF886DE12AB56 (created_by),
          PRIMARY KEY(permission_id, role_id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci ENGINE = InnoDB COMMENT = \'\''
        );
        $this->addSql(
            'CREATE TABLE temperature (
          id BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\',
          patient_id BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\',
          measured_in BINARY(22) DEFAULT NULL COMMENT \'(DC2Type:uuid64)\',
          created_by BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\',
          location BINARY(22) DEFAULT NULL COMMENT \'(DC2Type:uuid64)\',
          method_used BINARY(22) DEFAULT NULL COMMENT \'(DC2Type:uuid64)\',
          temperature NUMERIC(4, 1) DEFAULT NULL,
          created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\',
          INDEX idx_created_at (created_at),
          INDEX IDX_BE4E2A6C6B899279 (patient_id),
          INDEX IDX_BE4E2A6CDE12AB56 (created_by),
          INDEX IDX_BE4E2A6C6593196E (method_used),
          INDEX IDX_BE4E2A6CCA379860 (measured_in),
          INDEX IDX_BE4E2A6C5E9E89CB (location),
          PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci ENGINE = InnoDB COMMENT = \'\''
        );
        $this->addSql(
            'CREATE TABLE unit_of_measurement (
          id BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\',
          created_by BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\',
          measurement_range BINARY(22) DEFAULT NULL COMMENT \'(DC2Type:uuid64)\',
          description VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_520_ci,
          name VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_520_ci,
          symbol VARCHAR(15) NOT NULL COLLATE utf8mb4_unicode_520_ci,
          unit_of VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_520_ci,
          created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\',
          INDEX IDX_DC68A604DE12AB56 (created_by),
          UNIQUE INDEX UNIQ_DC68A6045E237E06 (name),
          INDEX IDX_DC68A6048F98ADCF (measurement_range),
          UNIQUE INDEX UNIQ_DC68A604ECC836F9 (symbol),
          INDEX idx_created_at (created_at),
          PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci ENGINE = InnoDB COMMENT = \'\''
        );
        $this->addSql(
            'CREATE TABLE user (
          id BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\',
          created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\',
          name VARCHAR(100) NOT NULL COLLATE utf8mb4_unicode_520_ci,
          password VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_520_ci,
          updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\',
          INDEX idx_created_at (created_at),
          UNIQUE INDEX UNIQ_8D93D6495E237E06 (name),
          PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci ENGINE = InnoDB COMMENT = \'\''
        );
        $this->addSql(
            'INSERT INTO user (id, created_at, name, password)
        VALUES("0wkpf5DlJ11rUhzTOMKSBt", "2019-03-22 21:48:25", "dragonrun1",
        "$2y$12$Q1cnZ6Kd2m9/kfDuRvKQX.fcXY3dRgGt2pFUr8aPYLC8gT37WS6VO")'
        );
        $this->addSql(
            'CREATE TABLE user_role (
          role_id BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\',
          user_id BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\',
          created_by BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\',
          created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\',
          INDEX IDX_2DE8C6A3A76ED395 (user_id),
          INDEX IDX_2DE8C6A3D60322AC (role_id),
          INDEX idx_user_role (user_id, role_id),
          INDEX idx_created_at (created_at),
          INDEX IDX_2DE8C6A3DE12AB56 (created_by),
          PRIMARY KEY(role_id, user_id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci ENGINE = InnoDB COMMENT = \'\''
        );
        $this->addSql(
            'CREATE TABLE vital_signs (
          id BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\',
          patient_id BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\',
          created_by BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\',
          oxygen_location BINARY(22) DEFAULT NULL COMMENT \'(DC2Type:uuid64)\',
          pain_location BINARY(22) DEFAULT NULL COMMENT \'(DC2Type:uuid64)\',
          temperature_method BINARY(22) DEFAULT NULL COMMENT \'(DC2Type:uuid64)\',
          created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\',
          diastolic NUMERIC(3, 0) DEFAULT NULL,
          oxygen_saturation SMALLINT UNSIGNED DEFAULT NULL,
          pain SMALLINT UNSIGNED DEFAULT NULL,
          pulse_rate SMALLINT UNSIGNED DEFAULT NULL,
          respiration_rate SMALLINT UNSIGNED DEFAULT NULL,
          systolic NUMERIC(3, 0) DEFAULT NULL,
          temperature NUMERIC(4, 1) DEFAULT NULL,
          INDEX IDX_D794313574975E1A (pain_location),
          INDEX IDX_D79431351020DBD (oxygen_location),
          INDEX IDX_D79431356B899279 (patient_id),
          INDEX IDX_D7943135DE12AB56 (created_by),
          INDEX IDX_D7943135572502A3 (temperature_method),
          PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci ENGINE = InnoDB COMMENT = \'\''
        );
        $this->addSql(
            'CREATE TABLE weight (
          id BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\',
          patient_id BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\',
          created_by BINARY(22) NOT NULL COMMENT \'(DC2Type:uuid64)\',
          measured_in BINARY(22) DEFAULT NULL COMMENT \'(DC2Type:uuid64)\',
          weight NUMERIC(4, 1) NOT NULL,
          created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\',
          INDEX IDX_7CD5541DE12AB56 (created_by),
          INDEX IDX_7CD5541CA379860 (measured_in),
          INDEX idx_created_at (created_at),
          INDEX IDX_7CD55416B899279 (patient_id),
          PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci ENGINE = InnoDB COMMENT = \'\''
        );
    }
}
