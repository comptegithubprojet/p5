<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OptionsDevisRepository")
 */
class OptionsDevis
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $designation;

    /**
     * @ORM\Column(type="float")
     */
    private $charge;

    /**
     * @ORM\Column(type="float")
     */
    private $prixHT;

    /**
     * @ORM\Column(type="float")
     */
    private $prixTVA;

    /**
     * @ORM\Column(type="float")
     */
    private $prixTTC;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Devis", inversedBy="optionsDevis")
     */
    private $devis;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(string $designation): self
    {
        $this->designation = $designation;

        return $this;
    }

    public function getCharge(): ?float
    {
        return $this->charge;
    }

    public function setCharge(float $charge): self
    {
        $this->charge = $charge;

        return $this;
    }

    public function getPrixHT(): ?float
    {
        return $this->prixHT;
    }

    public function setPrixHT(float $prixHT): self
    {
        $this->prixHT = $prixHT;

        return $this;
    }

    public function getPrixTVA(): ?float
    {
        return $this->prixTVA;
    }

    public function setPrixTVA(float $prixTVA): self
    {
        $this->prixTVA = $prixTVA;

        return $this;
    }

    public function getPrixTTC(): ?float
    {
        return $this->prixTTC;
    }

    public function setPrixTTC(float $prixTTC): self
    {
        $this->prixTTC = $prixTTC;

        return $this;
    }

    public function getDevis(): ?Devis
    {
        return $this->devis;
    }

    public function setDevis(?Devis $devis): self
    {
        $this->devis = $devis;

        return $this;
    }


}
