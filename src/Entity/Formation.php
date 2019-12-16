<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FormationRepository")
 */
class Formation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Stage", mappedBy="maFormation")
     */
    private $mesStages;

    public function __construct()
    {
        $this->mesStages = new ArrayCollection();
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
     * @return Collection|Stage[]
     */
    public function getMesStages(): Collection
    {
        return $this->mesStages;
    }

    public function addMesStage(Stage $mesStage): self
    {
        if (!$this->mesStages->contains($mesStage)) {
            $this->mesStages[] = $mesStage;
            $mesStage->setMaFormation($this);
        }

        return $this;
    }

    public function removeMesStage(Stage $mesStage): self
    {
        if ($this->mesStages->contains($mesStage)) {
            $this->mesStages->removeElement($mesStage);
            // set the owning side to null (unless already changed)
            if ($mesStage->getMaFormation() === $this) {
                $mesStage->setMaFormation(null);
            }
        }

        return $this;
    }
}
