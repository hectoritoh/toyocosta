<?php

namespace Celmedia\Toyocosta\VehiculosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Plazo
 */
class Plazo
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
    private $valor;

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
     * @return Plazo
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
     * @param integer $valor
     * @return Plazo
     */
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Get valor
     *
     * @return integer 
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Set estado
     *
     * @param integer $estado
     * @return Plazo
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
     * @return Plazo
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
     * @return Plazo
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
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $formcotizaciones;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->formcotizaciones = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add formcotizaciones
     *
     * @param \Celmedia\Toyocosta\VehiculosBundle\Entity\VehiculoCotizacion $formcotizaciones
     * @return Plazo
     */
    public function addFormcotizacione(\Celmedia\Toyocosta\VehiculosBundle\Entity\VehiculoCotizacion $formcotizaciones)
    {
        $this->formcotizaciones[] = $formcotizaciones;

        return $this;
    }

    /**
     * Remove formcotizaciones
     *
     * @param \Celmedia\Toyocosta\VehiculosBundle\Entity\VehiculoCotizacion $formcotizaciones
     */
    public function removeFormcotizacione(\Celmedia\Toyocosta\VehiculosBundle\Entity\VehiculoCotizacion $formcotizaciones)
    {
        $this->formcotizaciones->removeElement($formcotizaciones);
    }

    /**
     * Get formcotizaciones
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFormcotizaciones()
    {
        return $this->formcotizaciones;
    }
}
