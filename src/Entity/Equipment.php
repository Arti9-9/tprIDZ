<?php

namespace App\Entity;

use App\Entity\FunctionalUnit;
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

    /**
     * @ORM\OneToMany(targetEntity=TechicalIndexs::class, mappedBy="equipment")
     */
    private $techicalIndexs;

    /**
     * @ORM\OneToMany(targetEntity=Reliabilities::class, mappedBy="equipments")
     */
    private $reliabilities;

    public function __toString()
    {
        return (string)$this->getName();
    }

    public function __construct()
    {
        $this->units = new ArrayCollection();
        $this->techicalIndexs = new ArrayCollection();
        $this->reliabilities = new ArrayCollection();
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
     * @return Collection|FunctionalUnit[]
     */
    public function getUnits(): Collection
    {
        return $this->units;
    }

    public function addUnit(FunctionalUnit $unit): self
    {
        if (!$this->units->contains($unit)) {
            $this->units[] = $unit;
            $unit->setEquipment($this);
        }

        return $this;
    }

    public function removeUnit(FunctionalUnit $unit): self
    {
        if ($this->units->removeElement($unit)) {
            // set the owning side to null (unless already changed)
            if ($unit->getEquipment() === $this) {
                $unit->setEquipment(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|TechicalIndexs[]
     */
    public function getTechicalIndexs(): Collection
    {
        return $this->techicalIndexs;
    }

    public function addTechicalIndex(TechicalIndexs $techicalIndex): self
    {
        if (!$this->techicalIndexs->contains($techicalIndex)) {
            $this->techicalIndexs[] = $techicalIndex;
            $techicalIndex->setEquipment($this);
        }

        return $this;
    }

    public function removeTechicalIndex(TechicalIndexs $techicalIndex): self
    {
        if ($this->techicalIndexs->removeElement($techicalIndex)) {
            // set the owning side to null (unless already changed)
            if ($techicalIndex->getEquipment() === $this) {
                $techicalIndex->setEquipment(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Reliabilities[]
     */
    public function getReliabilities(): Collection
    {
        return $this->reliabilities;
    }

    public function addReliability(Reliabilities $reliability): self
    {
        if (!$this->reliabilities->contains($reliability)) {
            $this->reliabilities[] = $reliability;
            $reliability->setEquipments($this);
        }

        return $this;
    }

    public function removeReliability(Reliabilities $reliability): self
    {
        if ($this->reliabilities->removeElement($reliability)) {
            // set the owning side to null (unless already changed)
            if ($reliability->getEquipments() === $this) {
                $reliability->setEquipments(null);
            }
        }

        return $this;
    }
}
