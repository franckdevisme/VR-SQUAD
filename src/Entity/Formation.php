<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Formation
 *
 * @ORM\Table(name="formation", indexes={@ORM\Index(name="fk_formation_Entreprise1_idx", columns={"idEntreprise"}), @ORM\Index(name="fk_formation_categorie1_idx", columns={"idcategorie"}), @ORM\Index(name="fk_formation_auteur1_idx", columns={"idauteur"})})
 * @ORM\Entity
 */
class Formation
{
    /**
     * @var int
     *
     * @ORM\Column(name="idformation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idformation;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_formation", type="string", length=255, nullable=false)
     */
    private $nomFormation;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=0, nullable=false)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_de_publication", type="date", nullable=false)
     */
    private $dateDePublication;

    /**
     * @var int
     *
     * @ORM\Column(name="nombre_de_lessons", type="integer", nullable=false)
     */
    private $nombreDeLessons;

    /**
     * @var string
     *
     * @ORM\Column(name="tags", type="text", length=0, nullable=false)
     */
    private $tags;

    /**
     * @var string
     *
     * @ORM\Column(name="version", type="string", length=45, nullable=false)
     */
    private $version;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_update", type="date", nullable=false)
     */
    private $dateUpdate;

    /**
     * @var int
     *
     * @ORM\Column(name="nombre_de_vue", type="integer", nullable=false)
     */
    private $nombreDeVue;

    /**
     * @var string|null
     *
     * @ORM\Column(name="devices_compatible", type="text", length=0, nullable=true)
     */
    private $devicesCompatible;

    /**
     * @var string
     *
     * @ORM\Column(name="display_pour_user", type="blob", length=65535, nullable=false)
     */
    private $displayPourUser;

    /**
     * @var string
     *
     * @ORM\Column(name="isvalide", type="blob", length=65535, nullable=false)
     */
    private $isvalide;

    /**
     * @var \Entreprise
     *
     * @ORM\ManyToOne(targetEntity="Entreprise")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idEntreprise", referencedColumnName="idEntreprise")
     * })
     */
    private $identreprise;

    /**
     * @var \Auteur
     *
     * @ORM\ManyToOne(targetEntity="Auteur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idauteur", referencedColumnName="idauteur")
     * })
     */
    private $idauteur;

    /**
     * @var \Categorie
     *
     * @ORM\ManyToOne(targetEntity="Categorie")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idcategorie", referencedColumnName="idcategorie")
     * })
     */
    private $idcategorie;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="User", mappedBy="idformation")
     */
    private $id;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->id = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @return string
     */
    public function getIsvalide(): string
    {
        return $this->isvalide;
    }


    /**
     * @return \DateTime
     */
    public function getDateDePublication(): \DateTime
    {
        return $this->dateDePublication;
    }

    /**
     * @return \DateTime
     */
    public function getDateUpdate(): \DateTime
    {
        return $this->dateUpdate;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return null|string
     */
    public function getDevicesCompatible(): ?string
    {
        return $this->devicesCompatible;
    }

    /**
     * @return string
     */
    public function getDisplayPourUser(): string
    {
        return $this->displayPourUser;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getId(): \Doctrine\Common\Collections\Collection
    {
        return $this->id;
    }





    /**
     * @return int
     */
    public function getIdformation(): int
    {
        return $this->idformation;
    }

    /**
     * @return int
     */
    public function getNombreDeLessons(): int
    {
        return $this->nombreDeLessons;
    }

    /**
     * @return int
     */
    public function getNombreDeVue(): int
    {
        return $this->nombreDeVue;
    }

    /**
     * @return string
     */
    public function getNomFormation(): string
    {
        return $this->nomFormation;
    }

    /**
     * @return string
     */
    public function getTags(): string
    {
        return $this->tags;
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * @param \DateTime $dateDePublication
     */
    public function setDateDePublication(\DateTime $dateDePublication): void
    {
        $this->dateDePublication = $dateDePublication;
    }

    /**
     * @param \DateTime $dateUpdate
     */
    public function setDateUpdate(\DateTime $dateUpdate): void
    {
        $this->dateUpdate = $dateUpdate;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @param null|string $devicesCompatible
     */
    public function setDevicesCompatible(?string $devicesCompatible): void
    {
        $this->devicesCompatible = $devicesCompatible;
    }

    /**
     * @param string $displayPourUser
     */
    public function setDisplayPourUser(string $displayPourUser): void
    {
        $this->displayPourUser = $displayPourUser;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $id
     */
    public function setId(\Doctrine\Common\Collections\Collection $id): void
    {
        $this->id = $id;
    }




    /**
     * @param int $idformation
     */
    public function setIdformation(int $idformation): void
    {
        $this->idformation = $idformation;
    }

    /**
     * @param string $isvalide
     */
    public function setIsvalide(string $isvalide): void
    {
        $this->isvalide = $isvalide;
    }

    /**
     * @param int $nombreDeLessons
     */
    public function setNombreDeLessons(int $nombreDeLessons): void
    {
        $this->nombreDeLessons = $nombreDeLessons;
    }

    /**
     * @param int $nombreDeVue
     */
    public function setNombreDeVue(int $nombreDeVue): void
    {
        $this->nombreDeVue = $nombreDeVue;
    }

    /**
     * @param string $nomFormation
     */
    public function setNomFormation(string $nomFormation): void
    {
        $this->nomFormation = $nomFormation;
    }

    /**
     * @param string $tags
     */
    public function setTags(string $tags): void
    {
        $this->tags = $tags;
    }

    /**
     * @param string $version
     */
    public function setVersion(string $version): void
    {
        $this->version = $version;
    }

}
