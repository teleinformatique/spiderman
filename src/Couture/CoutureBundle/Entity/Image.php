<?php

namespace Couture\CoutureBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Image
 *
 * @ORM\Table(name="image")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
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
     * @Assert\File(
     *     maxSize = "10240k",
     *     mimeTypes = {"image/png", "image/jpeg", "image/gif"},
     *     mimeTypesMessage = "Choisissez un fichier image ( png , gif, ou jpeg) valide."
     * )
     */
    private $file;
    
    private $tempFilename;
    
    
    public function __construct() {
        $this->datec = new \DateTime();
    }
    
    
    //getters et setters pour $file
    public function getFile()
    {
        return $this->file;
    }
    
   
   
    
    // On modifie le setter de File, pour prendre en compte l'upload 
    // d'un fichier lorsqu'il en existe déjà un autre
    public function setFile(UploadedFile $file)
    {
        $this->file = $file;
        // On vérifie si on avait déjà un fichier pour cette entité
        if (null !== $this->path) {
        // On sauvegarde l'extension du fichier pour le supprimer plus tard
        $this->tempFilename = $this->path;
        // On réinitialise les valeurs des attributs path et libelle
        $this->path = null;
        $this->libelle = null;
        }
    }
    
    /**
    * @ORM\PrePersist()
    * @ORM\PreUpdate()
    */
    public function preUpload()
    {
        // Si jamais il n'y a pas de fichier (champ facultatif)
        if (null === $this->file) {
        return;
        }
        // Le nom du fichier est son id, on doit juste stocker également son extension
        // Pour faire propre, on devrait renommer cet attribut en « extension », plutôt que « path »
        $this->path = $this->file->guessExtension();
        // Et on génère l'attribut libelle de la balise <img>, à la valeur du nom du fichier sur le PC de l'internaute
        
    }
    
    /**
    * @ORM\PostPersist()
    * @ORM\PostUpdate()
    */
    public function upload()
    {
        // Si jamais il n'y a pas de fichier (champ facultatif)
        if (null === $this->file) {
        return;
        }
        // Si on avait un ancien fichier, on le supprime
        if (null !== $this->tempFilename) {
        $oldFile = $this->getUploadRootDir().'/'.$this->id.'.'.$this->tempFilename;
        if (file_exists($oldFile)) {
        unlink($oldFile);
        }
        }
        // On déplace le fichier envoyé dans le répertoire de notre choix
        $this->file->move(
        $this->getUploadRootDir(), // Le répertoire de destination
        $this->id.'.'.$this->path   // Le nom du fichier à créer, ici « id.extension »
        );
    }
    /**
    * @ORM\PreRemove()
    */
    public function preRemoveUpload()
    {
        // On sauvegarde temporairement le nom du fichier, car il dépend de l'id
        $this->tempFilename = $this->getUploadRootDir().'/'.$this->id.'.'.$this->path;
    }
    
    /**
    * @ORM\PostRemove()
    */
    public function removeUpload()
    {
        // En PostRemove, on n'a pas accès à l'id, on utilise notre nom sauvegardé
        if (file_exists($this->tempFilename)) {
            // On supprime le fichier
            unlink($this->tempFilename);
        }
    }
    
    public function getUploadDir()
    {
        // On retourne le chemin relatif vers l'image pour un navigateur
        return 'uploads/img';
    }
    protected function getUploadRootDir()
    {
        // On retourne le chemin relatif vers l'image pour notre code PHP
        return '../web/'.$this->getUploadDir();
    }
    
    public function getWebPath()
    {
        return $this->getUploadDir().'/'.$this->getId().'.'.$this->getPath();
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
    
    
}
