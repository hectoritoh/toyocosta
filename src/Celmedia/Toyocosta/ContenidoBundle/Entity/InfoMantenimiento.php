<?php

namespace Celmedia\Toyocosta\ContenidoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InfoMantenimiento
 */
class InfoMantenimiento
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
    private $telefono;

    /**
     * @var integer
     */
    private $celular;

    /**
     * @var \DateTime
     */
    private $fecha_tentativa;

    /**
     * @var string
     */
    private $observaciones;

    /**
     * @var string
     */
    private $tipo_reserva;

    /**
     * @var string
     */
    private $taller;

    /**
     * @var string
     */
    private $modelo;

    /**
     * @var string
     */
    private $kilometros;

    /**
     * @var string
     */
    private $comentarios;

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
     * @return InfoMantenimiento
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
     * @return InfoMantenimiento
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
     * @return InfoMantenimiento
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
     * Set telefono
     *
     * @param integer $telefono
     * @return InfoMantenimiento
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
     * @return InfoMantenimiento
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
     * Set fecha_tentativa
     *
     * @param \DateTime $fechaTentativa
     * @return InfoMantenimiento
     */
    public function setFechaTentativa($fechaTentativa)
    {
        $this->fecha_tentativa = $fechaTentativa;

        return $this;
    }

    /**
     * Get fecha_tentativa
     *
     * @return \DateTime 
     */
    public function getFechaTentativa()
    {
        return $this->fecha_tentativa;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     * @return InfoMantenimiento
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;

        return $this;
    }

    /**
     * Get observaciones
     *
     * @return string 
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * Set tipo_reserva
     *
     * @param string $tipoReserva
     * @return InfoMantenimiento
     */
    public function setTipoReserva($tipoReserva)
    {
        $this->tipo_reserva = $tipoReserva;

        return $this;
    }

    /**
     * Get tipo_reserva
     *
     * @return string 
     */
    public function getTipoReserva()
    {
        return $this->tipo_reserva;
    }

    /**
     * Set taller
     *
     * @param string $taller
     * @return InfoMantenimiento
     */
    public function setTaller($taller)
    {
        $this->taller = $taller;

        return $this;
    }

    /**
     * Get taller
     *
     * @return string 
     */
    public function getTaller()
    {
        return $this->taller;
    }

    /**
     * Set modelo
     *
     * @param string $modelo
     * @return InfoMantenimiento
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }

    /**
     * Get modelo
     *
     * @return string 
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set kilometros
     *
     * @param string $kilometros
     * @return InfoMantenimiento
     */
    public function setKilometros($kilometros)
    {
        $this->kilometros = $kilometros;

        return $this;
    }

    /**
     * Get kilometros
     *
     * @return string 
     */
    public function getKilometros()
    {
        return $this->kilometros;
    }

    /**
     * Set comentarios
     *
     * @param string $comentarios
     * @return InfoMantenimiento
     */
    public function setComentarios($comentarios)
    {
        $this->comentarios = $comentarios;

        return $this;
    }

    /**
     * Get comentarios
     *
     * @return string 
     */
    public function getComentarios()
    {
        return $this->comentarios;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return InfoMantenimiento
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
     * @return InfoMantenimiento
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
}
