<?php

namespace Couture\CoutureBundle\Entity;

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


}
