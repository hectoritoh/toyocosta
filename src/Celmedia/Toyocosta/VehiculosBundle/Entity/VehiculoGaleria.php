<?php

namespace Celmedia\Toyocosta\VehiculosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VehiculoGaleria
 */
class VehiculoGaleria
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $tipo;

    /**
     * @var string
     */
    private $url;

    /**
     * @var integer
     */
    private $orden;

    /**
     * @var integer
     */
    private $estado;


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
     * Set tipo
     *
     * @param string $tipo
     * @return VehiculoGaleria
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    
        return $this;
    }

    /**
     * Get tipo
     *
     * @return string 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return VehiculoGaleria
     */
    public function setUrl($url)
    {
        $this->url = $url;
    
        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set orden
     *
     * @param integer $orden
     * @return VehiculoGaleria
     */
    public function setOrden($orden)
    {
        $this->orden = $orden;
    
        return $this;
    }

    /**
     * Get orden
     *
     * @return integer 
     */
    public function getOrden()
    {
        return $this->orden;
    }

    /**
     * Set estado
     *
     * @param integer $estado
     * @return VehiculoGaleria
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
     * @ORM\PrePersist
     */
    public function lifecycleFileUpload()
    {
        // Add your code here
    }
    /**
     * @var \Celmedia\Toyocosta\VehiculosBundle\Entity\Vehiculo
     */
    private $vehiculogaleria;


    /**
     * Set vehiculogaleria
     *
     * @param \Celmedia\Toyocosta\VehiculosBundle\Entity\Vehiculo $vehiculogaleria
     * @return VehiculoGaleria
     */
    public function setVehiculogaleria(\Celmedia\Toyocosta\VehiculosBundle\Entity\Vehiculo $vehiculogaleria = null)
    {
        $this->vehiculogaleria = $vehiculogaleria;
    
        return $this;
    }

    /**
     * Get vehiculogaleria
     *
     * @return \Celmedia\Toyocosta\VehiculosBundle\Entity\Vehiculo 
     */
    public function getVehiculogaleria()
    {
        return $this->vehiculogaleria;
    }
}