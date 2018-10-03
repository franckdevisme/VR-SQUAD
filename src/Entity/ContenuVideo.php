<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContenuVideo
 *
 * @ORM\Table(name="contenu_video")
 * @ORM\Entity
 */
class ContenuVideo
{
    /**
     * @var int
     *
     * @ORM\Column(name="idvideo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idvideo;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_video", type="string", length=255, nullable=false)
     */
    private $nomVideo;

    /**
     * @var string
     *
     * @ORM\Column(name="url_video", type="text", length=0, nullable=false)
     */
    private $urlVideo;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Formation", mappedBy="contenuvideo")
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
