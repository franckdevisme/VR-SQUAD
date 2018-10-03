<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contenutest
 *
 * @ORM\Table(name="contenutest")
 * @ORM\Entity
 */
class Contenutest
{
    /**
     * @var int
     *
     * @ORM\Column(name="idtest", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtest;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nom_test", type="string", length=255, nullable=true)
     */
    private $nomTest;

    /**
     * @var string|null
     *
     * @ORM\Column(name="type_test", type="string", length=45, nullable=true)
     */
    private $typeTest;

    /**
     * @var string|null
     *
     * @ORM\Column(name="test", type="text", length=0, nullable=true)
     */
    private $test;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Formation", mappedBy="contenutest")
     */
    private $formation;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->formation = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
