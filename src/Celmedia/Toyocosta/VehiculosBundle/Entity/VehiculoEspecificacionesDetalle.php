<?php

namespace Celmedia\Toyocosta\VehiculosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VehiculoEspecificacionesDetalle
 */
class VehiculoEspecificacionesDetalle
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
    private $valor;


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
     * @return VehiculoEspecificacionesDetalle
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
     * Set valor
     *
     * @param string $valor
     * @return VehiculoEspecificacionesDetalle
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
    
        return $this;
    }

    /**
     * Get valor
     *
     * @return string 
     */
    public function getValor()
    {
        return $this->valor;
    }
    /**
     * @ORM\PrePersist
     */
    public function lifecycleFileUpload()
    {
        // Add your code here
    }
    /**
     * @var \Celmedia\Toyocosta\VehiculosBundle\Entity\ModeloEspecificaciones
     */
    private $modeloespecificacion;


    /**
     * Set modeloespecificacion
     *
     * @param \Celmedia\Toyocosta\VehiculosBundle\Entity\ModeloEspecificaciones $modeloespecificacion
     * @return VehiculoEspecificacionesDetalle
     */
    public function setModeloespecificacion(\Celmedia\Toyocosta\VehiculosBundle\Entity\ModeloEspecificaciones $modeloespecificacion = null)
    {
        $this->modeloespecificacion = $modeloespecificacion;
    
        return $this;
    }

    /**
     * Get modeloespecificacion
     *
     * @return \Celmedia\Toyocosta\VehiculosBundle\Entity\ModeloEspecificaciones 
     */
    public function getModeloespecificacion()
    {
        return $this->modeloespecificacion;
    }
}
