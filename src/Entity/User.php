<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 *
 * @ORM\Table(name="user",indexes={@ORM\Index(name="fk_User_Entreprise_idx", columns={"idEntreprise"}), @ORM\Index(name="fk_User_RoleUser1_idx", columns={"idRole"})})
 * @ORM\Entity
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="avater", type="text", length=0, nullable=true)
     */
    private $avater;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="poste", type="string", length=255, nullable=true)
     */
    private $poste;

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
     * @var \Roleuser
     *
     * @ORM\ManyToOne(targetEntity="Roleuser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idRole", referencedColumnName="idRole")
     * })
     */
    private $idrole;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Formation", inversedBy="id")
     * @ORM\JoinTable(name="formation_suivi_par",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idformation", referencedColumnName="idformation")
     *   }
     * )
     */
    private $idformation;

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->idformation = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getAvater(){
        return $this->avater;
    }

    public function getNom(){
        return $this->nom;
    }

}
