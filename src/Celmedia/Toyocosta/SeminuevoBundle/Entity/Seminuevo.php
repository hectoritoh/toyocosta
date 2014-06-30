<?php

namespace Celmedia\Toyocosta\SeminuevoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Celmedia\Toyocosta\PirelliBundle\Entity\User as User;

/**
 * Seminuevo
 */
class Seminuevo
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $modelo;

    /**
     * @var string
     */
    private $marca;

    /**
     * @var string
     */
    private $tipo;

    /**
     * @var string
     */
    private $kilometraje;

    /**
     * @var float
     */
    private $precio;

    /**
     * @var integer
     */
    private $anio;

    /**
     * @var string
     */
    private $ubicacion;

    /**
     * @var string
     */
    private $placa;

    /**
     * @var string
     */
    private $informacion;

    /**
     * @var string
     */
    private $descripcion_corta;

    /**
     * @var integer
     */
    private $estado;

    /**
     * @var integer
     */
    private $estado_publicacion;

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
    private $certificados;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $galeria;

    /**
     * @var \Celmedia\Toyocosta\SeminuevoBundle\Entity\SeminuevoColores
     */
    private $colores;

    /**
     * @var \Celmedia\Toyocosta\PirelliBundle\Entity\User
     */
    private $seminuevo_user;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->certificados = new \Doctrine\Common\Collections\ArrayCollection();
        $this->galeria = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set modelo
     *
     * @param string $modelo
     * @return Seminuevo
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
     * Set marca
     *
     * @param string $marca
     * @return Seminuevo
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;

        return $this;
    }

    /**
     * Get marca
     *
     * @return string 
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     * @return Seminuevo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set kilometraje
     *
     * @param string $kilometraje
     * @return Seminuevo
     */
    public function setKilometraje($kilometraje)
    {
        $this->kilometraje = $kilometraje;

        return $this;
    }

    /**
     * Get kilometraje
     *
     * @return string 
     */
    public function getKilometraje()
    {
        return $this->kilometraje;
    }

    /**
     * Set precio
     *
     * @param float $precio
     * @return Seminuevo
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return float 
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set anio
     *
     * @param integer $anio
     * @return Seminuevo
     */
    public function setAnio($anio)
    {
        $this->anio = $anio;

        return $this;
    }

    /**
     * Get anio
     *
     * @return integer 
     */
    public function getAnio()
    {
        return $this->anio;
    }

    /**
     * Set ubicacion
     *
     * @param string $ubicacion
     * @return Seminuevo
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
     * Set placa
     *
     * @param string $placa
     * @return Seminuevo
     */
    public function setPlaca($placa)
    {
        $this->placa = $placa;

        return $this;
    }

    /**
     * Get placa
     *
     * @return string 
     */
    public function getPlaca()
    {
        return $this->placa;
    }

    /**
     * Set informacion
     *
     * @param string $informacion
     * @return Seminuevo
     */
    public function setInformacion($informacion)
    {
        $this->informacion = $informacion;

        return $this;
    }

    /**
     * Get informacion
     *
     * @return string 
     */
    public function getInformacion()
    {
        return $this->informacion;
    }

    /**
     * Set descripcion_corta
     *
     * @param string $descripcionCorta
     * @return Seminuevo
     */
    public function setDescripcionCorta($descripcionCorta)
    {
        $this->descripcion_corta = $descripcionCorta;

        return $this;
    }

    /**
     * Get descripcion_corta
     *
     * @return string 
     */
    public function getDescripcionCorta()
    {
        return $this->descripcion_corta;
    }

    /**
     * Set estado
     *
     * @param integer $estado
     * @return Seminuevo
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
     * Set estado_publicacion
     *
     * @param integer $estadoPublicacion
     * @return Seminuevo
     */
    public function setEstadoPublicacion($estadoPublicacion)
    {
        $this->estado_publicacion = $estadoPublicacion;

        return $this;
    }

    /**
     * Get estado_publicacion
     *
     * @return integer 
     */
    public function getEstadoPublicacion()
    {
        return $this->estado_publicacion;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Seminuevo
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
     * @return Seminuevo
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
     * Add certificados
     *
     * @param \Celmedia\Toyocosta\SeminuevoBundle\Entity\SeminuevoCertificado $certificados
     * @return Seminuevo
     */
    public function addCertificado(\Celmedia\Toyocosta\SeminuevoBundle\Entity\SeminuevoCertificado $certificados)
    {
        $this->certificados[] = $certificados;

        return $this;
    }

    /**
     * Remove certificados
     *
     * @param \Celmedia\Toyocosta\SeminuevoBundle\Entity\SeminuevoCertificado $certificados
     */
    public function removeCertificado(\Celmedia\Toyocosta\SeminuevoBundle\Entity\SeminuevoCertificado $certificados)
    {
        $this->certificados->removeElement($certificados);
    }

    /**
     * Get certificados
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCertificados()
    {
        return $this->certificados;
    }

    /**
     * Add galeria
     *
     * @param \Celmedia\Toyocosta\SeminuevoBundle\Entity\SeminuevoGaleria $galeria
     * @return Seminuevo
     */
    public function addGalerium(\Celmedia\Toyocosta\SeminuevoBundle\Entity\SeminuevoGaleria $galeria)
    {
        $this->galeria[] = $galeria;

        return $this;
    }

    /**
     * Remove galeria
     *
     * @param \Celmedia\Toyocosta\SeminuevoBundle\Entity\SeminuevoGaleria $galeria
     */
    public function removeGalerium(\Celmedia\Toyocosta\SeminuevoBundle\Entity\SeminuevoGaleria $galeria)
    {
        $this->galeria->removeElement($galeria);
    }

    /**
     * Get galeria
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGaleria()
    {
        return $this->galeria;
    }

    /**
     * Set colores
     *
     * @param \Celmedia\Toyocosta\SeminuevoBundle\Entity\SeminuevoColores $colores
     * @return Seminuevo
     */
    public function setColores(\Celmedia\Toyocosta\SeminuevoBundle\Entity\SeminuevoColores $colores = null)
    {
        $this->colores = $colores;

        return $this;
    }

    /**
     * Get colores
     *
     * @return \Celmedia\Toyocosta\SeminuevoBundle\Entity\SeminuevoColores 
     */
    public function getColores()
    {
        return $this->colores;
    }

    /**
     * Set seminuevo_user
     *
     * @param \Celmedia\Toyocosta\PirelliBundle\Entity\User $seminuevoUser
     * @return Seminuevo
     */
    public function setSeminuevoUser(\Celmedia\Toyocosta\PirelliBundle\Entity\User $seminuevoUser = null)
    {
        $this->seminuevo_user = $seminuevoUser;

        return $this;
    }

    /**
     * Get seminuevo_user
     *
     * @return \Celmedia\Toyocosta\PirelliBundle\Entity\User 
     */
    public function getSeminuevoUser()
    {
        return $this->seminuevo_user;
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
        return $this->getModelo();
    }

}
