<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Typetraif
 *
 * @ORM\Table(name="typetraif")
 * @ORM\Entity
 */
class Typetraif
{
    /**
     * @var int
     *
     * @ORM\Column(name="idtypetraif", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtypetraif;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=45, nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="plans", type="text", length=0, nullable=false)
     */
    private $plans;


}
