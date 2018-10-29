<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CommandeHasFormation
 *
 * @ORM\Table(name="commande_has_formation", indexes={@ORM\Index(name="fk_commande_has_formation_formation1_idx", columns={"idformation"}), @ORM\Index(name="fk_commande_has_formation_commande1_idx", columns={"idcommande"})})
 * @ORM\Entity
 */
class CommandeHasFormation
{
    /**
     * @var int
     *
     * @ORM\Column(name="idcmd_for", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idcmdFor;

    /**
     * @var \Formation
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Formation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idformation", referencedColumnName="idformation")
     * })
     */
    private $idformation;

    /**
     * @var \Commande
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Commande")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idcommande", referencedColumnName="idcommande")
     * })
     */
    private $idcommande;


}
