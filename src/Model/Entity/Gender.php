<?php

namespace ChartItMD\Model\Entity;

use ChartItMD\Utils\Uuid4Trait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Gender
 *
 * @ORM\Table(name="gender", uniqueConstraints={@ORM\UniqueConstraint(name="gender_all", columns={"identity","pronoun","assigned_sex"})})
 * @ORM\Entity(repositoryClass="ChartItMD\Model\Repository\GenderRepository")
 */
class Gender {
    use Uuid4Trait;
    /**
     * Gender constructor.
     *
     * @param User   $createdBy
     * @param string $identity
     * @param string $pronoun
     * @param string $sex
     *
     * @throws \Exception
     */
    public function __construct(User $createdBy, string $identity, string $pronoun, string $sex) {
        $this->identity = $identity;
        $this->pronoun = $pronoun;
        $this->assignedSex = $sex;
        $this->id = $this->asBase64();
        $this->createdAt = new \DateTimeImmutable();
        $this->createdBy = $createdBy;
    }
    /**
     * @return string
     */
    public function getAssignedSex(): string {
        return $this->assignedSex;
    }
    /**
     * @return \DateTimeImmutable
     */
    public function getCreatedAt(): \DateTimeImmutable {
        return $this->createdAt;
    }
    /**
     * @return User
     */
    public function getCreatedBy(): User {
        return $this->createdBy;
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
    public function getIdentity(): string {
        return $this->identity;
    }
    /**
     * @return string
     */
    public function getPronoun(): string {
        return $this->pronoun;
    }
    /**
     * @var string
     *
     * @ORM\Column(name="assigned_sex", type="string", length=20, nullable=false)
     */
    private $assignedSex;
    /**
     * @var \DateTimeImmutable
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;
    /**
     * @var User $createdBy
     *
     * @ORM\Column(name="created_by", type="uuid64", nullable=false)
     * @ORM\ManyToOne(targetEntity="User")
     */
    private $createdBy;
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
     * @ORM\Column(type="string", length=20, nullable=false)
     */
    private $identity;
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=20, nullable=false)
     */
    private $pronoun;
}
