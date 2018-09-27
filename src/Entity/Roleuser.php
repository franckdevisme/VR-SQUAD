<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Roleuser
 *
 * @ORM\Table(name="roleuser")
 * @ORM\Entity
 */
class Roleuser
{
    /**
     * @var int
     *
     * @ORM\Column(name="idRole", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idrole;

    /**
     * @var string
     *
     * @ORM\Column(name="Role", type="string", length=255, nullable=false)
     */
    private $role;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=0, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="prefixe", type="string", length=45, nullable=false)
     */
    private $prefixe;


}
