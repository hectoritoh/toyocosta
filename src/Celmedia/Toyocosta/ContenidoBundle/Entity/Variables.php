<?php

namespace Celmedia\Toyocosta\ContenidoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Variables
 */
class Variables
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $concepto;

    /**
     * @var integer
     */
    private $entrada_minima;

    /**
     * @var integer
     */
    private $interes;

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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set concepto
     *
     * @param string $concepto
     * @return Variables
     */
    public function setConcepto($concepto)
    {
        $this->concepto = $concepto;

        return $this;
    }

    /**
     * Get concepto
     *
     * @return string 
     */
    public function getConcepto()
    {
        return $this->concepto;
    }

    /**
     * Set entrada_minima
     *
     * @param integer $entradaMinima
     * @return Variables
     */
    public function setEntradaMinima($entradaMinima)
    {
        $this->entrada_minima = $entradaMinima;

        return $this;
    }

    /**
     * Get entrada_minima
     *
     * @return integer 
     */
    public function getEntradaMinima()
    {
        return $this->entrada_minima;
    }

    /**
     * Set interes
     *
     * @param integer $interes
     * @return Variables
     */
    public function setInteres($interes)
    {
        $this->interes = $interes;

        return $this;
    }

    /**
     * Get interes
     *
     * @return integer 
     */
    public function getInteres()
    {
        return $this->interes;
    }

    /**
     * Set estado
     *
     * @param integer $estado
     * @return Variables
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
     * @return Variables
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
     * @return Variables
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

    public function __toString()
    {
        return $this->getConcepto();
    }


}
