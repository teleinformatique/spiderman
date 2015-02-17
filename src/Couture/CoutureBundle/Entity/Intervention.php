<?php

namespace Couture\CoutureBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Intervention
 *
 * @ORM\Table(name="intervention", indexes={@ORM\Index(name="fk_tailleur_has_couture_couture1_idx", columns={"couture"}), @ORM\Index(name="fk_tailleur_has_couture_tailleur1_idx", columns={"tailleur"}), @ORM\Index(name="fk_intervention_etatintervention1_idx", columns={"etatIntervention"})})
 * @ORM\Entity
 */
class Intervention
{
    /**
     * @var string
     *
     * @ORM\Column(name="intervention", type="string", length=255, nullable=true)
     */
    private $intervention;

    /**
     * @var string
     *
     * @ORM\Column(name="frais", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $frais;

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
     * @var string
     *
     * @ORM\Column(name="details", type="text", length=65535, nullable=true)
     */
    private $details;

    /**
     * @var \Tailleur
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Couture\TailleurBundle\Entity\Tailleur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tailleur", referencedColumnName="id")
     * })
     */
    private $tailleur;

    /**
     * @var \Couture
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Couture")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="couture", referencedColumnName="id")
     * })
     */
    private $couture;

    /**
     * @var \Etatintervention
     *
     * @ORM\ManyToOne(targetEntity="Etatintervention")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="etatIntervention", referencedColumnName="id")
     * })
     */
    private $etatintervention;



    /**
     * Set intervention
     *
     * @param string $intervention
     * @return Intervention
     */
    public function setIntervention($intervention)
    {
        $this->intervention = $intervention;

        return $this;
    }

    /**
     * Get intervention
     *
     * @return string 
     */
    public function getIntervention()
    {
        return $this->intervention;
    }

    /**
     * Set frais
     *
     * @param string $frais
     * @return Intervention
     */
    public function setFrais($frais)
    {
        $this->frais = $frais;

        return $this;
    }

    /**
     * Get frais
     *
     * @return string 
     */
    public function getFrais()
    {
        return $this->frais;
    }

    /**
     * Set datec
     *
     * @param \DateTime $datec
     * @return Intervention
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
     * @return Intervention
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
     * Set iduser
     *
     * @param integer $iduser
     * @return Intervention
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
     * Set details
     *
     * @param string $details
     * @return Intervention
     */
    public function setDetails($details)
    {
        $this->details = $details;

        return $this;
    }

    /**
     * Get details
     *
     * @return string 
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * Set tailleur
     *
     * @param \Couture\CoutureBundle\Entity\Tailleur $tailleur
     * @return Intervention
     */
    public function setTailleur(\Couture\CoutureBundle\Entity\Tailleur $tailleur)
    {
        $this->tailleur = $tailleur;

        return $this;
    }

    /**
     * Get tailleur
     *
     * @return \Couture\CoutureBundle\Entity\Tailleur 
     */
    public function getTailleur()
    {
        return $this->tailleur;
    }

    /**
     * Set couture
     *
     * @param \Couture\CoutureBundle\Entity\Couture $couture
     * @return Intervention
     */
    public function setCouture(\Couture\CoutureBundle\Entity\Couture $couture)
    {
        $this->couture = $couture;

        return $this;
    }

    /**
     * Get couture
     *
     * @return \Couture\CoutureBundle\Entity\Couture 
     */
    public function getCouture()
    {
        return $this->couture;
    }

    /**
     * Set etatintervention
     *
     * @param \Couture\CoutureBundle\Entity\Etatintervention $etatintervention
     * @return Intervention
     */
    public function setEtatintervention(\Couture\CoutureBundle\Entity\Etatintervention $etatintervention = null)
    {
        $this->etatintervention = $etatintervention;

        return $this;
    }

    /**
     * Get etatintervention
     *
     * @return \Couture\CoutureBundle\Entity\Etatintervention 
     */
    public function getEtatintervention()
    {
        return $this->etatintervention;
    }
}
