<?php

namespace Couture\CoutureBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Couture
 *
 * @ORM\Table(name="couture", indexes={@ORM\Index(name="fk_spiderman_client_idx", columns={"idClient"}), @ORM\Index(name="fk_spiderman_modele1_idx", columns={"idModele"}), @ORM\Index(name="fk_spiderman_mesure1_idx", columns={"idMesure"})})
 * @ORM\Entity
 */
class Couture
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
     * @var \DateTime
     *
     * @ORM\Column(name="datefin", type="datetime", nullable=true)
     */
    private $datefin;

    /**
     * @var string
     *
     * @ORM\Column(name="prix", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="tissu", type="string", length=255, nullable=true)
     */
    private $tissu;

    /**
     * @var string
     *
     * @ORM\Column(name="detail", type="text", length=65535, nullable=true)
     */
    private $detail;

    /**
     * @var integer
     *
     * @ORM\Column(name="idUser", type="integer", nullable=true)
     */
    private $iduser;

    /**
     * @var integer
     *
     * @ORM\Column(name="etat", type="integer", nullable=true)
     */
    private $etat;

    /**
     * @var \Client
     *
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idClient", referencedColumnName="id")
     * })
     */
    private $idclient;

    /**
     * @var \Modele
     *
     * @ORM\ManyToOne(targetEntity="Modele")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idModele", referencedColumnName="id")
     * })
     */
    private $idmodele;

    /**
     * @var \Mesure
     *
     * @ORM\ManyToOne(targetEntity="Mesure")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idMesure", referencedColumnName="id")
     * })
     */
    private $idmesure;


}
