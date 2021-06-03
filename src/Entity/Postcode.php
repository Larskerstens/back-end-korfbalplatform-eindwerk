<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PostcodeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"postcode:read"}},
 *     denormalizationContext={"groups"={"postcode:write"}}
 * )
 * @ORM\Entity(repositoryClass=PostcodeRepository::class)
 */
class Postcode
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"postcode:read", "club:read", "persoon:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"postcode:read", "postcode:write", "club:read", "persoon:read"})
     */
    private $code;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"postcode:read", "postcode:write", "club:read", "persoon:read"})
     */
    private $gemeente;

    /**
     * @ORM\OneToMany(targetEntity=Club::class, mappedBy="postcodeId")
     * @Groups({"club:write"})
     */
    private $postcodeId;

    /**
     * @ORM\OneToMany(targetEntity=Persoon::class, mappedBy="postcodeId")
     * @Groups({"persoon:write"})
     */
    private $postcodeIdpersoon;

    public function __construct()
    {
        $this->postcodeId = new ArrayCollection();
        $this->postcodeIdpersoon = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?int
    {
        return $this->code;
    }

    public function setCode(int $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getGemeente(): ?string
    {
        return $this->gemeente;
    }

    public function setGemeente(string $gemeente): self
    {
        $this->gemeente = $gemeente;

        return $this;
    }

    /**
     * @return Collection|Club[]
     */
    public function getPostcodeId(): Collection
    {
        return $this->postcodeId;
    }

    public function addPostcodeId(Club $postcodeId): self
    {
        if (!$this->postcodeId->contains($postcodeId)) {
            $this->postcodeId[] = $postcodeId;
            $postcodeId->setPostcodeId($this);
        }

        return $this;
    }

    public function removePostcodeId(Club $postcodeId): self
    {
        if ($this->postcodeId->removeElement($postcodeId)) {
            // set the owning side to null (unless already changed)
            if ($postcodeId->getPostcodeId() === $this) {
                $postcodeId->setPostcodeId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Persoon[]
     */
    public function getPostcodeIdpersoon(): Collection
    {
        return $this->postcodeIdpersoon;
    }

    public function addPostcodeIdpersoon(Persoon $postcodeIdpersoon): self
    {
        if (!$this->postcodeIdpersoon->contains($postcodeIdpersoon)) {
            $this->postcodeIdpersoon[] = $postcodeIdpersoon;
            $postcodeIdpersoon->setPostcodeId($this);
        }

        return $this;
    }

    public function removePostcodeIdpersoon(Persoon $postcodeIdpersoon): self
    {
        if ($this->postcodeIdpersoon->removeElement($postcodeIdpersoon)) {
            // set the owning side to null (unless already changed)
            if ($postcodeIdpersoon->getPostcodeId() === $this) {
                $postcodeIdpersoon->setPostcodeId(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->gemeente;
    }
}
