<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Paiement
 *
 * @ORM\Table(name="paiement", indexes={@ORM\Index(name="fk_Paiement_paiement_en_x_fois1_idx", columns={"idx_fois"})})
 * @ORM\Entity
 */
class Paiement
{
    /**
     * @var int
     *
     * @ORM\Column(name="idPaiement", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idpaiement;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=45, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=45, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="tva", type="string", length=45, nullable=false)
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
     * @ORM\Column(name="type_de_paiement", type="string", length=45, nullable=false)
     */
    private $typeDePaiement;

    /**
     * @var int
     *
     * @ORM\Column(name="prix_total_paye", type="integer", nullable=false)
     */
    private $prixTotalPaye;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Tokens", type="text", length=0, nullable=true)
     */
    private $tokens;

    /**
     * @var \PaiementEnXFois
     *
     * @ORM\ManyToOne(targetEntity="PaiementEnXFois")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idx_fois", referencedColumnName="idx_fois")
     * })
     */
    private $idxFois;


}
