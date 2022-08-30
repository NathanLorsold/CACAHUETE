<?php

namespace App\Entity;

use App\Repository\DiscRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DiscRepository::class)]
class Disc
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $title = null;

    #[ORM\Column]
    private ?int $year = null;

    #[ORM\Column(length: 50)]
    private ?string $picture = null;

    #[ORM\Column(length: 50)]
    private ?string $label = null;

    #[ORM\ManyToOne(inversedBy: 'discs')]
    private ?Artist $artist = null;

    #[ORM\OneToMany(mappedBy: 'disc', targetEntity: Artist::class)]
    private Collection $artists;

    #[ORM\Column(length: 255)]
    private ?string $disc_title = null;

    public function __construct()
    {
        $this->artists = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getArtist(): ?Artist
    {
        return $this->artist;
    }

    public function setArtist(?Artist $artist): self
    {
        $this->artist = $artist;

        return $this;
    }

    /**
     * @return Collection<int, Artist>
     */
    public function getArtists(): Collection
    {
        return $this->artists;
    }

    public function addArtist(Artist $artist1): self
    {
        if (!$this->artists->contains($artist1)) {
            $this->artists->add($artist1);
            $artist1->setDisc($this);
        }

        return $this;
    }

    public function removeArtist(Artist $artist1): self
    {
        if ($this->artists->removeElement($artist1)) {
            // set the owning side to null (unless already changed)
            if ($artist1->getDisc() === $this) {
                $artist1->setDisc(null);
            }
        }

        return $this;
    }

    public function getDiscTitle(): ?string
    {
        return $this->disc_title;
    }

    public function setDiscTitle(string $disc_title): self
    {
        $this->disc_title = $disc_title;

        return $this;
    }
}
