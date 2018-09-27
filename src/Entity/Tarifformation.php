<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tarifformation
 *
 * @ORM\Table(name="tarifformation", indexes={@ORM\Index(name="fk_tarifformation_formation1_idx", columns={"idformation"})})
 * @ORM\Entity
 */
class Tarifformation
{
    /**
     * @var int
     *
     * @ORM\Column(name="idtarifformation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtarifformation;

    /**
     * @var int
     *
     * @ORM\Column(name="traifHT", type="integer", nullable=false)
     */
    private $traifht;

    /**
     * @var int
     *
     * @ORM\Column(name="trafTTC", type="integer", nullable=false)
     */
    private $trafttc;

    /**
     * @var string|null
     *
     * @ORM\Column(name="retribution", type="string", length=45, nullable=true)
     */
    private $retribution;

    /**
     * @var \Formation
     *
     * @ORM\ManyToOne(targetEntity="Formation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idformation", referencedColumnName="idformation")
     * })
     */
    private $idformation;


}
