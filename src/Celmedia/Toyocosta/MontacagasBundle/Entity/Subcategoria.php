<?php

namespace Celmedia\Toyocosta\MontacagasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Subcategoria
 */
class Subcategoria
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
     * @var integer
     */
    private $estado;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $montacargas;

    /**
     * @var \Celmedia\Toyocosta\MontacagasBundle\Entity\CategoriaMontacarga
     */
    private $montacarga_categoria;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->montacargas = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Subcategoria
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
     * Set estado
     *
     * @param integer $estado
     * @return Subcategoria
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
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Subcategoria
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get created_at
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updated_at
     *
     * @param \DateTime $updatedAt
     * @return Subcategoria
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;

        return $this;
    }

    /**
     * Get updated_at
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Add montacargas
     *
     * @param \Celmedia\Toyocosta\MontacagasBundle\Entity\Montacarga $montacargas
     * @return Subcategoria
     */
    public function addMontacarga(\Celmedia\Toyocosta\MontacagasBundle\Entity\Montacarga $montacargas)
    {
        $this->montacargas[] = $montacargas;

        return $this;
    }

    /**
     * Remove montacargas
     *
     * @param \Celmedia\Toyocosta\MontacagasBundle\Entity\Montacarga $montacargas
     */
    public function removeMontacarga(\Celmedia\Toyocosta\MontacagasBundle\Entity\Montacarga $montacargas)
    {
        $this->montacargas->removeElement($montacargas);
    }

    /**
     * Get montacargas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMontacargas()
    {
        return $this->montacargas;
    }

    /**
     * Set montacarga_categoria
     *
     * @param \Celmedia\Toyocosta\MontacagasBundle\Entity\CategoriaMontacarga $montacargaCategoria
     * @return Subcategoria
     */
    public function setMontacargaCategoria(\Celmedia\Toyocosta\MontacagasBundle\Entity\CategoriaMontacarga $montacargaCategoria = null)
    {
        $this->montacarga_categoria = $montacargaCategoria;

        return $this;
    }

    /**
     * Get montacarga_categoria
     *
     * @return \Celmedia\Toyocosta\MontacagasBundle\Entity\CategoriaMontacarga 
     */
    public function getMontacargaCategoria()
    {
        return $this->montacarga_categoria;
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
