<?php

namespace Celmedia\Toyocosta\SeminuevoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SeminuevoColores
 */
class SeminuevoColores
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
    private $valor;

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
     * @return SeminuevoColores
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
     * Set valor
     *
     * @param string $valor
     * @return SeminuevoColores
     */
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Get valor
     *
     * @return string 
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Set estado
     *
     * @param integer $estado
     * @return SeminuevoColores
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
     * @return SeminuevoColores
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
     * @return SeminuevoColores
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $seminuevo_color;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->seminuevo_color = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add seminuevo_color
     *
     * @param \Celmedia\Toyocosta\SeminuevoBundle\Entity\Seminuevo $seminuevoColor
     * @return SeminuevoColores
     */
    public function addSeminuevoColor(\Celmedia\Toyocosta\SeminuevoBundle\Entity\Seminuevo $seminuevoColor)
    {
        $this->seminuevo_color[] = $seminuevoColor;

        return $this;
    }

    /**
     * Remove seminuevo_color
     *
     * @param \Celmedia\Toyocosta\SeminuevoBundle\Entity\Seminuevo $seminuevoColor
     */
    public function removeSeminuevoColor(\Celmedia\Toyocosta\SeminuevoBundle\Entity\Seminuevo $seminuevoColor)
    {
        $this->seminuevo_color->removeElement($seminuevoColor);
    }

    /**
     * Get seminuevo_color
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSeminuevoColor()
    {
        return $this->seminuevo_color;
    }
}
