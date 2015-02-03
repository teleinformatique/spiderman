<?php

namespace Couture\CoutureBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Modele
 *
 * @ORM\Table(name="modele", indexes={@ORM\Index(name="fk_modele_image1_idx", columns={"image"})})
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

    /**
     * @var \Image
     *
     * @ORM\ManyToOne(targetEntity="Image", cascade={"persist", "remove"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="image", referencedColumnName="id")
     * })
     */
    private $image;

    
    
    public function __construct() {
        $this->datec = new \DateTime();
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
     * Set libelle
     *
     * @param string $libelle
     * @return Modele
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
     * Set description
     *
     * @param string $description
     * @return Modele
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set datec
     *
     * @param \DateTime $datec
     * @return Modele
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
     * @return Modele
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
     * Set datemod
     *
     * @param \DateTime $datemod
     * @return Modele
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
     * Set image
     *
     * @param \Couture\CoutureBundle\Entity\Image $image
     * @return Modele
     */
    public function setImage(\Couture\CoutureBundle\Entity\Image $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \Couture\CoutureBundle\Entity\Image 
     */
    public function getImage()
    {
        return $this->image;
    }
    
    
    
    public function getLastCoutures($id, $nombreCoutures, $em)
    {
        
        $req="SELECT ct.datec, ct.prix, ct.tissu "
                . "FROM CoutureCoutureBundle:Couture ct, CoutureCoutureBundle:Modele m  "
                . "WHERE ct.modele = m.id "
                . "AND m.id=?1 "
//                . "LIMIT 0 , ?2 "
                . "ORDER BY ct.datec DESC " 
                ;
                

        $query = $em->createQuery($req);
        $query->setParameter(1, $id);
        //$query->setParameter(2, $nombreCoutures);
        $coutures = $query->getResult();
        return $coutures;                    
    }
}
