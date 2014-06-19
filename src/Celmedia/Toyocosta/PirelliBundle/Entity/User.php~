<?php

namespace Celmedia\Toyocosta\PirelliBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 */
class User extends BaseUser
{
    /**
     * @var integer
     */
    protected $id;


    public function __construct()
    {
        parent::__construct();
        // your own logic
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
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $apellido;

    /**
     * @var integer
     */
    private $telefono;

    /**
     * @var integer
     */
    private $celular;

    /**
     * @var \DateTime
     */
    private $fecha_nacimiento;

    /**
     * @var string
     */
    private $ciudad;

    /**
     * @var string
     */
    private $direccion;

    /**
     * @var integer
     */
    private $cedula;

    /**
     * @var integer
     */
    private $rol;


    /**
     * Set nombre
     *
     * @param string $nombre
     * @return User
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
     * @return User
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
     * Set telefono
     *
     * @param integer $telefono
     * @return User
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
     * Set celular
     *
     * @param integer $celular
     * @return User
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;

        return $this;
    }

    /**
     * Get celular
     *
     * @return integer 
     */
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * Set fecha_nacimiento
     *
     * @param \DateTime $fechaNacimiento
     * @return User
     */
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fecha_nacimiento = $fechaNacimiento;

        return $this;
    }

    /**
     * Get fecha_nacimiento
     *
     * @return \DateTime 
     */
    public function getFechaNacimiento()
    {
        return $this->fecha_nacimiento;
    }

    /**
     * Set ciudad
     *
     * @param string $ciudad
     * @return User
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
     * Set direccion
     *
     * @param string $direccion
     * @return User
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set cedula
     *
     * @param integer $cedula
     * @return User
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
     * Set rol
     *
     * @param integer $rol
     * @return User
     */
    public function setRol($rol)
    {
        $this->rol = $rol;

        return $this;
    }

    /**
     * Get rol
     *
     * @return integer 
     */
    public function getRol()
    {
        return $this->rol;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $seminuevos;


    /**
     * Add seminuevos
     *
     * @param \Celmedia\Toyocosta\PirelliBundle\Entity\Seminuevo $seminuevos
     * @return User
     */
    public function addSeminuevo(\Celmedia\Toyocosta\PirelliBundle\Entity\Seminuevo $seminuevos)
    {
        $this->seminuevos[] = $seminuevos;

        return $this;
    }

    /**
     * Remove seminuevos
     *
     * @param \Celmedia\Toyocosta\PirelliBundle\Entity\Seminuevo $seminuevos
     */
    public function removeSeminuevo(\Celmedia\Toyocosta\PirelliBundle\Entity\Seminuevo $seminuevos)
    {
        $this->seminuevos->removeElement($seminuevos);
    }

    /**
     * Get seminuevos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSeminuevos()
    {
        return $this->seminuevos;
    }
}
