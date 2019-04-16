<?php
declare(strict_types=1);

namespace ChartItMD\Model\Entity;

use ChartItMD\Utils\Uuid4Trait;
use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;

/**
 * Gender
 *
 * @ORM\Table(name="gender",
 *     indexes={
 *         @ORM\Index(name="idx_created_at", columns={"created_at"})
 *     },
 *     uniqueConstraints={
 *         @ORM\UniqueConstraint(name="gender_all", columns={"identity", "pronoun", "assigned_sex"})
 *     }
 * )
 * @ORM\Entity(repositoryClass="ChartItMD\Model\Repository\GenderRepository")
 */
class Gender implements JsonSerializable {
    use Uuid4Trait;
    use EntityCommon;
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
