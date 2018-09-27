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


}
