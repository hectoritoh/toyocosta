<?php

namespace Celmedia\Toyocosta\ContenidoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Color
 */
class Color
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $seminuevo_color;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $vehiculo_color;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->seminuevo_color = new \Doctrine\Common\Collections\ArrayCollection();
        $this->vehiculo_color = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Color
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
     * @return Color
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
     * @return Color
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
     * @return Color
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
     * @return Color
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
     * Add seminuevo_color
     *
     * @param \Celmedia\Toyocosta\SeminuevoBundle\Entity\Seminuevo $seminuevoColor
     * @return Color
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

    /**
     * Add vehiculo_color
     *
     * @param \Celmedia\Toyocosta\VehiculosBundle\Entity\VehiculoColores $vehiculoColor
     * @return Color
     */
    public function addVehiculoColor(\Celmedia\Toyocosta\VehiculosBundle\Entity\VehiculoColores $vehiculoColor)
    {
        $this->vehiculo_color[] = $vehiculoColor;

        return $this;
    }

    /**
     * Remove vehiculo_color
     *
     * @param \Celmedia\Toyocosta\VehiculosBundle\Entity\VehiculoColores $vehiculoColor
     */
    public function removeVehiculoColor(\Celmedia\Toyocosta\VehiculosBundle\Entity\VehiculoColores $vehiculoColor)
    {
        $this->vehiculo_color->removeElement($vehiculoColor);
    }

    /**
     * Get vehiculo_color
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getVehiculoColor()
    {
        return $this->vehiculo_color;
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
    
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $moto_color;


    /**
     * Add moto_color
     *
     * @param \Celmedia\Toyocosta\MotosBundle\Entity\MotoColor $motoColor
     * @return Color
     */
    public function addMotoColor(\Celmedia\Toyocosta\MotosBundle\Entity\MotoColor $motoColor)
    {
        $this->moto_color[] = $motoColor;

        return $this;
    }

    /**
     * Remove moto_color
     *
     * @param \Celmedia\Toyocosta\MotosBundle\Entity\MotoColor $motoColor
     */
    public function removeMotoColor(\Celmedia\Toyocosta\MotosBundle\Entity\MotoColor $motoColor)
    {
        $this->moto_color->removeElement($motoColor);
    }

    /**
     * Get moto_color
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMotoColor()
    {
        return $this->moto_color;
    }
}
