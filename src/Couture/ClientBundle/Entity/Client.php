<?php

namespace Couture\ClientBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Util\Debug as Debug;

/**
 * Client
 *
 * @ORM\Table(name="client")
 * 
 * @ORM\Entity
 */
class Client
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
     * @ORM\Column(name="nom", type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=255, nullable=true)
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=true)
     */
    private $adresse;

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
    
    private $infosClient;
    
    
    public function __construct() {
        $this->datec = new \DateTime();
    }
    
    public function getInfosClient()
    {
        $this->infosClient = $this->prenom.' '.$this->nom.' '.$this->telephone;
        
        return $this->infosClient;
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
     * Set nom
     *
     * @param string $nom
     * @return Client
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return Client
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     * @return Client
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string 
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Client
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     * @return Client
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string 
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set datec
     *
     * @param \DateTime $datec
     * @return Client
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
     * @return Client
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
    
    public function getLastFactures($id, $nombreFactures, $em)
    {
        
        $req="SELECT f.date, ct.prix  "
                . "FROM CoutureFacturationBundle:Facture f, CoutureCoutureBundle:Couture ct, CoutureClientBundle:Client c "
                . "WHERE f.couture = ct.id "
                . "AND ct.client = c.id "
                . "AND c.id=?1 "
                . "ORDER BY f.date DESC " ;
                //. " LIMIT 0, ?2 ";
                

        $query = $em->createQuery($req);
        $query->setParameter(1, $id);
        $query->setMaxResults($nombreFactures);
        //$query->setParameter(2, $nombreFactures);
        $factures = $query->getResult();
        return $factures;
        
//        print '<pret>';
//        Debug::dump($factures);
//        print '</pret>';
////        var_dump($factures);
//        die;
                    
    }
    
    public function getLastCoutures($id, $nombreCoutures, $em)
    {
        
        $req="SELECT ct.datec, ct.tissu, m.libelle  "
                . "FROM CoutureCoutureBundle:Couture ct, CoutureClientBundle:Client c, CoutureCoutureBundle:Modele m  "
                . "WHERE ct.modele = m.id "
                . "AND ct.client = c.id "
                . "AND c.id=?1 "
//                . "LIMIT 0 , ?2 "
                . "ORDER BY ct.datec DESC " 
                ;
                

        $query = $em->createQuery($req);
        $query->setParameter(1, $id);
        $query->setMaxResults($nombreCoutures);
        //$query->setParameter(2, $nombreCoutures);
        $coutures = $query->getResult();
        return $coutures;
        
//        print '<pret>';
//        Debug::dump($coutures);
//        print '</pret>';
////        var_dump($factures);
//        die;
                    
    }
}
