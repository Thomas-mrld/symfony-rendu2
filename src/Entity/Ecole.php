<?php

namespace App\Entity;

use App\Repository\EcoleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EcoleRepository::class)
 */
class Ecole
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
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity=Axe::class, mappedBy="ecole")
     */
    private $axe;

    public function __construct()
    {
        $this->axe = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->nom;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection|Axe[]
     */
    public function getAxe(): Collection
    {
        return $this->axe;
    }

    public function addAxe(Axe $axe): self
    {
        if (!$this->axe->contains($axe)) {
            $this->axe[] = $axe;
            $axe->setEcole($this);
        }

        return $this;
    }

    public function removeAxe(Axe $axe): self
    {
        if ($this->axe->removeElement($axe)) {
            // set the owning side to null (unless already changed)
            if ($axe->getEcole() === $this) {
                $axe->setEcole(null);
            }
        }

        return $this;
    }
}
