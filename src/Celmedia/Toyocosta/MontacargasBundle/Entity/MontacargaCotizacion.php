<?php

namespace Celmedia\Toyocosta\MontacargasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MontacargaCotizacion
 */
class MontacargaCotizacion
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
     * @var \DateTime
     */
    private $created;

    /**
     * @var \DateTime
     */
    private $updated;

    /**
     * @var \Celmedia\Toyocosta\MontacargasBundle\Entity\Montacarga
     */
    private $montacarga;

    /**
     * @var \Celmedia\Toyocosta\MontacargasBundle\Entity\MontacargaUsado
     */
    private $usado;


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
     * @return MontacargaCotizacion
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
     * @return MontacargaCotizacion
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
     * @return MontacargaCotizacion
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
     * @return MontacargaCotizacion
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
     * @return MontacargaCotizacion
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
     * @return MontacargaCotizacion
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
     * @return MontacargaCotizacion
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
     * Set created
     *
     * @param \DateTime $created
     * @return MontacargaCotizacion
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
     * @return MontacargaCotizacion
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
     * Set montacarga
     *
     * @param \Celmedia\Toyocosta\MontacargasBundle\Entity\Montacarga $montacarga
     * @return MontacargaCotizacion
     */
    public function setMontacarga(\Celmedia\Toyocosta\MontacargasBundle\Entity\Montacarga $montacarga = null)
    {
        $this->montacarga = $montacarga;

        return $this;
    }

    /**
     * Get montacarga
     *
     * @return \Celmedia\Toyocosta\MontacargasBundle\Entity\Montacarga 
     */
    public function getMontacarga()
    {
        return $this->montacarga;
    }

    /**
     * Set usado
     *
     * @param \Celmedia\Toyocosta\MontacargasBundle\Entity\MontacargaUsado $usado
     * @return MontacargaCotizacion
     */
    public function setUsado(\Celmedia\Toyocosta\MontacargasBundle\Entity\MontacargaUsado $usado = null)
    {
        $this->usado = $usado;

        return $this;
    }

    /**
     * Get usado
     *
     * @return \Celmedia\Toyocosta\MontacargasBundle\Entity\MontacargaUsado 
     */
    public function getUsado()
    {
        return $this->usado;
    }
    /**
     * @ORM\PrePersist
     */
    public function lifecycleFileUpload()
    {
        // Add your code here
    }
}
