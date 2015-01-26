<?php

namespace Couture\CoutureBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Couture\ClientBundle\Entity\Client as Client;

/**
 * Couture
 *
 * @ORM\Table(name="couture", indexes={@ORM\Index(name="fk_couture_client_idx", columns={"client"}), @ORM\Index(name="fk_couture_modele1_idx", columns={"modele"}), @ORM\Index(name="fk_couture_mesure1_idx", columns={"mesure"})})
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
     * @ORM\ManyToOne(targetEntity="Couture\ClientBundle\Entity\Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="client", referencedColumnName="id")
     * })
     */
    private $client;

    /**
     * @var \Modele
     *
     * @ORM\ManyToOne(targetEntity="Modele")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="modele", referencedColumnName="id")
     * })
     */
    private $modele;

    /**
     * @var \Mesure
     *
     * @ORM\ManyToOne(targetEntity="Mesure", cascade={"persist", "remove"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="mesure", referencedColumnName="id")
     * })
     */
    private $mesure;
    
    private $infosCouture;
    
    private $avance ; 
    
    function getAvance() {
        return $this->avance;
    }

    function setAvance($avance) {
        $this->avance = $avance;
    }

    
    public function __construct() {
        $this->datec = new \DateTime();
        $this->etat = 0;
    }
    
    
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
     * Set client
     *
     * @param \Couture\CoutureBundle\Entity\Client $client
     * @return Couture
     */
    public function setClient(Client $client = null)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \Couture\CoutureBundle\Entity\Client 
     */
    public function getClient()
    {
        return $this->client;
    }
    
    public function getInfosCouture()
    {
        $infosClient = $this->client->getInfosClient();
        $modele = $this->getModele()->getLibelle() ; 
//        $date = date('d / M / Y',$this->getDatec());
//        $date = date('d/M/Y', $date);
        $date = $this->getDatec()->format('d/M/Y');
//        $date = strtotime($date);
        $this->infosCouture = $infosClient.' '.$modele.' '.$date;
        return $this->infosCouture;
    }

    /**
     * Set modele
     *
     * @param \Couture\CoutureBundle\Entity\Modele $modele
     * @return Couture
     */
    public function setModele(\Couture\CoutureBundle\Entity\Modele $modele = null)
    {
        $this->modele = $modele;

        return $this;
    }

    /**
     * Get modele
     *
     * @return \Couture\CoutureBundle\Entity\Modele 
     */
    public function getModele()
    {
        return $this->modele;
    }

    /**
     * Set mesure
     *
     * @param \Couture\CoutureBundle\Entity\Mesure $mesure
     * @return Couture
     */
    public function setMesure(\Couture\CoutureBundle\Entity\Mesure $mesure = null)
    {
        $this->mesure = $mesure;

        return $this;
    }

    /**
     * Get mesure
     *
     * @return \Couture\CoutureBundle\Entity\Mesure 
     */
    public function getMesure()
    {
        return $this->mesure;
    }
}
