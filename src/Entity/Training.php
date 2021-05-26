<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TrainingRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=TrainingRepository::class)
 */
class Training
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
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $startuur;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $stopuur;

    /**
     * @ORM\ManyToOne(targetEntity=Team::class, inversedBy="teamid")
     */
    private $teamId;

    /**
     * @ORM\ManyToOne(targetEntity=Agenda::class, inversedBy="trainingId")
     */
    private $agenda;

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

    public function setStartuur(?\DateTimeInterface $startuur): self
    {
        $this->startuur = $startuur;

        return $this;
    }

    public function getStopuur(): ?\DateTimeInterface
    {
        return $this->stopuur;
    }

    public function setStopuur(?\DateTimeInterface $stopuur): self
    {
        $this->stopuur = $stopuur;

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
