<?php

namespace Celmedia\Toyocosta\VehiculosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VehiculoEspecificacion
 */
class VehiculoEspecificacion
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $seccion;

    /**
     * @var string
     */
    private $contenido;

    /**
     * @var string
     */
    private $formato;

    /**
     * @var string
     */
    private $rawText;

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
     * @var \Celmedia\Toyocosta\VehiculosBundle\Entity\Vehiculo
     */
    private $vehiculo_especificacion;


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
     * Set seccion
     *
     * @param string $seccion
     * @return VehiculoEspecificacion
     */
    public function setSeccion($seccion)
    {
        $this->seccion = $seccion;

        return $this;
    }

    /**
     * Get seccion
     *
     * @return string 
     */
    public function getSeccion()
    {
        return $this->seccion;
    }

    /**
     * Set contenido
     *
     * @param string $contenido
     * @return VehiculoEspecificacion
     */
    public function setContenido($contenido)
    {
        $this->contenido = $contenido;

        return $this;
    }

    /**
     * Get contenido
     *
     * @return string 
     */
    public function getContenido()
    {
        return $this->contenido;
    }

    /**
     * Set formato
     *
     * @param string $formato
     * @return VehiculoEspecificacion
     */
    public function setFormato($formato)
    {
        $this->formato = $formato;

        return $this;
    }

    /**
     * Get formato
     *
     * @return string 
     */
    public function getFormato()
    {
        return $this->formato;
    }

    /**
     * Set rawText
     *
     * @param string $rawText
     * @return VehiculoEspecificacion
     */
    public function setRawText($rawText)
    {
        $this->rawText = $rawText;

        return $this;
    }

    /**
     * Get rawText
     *
     * @return string 
     */
    public function getRawText()
    {
        return $this->rawText;
    }

    /**
     * Set estado
     *
     * @param integer $estado
     * @return VehiculoEspecificacion
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
     * @return VehiculoEspecificacion
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
     * @return VehiculoEspecificacion
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
     * Set vehiculo_especificacion
     *
     * @param \Celmedia\Toyocosta\VehiculosBundle\Entity\Vehiculo $vehiculoEspecificacion
     * @return VehiculoEspecificacion
     */
    public function setVehiculoEspecificacion(\Celmedia\Toyocosta\VehiculosBundle\Entity\Vehiculo $vehiculoEspecificacion = null)
    {
        $this->vehiculo_especificacion = $vehiculoEspecificacion;

        return $this;
    }

    /**
     * Get vehiculo_especificacion
     *
     * @return \Celmedia\Toyocosta\VehiculosBundle\Entity\Vehiculo 
     */
    public function getVehiculoEspecificacion()
    {
        return $this->vehiculo_especificacion;
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
        return $this->getSeccion();
    }

}
