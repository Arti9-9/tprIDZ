<?php

namespace App\Entity;

use App\Repository\ReliabilitiesIGrPRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReliabilitiesIGrPRepository::class)
 */
class ReliabilitiesIGrP
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $value;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity=groupParameter::class, inversedBy="reliabilitiesIGrPs")
     */
    private $group_parametr;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValue(): ?float
    {
        return $this->value;
    }

    public function setValue(float $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getGroupParametr(): ?groupParameter
    {
        return $this->group_parametr;
    }

    public function setGroupParametr(?groupParameter $group_parametr): self
    {
        $this->group_parametr = $group_parametr;

        return $this;
    }
}
