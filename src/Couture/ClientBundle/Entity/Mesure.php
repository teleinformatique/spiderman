<?php

namespace Couture\ClientBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mesure
 *
 * @ORM\Table(name="mesure")
 * @ORM\Entity
 */
class Mesure
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
     * @ORM\Column(name="cou", type="decimal", precision=6, scale=3, nullable=true)
     */
    private $cou;

    /**
     * @var string
     *
     * @ORM\Column(name="poitrine", type="decimal", precision=6, scale=3, nullable=true)
     */
    private $poitrine;

    /**
     * @var string
     *
     * @ORM\Column(name="taille", type="decimal", precision=6, scale=3, nullable=true)
     */
    private $taille;

    /**
     * @var string
     *
     * @ORM\Column(name="ceinture", type="decimal", precision=6, scale=3, nullable=true)
     */
    private $ceinture;

    /**
     * @var string
     *
     * @ORM\Column(name="longChemise", type="decimal", precision=6, scale=3, nullable=true)
     */
    private $longchemise;

    /**
     * @var string
     *
     * @ORM\Column(name="longPantalon", type="decimal", precision=6, scale=3, nullable=true)
     */
    private $longpantalon;

    /**
     * @var string
     *
     * @ORM\Column(name="longRobe", type="decimal", precision=6, scale=3, nullable=true)
     */
    private $longrobe;

    /**
     * @var string
     *
     * @ORM\Column(name="manche", type="decimal", precision=6, scale=3, nullable=true)
     */
    private $manche;

    /**
     * @var string
     *
     * @ORM\Column(name="hanche", type="decimal", precision=6, scale=3, nullable=true)
     */
    private $hanche;

    /**
     * @var string
     *
     * @ORM\Column(name="epaule", type="decimal", precision=6, scale=3, nullable=true)
     */
    private $epaule;



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
     * Set cou
     *
     * @param string $cou
     * @return Mesure
     */
    public function setCou($cou)
    {
        $this->cou = $cou;

        return $this;
    }

    /**
     * Get cou
     *
     * @return string 
     */
    public function getCou()
    {
        return $this->cou;
    }

    /**
     * Set poitrine
     *
     * @param string $poitrine
     * @return Mesure
     */
    public function setPoitrine($poitrine)
    {
        $this->poitrine = $poitrine;

        return $this;
    }

    /**
     * Get poitrine
     *
     * @return string 
     */
    public function getPoitrine()
    {
        return $this->poitrine;
    }

    /**
     * Set taille
     *
     * @param string $taille
     * @return Mesure
     */
    public function setTaille($taille)
    {
        $this->taille = $taille;

        return $this;
    }

    /**
     * Get taille
     *
     * @return string 
     */
    public function getTaille()
    {
        return $this->taille;
    }

    /**
     * Set ceinture
     *
     * @param string $ceinture
     * @return Mesure
     */
    public function setCeinture($ceinture)
    {
        $this->ceinture = $ceinture;

        return $this;
    }

    /**
     * Get ceinture
     *
     * @return string 
     */
    public function getCeinture()
    {
        return $this->ceinture;
    }

    /**
     * Set longchemise
     *
     * @param string $longchemise
     * @return Mesure
     */
    public function setLongchemise($longchemise)
    {
        $this->longchemise = $longchemise;

        return $this;
    }

    /**
     * Get longchemise
     *
     * @return string 
     */
    public function getLongchemise()
    {
        return $this->longchemise;
    }

    /**
     * Set longpantalon
     *
     * @param string $longpantalon
     * @return Mesure
     */
    public function setLongpantalon($longpantalon)
    {
        $this->longpantalon = $longpantalon;

        return $this;
    }

    /**
     * Get longpantalon
     *
     * @return string 
     */
    public function getLongpantalon()
    {
        return $this->longpantalon;
    }

    /**
     * Set longrobe
     *
     * @param string $longrobe
     * @return Mesure
     */
    public function setLongrobe($longrobe)
    {
        $this->longrobe = $longrobe;

        return $this;
    }

    /**
     * Get longrobe
     *
     * @return string 
     */
    public function getLongrobe()
    {
        return $this->longrobe;
    }

    /**
     * Set manche
     *
     * @param string $manche
     * @return Mesure
     */
    public function setManche($manche)
    {
        $this->manche = $manche;

        return $this;
    }

    /**
     * Get manche
     *
     * @return string 
     */
    public function getManche()
    {
        return $this->manche;
    }

    /**
     * Set hanche
     *
     * @param string $hanche
     * @return Mesure
     */
    public function setHanche($hanche)
    {
        $this->hanche = $hanche;

        return $this;
    }

    /**
     * Get hanche
     *
     * @return string 
     */
    public function getHanche()
    {
        return $this->hanche;
    }

    /**
     * Set epaule
     *
     * @param string $epaule
     * @return Mesure
     */
    public function setEpaule($epaule)
    {
        $this->epaule = $epaule;

        return $this;
    }

    /**
     * Get epaule
     *
     * @return string 
     */
    public function getEpaule()
    {
        return $this->epaule;
    }
}
