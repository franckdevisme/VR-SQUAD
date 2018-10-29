<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entreprise
 *
 * @ORM\Table(name="entreprise")
 * @ORM\Entity
 */
class Entreprise
{
    /**
     * @var string
     *
     * @ORM\Column(name="nom_entreprise", type="string", length=255, nullable=false)
     */
    private $nomEntreprise;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=false)
     */
    private $adresse;

    /**
     * @var int
     *
     * @ORM\Column(name="cp", type="integer", nullable=false)
     */
    private $cp;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255, nullable=false)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="pays", type="string", length=255, nullable=false)
     */
    private $pays;

    /**
     * @var string
     *
     * @ORM\Column(name="type_de_souscription", type="string", length=255, nullable=false)
     */
    private $typeDeSouscription;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="debut_de_la_souscription", type="date", nullable=false)
     */
    private $debutDeLaSouscription;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="expiration_de_la_souscription", type="date", nullable=false)
     */
    private $expirationDeLaSouscription;

    /**
     * @var int
     *
     * @ORM\Column(name="isvalide", type="integer", nullable=false)
     */
    private $isvalide;

    /**
     * @var int
     *
     * @ORM\Column(name="idEntreprise", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $identreprise;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="User", mappedBy="identreprise")
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
