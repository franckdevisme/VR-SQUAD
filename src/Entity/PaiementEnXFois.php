<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PaiementEnXFois
 *
 * @ORM\Table(name="paiement_en_x_fois", indexes={@ORM\Index(name="fk_paiement_en_x_fois_abonnement1_idx", columns={"idabonnement"})})
 * @ORM\Entity
 */
class PaiementEnXFois
{
    /**
     * @var int
     *
     * @ORM\Column(name="idx_fois", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idxFois;

    /**
     * @var int
     *
     * @ORM\Column(name="x_fois", type="integer", nullable=false)
     */
    private $xFois;

    /**
     * @var int
     *
     * @ORM\Column(name="total_a_payes", type="integer", nullable=false)
     */
    private $totalAPayes;

    /**
     * @var int|null
     *
     * @ORM\Column(name="reste_a_payes", type="integer", nullable=true)
     */
    private $resteAPayes;

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
