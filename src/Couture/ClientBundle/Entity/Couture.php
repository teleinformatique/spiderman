<?php

namespace Couture\ClientBundle\Entity;

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



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set datec
     *
     * @param \DateTime $datec
     * @return Couture
     */
    public function setDatec($datec)
    {
        $this->datec = $datec;

        return $this;
    }

    /**
     * Get datec
     *
     * @return \DateTime 
     */
    public function getDatec()
    {
        return $this->datec;
    }

    /**
     * Set datemod
     *
     * @param \DateTime $datemod
     * @return Couture
     */
    public function setDatemod($datemod)
    {
        $this->datemod = $datemod;

        return $this;
    }

    /**
     * Get datemod
     *
     * @return \DateTime 
     */
    public function getDatemod()
    {
        return $this->datemod;
    }

    /**
     * Set datefin
     *
     * @param \DateTime $datefin
     * @return Couture
     */
    public function setDatefin($datefin)
    {
        $this->datefin = $datefin;

        return $this;
    }

    /**
     * Get datefin
     *
     * @return \DateTime 
     */
    public function getDatefin()
    {
        return $this->datefin;
    }

    /**
     * Set prix
     *
     * @param string $prix
     * @return Couture
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return string 
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set tissu
     *
     * @param string $tissu
     * @return Couture
     */
    public function setTissu($tissu)
    {
        $this->tissu = $tissu;

        return $this;
    }

    /**
     * Get tissu
     *
     * @return string 
     */
    public function getTissu()
    {
        return $this->tissu;
    }

    /**
     * Set detail
     *
     * @param string $detail
     * @return Couture
     */
    public function setDetail($detail)
    {
        $this->detail = $detail;

        return $this;
    }

    /**
     * Get detail
     *
     * @return string 
     */
    public function getDetail()
    {
        return $this->detail;
    }

    /**
     * Set iduser
     *
     * @param integer $iduser
     * @return Couture
     */
    public function setIduser($iduser)
    {
        $this->iduser = $iduser;

        return $this;
    }

    /**
     * Get iduser
     *
     * @return integer 
     */
    public function getIduser()
    {
        return $this->iduser;
    }

    /**
     * Set etat
     *
     * @param integer $etat
     * @return Couture
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return integer 
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set idclient
     *
     * @param \Couture\ClientBundle\Entity\Client $idclient
     * @return Couture
     */
    public function setIdclient(\Couture\ClientBundle\Entity\Client $idclient = null)
    {
        $this->idclient = $idclient;

        return $this;
    }

    /**
     * Get idclient
     *
     * @return \Couture\ClientBundle\Entity\Client 
     */
    public function getIdclient()
    {
        return $this->idclient;
    }

    /**
     * Set idmodele
     *
     * @param \Couture\ClientBundle\Entity\Modele $idmodele
     * @return Couture
     */
    public function setIdmodele(\Couture\ClientBundle\Entity\Modele $idmodele = null)
    {
        $this->idmodele = $idmodele;

        return $this;
    }

    /**
     * Get idmodele
     *
     * @return \Couture\ClientBundle\Entity\Modele 
     */
    public function getIdmodele()
    {
        return $this->idmodele;
    }

    /**
     * Set idmesure
     *
     * @param \Couture\ClientBundle\Entity\Mesure $idmesure
     * @return Couture
     */
    public function setIdmesure(\Couture\ClientBundle\Entity\Mesure $idmesure = null)
    {
        $this->idmesure = $idmesure;

        return $this;
    }

    /**
     * Get idmesure
     *
     * @return \Couture\ClientBundle\Entity\Mesure 
     */
    public function getIdmesure()
    {
        return $this->idmesure;
    }
}
