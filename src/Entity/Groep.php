<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\GroepRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"groep:read"}},
 *     denormalizationContext={"groups"={"groep:write"}}
 * )
 * @ORM\Entity(repositoryClass=GroepRepository::class)
 */
class Groep
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"groep:read", "agenda:read", "persoon:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"groep:read", "groep:write", "agenda:read", "persoon:read"})
     */
    private $naam;

    /**
     * @ORM\ManyToMany(targetEntity=Persoon::class, mappedBy="persoongroep")
     * @Groups({"groep:read", "groep:write", "agenda:read", "persoon:write"})
     */
    private $persoons;

    /**
     * @ORM\ManyToOne(targetEntity=Agenda::class, inversedBy="groepId")
     * @Groups({"groep:write", "agenda:write"})
     */
    private $agenda;

    public function __construct()
    {
        $this->persoons = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNaam(): ?string
    {
        return $this->naam;
    }

    public function setNaam(string $naam): self
    {
        $this->naam = $naam;

        return $this;
    }

    /**
     * @return Collection|Persoon[]
     */
    public function getPersoons(): Collection
    {
        return $this->persoons;
    }

    public function addPersoon(Persoon $persoon): self
    {
        if (!$this->persoons->contains($persoon)) {
            $this->persoons[] = $persoon;
            $persoon->addPersoongroep($this);
        }

        return $this;
    }

    public function removePersoon(Persoon $persoon): self
    {
        if ($this->persoons->removeElement($persoon)) {
            $persoon->removePersoongroep($this);
        }

        return $this;
    }

    public function getAgenda(): ?Agenda
    {
        return $this->agenda;
    }

    public function setAgenda(?Agenda $agenda): self
    {
        $this->agenda = $agenda;

        return $this;
    }
}
