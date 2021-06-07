<?php

namespace App\Entity;

use App\Repository\GroupParameterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @ORM\OneToMany(targetEntity=ReliabilitiesIGrP::class, mappedBy="group_parametr")
     */
    private $reliabilitiesIGrPs;

    public function __construct()
    {
        $this->reliabilitiesIGrPs = new ArrayCollection();
    }

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

    /**
     * @return Collection|ReliabilitiesIGrP[]
     */
    public function getReliabilitiesIGrPs(): Collection
    {
        return $this->reliabilitiesIGrPs;
    }

    public function addReliabilitiesIGrP(ReliabilitiesIGrP $reliabilitiesIGrP): self
    {
        if (!$this->reliabilitiesIGrPs->contains($reliabilitiesIGrP)) {
            $this->reliabilitiesIGrPs[] = $reliabilitiesIGrP;
            $reliabilitiesIGrP->setGroupParametr($this);
        }

        return $this;
    }

    public function removeReliabilitiesIGrP(ReliabilitiesIGrP $reliabilitiesIGrP): self
    {
        if ($this->reliabilitiesIGrPs->removeElement($reliabilitiesIGrP)) {
            // set the owning side to null (unless already changed)
            if ($reliabilitiesIGrP->getGroupParametr() === $this) {
                $reliabilitiesIGrP->setGroupParametr(null);
            }
        }

        return $this;
    }
}
