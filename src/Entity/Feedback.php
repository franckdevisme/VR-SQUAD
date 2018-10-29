<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Feedback
 *
 * @ORM\Table(name="feedback", indexes={@ORM\Index(name="fk_Feedback_User1_idx", columns={"id"}), @ORM\Index(name="fk_Feedback_formation1_idx", columns={"idformation"})})
 * @ORM\Entity
 */
class Feedback
{
    /**
     * @var string
     *
     * @ORM\Column(name="note", type="string", length=45, nullable=false)
     */
    private $note;

    /**
     * @var string
     *
     * @ORM\Column(name="commenter", type="string", length=255, nullable=false)
     */
    private $commenter;

    /**
     * @var int
     *
     * @ORM\Column(name="idFeedback", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idfeedback;

    /**
     * @var \Formation
     *
     * @ORM\ManyToOne(targetEntity="Formation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idformation", referencedColumnName="idformation")
     * })
     */
    private $idformation;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
     */
    private $id;


}
