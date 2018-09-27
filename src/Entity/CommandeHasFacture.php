<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CommandeHasFacture
 *
 * @ORM\Table(name="commande_has_facture", indexes={@ORM\Index(name="fk_commande_has_Facture_Facture1_idx", columns={"idFacture"}), @ORM\Index(name="fk_commande_has_Facture_commande1_idx", columns={"idcommande"})})
 * @ORM\Entity
 */
class CommandeHasFacture
{
    /**
     * @var int
     *
     * @ORM\Column(name="idcmd_for", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcmdFor;

    /**
     * @var \Facture
     *
     * @ORM\ManyToOne(targetEntity="Facture")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idFacture", referencedColumnName="idFacture")
     * })
     */
    private $idfacture;

    /**
     * @var \Commande
     *
     * @ORM\ManyToOne(targetEntity="Commande")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idcommande", referencedColumnName="idcommande")
     * })
     */
    private $idcommande;


}
