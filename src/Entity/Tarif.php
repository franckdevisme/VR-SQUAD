<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tarif
 *
 * @ORM\Table(name="tarif", indexes={@ORM\Index(name="fk_Tarif_typetraif1_idx", columns={"idtypetraif"})})
 * @ORM\Entity
 */
class Tarif
{
    /**
     * @var int
     *
     * @ORM\Column(name="traifHT", type="integer", nullable=false)
     */
    private $traifht;

    /**
     * @var int
     *
     * @ORM\Column(name="traifTTC", type="integer", nullable=false)
     */
    private $traifttc;

    /**
     * @var int
     *
     * @ORM\Column(name="nombre_user", type="integer", nullable=false)
     */
    private $nombreUser;

    /**
     * @var int
     *
     * @ORM\Column(name="idTarif", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtarif;

    /**
     * @var \Typetraif
     *
     * @ORM\ManyToOne(targetEntity="Typetraif")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idtypetraif", referencedColumnName="idtypetraif")
     * })
     */
    private $idtypetraif;


}
