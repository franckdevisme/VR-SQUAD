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

    /**
     * @var int
     *
     * @ORM\Column(name="idContenutext", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcontenutext;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Formation", mappedBy="contenutext")
     */
    private $formation;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->formation = new \Doctrine\Common\Collections\ArrayCollection();
    }
	 /**
     * @param int $idcontenutext
     */
    public function setIdcontenutext(int $idcontenutext): void
    {
        $this->idcontenutext = $idcontenutext;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function getTitre(): string
    {
        return $this->titre;
    }

    /**
     * @param string $titre
     */
    public function setTitre(string $titre): void
    {
        $this->titre = $titre;
    }

    /**
     * @return int
     */
    public function getIdcontenutext(): int
    {
        return $this->idcontenutext;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFormation(): \Doctrine\Common\Collections\Collection
    {
        return $this->formation;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $formation
     */
    public function setFormation(\Doctrine\Common\Collections\Collection $formation): void
    {
        $this->formation = $formation;
    }



}
