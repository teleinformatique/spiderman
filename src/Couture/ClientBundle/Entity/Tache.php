<?php

namespace Couture\ClientBundle\Entity;

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
     * Set intervention
     *
     * @param string $intervention
     * @return Tache
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
     * @return Tache
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
     * Set etat
     *
     * @param integer $etat
     * @return Tache
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
     * Set datec
     *
     * @param \DateTime $datec
     * @return Tache
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
     * @return Tache
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
     * @return Tache
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
     * @return Tache
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

    /**
     * Set idtailleur
     *
     * @param \Couture\ClientBundle\Entity\Tailleur $idtailleur
     * @return Tache
     */
    public function setIdtailleur(\Couture\ClientBundle\Entity\Tailleur $idtailleur = null)
    {
        $this->idtailleur = $idtailleur;

        return $this;
    }

    /**
     * Get idtailleur
     *
     * @return \Couture\ClientBundle\Entity\Tailleur 
     */
    public function getIdtailleur()
    {
        return $this->idtailleur;
    }
}
