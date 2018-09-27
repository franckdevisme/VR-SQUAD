<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table(name="commande", indexes={@ORM\Index(name="fk_commande_Entreprise1_idx", columns={"idEntreprise"}), @ORM\Index(name="fk_commande_abonnement1_idx", columns={"idabonnement"})})
 * @ORM\Entity
 */
class Commande
{
    /**
     * @var int
     *
     * @ORM\Column(name="idcommande", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcommande;

    /**
     * @var int
     *
     * @ORM\Column(name="numerocommande", type="integer", nullable=false)
     */
    private $numerocommande;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="datecommande", type="date", nullable=true)
     */
    private $datecommande;

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
     * @var \Abonnement
     *
     * @ORM\ManyToOne(targetEntity="Abonnement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idabonnement", referencedColumnName="idabonnement")
     * })
     */
    private $idabonnement;


}
