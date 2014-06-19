<?php

namespace Celmedia\Toyocosta\SeminuevoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SeminuevoGaleria
 */
class SeminuevoGaleria
{
    /**
     * @var integer
     */
    private $id;

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
     * Set imagen
     *
     * @param string $imagen
     * @return SeminuevoGaleria
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
     * @return SeminuevoGaleria
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
     * @return SeminuevoGaleria
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
     * @return SeminuevoGaleria
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
    private $seminuevo_galeria;


    /**
     * Set seminuevo_galeria
     *
     * @param \Celmedia\Toyocosta\SeminuevoBundle\Entity\Seminuevo $seminuevoGaleria
     * @return SeminuevoGaleria
     */
    public function setSeminuevoGaleria(\Celmedia\Toyocosta\SeminuevoBundle\Entity\Seminuevo $seminuevoGaleria = null)
    {
        $this->seminuevo_galeria = $seminuevoGaleria;

        return $this;
    }

    /**
     * Get seminuevo_galeria
     *
     * @return \Celmedia\Toyocosta\SeminuevoBundle\Entity\Seminuevo 
     */
    public function getSeminuevoGaleria()
    {
        return $this->seminuevo_galeria;
    }
}
