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

}
