<?php

namespace App\Entity;

use App\Repository\EquipmentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EquipmentRepository::class)
 */
class Equipment
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
     * @ORM\Column(type="string", length=1024, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $techicalIndex;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $reliability;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\OneToMany(targetEntity=FunctionalUnit::class, mappedBy="equipment")
     */
    private $units;

    public function __construct()
    {
        $this->units = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getTechicalIndex(): ?float
    {
        return $this->techicalIndex;
    }

    public function setTechicalIndex(?float $techicalIndex): self
    {
        $this->techicalIndex = $techicalIndex;

        return $this;
    }

    public function getReliability(): ?float
    {
        return $this->reliability;
    }

    public function setReliability(?float $reliability): self
    {
        $this->reliability = $reliability;

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

    /**
     * @return Collection|functional[]
     */
    public function getUnits(): Collection
    {
        return $this->units;
    }

    public function addUnit(functional $unit): self
    {
        if (!$this->units->contains($unit)) {
            $this->units[] = $unit;
            $unit->setEquipment($this);
        }

        return $this;
    }

    public function removeUnit(functional $unit): self
    {
        if ($this->units->removeElement($unit)) {
            // set the owning side to null (unless already changed)
            if ($unit->getEquipment() === $this) {
                $unit->setEquipment(null);
            }
        }

        return $this;
    }
}
