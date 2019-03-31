<?php

namespace ChartItMD\Model\Entity;

use ChartItMD\Model\JsonArrayCollection;
use ChartItMD\Utils\Uuid4Trait;
use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;

/**
 * Patient
 *
 * @ORM\Table(name="patient",
 *     indexes={
 *         @ORM\Index(name="fk_gender_id", columns={"gender_id"})
 *     }
 * )
 * @ORM\Entity(repositoryClass="ChartItMD\Model\Repository\PatientRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Patient implements JsonSerializable {
    use Uuid4Trait;
    use EntityCommon;
    /**
     * Patients constructor.
     *
     * @param User   $createdBy
     * @param string $firstName
     * @param string $lastName
     *
     * @throws \Exception
     */
    public function __construct(User $createdBy, string $firstName, string $lastName) {
        $this->createdBy = $createdBy;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->bloodPressures = new JsonArrayCollection();
        $this->heights = new JsonArrayCollection();
        $this->weights = new JsonArrayCollection();
        $this->id = $this->asBase64();
        $this->createdAt = new \DateTimeImmutable();
    }
    /**
     * @return BloodPressure[]|JsonArrayCollection
     */
    public function getBloodPressures() {
        return $this->bloodPressures;
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
     * @return JsonArrayCollection|PatientHeight[]
     */
    public function getHeights() {
        return $this->heights;
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
     * @return JsonArrayCollection|PatientWeight[]
     */
    public function getWeights() {
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
     * @param Gender $value
     *
     * @return self Fluent interface
     */
    public function setGender(Gender $value): self {
        $this->gender = $value;
        return $this;
    }
    /**
     * @var JsonArrayCollection|BloodPressure[] $bloodPressures
     *
     * @ORM\OneToMany(targetEntity="BloodPressure", mappedBy="patient")
     * @ORM\OrderBy({"createdAt" = "DESC"})
     */
    private $bloodPressures;
    /**
     * @var \DateTime $dateOfBirth
     *
     * @ORM\Column(name="date_of_birth", type="date", nullable=true)
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
     * @ORM\JoinColumn(name="gender_id", referencedColumnName="id", nullable=false)
     */
    private $gender;
    /**
     * @var JsonArrayCollection|PatientHeight[] $heights
     *
     * @ORM\OneToMany(targetEntity="PatientHeight", mappedBy="patient")
     * @ORM\OrderBy({"createdAt" = "DESC"})
     */
    private $heights;
    /**
     * @var string $lastName
     *
     * @ORM\Column(name="last_name", type="string", length=50, nullable=false)
     */
    private $lastName;
    /**
     * @var \DateTime|null $updatedAt
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;
    /**
     * @var JsonArrayCollection|PatientWeight[] $weights
     *
     * @ORM\OneToMany(targetEntity="PatientWeight", mappedBy="patient")
     * @ORM\OrderBy({"createdAt" = "DESC"})
     */
    private $weights;
}
