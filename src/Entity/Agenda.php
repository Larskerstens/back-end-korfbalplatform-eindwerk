<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AgendaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=AgendaRepository::class)
 */
class Agenda
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $datum;

    /**
     * @ORM\Column(type="datetime")
     */
    private $startuur;

    /**
     * @ORM\Column(type="datetime")
     */
    private $stopuur;

    /**
     * @ORM\OneToMany(targetEntity=Wedstrijd::class, mappedBy="agenda")
     */
    private $wedstrijdId;

    /**
     * @ORM\OneToMany(targetEntity=Training::class, mappedBy="agenda")
     */
    private $trainingId;

    /**
     * @ORM\OneToMany(targetEntity=Groep::class, mappedBy="agenda")
     */
    private $groepId;

    public function __construct()
    {
        $this->wedstrijdId = new ArrayCollection();
        $this->trainingId = new ArrayCollection();
        $this->groepId = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatum(): ?\DateTimeInterface
    {
        return $this->datum;
    }

    public function setDatum(\DateTimeInterface $datum): self
    {
        $this->datum = $datum;

        return $this;
    }

    public function getStartuur(): ?\DateTimeInterface
    {
        return $this->startuur;
    }

    public function setStartuur(\DateTimeInterface $startuur): self
    {
        $this->startuur = $startuur;

        return $this;
    }

    public function getStopuur(): ?\DateTimeInterface
    {
        return $this->stopuur;
    }

    public function setStopuur(\DateTimeInterface $stopuur): self
    {
        $this->stopuur = $stopuur;

        return $this;
    }

    /**
     * @return Collection|Wedstrijd[]
     */
    public function getWedstrijdId(): Collection
    {
        return $this->wedstrijdId;
    }

    public function addWedstrijdId(Wedstrijd $wedstrijdId): self
    {
        if (!$this->wedstrijdId->contains($wedstrijdId)) {
            $this->wedstrijdId[] = $wedstrijdId;
            $wedstrijdId->setAgenda($this);
        }

        return $this;
    }

    public function removeWedstrijdId(Wedstrijd $wedstrijdId): self
    {
        if ($this->wedstrijdId->removeElement($wedstrijdId)) {
            // set the owning side to null (unless already changed)
            if ($wedstrijdId->getAgenda() === $this) {
                $wedstrijdId->setAgenda(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Training[]
     */
    public function getTrainingId(): Collection
    {
        return $this->trainingId;
    }

    public function addTrainingId(Training $trainingId): self
    {
        if (!$this->trainingId->contains($trainingId)) {
            $this->trainingId[] = $trainingId;
            $trainingId->setAgenda($this);
        }

        return $this;
    }

    public function removeTrainingId(Training $trainingId): self
    {
        if ($this->trainingId->removeElement($trainingId)) {
            // set the owning side to null (unless already changed)
            if ($trainingId->getAgenda() === $this) {
                $trainingId->setAgenda(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Groep[]
     */
    public function getGroepId(): Collection
    {
        return $this->groepId;
    }

    public function addGroepId(Groep $groepId): self
    {
        if (!$this->groepId->contains($groepId)) {
            $this->groepId[] = $groepId;
            $groepId->setAgenda($this);
        }

        return $this;
    }

    public function removeGroepId(Groep $groepId): self
    {
        if ($this->groepId->removeElement($groepId)) {
            // set the owning side to null (unless already changed)
            if ($groepId->getAgenda() === $this) {
                $groepId->setAgenda(null);
            }
        }

        return $this;
    }
}
