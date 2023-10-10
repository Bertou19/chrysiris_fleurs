<?php

namespace App\Entity;

use App\Repository\HoraireRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HoraireRepository::class)]
class Horaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $horaire_debut_am = null;

    #[ORM\Column(length: 100)]
    private ?string $horaire_fin_am = null;

    #[ORM\Column(length: 100)]
    private ?string $horaire_debut_pm = null;

    #[ORM\Column(length: 100)]
    private ?string $horaire_fin_pm = null;

    #[ORM\Column(length: 50)]
    private ?string $jour = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Magasin $id_magasin = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHoraireDebutAm(): ?string
    {
        return $this->horaire_debut_am;
    }

    public function setHoraireDebutAm(string $horaire_debut_am): static
    {
        $this->horaire_debut_am = $horaire_debut_am;

        return $this;
    }

    public function getHoraireFinAm(): ?string
    {
        return $this->horaire_fin_am;
    }

    public function setHoraireFinAm(string $horaire_fin_am): static
    {
        $this->horaire_fin_am = $horaire_fin_am;

        return $this;
    }

    public function getHoraireDebutPm(): ?string
    {
        return $this->horaire_debut_pm;
    }

    public function setHoraireDebutPm(string $horaire_debut_pm): static
    {
        $this->horaire_debut_pm = $horaire_debut_pm;

        return $this;
    }

    public function getHoraireFinPm(): ?string
    {
        return $this->horaire_fin_pm;
    }

    public function setHoraireFinPm(string $horaire_fin_pm): static
    {
        $this->horaire_fin_pm = $horaire_fin_pm;

        return $this;
    }

    public function getJour(): ?string
    {
        return $this->jour;
    }

    public function setJour(string $jour): static
    {
        $this->jour = $jour;

        return $this;
    }

    public function getIdMagasin(): ?Magasin
    {
        return $this->id_magasin;
    }

    public function setIdMagasin(?Magasin $id_magasin): static
    {
        $this->id_magasin = $id_magasin;

        return $this;
    }
}
