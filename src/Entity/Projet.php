<?php

namespace App\Entity;

use App\Repository\ProjetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjetRepository::class)]
class Projet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $titre = null;

    #[ORM\Column(length: 255)]
    private ?string $accroche = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $nbJours = null;

    /**
     * @var Collection<int, Technologie>
     */
    #[ORM\ManyToMany(targetEntity: Technologie::class, inversedBy: 'projets')]
    #[ORM\JoinTable(name: 'projet_technologie')]
    private Collection $technologies;

    /**
     * @var Collection<int, Picture>
     */
    #[ORM\ManyToMany(targetEntity: Picture::class, inversedBy: 'projets')]
    private Collection $picture;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getAccroche(): ?string
    {
        return $this->accroche;
    }

    public function setAccroche(string $accroche): static
    {
        $this->accroche = $accroche;

        return $this;
    }

    public function getNbJours(): ?int
    {
        return $this->nbJours;
    }

    public function setNbJours(int $nbJours): static
    {
        $this->nbJours = $nbJours;

        return $this;
    }



    public function __construct()
    {
        $this->technologies = new ArrayCollection();
        $this->picture = new ArrayCollection();
    }

    /**
     * @return Collection<int, Technologie>
     */
    public function getTechnologies(): Collection
    {
        return $this->technologies;
    }

    public function setTechnologies(iterable $technologies): static
    {
        $this->technologies->clear();
        foreach ($technologies as $technologie) {
            $this->addTechnologie($technologie);
        }

        return $this;
    }

    public function addTechnologie(Technologie $technologie): static
    {
        if (!$this->technologies->contains($technologie)) {
            $this->technologies->add($technologie);
            $technologie->addProjet($this);
        }

        return $this;
    }

    public function removeTechnologie(Technologie $technologie): static
    {
        if ($this->technologies->removeElement($technologie)) {
            $technologie->removeProjet($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Picture>
     */
    public function getPicture(): Collection
    {
        return $this->picture;
    }

    public function addPicture(Picture $picture): static
    {
        if (!$this->picture->contains($picture)) {
            $this->picture->add($picture);
        }

        return $this;
    }

    public function removePicture(Picture $picture): static
    {
        $this->picture->removeElement($picture);

        return $this;
    }
}
