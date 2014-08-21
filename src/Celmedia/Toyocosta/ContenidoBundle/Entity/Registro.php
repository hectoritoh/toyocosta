<?php

namespace Celmedia\Toyocosta\ContenidoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Registro
 */
class Registro
{
    /**
     * @var integer
     */
    private $id;

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
     * @var \Celmedia\Toyocosta\ContenidoBundle\Entity\Obsequio
     */
    private $obsequio;

    /**
     * @var \Celmedia\Toyocosta\ContenidoBundle\Entity\InfoMantenimiento
     */
    private $cita;


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
     * Set estado
     *
     * @param integer $estado
     * @return Registro
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
     * @return Registro
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
     * @return Registro
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
     * Set obsequio
     *
     * @param \Celmedia\Toyocosta\ContenidoBundle\Entity\Obsequio $obsequio
     * @return Registro
     */
    public function setObsequio(\Celmedia\Toyocosta\ContenidoBundle\Entity\Obsequio $obsequio = null)
    {
        $this->obsequio = $obsequio;

        return $this;
    }

    /**
     * Get obsequio
     *
     * @return \Celmedia\Toyocosta\ContenidoBundle\Entity\Obsequio 
     */
    public function getObsequio()
    {
        return $this->obsequio;
    }

    /**
     * Set cita
     *
     * @param \Celmedia\Toyocosta\ContenidoBundle\Entity\InfoMantenimiento $cita
     * @return Registro
     */
    public function setCita(\Celmedia\Toyocosta\ContenidoBundle\Entity\InfoMantenimiento $cita = null)
    {
        $this->cita = $cita;

        return $this;
    }

    /**
     * Get cita
     *
     * @return \Celmedia\Toyocosta\ContenidoBundle\Entity\InfoMantenimiento 
     */
    public function getCita()
    {
        return $this->cita;
    }
    /**
     * @ORM\PrePersist
     */
    public function lifecycleFileUpload()
    {
        // Add your code here
    }
}
