<?php

namespace Couture\ClientBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Image
 *
 * @ORM\Table(name="image", indexes={@ORM\Index(name="fk_image_modele1_idx", columns={"idModele"})})
 * @ORM\Entity
 */
class Image
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
     * @ORM\Column(name="path", type="string", length=255, nullable=true)
     */
    private $path;

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
     * @var \Modele
     *
     * @ORM\ManyToOne(targetEntity="Modele")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idModele", referencedColumnName="id")
     * })
     */
    private $idmodele;



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
     * Set libelle
     *
     * @param string $libelle
     * @return Image
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set path
     *
     * @param string $path
     * @return Image
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set datec
     *
     * @param \DateTime $datec
     * @return Image
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
     * @return Image
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
     * @return Image
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
     * Set idmodele
     *
     * @param \Couture\ClientBundle\Entity\Modele $idmodele
     * @return Image
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
}
