<?php

namespace Celmedia\Toyocosta\SeminuevoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
        // Add your code here
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
}
