<?php

namespace Celmedia\Toyocosta\VehiculosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VehiculoModelos
 */
class VehiculoModelos
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
    private $descripcion;

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
    private $archivo_pdf;

    /**
     * @var string
     */
    private $imagen_modelo;

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
     * Set nombre
     *
     * @param string $nombre
     * @return VehiculoModelos
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
     * Set descripcion
     *
     * @param string $descripcion
     * @return VehiculoModelos
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
     * Set precio
     *
     * @param float $precio
     * @return VehiculoModelos
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
     * @return VehiculoModelos
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
     * Set archivo_pdf
     *
     * @param string $archivoPdf
     * @return VehiculoModelos
     */
    public function setArchivoPdf($archivoPdf)
    {
        $this->archivo_pdf = $archivoPdf;
    
        return $this;
    }

    /**
     * Get archivo_pdf
     *
     * @return string 
     */
    public function getArchivoPdf()
    {
        return $this->archivo_pdf;
    }

    /**
     * Set imagen_modelo
     *
     * @param string $imagenModelo
     * @return VehiculoModelos
     */
    public function setImagenModelo($imagenModelo)
    {
        $this->imagen_modelo = $imagenModelo;
    
        return $this;
    }

    /**
     * Get imagen_modelo
     *
     * @return string 
     */
    public function getImagenModelo()
    {
        return $this->imagen_modelo;
    }

    /**
     * Set estado
     *
     * @param integer $estado
     * @return VehiculoModelos
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $especificaciones;

    /**
     * @var \Celmedia\Toyocosta\VehiculosBundle\Entity\Vehiculo
     */
    private $vehiculomodel;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->especificaciones = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add especificaciones
     *
     * @param \Celmedia\Toyocosta\VehiculosBundle\Entity\ModeloEspecificaciones $especificaciones
     * @return VehiculoModelos
     */
    public function addEspecificacione(\Celmedia\Toyocosta\VehiculosBundle\Entity\ModeloEspecificaciones $especificaciones)
    {
        $this->especificaciones[] = $especificaciones;
    
        return $this;
    }

    /**
     * Remove especificaciones
     *
     * @param \Celmedia\Toyocosta\VehiculosBundle\Entity\ModeloEspecificaciones $especificaciones
     */
    public function removeEspecificacione(\Celmedia\Toyocosta\VehiculosBundle\Entity\ModeloEspecificaciones $especificaciones)
    {
        $this->especificaciones->removeElement($especificaciones);
    }

    /**
     * Get especificaciones
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEspecificaciones()
    {
        return $this->especificaciones;
    }

    /**
     * Set vehiculomodel
     *
     * @param \Celmedia\Toyocosta\VehiculosBundle\Entity\Vehiculo $vehiculomodel
     * @return VehiculoModelos
     */
    public function setVehiculomodel(\Celmedia\Toyocosta\VehiculosBundle\Entity\Vehiculo $vehiculomodel = null)
    {
        $this->vehiculomodel = $vehiculomodel;
    
        return $this;
    }

    /**
     * Get vehiculomodel
     *
     * @return \Celmedia\Toyocosta\VehiculosBundle\Entity\Vehiculo 
     */
    public function getVehiculomodel()
    {
        return $this->vehiculomodel;
    }
}
