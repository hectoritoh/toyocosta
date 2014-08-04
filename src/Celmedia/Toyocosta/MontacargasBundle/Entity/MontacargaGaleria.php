<?php

namespace Celmedia\Toyocosta\MontacargasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MontacargaGaleria
 */
class MontacargaGaleria
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
     * @var \Celmedia\Toyocosta\MontacargasBundle\Entity\Montacarga
     */
    private $montacarga_galeria;


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
     * @return MontacargaGaleria
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
     * @return MontacargaGaleria
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
     * @return MontacargaGaleria
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
     * @return MontacargaGaleria
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
     * Set montacarga_galeria
     *
     * @param \Celmedia\Toyocosta\MontacargasBundle\Entity\Montacarga $montacargaGaleria
     * @return MontacargaGaleria
     */
    public function setMontacargaGaleria(\Celmedia\Toyocosta\MontacargasBundle\Entity\Montacarga $montacargaGaleria = null)
    {
        $this->montacarga_galeria = $montacargaGaleria;

        return $this;
    }

    /**
     * Get montacarga_galeria
     *
     * @return \Celmedia\Toyocosta\MontacargasBundle\Entity\Montacarga 
     */
    public function getMontacargaGaleria()
    {
        return $this->montacarga_galeria;
    }
    /**
     * @ORM\PrePersist
     */
    public function lifecycleFileUpload()
    {
        // Add your code here
    }
}
