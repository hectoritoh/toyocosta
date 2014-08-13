<?php

namespace Celmedia\Toyocosta\VehiculosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
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
     * @var \DateTime
     */
    private $created;

    /**
     * @var \DateTime
     */
    private $updated;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $cotizaciones;

    /**
     * @var \Celmedia\Toyocosta\VehiculosBundle\Entity\Vehiculo
     */
    private $vehiculomodel;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cotizaciones = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set created
     *
     * @param \DateTime $created
     * @return VehiculoModelos
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
     * @return VehiculoModelos
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
     * Add cotizaciones
     *
     * @param \Celmedia\Toyocosta\VehiculosBundle\Entity\VehiculoCotizacion $cotizaciones
     * @return VehiculoModelos
     */
    public function addCotizacione(\Celmedia\Toyocosta\VehiculosBundle\Entity\VehiculoCotizacion $cotizaciones)
    {
        $this->cotizaciones[] = $cotizaciones;

        return $this;
    }

    /**
     * Remove cotizaciones
     *
     * @param \Celmedia\Toyocosta\VehiculosBundle\Entity\VehiculoCotizacion $cotizaciones
     */
    public function removeCotizacione(\Celmedia\Toyocosta\VehiculosBundle\Entity\VehiculoCotizacion $cotizaciones)
    {
        $this->cotizaciones->removeElement($cotizaciones);
    }

    /**
     * Get cotizaciones
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCotizaciones()
    {
        return $this->cotizaciones;
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
    /**
     * @ORM\PrePersist
     */
        public function lifecycleFileUpload()
    {
        // Add your code here
        $this->uploadFileModelo();
        $this->uploadFilePdf();
    }

    public function __toString()
    {
        return $this->getNombre();
    }


    /**
     * Unmapped property to handle file uploads
     */
    private $fileModelo;

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFileModelo(UploadedFile $fileModelo = null)
    {
        $this->fileModelo = $fileModelo;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFileModelo()
    {
        return $this->fileModelo;
    }

    /**
     * Manages the copying of the file to the relevant place on the server
     */
    public function uploadFileModelo()
    {
        // the file property can be empty if the field is not required
        if (null === $this->getFileModelo()) {
            return;
        }

        // move takes the target directory and target filename as params
        $this->getFileModelo()->move(
           __DIR__.'/../../../../../web/'. 'uploads/vehiculo/modelo' ,
            $this->getFileModelo()->getClientOriginalName()
        );

        // set the path property to the filename where you've saved the file
        $this->imagen_modelo = $this->getFileModelo()->getClientOriginalName();

        // clean up the file property as you won't need it anymore
        $this->setFileModelo(null);
    }





    /**
     * Unmapped property to handle file uploads
     */
    private $filePdf;

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFilePdf(UploadedFile $filePdf = null)
    {
        $this->filePdf = $filePdf;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFilePdf()
    {
        return $this->filePdf;
    }

    /**
     * Manages the copying of the file to the relevant place on the server
     */
    public function uploadFilePdf()
    {
        // the file property can be empty if the field is not required
        if (null === $this->getFilePdf()) {
            return;
        }

        // move takes the target directory and target filename as params
        $this->getFilePdf()->move(
           __DIR__.'/../../../../../web/'. 'uploads/vehiculo/modelo/pdf' ,
            $this->getFilePdf()->getClientOriginalName()
        );

        // set the path property to the filename where you've saved the file
        $this->archivo_pdf = $this->getFilePdf()->getClientOriginalName();

        // clean up the file property as you won't need it anymore
        $this->setFilePdf(null);
    }


}
