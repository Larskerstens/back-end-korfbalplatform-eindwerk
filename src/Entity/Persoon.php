<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PersoonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=PersoonRepository::class)
 */
class Persoon
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $voornaam;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $achternaam;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $leeftijd;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $geboortedatum;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $straat;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $huisnr;

    /**
     * @ORM\ManyToOne(targetEntity=Team::class, inversedBy="teamId")
     */
    private $teamId;

    /**
     * @ORM\ManyToOne(targetEntity=Postcode::class, inversedBy="postcodeIdpersoon")
     */
    private $postcodeId;

    /**
     * @ORM\ManyToMany(targetEntity=Groep::class, inversedBy="persoons")
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
}