<?php

namespace App\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user", indexes={@ORM\Index(name="fk_User_Entreprise_idx", columns={"idEntreprise"}), @ORM\Index(name="fk_User_RoleUser1_idx", columns={"idRole"})})
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

}
