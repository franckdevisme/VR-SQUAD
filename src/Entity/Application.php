<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Application
 *
 * @ORM\Table(name="application", indexes={@ORM\Index(name="fk_application_formation_idx", columns={"idformation"})})
 * @ORM\Entity
 */
class Application
{
    /**
     * @var int
     *
     * @ORM\Column(name="idapplication", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idapplication;

    /**
     * @var string
     *
     * @ORM\Column(name="nomapp", type="string", length=45, nullable=false)
     */
    private $nomapp;

    /**
     * @var string
     *
     * @ORM\Column(name="urlapp", type="string", length=255, nullable=false)
     */
    private $urlapp;

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
