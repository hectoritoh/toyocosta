<?php

namespace Celmedia\Toyocosta\VehiculosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VehiculoCotizacion
 */
class VehiculoCotizacion
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
    private $apellido;

    /**
     * @var string
     */
    private $email;

    /**
     * @var integer
     */
    private $cedula;

    /**
     * @var integer
     */
    private $telefono;

    /**
     * @var string
     */
    private $ciudad;

    /**
     * @var string
     */
    private $mensaje;

    /**
     * @var float
     */
    private $valor_entrada;

    /**
     * @var float
     */
    private $interes_vehiculo;

    /**
     * @var float
     */
    private $interes_entrada;

    /**
     * @var \DateTime
     */
    private $created;

    /**
     * @var \DateTime
     */
    private $updated;

    /**
     * @var \Celmedia\Toyocosta\VehiculosBundle\Entity\VehiculoModelos
     */
    private $vehiculo_modelo;

    /**
     * @var \Celmedia\Toyocosta\VehiculosBundle\Entity\Plazo
     */
    private $plazo;


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
     * @return VehiculoCotizacion
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
     * Set apellido
     *
     * @param string $apellido
     * @return VehiculoCotizacion
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get apellido
     *
     * @return string 
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return VehiculoCotizacion
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set cedula
     *
     * @param integer $cedula
     * @return VehiculoCotizacion
     */
    public function setCedula($cedula)
    {
        $this->cedula = $cedula;

        return $this;
    }

    /**
     * Get cedula
     *
     * @return integer 
     */
    public function getCedula()
    {
        return $this->cedula;
    }

    /**
     * Set telefono
     *
     * @param integer $telefono
     * @return VehiculoCotizacion
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return integer 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set ciudad
     *
     * @param string $ciudad
     * @return VehiculoCotizacion
     */
    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;

        return $this;
    }

    /**
     * Get ciudad
     *
     * @return string 
     */
    public function getCiudad()
    {
        return $this->ciudad;
    }

    /**
     * Set mensaje
     *
     * @param string $mensaje
     * @return VehiculoCotizacion
     */
    public function setMensaje($mensaje)
    {
        $this->mensaje = $mensaje;

        return $this;
    }

    /**
     * Get mensaje
     *
     * @return string 
     */
    public function getMensaje()
    {
        return $this->mensaje;
    }

    /**
     * Set valor_entrada
     *
     * @param float $valorEntrada
     * @return VehiculoCotizacion
     */
    public function setValorEntrada($valorEntrada)
    {
        $this->valor_entrada = $valorEntrada;

        return $this;
    }

    /**
     * Get valor_entrada
     *
     * @return float 
     */
    public function getValorEntrada()
    {
        return $this->valor_entrada;
    }

    /**
     * Set interes_vehiculo
     *
     * @param float $interesVehiculo
     * @return VehiculoCotizacion
     */
    public function setInteresVehiculo($interesVehiculo)
    {
        $this->interes_vehiculo = $interesVehiculo;

        return $this;
    }

    /**
     * Get interes_vehiculo
     *
     * @return float 
     */
    public function getInteresVehiculo()
    {
        return $this->interes_vehiculo;
    }

    /**
     * Set interes_entrada
     *
     * @param float $interesEntrada
     * @return VehiculoCotizacion
     */
    public function setInteresEntrada($interesEntrada)
    {
        $this->interes_entrada = $interesEntrada;

        return $this;
    }

    /**
     * Get interes_entrada
     *
     * @return float 
     */
    public function getInteresEntrada()
    {
        return $this->interes_entrada;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return VehiculoCotizacion
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
     * @return VehiculoCotizacion
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
     * Set vehiculo_modelo
     *
     * @param \Celmedia\Toyocosta\VehiculosBundle\Entity\VehiculoModelos $vehiculoModelo
     * @return VehiculoCotizacion
     */
    public function setVehiculoModelo(\Celmedia\Toyocosta\VehiculosBundle\Entity\VehiculoModelos $vehiculoModelo = null)
    {
        $this->vehiculo_modelo = $vehiculoModelo;

        return $this;
    }

    /**
     * Get vehiculo_modelo
     *
     * @return \Celmedia\Toyocosta\VehiculosBundle\Entity\VehiculoModelos 
     */
    public function getVehiculoModelo()
    {
        return $this->vehiculo_modelo;
    }

    /**
     * Set plazo
     *
     * @param \Celmedia\Toyocosta\VehiculosBundle\Entity\Plazo $plazo
     * @return VehiculoCotizacion
     */
    public function setPlazo(\Celmedia\Toyocosta\VehiculosBundle\Entity\Plazo $plazo = null)
    {
        $this->plazo = $plazo;

        return $this;
    }

    /**
     * Get plazo
     *
     * @return \Celmedia\Toyocosta\VehiculosBundle\Entity\Plazo 
     */
    public function getPlazo()
    {
        return $this->plazo;
    }
    /**
     * @ORM\PrePersist
     */
    public function lifecycleFileUpload()
    {
        // Add your code here
    }
}
