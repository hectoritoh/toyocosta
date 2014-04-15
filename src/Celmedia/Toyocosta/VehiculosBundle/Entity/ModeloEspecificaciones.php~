<?php

namespace Celmedia\Toyocosta\VehiculosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ModeloEspecificaciones
 */
class ModeloEspecificaciones
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
     * @return ModeloEspecificaciones
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
     * @ORM\PrePersist
     */
    public function lifecycleFileUpload()
    {
        // Add your code here
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $detalles;

    /**
     * @var \Celmedia\Toyocosta\VehiculosBundle\Entity\VehiculoModelos
     */
    private $modelo;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->detalles = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add detalles
     *
     * @param \Celmedia\Toyocosta\VehiculosBundle\Entity\VehiculoEspecificacionesDetalle $detalles
     * @return ModeloEspecificaciones
     */
    public function addDetalle(\Celmedia\Toyocosta\VehiculosBundle\Entity\VehiculoEspecificacionesDetalle $detalles)
    {
        $this->detalles[] = $detalles;
    
        return $this;
    }

    /**
     * Remove detalles
     *
     * @param \Celmedia\Toyocosta\VehiculosBundle\Entity\VehiculoEspecificacionesDetalle $detalles
     */
    public function removeDetalle(\Celmedia\Toyocosta\VehiculosBundle\Entity\VehiculoEspecificacionesDetalle $detalles)
    {
        $this->detalles->removeElement($detalles);
    }

    /**
     * Get detalles
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDetalles()
    {
        return $this->detalles;
    }

    /**
     * Set modelo
     *
     * @param \Celmedia\Toyocosta\VehiculosBundle\Entity\VehiculoModelos $modelo
     * @return ModeloEspecificaciones
     */
    public function setModelo(\Celmedia\Toyocosta\VehiculosBundle\Entity\VehiculoModelos $modelo = null)
    {
        $this->modelo = $modelo;
    
        return $this;
    }

    /**
     * Get modelo
     *
     * @return \Celmedia\Toyocosta\VehiculosBundle\Entity\VehiculoModelos 
     */
    public function getModelo()
    {
        return $this->modelo;
    }
}
