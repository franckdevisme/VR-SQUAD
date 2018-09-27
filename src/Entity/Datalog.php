<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Datalog
 *
 * @ORM\Table(name="datalog")
 * @ORM\Entity
 */
class Datalog
{
    /**
     * @var int
     *
     * @ORM\Column(name="iddatalog", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iddatalog;

    /**
     * @var string|null
     *
     * @ORM\Column(name="action", type="string", length=45, nullable=true)
     */
    private $action;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="time", type="date", nullable=true)
     */
    private $time;

    /**
     * @var string|null
     *
     * @ORM\Column(name="olddata", type="text", length=0, nullable=true)
     */
    private $olddata;

    /**
     * @var string|null
     *
     * @ORM\Column(name="newdata", type="text", length=0, nullable=true)
     */
    private $newdata;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tablename", type="string", length=255, nullable=true)
     */
    private $tablename;

    /**
     * @var string|null
     *
     * @ORM\Column(name="logjson", type="text", length=0, nullable=true)
     */
    private $logjson;


}
