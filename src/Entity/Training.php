<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TrainingRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"training:read"}},
 *     denormalizationContext={"groups"={"training:write"}}
 * )
 * @ORM\Entity(repositoryClass=TrainingRepository::class)
 */
class Training
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"training:read", "team:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     * @Groups({"training:read", "team:read"})
     */
    private $datum;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups({"training:read"})
     */
    private $startuur;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups({"training:read"})
     */
    private $stopuur;

    /**
     * @ORM\ManyToOne(targetEntity=Team::class, inversedBy="teamid")
     * @Groups({"training:read", "agenda:read"})
     */
    private $teamId;

    /**
     * @ORM\ManyToOne(targetEntity=Agenda::class, inversedBy="trainingId")
     * @Groups({"agenda:write"})
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

    public function __toString()
    {
        //return $this->teamId;
        return 'Traning';
    }
}
