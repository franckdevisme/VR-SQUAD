<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Paiementformation
 *
 * @ORM\Table(name="paiementformation", indexes={@ORM\Index(name="fk_paiementformation_commande1_idx", columns={"idcommande"}), @ORM\Index(name="fk_paiementformation_tarifformation1_idx", columns={"idtarifformation"})})
 * @ORM\Entity
 */
class Paiementformation
{
    /**
     * @var int
     *
     * @ORM\Column(name="idpaiementformation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idpaiementformation;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tva", type="text", length=0, nullable=true)
     */
    private $tva;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_paiement", type="date", nullable=false)
     */
    private $datePaiement;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=0, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="type_de_paiement", type="string", length=255, nullable=false)
     */
    private $typeDePaiement;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Tokens", type="text", length=0, nullable=true)
     */
    private $tokens;

    /**
     * @var \Commande
     *
     * @ORM\ManyToOne(targetEntity="Commande")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idcommande", referencedColumnName="idcommande")
     * })
     */
    private $idcommande;

    /**
     * @var \Tarifformation
     *
     * @ORM\ManyToOne(targetEntity="Tarifformation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idtarifformation", referencedColumnName="idtarifformation")
     * })
     */
    private $idtarifformation;


}
