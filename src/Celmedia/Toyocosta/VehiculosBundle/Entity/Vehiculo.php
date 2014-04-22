<?php

namespace Celmedia\Toyocosta\VehiculosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Vehiculo
 */
class Vehiculo
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
     * @var float
     */
    private $precio_neto;

    /**
     * @var string
     */
    private $descripcion;

    /**
     * @var string
     */
    private $imagen_banner;

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
    private $colores;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $galeria;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $modelos;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $slides_vehiculos;

    /**
     * @var \Celmedia\Toyocosta\VehiculosBundle\Entity\CategoriaVehiculo
     */
    private $categoria;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->colores = new \Doctrine\Common\Collections\ArrayCollection();
        $this->galeria = new \Doctrine\Common\Collections\ArrayCollection();
        $this->modelos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->slides_vehiculos = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Vehiculo
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
     * @return Vehiculo
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
     * Set precio_neto
     *
     * @param float $precioNeto
     * @return Vehiculo
     */
    public function setPrecioNeto($precioNeto)
    {
        $this->precio_neto = $precioNeto;

        return $this;
    }

    /**
     * Get precio_neto
     *
     * @return float 
     */
    public function getPrecioNeto()
    {
        return $this->precio_neto;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Vehiculo
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
     * Set imagen_banner
     *
     * @param string $imagenBanner
     * @return Vehiculo
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
     * Set imagen_thumb
     *
     * @param string $imagenThumb
     * @return Vehiculo
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
     * @return Vehiculo
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
     * @return Vehiculo
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
     * @return Vehiculo
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
     * @param \Celmedia\Toyocosta\VehiculosBundle\Entity\VehiculoColores $colores
     * @return Vehiculo
     */
    public function addColore(\Celmedia\Toyocosta\VehiculosBundle\Entity\VehiculoColores $colores)
    {
        $this->colores[] = $colores;

        return $this;
    }

    /**
     * Remove colores
     *
     * @param \Celmedia\Toyocosta\VehiculosBundle\Entity\VehiculoColores $colores
     */
    public function removeColore(\Celmedia\Toyocosta\VehiculosBundle\Entity\VehiculoColores $colores)
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
     * Add galeria
     *
     * @param \Celmedia\Toyocosta\VehiculosBundle\Entity\VehiculoGaleria $galeria
     * @return Vehiculo
     */
    public function addGalerium(\Celmedia\Toyocosta\VehiculosBundle\Entity\VehiculoGaleria $galeria)
    {
        $this->galeria[] = $galeria;

        return $this;
    }

    /**
     * Remove galeria
     *
     * @param \Celmedia\Toyocosta\VehiculosBundle\Entity\VehiculoGaleria $galeria
     */
    public function removeGalerium(\Celmedia\Toyocosta\VehiculosBundle\Entity\VehiculoGaleria $galeria)
    {
        $this->galeria->removeElement($galeria);
    }

    /**
     * Get galeria
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGaleria()
    {
        return $this->galeria;
    }

    /**
     * Add modelos
     *
     * @param \Celmedia\Toyocosta\VehiculosBundle\Entity\VehiculoModelos $modelos
     * @return Vehiculo
     */
    public function addModelo(\Celmedia\Toyocosta\VehiculosBundle\Entity\VehiculoModelos $modelos)
    {
        $this->modelos[] = $modelos;

        return $this;
    }

    /**
     * Remove modelos
     *
     * @param \Celmedia\Toyocosta\VehiculosBundle\Entity\VehiculoModelos $modelos
     */
    public function removeModelo(\Celmedia\Toyocosta\VehiculosBundle\Entity\VehiculoModelos $modelos)
    {
        $this->modelos->removeElement($modelos);
    }

    /**
     * Get modelos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getModelos()
    {
        return $this->modelos;
    }

    /**
     * Add slides_vehiculos
     *
     * @param \Celmedia\Toyocosta\VehiculosBundle\Entity\SlideVehiculos $slidesVehiculos
     * @return Vehiculo
     */
    public function addSlidesVehiculo(\Celmedia\Toyocosta\VehiculosBundle\Entity\SlideVehiculos $slidesVehiculos)
    {
        $this->slides_vehiculos[] = $slidesVehiculos;

        return $this;
    }

    /**
     * Remove slides_vehiculos
     *
     * @param \Celmedia\Toyocosta\VehiculosBundle\Entity\SlideVehiculos $slidesVehiculos
     */
    public function removeSlidesVehiculo(\Celmedia\Toyocosta\VehiculosBundle\Entity\SlideVehiculos $slidesVehiculos)
    {
        $this->slides_vehiculos->removeElement($slidesVehiculos);
    }

    /**
     * Get slides_vehiculos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSlidesVehiculos()
    {
        return $this->slides_vehiculos;
    }

    /**
     * Set categoria
     *
     * @param \Celmedia\Toyocosta\VehiculosBundle\Entity\CategoriaVehiculo $categoria
     * @return Vehiculo
     */
    public function setCategoria(\Celmedia\Toyocosta\VehiculosBundle\Entity\CategoriaVehiculo $categoria = null)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get categoria
     *
     * @return \Celmedia\Toyocosta\VehiculosBundle\Entity\CategoriaVehiculo 
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
             // Add your code here
        $this->uploadFileThumb();
        $this->uploadFileBanner();
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
       __DIR__.'/../../../../../web/'. 'uploads/vehiculo/thumb' ,
        $this->getFileThumb()->getClientOriginalName()
    );

    // set the path property to the filename where you've saved the file
    $this->imagen_thumb = $this->getFileThumb()->getClientOriginalName();

    // clean up the file property as you won't need it anymore
    $this->setFileThumb(null);
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
       __DIR__.'/../../../../../web/'. 'uploads/vehiculo/banner' ,
        $this->getFileBanner()->getClientOriginalName()
    );

    // set the path property to the filename where you've saved the file
    $this->imagen_banner = $this->getFileBanner()->getClientOriginalName();

    // clean up the file property as you won't need it anymore
    $this->setFilebanner(null);
}


}
