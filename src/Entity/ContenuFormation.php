<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContenuFormation
 *
 * @ORM\Table(name="contenu_formation", indexes={@ORM\Index(name="fk_contenu_formation_fonmation1_idx", columns={"idformation"}), @ORM\Index(name="fk_contenu_formation_contenu_img1_idx", columns={"idimage"}), @ORM\Index(name="fk_contenu_formation_contenu_video1_idx", columns={"idvideo"}), @ORM\Index(name="fk_contenu_formation_Contenutext1_idx", columns={"idContenutext"}), @ORM\Index(name="fk_contenu_formation_ContenuTest1_idx", columns={"idtest"})})
 * @ORM\Entity
 */
class ContenuFormation
{
    /**
     * @var int
     *
     * @ORM\Column(name="idcontenu_formation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcontenuFormation;

    /**
     * @var \Contenutest
     *
     * @ORM\ManyToOne(targetEntity="Contenutest")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idtest", referencedColumnName="idtest")
     * })
     */
    private $idtest;

    /**
     * @var \Contenutext
     *
     * @ORM\ManyToOne(targetEntity="Contenutext")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idContenutext", referencedColumnName="idContenutext")
     * })
     */
    private $idcontenutext;

    /**
     * @var \ContenuImg
     *
     * @ORM\ManyToOne(targetEntity="ContenuImg")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idimage", referencedColumnName="idcontenu_img")
     * })
     */
    private $idimage;

    /**
     * @var \ContenuVideo
     *
     * @ORM\ManyToOne(targetEntity="ContenuVideo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idvideo", referencedColumnName="idvideo")
     * })
     */
    private $idvideo;

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
