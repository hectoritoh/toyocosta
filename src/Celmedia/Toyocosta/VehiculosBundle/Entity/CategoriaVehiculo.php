<?php

namespace Celmedia\Toyocosta\VehiculosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CategoriaVehiculo
 */
class CategoriaVehiculo
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
     * @var integer
     */
    private $estado;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $vehiculos;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $slides;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->vehiculos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->slides = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return CategoriaVehiculo
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
     * Set estado
     *
     * @param integer $estado
     * @return CategoriaVehiculo
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
     * Add vehiculos
     *
     * @param \Celmedia\Toyocosta\VehiculosBundle\Entity\Vehiculo $vehiculos
     * @return CategoriaVehiculo
     */
    public function addVehiculo(\Celmedia\Toyocosta\VehiculosBundle\Entity\Vehiculo $vehiculos)
    {
        $this->vehiculos[] = $vehiculos;

        return $this;
    }

    /**
     * Remove vehiculos
     *
     * @param \Celmedia\Toyocosta\VehiculosBundle\Entity\Vehiculo $vehiculos
     */
    public function removeVehiculo(\Celmedia\Toyocosta\VehiculosBundle\Entity\Vehiculo $vehiculos)
    {
        $this->vehiculos->removeElement($vehiculos);
    }

    /**
     * Get vehiculos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getVehiculos()
    {
        return $this->vehiculos;
    }

    /**
     * Add slides
     *
     * @param \Celmedia\Toyocosta\VehiculosBundle\Entity\SlideVehiculos $slides
     * @return CategoriaVehiculo
     */
    public function addSlide(\Celmedia\Toyocosta\VehiculosBundle\Entity\SlideVehiculos $slides)
    {
        $this->slides[] = $slides;

        return $this;
    }

    /**
     * Remove slides
     *
     * @param \Celmedia\Toyocosta\VehiculosBundle\Entity\SlideVehiculos $slides
     */
    public function removeSlide(\Celmedia\Toyocosta\VehiculosBundle\Entity\SlideVehiculos $slides)
    {
        $this->slides->removeElement($slides);
    }

    /**
     * Get slides
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSlides()
    {
        return $this->slides;
    }
    /**
     * @ORM\PrePersist
     */
    public function lifecycleFileUpload()
    {
        // Add your code here
    }


     public function __toString()
    {
        return $this->getNombre();
    }
}
