<?php

namespace Celmedia\Toyocosta\VehiculosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VehiculoColores
 */
class VehiculoColores
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
    private $valor_color;

    /**
     * @var string
     */
    private $imagen_color;

    /**
     * @var integer
     */
    private $estado;

    /**
     * @var \Celmedia\Toyocosta\VehiculosBundle\Entity\Vehiculo
     */
    private $vehiculo;


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
     * @return VehiculoColores
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
     * Set valor_color
     *
     * @param string $valorColor
     * @return VehiculoColores
     */
    public function setValorColor($valorColor)
    {
        $this->valor_color = $valorColor;
    
        return $this;
    }

    /**
     * Get valor_color
     *
     * @return string 
     */
    public function getValorColor()
    {
        return $this->valor_color;
    }

    /**
     * Set imagen_color
     *
     * @param string $imagenColor
     * @return VehiculoColores
     */
    public function setImagenColor($imagenColor)
    {
        $this->imagen_color = $imagenColor;
    
        return $this;
    }

    /**
     * Get imagen_color
     *
     * @return string 
     */
    public function getImagenColor()
    {
        return $this->imagen_color;
    }

    /**
     * Set estado
     *
     * @param integer $estado
     * @return VehiculoColores
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
     * Set vehiculo
     *
     * @param \Celmedia\Toyocosta\VehiculosBundle\Entity\Vehiculo $vehiculo
     * @return VehiculoColores
     */
    public function setVehiculo(\Celmedia\Toyocosta\VehiculosBundle\Entity\Vehiculo $vehiculo = null)
    {
        $this->vehiculo = $vehiculo;
    
        return $this;
    }

    /**
     * Get vehiculo
     *
     * @return \Celmedia\Toyocosta\VehiculosBundle\Entity\Vehiculo 
     */
    public function getVehiculo()
    {
        return $this->vehiculo;
    }
    /**
     * @ORM\PrePersist
     */
    public function lifecycleFileUpload()
    {
        // Add your code here
    }
}
