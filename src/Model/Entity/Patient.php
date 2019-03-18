<?php

namespace ChartItMD\Model\Entity;

use ChartItMD\Utils\Uuid4Trait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ChartItMD\Model\Repository as repos;
/**
 * Patient
 *
 * @ORM\Table(name="patient", indexes={@ORM\Index(name="gender_id", columns={"gender_id"})})
 * @ORM\Entity(repositoryClass="ChartItMD\Model\Repository\PatientRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Patient {
    use Uuid4Trait;
    /**
     * Patients constructor.
     *
     * @param string $firstName
     * @param string $lastName
     *
     * @throws \Exception
     */
    public function __construct(string $firstName, string $lastName) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->heights = new ArrayCollection();
        $this->vitalSigns = new ArrayCollection();
        $this->weights = new ArrayCollection();
        $this->id = $this->asBase64();
        $this->createdAt = new \DateTimeImmutable();
    }
    /**
     * @return \DateTimeImmutable
     */
    public function getCreatedAt(): \DateTimeImmutable {
        return $this->createdAt;
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
     * @return Collection
     */
    public function getHeights(): Collection {
        return $this->heights;
    }
    /**
     * @return string
     */
    public function getId(): string {
        return $this->id;
    }
    /**
     * @return string
     */
    public function getLastName(): string {
        return $this->lastName;
    }
    /**
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime {
        return $this->updatedAt;
    }
    /**
     * @return Collection
     */
    public function getVitalSigns(): Collection {
        return $this->vitalSigns;
    }
    /**
     * @return Collection
     */
    public function getWeights(): Collection {
        return $this->weights;
    }
    /**
     * @ORM\PreUpdate
     * @throws \Exception
     */
    public function preUpdate(): void {
        $this->updatedAt = new \DateTimeImmutable();
    }
    /**
     * @var \DateTimeImmutable
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dob", type="date", nullable=true)
     */
    private $dateOfBirth;
    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=50, nullable=false)
     */
    private $firstName;
    /**
     * @var Gender
     *
     * @ORM\ManyToOne(targetEntity="Gender")
     */
    private $gender;
    /**
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity="PatientHeight", mappedBy="patient")
     */
    private $heights;
    /**
     * @var string
     *
     * @ORM\Column(type="uuid64", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="ChartItMD\Model\Uuid64Generator")
     */
    private $id;
    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=50, nullable=false)
     */
    private $lastName;
    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;
    /**
     * @var Collection $vitalSigns
     *
     * @ORM\OneToMany(targetEntity="VitalSigns", mappedBy="patient")
     */
    private $vitalSigns;
    /**
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity="PatientWeight", mappedBy="patient")
     */
    private $weights;
    /**
     * @var BloodPressure $bloodPressure
     *
     * @ORM\OneToMany(targetEntity="BloodPressure", mappedBy="patient")
     */
    private $bloodPressure;
}
