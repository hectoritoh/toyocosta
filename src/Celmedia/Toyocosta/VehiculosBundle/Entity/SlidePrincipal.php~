<?php

namespace Celmedia\Toyocosta\VehiculosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SlidePrincipal
 */
class SlidePrincipal
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $link;

    /**
     * @var string
     */
    private $descripcion;

    /**
     * @var string
     */
    private $imagen_banner;

    /**
     * @var \DateTime
     */
    private $fecha_creacion;

    /**
     * @var \DateTime
     */
    private $fecha_modificacion;

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
     * Set link
     *
     * @param string $link
     * @return SlidePrincipal
     */
    public function setLink($link)
    {
        $this->link = $link;
    
        return $this;
    }

    /**
     * Get link
     *
     * @return string 
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return SlidePrincipal
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
     * Set imagen_banner
     *
     * @param string $imagenBanner
     * @return SlidePrincipal
     */
    public function setImagenBanner($imagenBanner)
    {
        $this->imagen_banner = $imagenBanner;
    
        return $this;
    }

    /**
     * Get imagen_banner
     *
     * @return string 
     */
    public function getImagenBanner()
    {
        return $this->imagen_banner;
    }

    /**
     * Set fecha_creacion
     *
     * @param \DateTime $fechaCreacion
     * @return SlidePrincipal
     */
    public function setFechaCreacion($fechaCreacion)
    {
        $this->fecha_creacion = $fechaCreacion;
    
        return $this;
    }

    /**
     * Get fecha_creacion
     *
     * @return \DateTime 
     */
    public function getFechaCreacion()
    {
        return $this->fecha_creacion;
    }

    /**
     * Set fecha_modificacion
     *
     * @param \DateTime $fechaModificacion
     * @return SlidePrincipal
     */
    public function setFechaModificacion($fechaModificacion)
    {
        $this->fecha_modificacion = $fechaModificacion;
    
        return $this;
    }

    /**
     * Get fecha_modificacion
     *
     * @return \DateTime 
     */
    public function getFechaModificacion()
    {
        return $this->fecha_modificacion;
    }

    /**
     * Set estado
     *
     * @param integer $estado
     * @return SlidePrincipal
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
}
