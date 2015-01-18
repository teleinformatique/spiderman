<?php

namespace Couture\CoutureBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Modele
 *
 * @ORM\Table(name="modele")
 * @ORM\Entity
 */
class Modele
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255, nullable=true)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datec", type="datetime", nullable=true)
     */
    private $datec;

    /**
     * @var integer
     *
     * @ORM\Column(name="idUser", type="integer", nullable=true)
     */
    private $iduser;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datemod", type="datetime", nullable=true)
     */
    private $datemod;


}
