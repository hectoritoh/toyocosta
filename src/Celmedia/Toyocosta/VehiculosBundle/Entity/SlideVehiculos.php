<?php

namespace Celmedia\Toyocosta\VehiculosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
        // Add your code here
    }
}
