<?php
declare(strict_types=1);
/**
 * Contains class Patient.
 *
 * PHP version 7.1+
 *
 * LICENSE:
 * This file is part of ChartItMD.
 * Copyright (C) 2019 ChartItMD Development Group
 *
 * @author    Michael Cummings <mgcummings@yahoo.com>
 * @copyright 2019 ChartItMD Development Group
 * @license   Proprietary
 */

namespace ChartItMD\Model\Entity;

use ChartItMD\Utils\Uuid4Trait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Patient
 *
 * @ORM\Table(name="patient",
 *     indexes={
 *         @ORM\Index(name="idx_created_at", columns={"created_at"})
 *     }
 * )
 * @ORM\Entity(repositoryClass="ChartItMD\Model\Repository\PatientRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Patient implements \JsonSerializable {
    use EntityCommon;
    use Uuid4Trait;
    /**
     * Patients constructor.
     *
     * @param User      $createdBy
     * @param \DateTime $dateOfBirth
     * @param string    $firstName
     * @param string    $lastName
     *
     * @throws \Exception
     */
    public function __construct(User $createdBy, \DateTime $dateOfBirth, string $firstName, string $lastName) {
        $this->createdAt = new \DateTimeImmutable();
        $this->createdBy = $createdBy;
        $this->id = $this->asBase64();
        $this->dateOfBirth = $dateOfBirth;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }
    /**
     * @return \DateTime
     */
    public function getDateOfBirth(): \DateTime {
        return $this->dateOfBirth;
    }
    /**
     * @return string
     */
    public function getFirstName(): string {
        return $this->firstName;
    }
    /**
     * @return Gender
     */
    public function getGender(): Gender {
        return $this->gender;
    }
    /**
     * @return string
     */
    public function getLastName(): string {
        return $this->lastName;
    }
    /**
     * Date and time when entity was updated.
     *
     * Note:
     * Doctrine often will return date-times as plain string instead of correct
     * object so this method will correct it when called.
     *
     * @return \DateTimeImmutable|null
     * @throws \Exception
     */
    public function getUpdatedAt(): ?\DateTimeImmutable {
        if (null !== $this->updatedAt && !$this->updatedAt instanceof \DateTimeImmutable) {
            $this->updatedAt = new \DateTimeImmutable($this->updatedAt);
        }
        return $this->updatedAt;
    }
    /**
     * @ORM\PreUpdate
     * @throws \Exception
     */
    public function preUpdate(): void {
        $this->updatedAt = new \DateTimeImmutable();
    }
    /**
     * @param Gender $value
     *
     * @return self Fluent interface
     */
    public function setGender(Gender $value): self {
        $this->gender = $value;
        return $this;
    }
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_of_birth", type="datetime", nullable=false)
     */
    private $dateOfBirth;
    /**
     * @var string $firstName
     *
     * @ORM\Column(name="first_name", type="string", length=50, nullable=false)
     */
    private $firstName;
    /**
     * @var Gender $gender
     *
     * @ORM\ManyToOne(targetEntity="Gender")
     * @ORM\JoinColumn(nullable=false)
     */
    private $gender;
    /**
     * @var string $lastName
     *
     * @ORM\Column(name="last_name", type="string", length=50, nullable=false)
     */
    private $lastName;
    /**
     * @var \DateTimeImmutable|null
     *
     * @ORM\Column(name="updated_at", type="datetime_immutable", nullable=true)
     */
    private $updatedAt;
}
