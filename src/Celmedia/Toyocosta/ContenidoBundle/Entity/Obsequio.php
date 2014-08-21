<?php

namespace Celmedia\Toyocosta\ContenidoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
/**
 * Obsequio
 */
class Obsequio
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
    private $imagen;

    /**
     * @var integer
     */
    private $stock;

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
    private $registros;

    /**
     * @var \Celmedia\Toyocosta\ContenidoBundle\Entity\Establecimiento
     */
    private $establecimiento;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->registros = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Obsequio
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
     * Set imagen
     *
     * @param string $imagen
     * @return Obsequio
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }

    /**
     * Get imagen
     *
     * @return string 
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Set stock
     *
     * @param integer $stock
     * @return Obsequio
     */
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get stock
     *
     * @return integer 
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set estado
     *
     * @param integer $estado
     * @return Obsequio
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
     * @return Obsequio
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
     * @return Obsequio
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
     * Add registros
     *
     * @param \Celmedia\Toyocosta\ContenidoBundle\Entity\Registro $registros
     * @return Obsequio
     */
    public function addRegistro(\Celmedia\Toyocosta\ContenidoBundle\Entity\Registro $registros)
    {
        $this->registros[] = $registros;

        return $this;
    }

    /**
     * Remove registros
     *
     * @param \Celmedia\Toyocosta\ContenidoBundle\Entity\Registro $registros
     */
    public function removeRegistro(\Celmedia\Toyocosta\ContenidoBundle\Entity\Registro $registros)
    {
        $this->registros->removeElement($registros);
    }

    /**
     * Get registros
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRegistros()
    {
        return $this->registros;
    }

    /**
     * Set establecimiento
     *
     * @param \Celmedia\Toyocosta\ContenidoBundle\Entity\Establecimiento $establecimiento
     * @return Obsequio
     */
    public function setEstablecimiento(\Celmedia\Toyocosta\ContenidoBundle\Entity\Establecimiento $establecimiento = null)
    {
        $this->establecimiento = $establecimiento;

        return $this;
    }

    /**
     * Get establecimiento
     *
     * @return \Celmedia\Toyocosta\ContenidoBundle\Entity\Establecimiento 
     */
    public function getEstablecimiento()
    {
        return $this->establecimiento;
    }
    /**
     * @ORM\PrePersist
     */
    public function lifecycleFileUpload()
    {
        // Add your code here
        $this->uploadObsequioImagen();
    }




    /**
     * Unmapped property to handle file uploads
     */
    private $obsequioImagen;

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setObsequioImagen(UploadedFile $obsequioImagen = null)
    {
        $this->obsequioImagen = $obsequioImagen;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getObsequioImagen()
    {
        return $this->obsequioImagen;
    }

    /**
     * Manages the copying of the file to the relevant place on the server
     */
    public function uploadObsequioImagen()
    {
        // the file property can be empty if the field is not required
        if (null === $this->getObsequioImagen()) {
            return;
        }

        // move takes the target directory and target filename as params
        $this->getObsequioImagen()->move(
           __DIR__.'/../../../../../web/'. 'uploads/obsequios' ,
            $this->getObsequioImagen()->getClientOriginalName()
        );

        // set the path property to the filename where you've saved the file
        $this->imagen = $this->getObsequioImagen()->getClientOriginalName();

        // clean up the file property as you won't need it anymore
        $this->setObsequioImagen(null);
    }

    public function __toString()
    {
        return $this->getNombre();
    }



}
