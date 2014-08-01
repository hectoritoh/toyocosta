<?php

namespace Celmedia\Toyocosta\VehiculosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
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
    private $imagen_color;

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
    private $vehiculo;

    /**
     * @var \Celmedia\Toyocosta\ContenidoBundle\Entity\Color
     */
    private $coloresvehiculo;


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
     * Set created
     *
     * @param \DateTime $created
     * @return VehiculoColores
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
     * @return VehiculoColores
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
     * Set coloresvehiculo
     *
     * @param \Celmedia\Toyocosta\ContenidoBundle\Entity\Color $coloresvehiculo
     * @return VehiculoColores
     */
    public function setColoresvehiculo(\Celmedia\Toyocosta\ContenidoBundle\Entity\Color $coloresvehiculo = null)
    {
        $this->coloresvehiculo = $coloresvehiculo;

        return $this;
    }

    /**
     * Get coloresvehiculo
     *
     * @return \Celmedia\Toyocosta\ContenidoBundle\Entity\Color 
     */
    public function getColoresvehiculo()
    {
        return $this->coloresvehiculo;
    }
    /**
     * @ORM\PrePersist
     */
    public function lifecycleFileUpload()
    {
        // Add your code here
        $this->uploadImagenVehiculo();
    }

    public function __toString()
    {
        return $this->getImagenColor();
    }

    /**
     * Unmapped property to handle file uploads
     */
    private $ImagenVehiculo;

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setImagenVehiculo(UploadedFile $ImagenVehiculo = null)
    {
        $this->ImagenVehiculo = $ImagenVehiculo;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getImagenVehiculo()
    {
        return $this->ImagenVehiculo;
    }

    /**
     * Manages the copying of the file to the relevant place on the server
     */
    public function uploadImagenVehiculo()
    {
        // the file property can be empty if the field is not required
        if (null === $this->getImagenVehiculo()) {
            return;
        }

        // move takes the target directory and target filename as params
        $this->getImagenVehiculo()->move(
           __DIR__.'/../../../../../web/'. 'uploads/vehiculo/color' ,
            $this->getImagenVehiculo()->getClientOriginalName()
        );

        // set the path property to the filename where you've saved the file
        $this->imagen_color = $this->getImagenVehiculo()->getClientOriginalName();

        // clean up the file property as you won't need it anymore
        $this->setImagenVehiculo(null);
    }



}
