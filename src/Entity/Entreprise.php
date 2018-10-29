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

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getId(): \Doctrine\Common\Collections\Collection
    {
        return $this->id;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $id
     */
    public function setId(\Doctrine\Common\Collections\Collection $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getIdentreprise(): int
    {
        return $this->identreprise;
    }

    /**
     * @param int $identreprise
     */
    public function setIdentreprise(int $identreprise): void
    {
        $this->identreprise = $identreprise;
    }

    /**
     * @param int $isvalide
     */
    public function setIsvalide(int $isvalide): void
    {
        $this->isvalide = $isvalide;
    }

    /**
     * @return int
     */
    public function getIsvalide(): int
    {
        return $this->isvalide;
    }

    /**
     * @param string $ville
     */
    public function setVille(string $ville): void
    {
        $this->ville = $ville;
    }

    /**
     * @param int $cp
     */
    public function setCp(int $cp): void
    {
        $this->cp = $cp;
    }

    /**
     * @param string $adresse
     */
    public function setAdresse(string $adresse): void
    {
        $this->adresse = $adresse;
    }

    /**
     * @return string
     */
    public function getVille(): string
    {
        return $this->ville;
    }

    /**
     * @return int
     */
    public function getCp(): int
    {
        return $this->cp;
    }

    /**
     * @return string
     */
    public function getAdresse(): string
    {
        return $this->adresse;
    }

    /**
     * @return \DateTime
     */
    public function getDebutDeLaSouscription(): \DateTime
    {
        return $this->debutDeLaSouscription;
    }

    /**
     * @return \DateTime
     */
    public function getExpirationDeLaSouscription(): \DateTime
    {
        return $this->expirationDeLaSouscription;
    }

    /**
     * @return string
     */
    public function getNomEntreprise(): string
    {
        return $this->nomEntreprise;
    }

    /**
     * @return string
     */
    public function getPays(): string
    {
        return $this->pays;
    }

    /**
     * @return string
     */
    public function getTypeDeSouscription(): string
    {
        return $this->typeDeSouscription;
    }

    /**
     * @param \DateTime $debutDeLaSouscription
     */
    public function setDebutDeLaSouscription(\DateTime $debutDeLaSouscription): void
    {
        $this->debutDeLaSouscription = $debutDeLaSouscription;
    }

    /**
     * @param \DateTime $expirationDeLaSouscription
     */
    public function setExpirationDeLaSouscription(\DateTime $expirationDeLaSouscription): void
    {
        $this->expirationDeLaSouscription = $expirationDeLaSouscription;
    }

    /**
     * @param string $nomEntreprise
     */
    public function setNomEntreprise(string $nomEntreprise): void
    {
        $this->nomEntreprise = $nomEntreprise;
    }

    /**
     * @param string $pays
     */
    public function setPays(string $pays): void
    {
        $this->pays = $pays;
    }

    /**
     * @param string $typeDeSouscription
     */
    public function setTypeDeSouscription(string $typeDeSouscription): void
    {
        $this->typeDeSouscription = $typeDeSouscription;
    }

}
