<?php

namespace Celmedia\Toyocosta\VehiculosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * SlideVehiculos
 */
class SlideVehiculos
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $imagen_slide;

    /**
     * @var string
     */
    private $imagen_thumb;

    /**
     * @var integer
     */
    private $menu_posicion;

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
     * @var \Celmedia\Toyocosta\VehiculosBundle\Entity\CategoriaVehiculo
     */
    private $categoria_vehiculo;

    /**
     * @var \Celmedia\Toyocosta\VehiculosBundle\Entity\Vehiculo
     */
    private $vehiculo_slide;


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
     * Set imagen_slide
     *
     * @param string $imagenSlide
     * @return SlideVehiculos
     */
    public function setImagenSlide($imagenSlide)
    {
        $this->imagen_slide = $imagenSlide;

        return $this;
    }

    /**
     * Get imagen_slide
     *
     * @return string 
     */
    public function getImagenSlide()
    {
        return $this->imagen_slide;
    }

    /**
     * Set imagen_thumb
     *
     * @param string $imagenThumb
     * @return SlideVehiculos
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
     * Set menu_posicion
     *
     * @param integer $menuPosicion
     * @return SlideVehiculos
     */
    public function setMenuPosicion($menuPosicion)
    {
        $this->menu_posicion = $menuPosicion;

        return $this;
    }

    /**
     * Get menu_posicion
     *
     * @return integer 
     */
    public function getMenuPosicion()
    {
        return $this->menu_posicion;
    }

    /**
     * Set estado
     *
     * @param integer $estado
     * @return SlideVehiculos
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
     * @return SlideVehiculos
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
     * @return SlideVehiculos
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
     * Set categoria_vehiculo
     *
     * @param \Celmedia\Toyocosta\VehiculosBundle\Entity\CategoriaVehiculo $categoriaVehiculo
     * @return SlideVehiculos
     */
    public function setCategoriaVehiculo(\Celmedia\Toyocosta\VehiculosBundle\Entity\CategoriaVehiculo $categoriaVehiculo = null)
    {
        $this->categoria_vehiculo = $categoriaVehiculo;

        return $this;
    }

    /**
     * Get categoria_vehiculo
     *
     * @return \Celmedia\Toyocosta\VehiculosBundle\Entity\CategoriaVehiculo 
     */
    public function getCategoriaVehiculo()
    {
        return $this->categoria_vehiculo;
    }

    /**
     * Set vehiculo_slide
     *
     * @param \Celmedia\Toyocosta\VehiculosBundle\Entity\Vehiculo $vehiculoSlide
     * @return SlideVehiculos
     */
    public function setVehiculoSlide(\Celmedia\Toyocosta\VehiculosBundle\Entity\Vehiculo $vehiculoSlide = null)
    {
        $this->vehiculo_slide = $vehiculoSlide;

        return $this;
    }

    /**
     * Get vehiculo_slide
     *
     * @return \Celmedia\Toyocosta\VehiculosBundle\Entity\Vehiculo 
     */
    public function getVehiculoSlide()
    {
        return $this->vehiculo_slide;
    }
    /**
     * @ORM\PrePersist
     */
    public function lifecycleFileUpload()
    {
        $this->uploadFileSlide();
        $this->uploadFileThumb();
    }



/**
 * Unmapped property to handle file uploads
 */
private $FileSlide;

/**
 * Sets file.
 *
 * @param UploadedFile $file
 */
public function setFileSlide(UploadedFile $FileSlide = null)
{
    $this->FileSlide = $FileSlide;
}

/**
 * Get file.
 *
 * @return UploadedFile
 */
public function getFileSlide()
{
    return $this->FileSlide;
}

/**
 * Manages the copying of the file to the relevant place on the server
 */
public function uploadFileSlide()
{
    // the file property can be empty if the field is not required
    if (null === $this->getFileSlide()) {
        return;
    }

    // move takes the target directory and target filename as params
    $this->getFileSlide()->move(
       __DIR__.'/../../../../../web/'. 'uploads/slide-vehiculos/portada' ,
        $this->getFileSlide()->getClientOriginalName()
    );

    // set the path property to the filename where you've saved the file
    $this->imagen_slide = $this->getFileSlide()->getClientOriginalName();

    // clean up the file property as you won't need it anymore
    $this->setFileSlide(null);
}






/**
 * Unmapped property to handle file uploads
 */
private $FileThumb;

/**
 * Sets file.
 *
 * @param UploadedFile $file
 */
public function setFileThumb(UploadedFile $FileThumb = null)
{
    $this->FileThumb = $FileThumb;
}

/**
 * Get file.
 *
 * @return UploadedFile
 */
public function getFileThumb()
{
    return $this->FileThumb;
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
       __DIR__.'/../../../../../web/'. 'uploads/slide-vehiculos/bullets' ,
        $this->getFileThumb()->getClientOriginalName()
    );

    // set the path property to the filename where you've saved the file
    $this->imagen_thumb = $this->getFileThumb()->getClientOriginalName();

    // clean up the file property as you won't need it anymore
    $this->setFileThumb(null);
}




}
