<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Formation
 *
 * @ORM\Table(name="formation", indexes={@ORM\Index(name="fk_formation_Entreprise1_idx", columns={"idEntreprise"}), @ORM\Index(name="fk_formation_categorie1_idx", columns={"idcategorie"})})
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
     * @var bool
     *
     * @ORM\Column(name="display_pour_user", type="boolean", nullable=false)
     */
    private $displayPourUser;

    /**
     * @var bool
     *
     * @ORM\Column(name="isvalide", type="boolean", nullable=false)
     */
    private $isvalide;

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
     * @var \Entreprise
     *
     * @ORM\ManyToOne(targetEntity="Entreprise")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idEntreprise", referencedColumnName="idEntreprise")
     * })
     */
    private $identreprise;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="ContenuImg", inversedBy="formation")
     * @ORM\JoinTable(name="formation_has_contenu_img",
     *   joinColumns={
     *     @ORM\JoinColumn(name="formation", referencedColumnName="idformation")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="contenu_img", referencedColumnName="idcontenu_img")
     *   }
     * )
     */
    private $contenuImg;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="ContenuVideo", inversedBy="formation")
     * @ORM\JoinTable(name="formation_has_contenu_video",
     *   joinColumns={
     *     @ORM\JoinColumn(name="formation", referencedColumnName="idformation")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="contenuvideo", referencedColumnName="idvideo")
     *   }
     * )
     */
    private $contenuvideo;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Contenutest", inversedBy="formation")
     * @ORM\JoinTable(name="formation_has_contenutest",
     *   joinColumns={
     *     @ORM\JoinColumn(name="formation", referencedColumnName="idformation")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="contenutest", referencedColumnName="idtest")
     *   }
     * )
     */
    private $contenutest;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Contenutext", inversedBy="formation")
     * @ORM\JoinTable(name="formation_has_contenutext",
     *   joinColumns={
     *     @ORM\JoinColumn(name="formation", referencedColumnName="idformation")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="contenutext", referencedColumnName="idContenutext")
     *   }
     * )
     */
    private $contenutext;

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
        $this->contenuImg = new \Doctrine\Common\Collections\ArrayCollection();
        $this->contenuvideo = new \Doctrine\Common\Collections\ArrayCollection();
        $this->contenutest = new \Doctrine\Common\Collections\ArrayCollection();
        $this->contenutext = new \Doctrine\Common\Collections\ArrayCollection();
        $this->id = new \Doctrine\Common\Collections\ArrayCollection();
    }
	 /**
     * @return bool
     */
    public function isDisplayPourUser(): bool
    {
        return $this->displayPourUser;
    }

    /**
     * @param bool $isvalide
     */
    public function setIsvalide(bool $isvalide): void
    {
        $this->isvalide = $isvalide;
    }

    /**
     * @param \Entreprise $identreprise
     */
    public function setIdentreprise(\Entreprise $identreprise): void
    {
        $this->identreprise = $identreprise;
    }

    /**
     * @return \Entreprise
     */
    public function getIdentreprise(): \Entreprise
    {
        return $this->identreprise;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $id
     */
    public function setId(\Doctrine\Common\Collections\Collection $id): void
    {
        $this->id = $id;
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
     * @param int $idformation
     */
    public function setIdformation(int $idformation): void
    {
        $this->idformation = $idformation;
    }

    /**
     * @param \Categorie $idcategorie
     */
    public function setIdcategorie(\Categorie $idcategorie): void
    {
        $this->idcategorie = $idcategorie;
    }

    /**
     * @return \Categorie
     */
    public function getIdcategorie(): \Categorie
    {
        return $this->idcategorie;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getTags(): string
    {
        return $this->tags;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @param string $tags
     */
    public function setTags(string $tags): void
    {
        $this->tags = $tags;
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
     * @return null|string
     */
    public function getDevicesCompatible(): ?string
    {
        return $this->devicesCompatible;
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
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $contenuvideo
     */
    public function setContenuvideo(\Doctrine\Common\Collections\Collection $contenuvideo): void
    {
        $this->contenuvideo = $contenuvideo;
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
     * @param null|string $devicesCompatible
     */
    public function setDevicesCompatible(?string $devicesCompatible): void
    {
        $this->devicesCompatible = $devicesCompatible;
    }

    /**
     * @param bool $displayPourUser
     */
    public function setDisplayPourUser(bool $displayPourUser): void
    {
        $this->displayPourUser = $displayPourUser;
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
     * @param string $version
     */
    public function setVersion(string $version): void
    {
        $this->version = $version;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getContenuImg(): \Doctrine\Common\Collections\Collection
    {
        return $this->contenuImg;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getContenutest(): \Doctrine\Common\Collections\Collection
    {
        return $this->contenutest;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getContenutext(): \Doctrine\Common\Collections\Collection
    {
        return $this->contenutext;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getContenuvideo(): \Doctrine\Common\Collections\Collection
    {
        return $this->contenuvideo;
    }

    /**
     * @return bool
     */
    public function isIsvalide(): bool
    {
        return $this->isvalide;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $contenuImg
     */
    public function setContenuImg(\Doctrine\Common\Collections\Collection $contenuImg): void
    {
        $this->contenuImg = $contenuImg;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $contenutest
     */
    public function setContenutest(\Doctrine\Common\Collections\Collection $contenutest): void
    {
        $this->contenutest = $contenutest;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $contenutext
     */
    public function setContenutext(\Doctrine\Common\Collections\Collection $contenutext): void
    {
        $this->contenutext = $contenutext;
    }


}
