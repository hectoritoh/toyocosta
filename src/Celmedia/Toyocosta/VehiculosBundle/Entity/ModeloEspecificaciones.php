<?php

namespace Celmedia\Toyocosta\VehiculosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ModeloEspecificaciones
 */
class ModeloEspecificaciones
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $categoria;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $valor;

    /**
     * @var \Celmedia\Toyocosta\VehiculosBundle\Entity\VehiculoModelos
     */
    private $modelo;



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
     * Set categoria
     *
     * @param string $categoria
     * @return ModeloEspecificaciones
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get categoria
     *
     * @return string 
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return ModeloEspecificaciones
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
     * @return ModeloEspecificaciones
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
     * Set modelo
     *
     * @param \Celmedia\Toyocosta\VehiculosBundle\Entity\VehiculoModelos $modelo
     * @return ModeloEspecificaciones
     */
    public function setModelo(\Celmedia\Toyocosta\VehiculosBundle\Entity\VehiculoModelos $modelo = null)
    {
        $this->modelo = $modelo;

        return $this;
    }

    /**
     * Get modelo
     *
     * @return \Celmedia\Toyocosta\VehiculosBundle\Entity\VehiculoModelos 
     */
    public function getModelo()
    {
        return $this->modelo;
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
