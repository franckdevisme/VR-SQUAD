<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContenuImg
 *
 * @ORM\Table(name="contenu_img")
 * @ORM\Entity
 */
class ContenuImg
{
    /**
     * @var int
     *
     * @ORM\Column(name="idcontenu_img", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcontenuImg;

    /**
     * @var string
     *
     * @ORM\Column(name="name_image", type="string", length=255, nullable=false)
     */
    private $nameImage;

    /**
     * @var string
     *
     * @ORM\Column(name="url_image", type="text", length=0, nullable=false)
     */
    private $urlImage;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Formation", mappedBy="contenuImg")
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

    /**
     * @return string
     */
    public function getUrlImage(): string
    {
        return $this->urlImage;
    }

    /**
     * @param string $nameImage
     */
    public function setNameImage(string $nameImage): void
    {
        $this->nameImage = $nameImage;
    }

    /**
     * @return int
     */
    public function getIdcontenuImg(): int
    {
        return $this->idcontenuImg;
    }

    /**
     * @return string
     */
    public function getNameImage(): string
    {
        return $this->nameImage;
    }

    /**
     * @param int $idcontenuImg
     */
    public function setIdcontenuImg(int $idcontenuImg): void
    {
        $this->idcontenuImg = $idcontenuImg;
    }

    /**
     * @param string $urlImage
     */
    public function setUrlImage(string $urlImage): void
    {
        $this->urlImage = $urlImage;
    }

}
