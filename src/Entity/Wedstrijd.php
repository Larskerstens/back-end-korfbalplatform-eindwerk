<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\WedstrijdRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=WedstrijdRepository::class)
 */
class Wedstrijd
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
     * @ORM\Column(type="integer", nullable=true)
     */
    private $scorethuis;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $scoreuit;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $matchverloop;

    /**
     * @ORM\ManyToOne(targetEntity=Team::class, inversedBy="wedstrijds")
     */
    private $teamId;

    /**
     * @ORM\ManyToOne(targetEntity=Club::class, inversedBy="wedstrijds")
     */
    private $clubThuis;

    /**
     * @ORM\ManyToOne(targetEntity=Club::class, inversedBy="wedstrijdsuit")
     */
    private $clubUit;

    /**
     * @ORM\ManyToOne(targetEntity=Agenda::class, inversedBy="wedstrijdId")
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

    public function getScorethuis(): ?int
    {
        return $this->scorethuis;
    }

    public function setScorethuis(?int $scorethuis): self
    {
        $this->scorethuis = $scorethuis;

        return $this;
    }

    public function getScoreuit(): ?int
    {
        return $this->scoreuit;
    }

    public function setScoreuit(?int $scoreuit): self
    {
        $this->scoreuit = $scoreuit;

        return $this;
    }

    public function getMatchverloop(): ?string
    {
        return $this->matchverloop;
    }

    public function setMatchverloop(?string $matchverloop): self
    {
        $this->matchverloop = $matchverloop;

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

    public function getClubThuis(): ?Club
    {
        return $this->clubThuis;
    }

    public function setClubThuis(?Club $clubThuis): self
    {
        $this->clubThuis = $clubThuis;

        return $this;
    }

    public function getClubUit(): ?Club
    {
        return $this->clubUit;
    }

    public function setClubUit(?Club $clubUit): self
    {
        $this->clubUit = $clubUit;

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
