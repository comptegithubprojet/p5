<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DevisRepository")
 */
class Devis
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotNull()
     */
    private $civilite;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\Length(
     *      min = 2,
     *      max = 25,
     *      minMessage = "Veuillez rentrer un nom de minimum {{ limit }} charactères",
     *      maxMessage = "Veuillez rentrer un nom de maximum {{ limit }} charactères"
     * )
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\Length(
     *      min = 2,
     *      max = 25,
     *      minMessage = "Veuillez rentrer une prenom de minimum {{ limit }} charactères",
     *      maxMessage = "Veuillez rentrer une prenom de maximum {{ limit }} charactères"
     * )
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\Length(
     *      min = 2,
     *      max = 40,
     *      minMessage = "Veuillez rentrer une societe de minimum {{ limit }} charactères",
     *      maxMessage = "Veuillez rentrer une societe de maximum {{ limit }} charactères"
     * )
     */
    private $societe;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\Email(message="Veuillez rentrer une adresse email")
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\Length(
     *      min = 2,
     *      max = 100,
     *      minMessage = "Veuillez rentrer une adresse de minimum {{ limit }} charactères",
     *      maxMessage = "Veuillez rentrer une adresse de maximum {{ limit }} charactères"
     * )
     */
    private $adresse;

    /**
     * @ORM\Column(type="string")
     *
     * @Assert\Range(
     *      min = "01000",
     *      max = "99999",
     *      minMessage="Veuillez rentrer un code postal valide",
     *      maxMessage="Veuillez rentrer un code postal valide"
     * )
     */
    private $codePostal;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\Length(
     *      min = 2,
     *      max = 35,
     *      minMessage = "Veuillez rentrer une ville de minimum {{ limit }} charactères",
     *      maxMessage = "Veuillez rentrer une ville de maximum {{ limit }} charactères"
     * )
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\Regex(
     *     pattern="/^0[1-9](([. -]?)[0-9]{2}){1}(\2[0-9]{2}){3}$/",
     *     message="Veuillez rentrer un numero de telephone"
     * )
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\Url()
     */
    private $urlSite;

    /**
     * @ORM\Column(type="text")
     *
     * @Assert\NotNull()
     */
    private $description;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateAjout;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateModification;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $statut;

    /**
     * @ORM\Column(type="boolean")
     */
    private $caseStarterPack;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $designationStarterPack;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $chargeStarterPack;

    /**
     * @ORM\Column(type="float", nullable=true)
     *
     * @Assert\Range(
     *      min = 0,
     *      max = 10000,
     *      minMessage = "Veuillez rentrer un montant minimum {{ limit }}",
     *      maxMessage = "Veuillez rentrer un montant de minimum {{ limit }}"
     * )
     */
    private $prixHTStarterPack;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prixTVAStarterPack;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prixTTCStarterPack;

    /**
     * @ORM\Column(type="boolean")
     */
    private $caseChallengerPack;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $designationChallengerPack;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $chargeChallengerPack;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prixHTChallengerPack;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prixTVAChallengerPack;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prixTTCChallengerPack;

    /**
     * @ORM\Column(type="boolean")
     */
    private $caseExpertPack;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $designationExpertPack;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $chargeExpertPack;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prixHTExpertPack;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prixTVAExpertPack;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prixTTCExpertPack;

    /**
     * @ORM\Column(type="boolean")
     */
    private $caseInboundMarketing;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $designationInboundMarketing;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $chargeInboundMarketing;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prixHTInboundMarketing;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prixTVAInboundMarketing;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prixTTCInboundMarketing;

    /**
     * @ORM\Column(type="boolean")
     */
    private $caseConsulting;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $designationConsulting;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $chargeConsulting;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prixHTConsulting;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prixTVAConsulting;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prixTTCConsulting;

    /**
     * @ORM\Column(type="boolean")
     */
    private $caseDesign;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $designationDesign;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $chargeDesign;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prixHTDesign;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prixTVADesign;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $messageEmail;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prixTTCDesign;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prixTotalHT;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prixTotalTVA;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prixTotalTTC;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $designationOption1;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $chargeOption1;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prixHTOption1;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prixTVAOption1;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prixTTCOption1;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $designationOption2;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $chargeOption2;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prixHTOption2;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prixTVAOption2;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prixTTCOption2;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $designationOption3;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $chargeOption3;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prixHTOption3;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prixTVAOption3;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prixTTCOption3;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $designationOption4;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $chargeOption4;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prixHTOption4;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prixTVAOption4;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prixTTCOption4;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $designationOption5;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $chargeOption5;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prixHTOption5;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prixTVAOption5;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prixTTCOption5;


    /**
     * @ORM\Column(type="boolean")
     */
    private $caseNewsletter;

    /**
     * @ORM\Column(type="boolean")
     *
     * @Assert\IsTrue(message="Veuillez cocher la case")
     */
    private $caseObligatoire;

    public function __construct()
    {
        $this->optionsDevis = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getUrlSite(): ?string
    {
        return $this->urlSite;
    }

    public function setUrlSite(string $urlSite): self
    {
        $this->urlSite = $urlSite;

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

    public function getDateAjout(): ?\DateTimeInterface
    {
        return $this->dateAjout;
    }

    public function setDateAjout(\DateTimeInterface $dateAjout): self
    {
        $this->dateAjout = $dateAjout;

        return $this;
    }

    public function getDateModification(): ?\DateTimeInterface
    {
        return $this->dateModification;
    }

    public function setDateModification(?\DateTimeInterface $dateModification): self
    {
        $this->dateModification = $dateModification;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getCaseNewsletter(): ?bool
    {
        return $this->caseNewsletter;
    }

    public function setCaseNewsletter(bool $caseNewsletter): self
    {
        $this->caseNewsletter = $caseNewsletter;

        return $this;
    }

    public function getCaseObligatoire(): ?bool
    {
        return $this->caseObligatoire;
    }

    public function setCaseObligatoire(bool $caseObligatoire): self
    {
        $this->caseObligatoire = $caseObligatoire;

        return $this;
    }

    public function getSociete(): ?string
    {
        return $this->societe;
    }

    public function setSociete(string $societe): self
    {
        $this->societe = $societe;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    public function setCodePostal(string $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getCivilite(): ?string
    {
        return $this->civilite;
    }

    public function setCivilite(string $civilite): self
    {
        $this->civilite = $civilite;

        return $this;
    }

    /**
     * @return Collection|OptionsDevis[]
     */
    public function getOptionsDevis(): Collection
    {
        return $this->optionsDevis;
    }

    public function addOptionsDevi(OptionsDevis $optionsDevi): self
    {
        if (!$this->optionsDevis->contains($optionsDevi)) {
            $this->optionsDevis[] = $optionsDevi;
            $optionsDevi->setArticle($this);
        }

        return $this;
    }

    public function removeOptionsDevi(OptionsDevis $optionsDevi): self
    {
        if ($this->optionsDevis->contains($optionsDevi)) {
            $this->optionsDevis->removeElement($optionsDevi);
            // set the owning side to null (unless already changed)
            if ($optionsDevi->getArticle() === $this) {
                $optionsDevi->setArticle(null);
            }
        }

        return $this;
    }

    public function getCaseStarterPack(): ?bool
    {
        return $this->caseStarterPack;
    }

    public function setCaseStarterPack(bool $caseStarterPack): self
    {
        $this->caseStarterPack = $caseStarterPack;

        return $this;
    }

    public function getDesignationStarterPack(): ?string
    {
        return $this->designationStarterPack;
    }

    public function setDesignationStarterPack(?string $designationStarterPack): self
    {
        $this->designationStarterPack = $designationStarterPack;

        return $this;
    }

    public function getChargeStarterPack(): ?float
    {
        return $this->chargeStarterPack;
    }

    public function setChargeStarterPack(?float $chargeStarterPack): self
    {
        $this->chargeStarterPack = $chargeStarterPack;

        return $this;
    }

    public function getPrixHTStarterPack(): ?float
    {
        return $this->prixHTStarterPack;
    }

    public function setPrixHTStarterPack(?float $prixHTStarterPack): self
    {
        $this->prixHTStarterPack = $prixHTStarterPack;

        return $this;
    }

    public function getPrixTVAStarterPack(): ?float
    {
        return $this->prixTVAStarterPack;
    }

    public function setPrixTVAStarterPack(?float $prixTVAStarterPack): self
    {
        $this->prixTVAStarterPack = $prixTVAStarterPack;

        return $this;
    }

    public function getPrixTTCStarterPack(): ?float
    {
        return $this->prixTTCStarterPack;
    }

    public function setPrixTTCStarterPack(?float $prixTTCStarterPack): self
    {
        $this->prixTTCStarterPack = $prixTTCStarterPack;

        return $this;
    }

    public function getCaseChallengerPack(): ?bool
    {
        return $this->caseChallengerPack;
    }

    public function setCaseChallengerPack(bool $caseChallengerPack): self
    {
        $this->caseChallengerPack = $caseChallengerPack;

        return $this;
    }

    public function getDesignationChallengerPack(): ?string
    {
        return $this->designationChallengerPack;
    }

    public function setDesignationChallengerPack(?string $designationChallengerPack): self
    {
        $this->designationChallengerPack = $designationChallengerPack;

        return $this;
    }

    public function getChargeChallengerPack(): ?float
    {
        return $this->chargeChallengerPack;
    }

    public function setChargeChallengerPack(?float $chargeChallengerPack): self
    {
        $this->chargeChallengerPack = $chargeChallengerPack;

        return $this;
    }

    public function getPrixHTChallengerPack(): ?float
    {
        return $this->prixHTChallengerPack;
    }

    public function setPrixHTChallengerPack(?float $prixHTChallengerPack): self
    {
        $this->prixHTChallengerPack = $prixHTChallengerPack;

        return $this;
    }

    public function getPrixTVAChallengerPack(): ?float
    {
        return $this->prixTVAChallengerPack;
    }

    public function setPrixTVAChallengerPack(?float $prixTVAChallengerPack): self
    {
        $this->prixTVAChallengerPack = $prixTVAChallengerPack;

        return $this;
    }

    public function getPrixTTCChallengerPack(): ?float
    {
        return $this->prixTTCChallengerPack;
    }

    public function setPrixTTCChallengerPack(?float $prixTTCChallengerPack): self
    {
        $this->prixTTCChallengerPack = $prixTTCChallengerPack;

        return $this;
    }

    public function getCaseExpertPack(): ?bool
    {
        return $this->caseExpertPack;
    }

    public function setCaseExpertPack(bool $caseExpertPack): self
    {
        $this->caseExpertPack = $caseExpertPack;

        return $this;
    }

    public function getDesignationExpertPack(): ?string
    {
        return $this->designationExpertPack;
    }

    public function setDesignationExpertPack(?string $designationExpertPack): self
    {
        $this->designationExpertPack = $designationExpertPack;

        return $this;
    }

    public function getChargeExpertPack(): ?float
    {
        return $this->chargeExpertPack;
    }

    public function setChargeExpertPack(?float $chargeExpertPack): self
    {
        $this->chargeExpertPack = $chargeExpertPack;

        return $this;
    }

    public function getPrixHTExpertPack(): ?float
    {
        return $this->prixHTExpertPack;
    }

    public function setPrixHTExpertPack(?float $prixHTExpertPack): self
    {
        $this->prixHTExpertPack = $prixHTExpertPack;

        return $this;
    }

    public function getPrixTVAExpertPack(): ?float
    {
        return $this->prixTVAExpertPack;
    }

    public function setPrixTVAExpertPack(?float $prixTVAExpertPack): self
    {
        $this->prixTVAExpertPack = $prixTVAExpertPack;

        return $this;
    }

    public function getPrixTTCExpertPack(): ?float
    {
        return $this->prixTTCExpertPack;
    }

    public function setPrixTTCExpertPack(?float $prixTTCExpertPack): self
    {
        $this->prixTTCExpertPack = $prixTTCExpertPack;

        return $this;
    }

    public function getCaseInboundMarketing(): ?bool
    {
        return $this->caseInboundMarketing;
    }

    public function setCaseInboundMarketing(bool $caseInboundMarketing): self
    {
        $this->caseInboundMarketing = $caseInboundMarketing;

        return $this;
    }

    public function getDesignationInboundMarketing(): ?string
    {
        return $this->designationInboundMarketing;
    }

    public function setDesignationInboundMarketing(?string $designationInboundMarketing): self
    {
        $this->designationInboundMarketing = $designationInboundMarketing;

        return $this;
    }

    public function getChargeInboundMarketing(): ?float
    {
        return $this->chargeInboundMarketing;
    }

    public function setChargeInboundMarketing(?float $chargeInboundMarketing): self
    {
        $this->chargeInboundMarketing = $chargeInboundMarketing;

        return $this;
    }

    public function getPrixHTInboundMarketing(): ?float
    {
        return $this->prixHTInboundMarketing;
    }

    public function setPrixHTInboundMarketing(?float $prixHTInboundMarketing): self
    {
        $this->prixHTInboundMarketing = $prixHTInboundMarketing;

        return $this;
    }

    public function getPrixTVAInboundMarketing(): ?float
    {
        return $this->prixTVAInboundMarketing;
    }

    public function setPrixTVAInboundMarketing(?float $prixTVAInboundMarketing): self
    {
        $this->prixTVAInboundMarketing = $prixTVAInboundMarketing;

        return $this;
    }

    public function getPrixTTCInboundMarketing(): ?float
    {
        return $this->prixTTCInboundMarketing;
    }

    public function setPrixTTCInboundMarketing(?float $prixTTCInboundMarketing): self
    {
        $this->prixTTCInboundMarketing = $prixTTCInboundMarketing;

        return $this;
    }

    public function getCaseConsulting(): ?bool
    {
        return $this->caseConsulting;
    }

    public function setCaseConsulting(bool $caseConsulting): self
    {
        $this->caseConsulting = $caseConsulting;

        return $this;
    }

    public function getDesignationConsulting(): ?string
    {
        return $this->designationConsulting;
    }

    public function setDesignationConsulting(?string $designationConsulting): self
    {
        $this->designationConsulting = $designationConsulting;

        return $this;
    }

    public function getChargeConsulting(): ?float
    {
        return $this->chargeConsulting;
    }

    public function setChargeConsulting(?float $chargeConsulting): self
    {
        $this->chargeConsulting = $chargeConsulting;

        return $this;
    }

    public function getPrixHTConsulting(): ?float
    {
        return $this->prixHTConsulting;
    }

    public function setPrixHTConsulting(?float $prixHTConsulting): self
    {
        $this->prixHTConsulting = $prixHTConsulting;

        return $this;
    }

    public function getPrixTVAConsulting(): ?float
    {
        return $this->prixTVAConsulting;
    }

    public function setPrixTVAConsulting(?float $prixTVAConsulting): self
    {
        $this->prixTVAConsulting = $prixTVAConsulting;

        return $this;
    }

    public function getPrixTTCConsulting(): ?float
    {
        return $this->prixTTCConsulting;
    }

    public function setPrixTTCConsulting(?float $prixTTCConsulting): self
    {
        $this->prixTTCConsulting = $prixTTCConsulting;

        return $this;
    }

    public function getCaseDesign(): ?bool
    {
        return $this->caseDesign;
    }

    public function setCaseDesign(bool $caseDesign): self
    {
        $this->caseDesign = $caseDesign;

        return $this;
    }

    public function getDesignationDesign(): ?string
    {
        return $this->designationDesign;
    }

    public function setDesignationDesign(?string $designationDesign): self
    {
        $this->designationDesign = $designationDesign;

        return $this;
    }

    public function getChargeDesign(): ?float
    {
        return $this->chargeDesign;
    }

    public function setChargeDesign(?float $chargeDesign): self
    {
        $this->chargeDesign = $chargeDesign;

        return $this;
    }

    public function getPrixHTDesign(): ?float
    {
        return $this->prixHTDesign;
    }

    public function setPrixHTDesign(?float $prixHTDesign): self
    {
        $this->prixHTDesign = $prixHTDesign;

        return $this;
    }

    public function getPrixTVADesign(): ?float
    {
        return $this->prixTVADesign;
    }

    public function setPrixTVADesign(?float $prixTVADesign): self
    {
        $this->prixTVADesign = $prixTVADesign;

        return $this;
    }

    public function getPrixTTCDesign(): ?float
    {
        return $this->prixTTCDesign;
    }

    public function setPrixTTCDesign(?float $prixTTCDesign): self
    {
        $this->prixTTCDesign = $prixTTCDesign;

        return $this;
    }

    public function getMessageEmail(): ?string
    {
        return $this->messageEmail;
    }

    public function setMessageEmail(string $messageEmail): self
    {
        $this->messageEmail = $messageEmail;

        return $this;
    }

    public function getPrixTotalHT(): ?float
    {
        return $this->prixTotalHT;
    }

    public function setPrixTotalHT(?float $prixTotalHT): self
    {
        $this->prixTotalHT = $prixTotalHT;

        return $this;
    }

    public function getPrixTotalTVA(): ?float
    {
        return $this->prixTotalTVA;
    }

    public function setPrixTotalTVA(?float $prixTotalTVA): self
    {
        $this->prixTotalTVA = $prixTotalTVA;

        return $this;
    }

    public function getPrixTotalTTC(): ?float
    {
        return $this->prixTotalTTC;
    }

    public function setPrixTotalTTC(?float $prixTotalTTC): self
    {
        $this->prixTotalTTC = $prixTotalTTC;

        return $this;
    }

    public function getDesignationOption1(): ?string
    {
        return $this->designationOption1;
    }

    public function setDesignationOption1(?string $designationOption1): self
    {
        $this->designationOption1 = $designationOption1;

        return $this;
    }

    public function getChargeOption1(): ?float
    {
        return $this->chargeOption1;
    }

    public function setChargeOption1(?float $chargeOption1): self
    {
        $this->chargeOption1 = $chargeOption1;

        return $this;
    }

    public function getPrixHTOption1(): ?float
    {
        return $this->prixHTOption1;
    }

    public function setPrixHTOption1(?float $prixHTOption1): self
    {
        $this->prixHTOption1 = $prixHTOption1;

        return $this;
    }

    public function getPrixTVAOption1(): ?float
    {
        return $this->prixTVAOption1;
    }

    public function setPrixTVAOption1(?float $prixTVAOption1): self
    {
        $this->prixTVAOption1 = $prixTVAOption1;

        return $this;
    }

    public function getPrixTTCOption1(): ?float
    {
        return $this->prixTTCOption1;
    }

    public function setPrixTTCOption1(?float $prixTTCOption1): self
    {
        $this->prixTTCOption1 = $prixTTCOption1;

        return $this;
    }

    public function getDesignationOption2(): ?string
    {
        return $this->designationOption2;
    }

    public function setDesignationOption2(?string $designationOption2): self
    {
        $this->designationOption2 = $designationOption2;

        return $this;
    }

    public function getChargeOption2(): ?float
    {
        return $this->chargeOption2;
    }

    public function setChargeOption2(?float $chargeOption2): self
    {
        $this->chargeOption2 = $chargeOption2;

        return $this;
    }

    public function getPrixHTOption2(): ?float
    {
        return $this->prixHTOption2;
    }

    public function setPrixHTOption2(?float $prixHTOption2): self
    {
        $this->prixHTOption2 = $prixHTOption2;

        return $this;
    }

    public function getPrixTVAOption2(): ?float
    {
        return $this->prixTVAOption2;
    }

    public function setPrixTVAOption2(?float $prixTVAOption2): self
    {
        $this->prixTVAOption2 = $prixTVAOption2;

        return $this;
    }

    public function getPrixTTCOption2(): ?float
    {
        return $this->prixTTCOption2;
    }

    public function setPrixTTCOption2(?float $prixTTCOption2): self
    {
        $this->prixTTCOption2 = $prixTTCOption2;

        return $this;
    }

    public function getDesignationOption3(): ?string
    {
        return $this->designationOption3;
    }

    public function setDesignationOption3(?string $designationOption3): self
    {
        $this->designationOption3 = $designationOption3;

        return $this;
    }

    public function getChargeOption3(): ?float
    {
        return $this->chargeOption3;
    }

    public function setChargeOption3(?float $chargeOption3): self
    {
        $this->chargeOption3 = $chargeOption3;

        return $this;
    }

    public function getPrixHTOption3(): ?float
    {
        return $this->prixHTOption3;
    }

    public function setPrixHTOption3(?float $prixHTOption3): self
    {
        $this->prixHTOption3 = $prixHTOption3;

        return $this;
    }

    public function getPrixTVAOption3(): ?float
    {
        return $this->prixTVAOption3;
    }

    public function setPrixTVAOption3(?float $prixTVAOption3): self
    {
        $this->prixTVAOption3 = $prixTVAOption3;

        return $this;
    }

    public function getPrixTTCOption3(): ?float
    {
        return $this->prixTTCOption3;
    }

    public function setPrixTTCOption3(?float $prixTTCOption3): self
    {
        $this->prixTTCOption3 = $prixTTCOption3;

        return $this;
    }

    public function getDesignationOption4(): ?string
    {
        return $this->designationOption4;
    }

    public function setDesignationOption4(?string $designationOption4): self
    {
        $this->designationOption4 = $designationOption4;

        return $this;
    }

    public function getChargeOption4(): ?float
    {
        return $this->chargeOption4;
    }

    public function setChargeOption4(?float $chargeOption4): self
    {
        $this->chargeOption4 = $chargeOption4;

        return $this;
    }

    public function getPrixHTOption4(): ?float
    {
        return $this->prixHTOption4;
    }

    public function setPrixHTOption4(?float $prixHTOption4): self
    {
        $this->prixHTOption4 = $prixHTOption4;

        return $this;
    }

    public function getPrixTVAOption4(): ?float
    {
        return $this->prixTVAOption4;
    }

    public function setPrixTVAOption4(?float $prixTVAOption4): self
    {
        $this->prixTVAOption4 = $prixTVAOption4;

        return $this;
    }

    public function getPrixTTCOption4(): ?float
    {
        return $this->prixTTCOption4;
    }

    public function setPrixTTCOption4(?float $prixTTCOption4): self
    {
        $this->prixTTCOption4 = $prixTTCOption4;

        return $this;
    }

    public function getDesignationOption5(): ?string
    {
        return $this->designationOption5;
    }

    public function setDesignationOption5(?string $designationOption5): self
    {
        $this->designationOption5 = $designationOption5;

        return $this;
    }

    public function getChargeOption5(): ?float
    {
        return $this->chargeOption5;
    }

    public function setChargeOption5(?float $chargeOption5): self
    {
        $this->chargeOption5 = $chargeOption5;

        return $this;
    }

    public function getPrixHTOption5(): ?float
    {
        return $this->prixHTOption5;
    }

    public function setPrixHTOption5(?float $prixHTOption5): self
    {
        $this->prixHTOption5 = $prixHTOption5;

        return $this;
    }

    public function getPrixTVAOption5(): ?float
    {
        return $this->prixTVAOption5;
    }

    public function setPrixTVAOption5(?float $prixTVAOption5): self
    {
        $this->prixTVAOption5 = $prixTVAOption5;

        return $this;
    }

    public function getPrixTTCOption5(): ?float
    {
        return $this->prixTTCOption5;
    }

    public function setPrixTTCOption5(?float $prixTTCOption5): self
    {
        $this->prixTTCOption5 = $prixTTCOption5;

        return $this;
    }

    
}
