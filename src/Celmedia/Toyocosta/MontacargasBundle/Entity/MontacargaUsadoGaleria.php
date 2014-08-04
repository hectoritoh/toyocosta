<?php

namespace Celmedia\Toyocosta\MontacargasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MontacargaUsadoGaleria
 */
class MontacargaUsadoGaleria
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $foto;

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
     * @var \Celmedia\Toyocosta\MontacargasBundle\Entity\MontacargaUsado
     */
    private $montacarga_usado;


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
     * Set foto
     *
     * @param string $foto
     * @return MontacargaUsadoGaleria
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;

        return $this;
    }

    /**
     * Get foto
     *
     * @return string 
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * Set estado
     *
     * @param integer $estado
     * @return MontacargaUsadoGaleria
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
     * @return MontacargaUsadoGaleria
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
     * @return MontacargaUsadoGaleria
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
     * Set montacarga_usado
     *
     * @param \Celmedia\Toyocosta\MontacargasBundle\Entity\MontacargaUsado $montacargaUsado
     * @return MontacargaUsadoGaleria
     */
    public function setMontacargaUsado(\Celmedia\Toyocosta\MontacargasBundle\Entity\MontacargaUsado $montacargaUsado = null)
    {
        $this->montacarga_usado = $montacargaUsado;

        return $this;
    }

    /**
     * Get montacarga_usado
     *
     * @return \Celmedia\Toyocosta\MontacargasBundle\Entity\MontacargaUsado 
     */
    public function getMontacargaUsado()
    {
        return $this->montacarga_usado;
    }
    /**
     * @ORM\PrePersist
     */
    public function lifecycleFileUpload()
    {
        // Add your code here
    }
}
