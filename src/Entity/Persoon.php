<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PersoonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"persoon:read"}},
 *     denormalizationContext={"groups"={"persoon:write"}}
 * )
 * @ORM\Entity(repositoryClass=PersoonRepository::class)
 */
class Persoon
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"persoon:read", "groep:read", "agenda:read", "team:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"persoon:read", "groep:read", "agenda:read", "team:read"})
     */
    private $voornaam;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"persoon:read", "groep:read", "agenda:read", "team:read"})
     */
    private $achternaam;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"persoon:read", "team:read"})
     */
    private $leeftijd;

    /**
     * @ORM\Column(type="date", nullable=true)
     * @Groups({"persoon:read"})
     */
    private $geboortedatum;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"persoon:read"})
     */
    private $straat;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"persoon:read"})
     */
    private $huisnr;

    /**
     * @ORM\ManyToOne(targetEntity=Team::class, inversedBy="teamId")
     * @Groups({"persoon:read", "groep:read"})
     */
    private $teamId;

    /**
     * @ORM\ManyToOne(targetEntity=Postcode::class, inversedBy="postcodeIdpersoon")
     * @Groups({"persoon:read"})
     */
    private $postcodeId;

    /**
     * @ORM\ManyToMany(targetEntity=Groep::class, inversedBy="persoons")
     * @Groups({"persoon:read"})
     */
    private $persoongroep;

    public function __construct()
    {
        $this->persoongroep = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVoornaam(): ?string
    {
        return $this->voornaam;
    }

    public function setVoornaam(string $voornaam): self
    {
        $this->voornaam = $voornaam;

        return $this;
    }

    public function getAchternaam(): ?string
    {
        return $this->achternaam;
    }

    public function setAchternaam(string $achternaam): self
    {
        $this->achternaam = $achternaam;

        return $this;
    }

    public function getLeeftijd(): ?int
    {
        return $this->leeftijd;
    }

    public function setLeeftijd(?int $leeftijd): self
    {
        $this->leeftijd = $leeftijd;

        return $this;
    }

    public function getGeboortedatum(): ?\DateTimeInterface
    {
        return $this->geboortedatum;
    }

    public function setGeboortedatum(?\DateTimeInterface $geboortedatum): self
    {
        $this->geboortedatum = $geboortedatum;

        return $this;
    }

    public function getStraat(): ?string
    {
        return $this->straat;
    }

    public function setStraat(?string $straat): self
    {
        $this->straat = $straat;

        return $this;
    }

    public function getHuisnr(): ?int
    {
        return $this->huisnr;
    }

    public function setHuisnr(?int $huisnr): self
    {
        $this->huisnr = $huisnr;

        return $this;
    }

    public function getTeamId(): ?Team
    {
        return $this->teamId;
    }

    public function setTeamId(?Team $teamId): self
    {
        $this->teamId = $teamId;

        return $this;
    }

    public function getPostcodeId(): ?Postcode
    {
        return $this->postcodeId;
    }

    public function setPostcodeId(?Postcode $postcodeId): self
    {
        $this->postcodeId = $postcodeId;

        return $this;
    }

    /**
     * @return Collection|Groep[]
     */
    public function getPersoongroep(): Collection
    {
        return $this->persoongroep;
    }

    public function addPersoongroep(Groep $persoongroep): self
    {
        if (!$this->persoongroep->contains($persoongroep)) {
            $this->persoongroep[] = $persoongroep;
        }

        return $this;
    }

    public function removePersoongroep(Groep $persoongroep): self
    {
        $this->persoongroep->removeElement($persoongroep);

        return $this;
    }

    public function __toString()
    {
        return $this->voornaam . ' ' . $this->achternaam;
    }
}
