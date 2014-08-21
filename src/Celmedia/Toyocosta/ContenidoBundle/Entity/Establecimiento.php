<?php

namespace Celmedia\Toyocosta\ContenidoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Establecimiento
 */
class Establecimiento
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
    private $horario;

    /**
     * @var string
     */
    private $ubicacion;

    /**
     * @var string
     */
    private $latitud;

    /**
     * @var string
     */
    private $longuitud;

    /**
     * @var integer
     */
    private $telefono;

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
    private $obsequios;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $contactos;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->obsequios = new \Doctrine\Common\Collections\ArrayCollection();
        $this->contactos = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Establecimiento
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
     * Set horario
     *
     * @param string $horario
     * @return Establecimiento
     */
    public function setHorario($horario)
    {
        $this->horario = $horario;

        return $this;
    }

    /**
     * Get horario
     *
     * @return string 
     */
    public function getHorario()
    {
        return $this->horario;
    }

    /**
     * Set ubicacion
     *
     * @param string $ubicacion
     * @return Establecimiento
     */
    public function setUbicacion($ubicacion)
    {
        $this->ubicacion = $ubicacion;

        return $this;
    }

    /**
     * Get ubicacion
     *
     * @return string 
     */
    public function getUbicacion()
    {
        return $this->ubicacion;
    }

    /**
     * Set latitud
     *
     * @param string $latitud
     * @return Establecimiento
     */
    public function setLatitud($latitud)
    {
        $this->latitud = $latitud;

        return $this;
    }

    /**
     * Get latitud
     *
     * @return string 
     */
    public function getLatitud()
    {
        return $this->latitud;
    }

    /**
     * Set longuitud
     *
     * @param string $longuitud
     * @return Establecimiento
     */
    public function setLonguitud($longuitud)
    {
        $this->longuitud = $longuitud;

        return $this;
    }

    /**
     * Get longuitud
     *
     * @return string 
     */
    public function getLonguitud()
    {
        return $this->longuitud;
    }

    /**
     * Set telefono
     *
     * @param integer $telefono
     * @return Establecimiento
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
     * Set estado
     *
     * @param integer $estado
     * @return Establecimiento
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
     * @return Establecimiento
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
     * @return Establecimiento
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
     * Add obsequios
     *
     * @param \Celmedia\Toyocosta\ContenidoBundle\Entity\Obsequio $obsequios
     * @return Establecimiento
     */
    public function addObsequio(\Celmedia\Toyocosta\ContenidoBundle\Entity\Obsequio $obsequios)
    {
        $this->obsequios[] = $obsequios;

        return $this;
    }

    /**
     * Remove obsequios
     *
     * @param \Celmedia\Toyocosta\ContenidoBundle\Entity\Obsequio $obsequios
     */
    public function removeObsequio(\Celmedia\Toyocosta\ContenidoBundle\Entity\Obsequio $obsequios)
    {
        $this->obsequios->removeElement($obsequios);
    }

    /**
     * Get obsequios
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getObsequios()
    {
        return $this->obsequios;
    }

    /**
     * Add contactos
     *
     * @param \Celmedia\Toyocosta\ContenidoBundle\Entity\Contacto $contactos
     * @return Establecimiento
     */
    public function addContacto(\Celmedia\Toyocosta\ContenidoBundle\Entity\Contacto $contactos)
    {
        $this->contactos[] = $contactos;

        return $this;
    }

    /**
     * Remove contactos
     *
     * @param \Celmedia\Toyocosta\ContenidoBundle\Entity\Contacto $contactos
     */
    public function removeContacto(\Celmedia\Toyocosta\ContenidoBundle\Entity\Contacto $contactos)
    {
        $this->contactos->removeElement($contactos);
    }

    /**
     * Get contactos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getContactos()
    {
        return $this->contactos;
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
