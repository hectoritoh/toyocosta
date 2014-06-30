<?php

namespace Celmedia\Toyocosta\SeminuevoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * SeminuevoCertificado
 */
class SeminuevoCertificado
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
     * @return SeminuevoCertificado
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
     * @return SeminuevoCertificado
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
     * Set estado
     *
     * @param integer $estado
     * @return SeminuevoCertificado
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
     * @return SeminuevoCertificado
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
     * @return SeminuevoCertificado
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
        $this->uploadFileImagen();
    }
    /**
     * @var \Celmedia\Toyocosta\SeminuevoBundle\Entity\Seminuevo
     */
    private $seminuevo_certificado;


    /**
     * Set seminuevo_certificado
     *
     * @param \Celmedia\Toyocosta\SeminuevoBundle\Entity\Seminuevo $seminuevoCertificado
     * @return SeminuevoCertificado
     */
    public function setSeminuevoCertificado(\Celmedia\Toyocosta\SeminuevoBundle\Entity\Seminuevo $seminuevoCertificado = null)
    {
        $this->seminuevo_certificado = $seminuevoCertificado;

        return $this;
    }

    /**
     * Get seminuevo_certificado
     *
     * @return \Celmedia\Toyocosta\SeminuevoBundle\Entity\Seminuevo 
     */
    public function getSeminuevoCertificado()
    {
        return $this->seminuevo_certificado;
    }










    /**
     * Unmapped property to handle file uploads
     */
    private $fileImagen;

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFileImagen(UploadedFile $fileImagen = null)
    {
        $this->fileImagen = $fileImagen;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFileImagen()
    {
        return $this->fileImagen;
    }

    /**
     * Manages the copying of the file to the relevant place on the server
     */
    public function uploadFileImagen()
    {
        // the file property can be empty if the field is not required
        if (null === $this->getFileImagen()) {
            return;
        }

        // move takes the target directory and target filename as params
        $this->getFileImagen()->move(
           __DIR__.'/../../../../../web/'. 'uploads/seminuevos/certificados' ,
            $this->getFileImagen()->getClientOriginalName()
        );

        // set the path property to the filename where you've saved the file
        $this->imagen = $this->getFileImagen()->getClientOriginalName();

        // clean up the file property as you won't need it anymore
        $this->setFileImagen(null);
    }

    public function __toString()
    {
        return $this->getNombre();
    }


}
