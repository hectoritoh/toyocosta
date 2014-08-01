<?php

namespace Celmedia\Toyocosta\ContenidoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TipoReserva
 */
class TipoReserva
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
    private $talleres;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->talleres = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return TipoReserva
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
     * Set estado
     *
     * @param integer $estado
     * @return TipoReserva
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
     * @return TipoReserva
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
     * @return TipoReserva
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
     * Add talleres
     *
     * @param \Celmedia\Toyocosta\ContenidoBundle\Entity\Establecimiento $talleres
     * @return TipoReserva
     */
    public function addTallere(\Celmedia\Toyocosta\ContenidoBundle\Entity\Establecimiento $talleres)
    {
        $this->talleres[] = $talleres;

        return $this;
    }

    /**
     * Remove talleres
     *
     * @param \Celmedia\Toyocosta\ContenidoBundle\Entity\Establecimiento $talleres
     */
    public function removeTallere(\Celmedia\Toyocosta\ContenidoBundle\Entity\Establecimiento $talleres)
    {
        $this->talleres->removeElement($talleres);
    }

    /**
     * Get talleres
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTalleres()
    {
        return $this->talleres;
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


}
