<?php

namespace Celmedia\Toyocosta\MotosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
/**
 * MotoCategoria
 */
class MotoCategoria
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $imagen_thumb;

    /**
     * @var integer
     */
    private $estado;

    /**
     * @var \DateTime
     */
    private $created;

    /**
     * @var \DateTime
     */
    private $updated;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $motos;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->motos = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nombre
     *
     * @param string $nombre
     * @return MotoCategoria
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set imagen_thumb
     *
     * @param string $imagenThumb
     * @return MotoCategoria
     */
    public function setImagenThumb($imagenThumb)
    {
        $this->imagen_thumb = $imagenThumb;

        return $this;
    }

    /**
     * Get imagen_thumb
     *
     * @return string 
     */
    public function getImagenThumb()
    {
        return $this->imagen_thumb;
    }

    /**
     * Set estado
     *
     * @param integer $estado
     * @return MotoCategoria
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return integer 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return MotoCategoria
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return MotoCategoria
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime 
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Add motos
     *
     * @param \Celmedia\Toyocosta\MotosBundle\Entity\Moto $motos
     * @return MotoCategoria
     */
    public function addMoto(\Celmedia\Toyocosta\MotosBundle\Entity\Moto $motos)
    {
        $this->motos[] = $motos;

        return $this;
    }

    /**
     * Remove motos
     *
     * @param \Celmedia\Toyocosta\MotosBundle\Entity\Moto $motos
     */
    public function removeMoto(\Celmedia\Toyocosta\MotosBundle\Entity\Moto $motos)
    {
        $this->motos->removeElement($motos);
    }

    /**
     * Get motos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMotos()
    {
        return $this->motos;
    }
    /**
     * @ORM\PrePersist
     */
    public function lifecycleFileUpload()
    {
        // Add your code here
        $this->uploadFileThumb();
        $this->uploadFileLogo();
        $this->uploadFileHover();
    }

    public function __toString()
    {
        return $this->getNombre();
    }







    /**
     * Unmapped property to handle file uploads
     */
    private $fileThumb;

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFileThumb(UploadedFile $fileThumb = null)
    {
        $this->fileThumb = $fileThumb;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFileThumb()
    {
        return $this->fileThumb;
    }

    /**
     * Manages the copying of the file to the relevant place on the server
     */
    public function uploadFileThumb()
    {
        // the file property can be empty if the field is not required
        if (null === $this->getFileThumb()) {
            return;
        }

        // move takes the target directory and target filename as params
        $this->getFileThumb()->move(
           __DIR__.'/../../../../../web/'. 'uploads/motos/thumb' ,
            $this->getFileThumb()->getClientOriginalName()
        );

        // set the path property to the filename where you've saved the file
        $this->imagen_thumb = $this->getFileThumb()->getClientOriginalName();

        // clean up the file property as you won't need it anymore
        $this->setFileThumb(null);
    }



    /**
     * @var string
     */
    private $descripcion;


    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return MotoCategoria
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }
    /**
     * @var string
     */
    private $logo_home;

    /**
     * @var string
     */
    private $logo_hover;


    /**
     * Set logo_home
     *
     * @param string $logoHome
     * @return MotoCategoria
     */
    public function setLogoHome($logoHome)
    {
        $this->logo_home = $logoHome;

        return $this;
    }

    /**
     * Get logo_home
     *
     * @return string 
     */
    public function getLogoHome()
    {
        return $this->logo_home;
    }

    /**
     * Set logo_hover
     *
     * @param string $logoHover
     * @return MotoCategoria
     */
    public function setLogoHover($logoHover)
    {
        $this->logo_hover = $logoHover;

        return $this;
    }

    /**
     * Get logo_hover
     *
     * @return string 
     */
    public function getLogoHover()
    {
        return $this->logo_hover;
    }













    /**
     * Unmapped property to handle file uploads
     */
    private $fileLogo;

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFileLogo(UploadedFile $fileLogo = null)
    {
        $this->fileLogo = $fileLogo;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFileLogo()
    {
        return $this->fileLogo;
    }

    /**
     * Manages the copying of the file to the relevant place on the server
     */
    public function uploadFileLogo()
    {
        // the file property can be empty if the field is not required
        if (null === $this->getFileLogo()) {
            return;
        }

        // move takes the target directory and target filename as params
        $this->getFileLogo()->move(
           __DIR__.'/../../../../../web/'. 'uploads/motos/thumb' ,
            $this->getFileLogo()->getClientOriginalName()
        );

        // set the path property to the filename where you've saved the file
        $this->logo_home = $this->getFileLogo()->getClientOriginalName();

        // clean up the file property as you won't need it anymore
        $this->setFileLogo(null);
    }








    /**
     * Unmapped property to handle file uploads
     */
    private $fileHover;

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFileHover(UploadedFile $fileHover = null)
    {
        $this->fileHover = $fileHover;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFileHover()
    {
        return $this->fileHover;
    }

    /**
     * Manages the copying of the file to the relevant place on the server
     */
    public function uploadFileHover()
    {
        // the file property can be empty if the field is not required
        if (null === $this->getFileHover()) {
            return;
        }

        // move takes the target directory and target filename as params
        $this->getFileHover()->move(
           __DIR__.'/../../../../../web/'. 'uploads/motos/thumb' ,
            $this->getFileHover()->getClientOriginalName()
        );

        // set the path property to the filename where you've saved the file
        $this->logo_hover = $this->getFileHover()->getClientOriginalName();

        // clean up the file property as you won't need it anymore
        $this->setFileHover(null);
    }





}
