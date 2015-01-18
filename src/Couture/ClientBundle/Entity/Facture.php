<?php

namespace Couture\ClientBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Facture
 *
 * @ORM\Table(name="facture", indexes={@ORM\Index(name="fk_facture_spiderman1_idx", columns={"idspiderman"})})
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
     * @var integer
     *
     * @ORM\Column(name="payee", type="integer", nullable=true)
     */
    private $payee;

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
     * @var \Couture
     *
     * @ORM\ManyToOne(targetEntity="Couture")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idspiderman", referencedColumnName="id")
     * })
     */
    private $idspiderman;



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
     * Set payee
     *
     * @param integer $payee
     * @return Facture
     */
    public function setPayee($payee)
    {
        $this->payee = $payee;

        return $this;
    }

    /**
     * Get payee
     *
     * @return integer 
     */
    public function getPayee()
    {
        return $this->payee;
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
     * Set idspiderman
     *
     * @param \Couture\ClientBundle\Entity\Couture $idspiderman
     * @return Facture
     */
    public function setIdspiderman(\Couture\ClientBundle\Entity\Couture $idspiderman = null)
    {
        $this->idspiderman = $idspiderman;

        return $this;
    }

    /**
     * Get idspiderman
     *
     * @return \Couture\ClientBundle\Entity\Couture 
     */
    public function getIdspiderman()
    {
        return $this->idspiderman;
    }
}
