<?php

namespace App\Entity;

use App\Repository\GroupParameterRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GroupParameterRepository::class)
 */
class GroupParameter
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
    private $name;

    /**
     * @ORM\Column(type="float")
     */
    private $weight;

    /**
     * @ORM\ManyToOne(targetEntity=FunctionalUnit::class, inversedBy="parameters")
     */
    private $functionalUnit;

    public function __toString()
    {
        return (string)$this->getName();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getWeight(): ?float
    {
        return $this->weight;
    }

    public function setWeight(float $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getFunctionalUnit(): ?FunctionalUnit
    {
        return $this->functionalUnit;
    }

    public function setFunctionalUnit(?FunctionalUnit $functionalUnit): self
    {
        $this->functionalUnit = $functionalUnit;

        return $this;
    }
}
