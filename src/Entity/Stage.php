<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StageRepository")
 */
class Stage
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
    private $titre;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Entreprise", inversedBy="mesStages")
     * @ORM\JoinColumn(nullable=false)
     */
    private $monEntreprise;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Formation", inversedBy="mesStages")
     * @ORM\JoinColumn(nullable=false)
     */
    private $maFormation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getMonEntreprise(): ?Entreprise
    {
        return $this->monEntreprise;
    }

    public function setMonEntreprise(?Entreprise $monEntreprise): self
    {
        $this->monEntreprise = $monEntreprise;

        return $this;
    }

    public function getMaFormation(): ?Formation
    {
        return $this->maFormation;
    }

    public function setMaFormation(?Formation $maFormation): self
    {
        $this->maFormation = $maFormation;

        return $this;
    }
}
