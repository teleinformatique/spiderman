<?php

namespace Couture\FacturationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Facture
 *
 * @ORM\Table(name="facture", indexes={@ORM\Index(name="fk_facture_couture1_idx", columns={"couture"}), @ORM\Index(name="fk_facture_etatfacture1_idx", columns={"etatfacture"})})
 * @ORM\Entity
 */
class Facture
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
     * @ORM\Column(name="date", type="date", nullable=true)
     */
    private $date;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datemod", type="datetime", nullable=true)
     */
    private $datemod;

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
     * @var string
     *
     * @ORM\Column(name="avance", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $avance;

    /**
     * @var \Couture
     *
     * @ORM\ManyToOne(targetEntity="Couture\CoutureBundle\Entity\Couture")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="couture", referencedColumnName="id")
     * })
     */
    private $couture;

    /**
     * @var \Etatfacture
     *
     * @ORM\ManyToOne(targetEntity="Etatfacture")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="etatfacture", referencedColumnName="id")
     * })
     */
    private $etatfacture;



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
     * Set date
     *
     * @param \DateTime $date
     * @return Facture
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set datemod
     *
     * @param \DateTime $datemod
     * @return Facture
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
     * Set datec
     *
     * @param \DateTime $datec
     * @return Facture
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
     * Set iduser
     *
     * @param integer $iduser
     * @return Facture
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
     * Set avance
     *
     * @param string $avance
     * @return Facture
     */
    public function setAvance($avance)
    {
        $this->avance = $avance;

        return $this;
    }

    /**
     * Get avance
     *
     * @return string 
     */
    public function getAvance()
    {
        return $this->avance;
    }

    /**
     * Set couture
     *
     * @param \Couture\FacturationBundle\Entity\Couture $couture
     * @return Facture
     */
    public function setCouture(\Couture\FacturationBundle\Entity\Couture $couture = null)
    {
        $this->couture = $couture;

        return $this;
    }

    /**
     * Get couture
     *
     * @return \Couture\FacturationBundle\Entity\Couture 
     */
    public function getCouture()
    {
        return $this->couture;
    }

    /**
     * Set etatfacture
     *
     * @param \Couture\FacturationBundle\Entity\Etatfacture $etatfacture
     * @return Facture
     */
    public function setEtatfacture(\Couture\FacturationBundle\Entity\Etatfacture $etatfacture = null)
    {
        $this->etatfacture = $etatfacture;

        return $this;
    }

    /**
     * Get etatfacture
     *
     * @return \Couture\FacturationBundle\Entity\Etatfacture 
     */
    public function getEtatfacture()
    {
        return $this->etatfacture;
    }
}
