<?php

namespace Celmedia\Toyocosta\MotosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
/**
 * Moto
 */
class Moto
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
     * @var float
     */
    private $precio;

    /**
     * @var string
     */
    private $informacion;

    /**
     * @var string
     */
    private $imagen_banner;

    /**
     * @var string
     */
    private $ficha;

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
    private $colores;

    /**
     * @var \Celmedia\Toyocosta\MotosBundle\Entity\MotoCategoria
     */
    private $categoria;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->colores = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Moto
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
     * Set precio
     *
     * @param float $precio
     * @return Moto
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return float 
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set informacion
     *
     * @param string $informacion
     * @return Moto
     */
    public function setInformacion($informacion)
    {
        $this->informacion = $informacion;

        return $this;
    }

    /**
     * Get informacion
     *
     * @return string 
     */
    public function getInformacion()
    {
        return $this->informacion;
    }

    /**
     * Set imagen_banner
     *
     * @param string $imagenBanner
     * @return Moto
     */
    public function setImagenBanner($imagenBanner)
    {
        $this->imagen_banner = $imagenBanner;

        return $this;
    }

    /**
     * Get imagen_banner
     *
     * @return string 
     */
    public function getImagenBanner()
    {
        return $this->imagen_banner;
    }

    /**
     * Set ficha
     *
     * @param string $ficha
     * @return Moto
     */
    public function setFicha($ficha)
    {
        $this->ficha = $ficha;

        return $this;
    }

    /**
     * Get ficha
     *
     * @return string 
     */
    public function getFicha()
    {
        return $this->ficha;
    }

    /**
     * Set estado
     *
     * @param integer $estado
     * @return Moto
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
     * @return Moto
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
     * @return Moto
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
     * Add colores
     *
     * @param \Celmedia\Toyocosta\MotosBundle\Entity\MotoColor $colores
     * @return Moto
     */
    public function addColore(\Celmedia\Toyocosta\MotosBundle\Entity\MotoColor $colores)
    {
        $this->colores[] = $colores;

        return $this;
    }

    /**
     * Remove colores
     *
     * @param \Celmedia\Toyocosta\MotosBundle\Entity\MotoColor $colores
     */
    public function removeColore(\Celmedia\Toyocosta\MotosBundle\Entity\MotoColor $colores)
    {
        $this->colores->removeElement($colores);
    }

    /**
     * Get colores
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getColores()
    {
        return $this->colores;
    }

    /**
     * Set categoria
     *
     * @param \Celmedia\Toyocosta\MotosBundle\Entity\MotoCategoria $categoria
     * @return Moto
     */
    public function setCategoria(\Celmedia\Toyocosta\MotosBundle\Entity\MotoCategoria $categoria = null)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get categoria
     *
     * @return \Celmedia\Toyocosta\MotosBundle\Entity\MotoCategoria 
     */
    public function getCategoria()
    {
        return $this->categoria;
    }
    /**
     * @ORM\PrePersist
     */
        public function lifecycleFileUpload()
    {
        

        $this->uploadFileBanner();
        $this->uploadFileFicha();
    }


    public function __toString()
    {
        return $this->getNombre();
    }












    /**
     * Unmapped property to handle file uploads
     */
    private $fileBanner;

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFileBanner(UploadedFile $fileBanner = null)
    {
        $this->fileBanner = $fileBanner;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFileBanner()
    {
        return $this->fileBanner;
    }

    /**
     * Manages the copying of the file to the relevant place on the server
     */
    public function uploadFileBanner()
    {
        // the file property can be empty if the field is not required
        if (null === $this->getFileBanner()) {
            return;
        }

        // move takes the target directory and target filename as params
        $this->getFileBanner()->move(
           __DIR__.'/../../../../../web/'. 'uploads/motos/banner' ,
            $this->getFileBanner()->getClientOriginalName()
        );

        // set the path property to the filename where you've saved the file
        $this->imagen_banner = $this->getFileBanner()->getClientOriginalName();

        // clean up the file property as you won't need it anymore
        $this->setFilebanner(null);
    }



    /**
     * Unmapped property to handle file uploads
     */
    private $fileFicha;

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFileFicha(UploadedFile $fileFicha = null)
    {
        $this->fileFicha = $fileFicha;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFileFicha()
    {
        return $this->fileFicha;
    }

    /**
     * Manages the copying of the file to the relevant place on the server
     */
    public function uploadFileFicha()
    {
        // the file property can be empty if the field is not required
        if (null === $this->getFileFicha()) {
            return;
        }

        // move takes the target directory and target filename as params
        $this->getFileFicha()->move(
           __DIR__.'/../../../../../web/'. 'uploads/motos/ficha' ,
            $this->getFileFicha()->getClientOriginalName()
        );

        // set the path property to the filename where you've saved the file
        $this->ficha = $this->getFileFicha()->getClientOriginalName();

        // clean up the file property as you won't need it anymore
        $this->setFileFicha(null);
    }


}
