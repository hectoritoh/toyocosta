<?php

namespace Celmedia\Toyocosta\VehiculosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SlideVehiculos
 */
class SlideVehiculos
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
    private $menu_posicion;

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
     * @var \Celmedia\Toyocosta\VehiculosBundle\Entity\CategoriaVehiculo
     */
    private $categoriaveh;


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
     * @return SlideVehiculos
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
     * Set menu_posicion
     *
     * @param integer $menuPosicion
     * @return SlideVehiculos
     */
    public function setMenuPosicion($menuPosicion)
    {
        $this->menu_posicion = $menuPosicion;

        return $this;
    }

    /**
     * Get menu_posicion
     *
     * @return integer 
     */
    public function getMenuPosicion()
    {
        return $this->menu_posicion;
    }

    /**
     * Set estado
     *
     * @param integer $estado
     * @return SlideVehiculos
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
     * @return SlideVehiculos
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
     * @return SlideVehiculos
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
     * Set categoriaveh
     *
     * @param \Celmedia\Toyocosta\VehiculosBundle\Entity\CategoriaVehiculo $categoriaveh
     * @return SlideVehiculos
     */
    public function setCategoriaveh(\Celmedia\Toyocosta\VehiculosBundle\Entity\CategoriaVehiculo $categoriaveh = null)
    {
        $this->categoriaveh = $categoriaveh;

        return $this;
    }

    /**
     * Get categoriaveh
     *
     * @return \Celmedia\Toyocosta\VehiculosBundle\Entity\CategoriaVehiculo 
     */
    public function getCategoriaveh()
    {
        return $this->categoriaveh;
    }
    /**
     * @ORM\PrePersist
     */
    public function lifecycleFileUpload()
    {
        // Add your code here
    }
}
