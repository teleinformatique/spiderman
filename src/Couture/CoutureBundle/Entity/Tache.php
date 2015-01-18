<?php

namespace Couture\CoutureBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tache
 *
 * @ORM\Table(name="tache", indexes={@ORM\Index(name="fk_tache_spiderman1_idx", columns={"idspiderman"}), @ORM\Index(name="fk_tache_tailleur1_idx", columns={"idTailleur"})})
 * @ORM\Entity
 */
class Tache
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
     * @ORM\Column(name="intervention", type="string", length=255, nullable=true)
     */
    private $intervention;

    /**
     * @var string
     *
     * @ORM\Column(name="frais", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $frais;

    /**
     * @var integer
     *
     * @ORM\Column(name="etat", type="integer", nullable=true)
     */
    private $etat;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datec", type="datetime", nullable=true)
     */
    private $datec;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datemod", type="datetime", nullable=true)
     */
    private $datemod;

    /**
     * @var integer
     *
     * @ORM\Column(name="idUser", type="integer", nullable=true)
     */
    private $iduser;

    /**
     * @var \Couture
     *
     * @ORM\ManyToOne(targetEntity="Couture")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idspiderman", referencedColumnName="id")
     * })
     */
    private $idspiderman;

    /**
     * @var \Tailleur
     *
     * @ORM\ManyToOne(targetEntity="Tailleur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idTailleur", referencedColumnName="id")
     * })
     */
    private $idtailleur;


}
