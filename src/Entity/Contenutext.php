<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contenutext
 *
 * @ORM\Table(name="contenutext")
 * @ORM\Entity
 */
class Contenutext
{
    /**
     * @var int
     *
     * @ORM\Column(name="idContenutext", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcontenutext;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=45, nullable=false)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text", length=0, nullable=false)
     */
    private $text;


}
