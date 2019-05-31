<?php
declare(strict_types=1);

namespace ChartItMD\Model\Migration;

use Doctrine\DBAL\DBALException;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class SavedVersion20190527203533 extends AbstractMigration {
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
        $this->addSql(
            'ALTER TABLE gender
          CHANGE assigned_sex assigned_sex VARCHAR(20) DEFAULT NULL COLLATE utf8mb4_unicode_ci,
          CHANGE identity identity VARCHAR(20) DEFAULT NULL COLLATE utf8mb4_unicode_ci,
          CHANGE pronoun pronoun VARCHAR(20) DEFAULT NULL COLLATE utf8mb4_unicode_ci'
        );
        $this->addSql(
            'ALTER TABLE patient
          CHANGE first_name first_name VARCHAR(50) DEFAULT NULL COLLATE utf8mb4_unicode_ci,
          CHANGE last_name last_name VARCHAR(50) DEFAULT NULL COLLATE utf8mb4_unicode_ci'
        );
        $this->addSql(
            'ALTER TABLE permission
          CHANGE name name VARCHAR(50) DEFAULT NULL COLLATE utf8mb4_unicode_ci'
        );
        $this->addSql(
            'ALTER TABLE role
          CHANGE name name VARCHAR(50) DEFAULT NULL COLLATE utf8mb4_unicode_ci'
        );
        $this->addSql(
            'ALTER TABLE unit_of_measurement
          CHANGE symbol symbol VARCHAR(15) DEFAULT NULL COLLATE utf8mb4_unicode_ci,
          CHANGE unit_of unit_of VARCHAR(50) DEFAULT NULL COLLATE utf8mb4_unicode_ci,
          CHANGE name name VARCHAR(50) DEFAULT NULL COLLATE utf8mb4_unicode_ci'
        );
        $this->addSql(
            'ALTER TABLE user
          CHANGE name name VARCHAR(100) DEFAULT NULL COLLATE utf8mb4_unicode_ci,
          CHANGE password password VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci'
        );
    }
    /**
     * @return string
     */
    public function getDescription(): string {
        return '';
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
            'ALTER TABLE gender
          CHANGE assigned_sex assigned_sex VARCHAR(20) NOT NULL,
          CHANGE identity identity VARCHAR(20) NOT NULL,
          CHANGE pronoun pronoun VARCHAR(20) NOT NULL'
        );
        $this->addSql(
            'ALTER TABLE location
          CHANGE name name VARCHAR(50) NOT NULL'
        );
        $this->addSql(
            'ALTER TABLE measurement_range
          CHANGE name name VARCHAR(50) NOT NULL'
        );
        $this->addSql(
            'ALTER TABLE method
          CHANGE name name VARCHAR(50) NOT NULL'
        );
        $this->addSql(
            'ALTER TABLE patient
          CHANGE first_name first_name VARCHAR(50) NOT NULL,
          CHANGE last_name last_name VARCHAR(50) NOT NULL'
        );
        $this->addSql(
            'ALTER TABLE permission
          CHANGE name name VARCHAR(50) NOT NULL'
        );
        $this->addSql(
            'ALTER TABLE role
          CHANGE name name VARCHAR(50) NOT NULL'
        );
        $this->addSql(
            'ALTER TABLE unit_of_measurement
          CHANGE name name VARCHAR(50) NOT NULL,
          CHANGE symbol symbol VARCHAR(15) NOT NULL,
          CHANGE unit_of unit_of VARCHAR(50) NOT NULL'
        );
        $this->addSql(
            'ALTER TABLE user
          CHANGE name name VARCHAR(100) NOT NULL,
          CHANGE password password VARCHAR(255) NOT NULL'
        );
    }
}
