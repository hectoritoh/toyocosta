<?php

namespace Celmedia\Toyocosta\MontacagasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
/**
 * Montacarga
 */
class Montacarga
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
     * @var float
     */
    private $precio;

    /**
     * @var string
     */
    private $caracteristicas;

    /**
     * @var string
     */
    private $ficha;

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
    private $galeria;

    /**
     * @var \Celmedia\Toyocosta\MontacagasBundle\Entity\Subcategoria
     */
    private $montacarga_subcategoria;

    /**
     * Constructor
     */
    public function __construct()
    {
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
     * @return Montacarga
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
     * Set precio
     *
     * @param float $precio
     * @return Montacarga
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
     * Set caracteristicas
     *
     * @param string $caracteristicas
     * @return Montacarga
     */
    public function setCaracteristicas($caracteristicas)
    {
        $this->caracteristicas = $caracteristicas;

        return $this;
    }

    /**
     * Get caracteristicas
     *
     * @return string 
     */
    public function getCaracteristicas()
    {
        return $this->caracteristicas;
    }

    /**
     * Set ficha
     *
     * @param string $ficha
     * @return Montacarga
     */
    public function setFicha($ficha)
    {
        $this->ficha = $ficha;

        return $this;
    }

    /**
     * Get ficha
     *
     * @return string 
     */
    public function getFicha()
    {
        return $this->ficha;
    }

    /**
     * Set estado
     *
     * @param integer $estado
     * @return Montacarga
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
     * @return Montacarga
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
     * @return Montacarga
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
     * Add galeria
     *
     * @param \Celmedia\Toyocosta\MontacagasBundle\Entity\MontacargaGaleria $galeria
     * @return Montacarga
     */
    public function addGalerium(\Celmedia\Toyocosta\MontacagasBundle\Entity\MontacargaGaleria $galeria)
    {
        $this->galeria[] = $galeria;

        return $this;
    }

    /**
     * Remove galeria
     *
     * @param \Celmedia\Toyocosta\MontacagasBundle\Entity\MontacargaGaleria $galeria
     */
    public function removeGalerium(\Celmedia\Toyocosta\MontacagasBundle\Entity\MontacargaGaleria $galeria)
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
     * Set montacarga_subcategoria
     *
     * @param \Celmedia\Toyocosta\MontacagasBundle\Entity\Subcategoria $montacargaSubcategoria
     * @return Montacarga
     */
    public function setMontacargaSubcategoria(\Celmedia\Toyocosta\MontacagasBundle\Entity\Subcategoria $montacargaSubcategoria = null)
    {
        $this->montacarga_subcategoria = $montacargaSubcategoria;

        return $this;
    }

    /**
     * Get montacarga_subcategoria
     *
     * @return \Celmedia\Toyocosta\MontacagasBundle\Entity\Subcategoria 
     */
    public function getMontacargaSubcategoria()
    {
        return $this->montacarga_subcategoria;
    }
    /**
     * @ORM\PrePersist
     */
    public function lifecycleFileUpload()
    {
        // Add your code here
        $this->uploadFilePdf();
    }









    /**
     * Unmapped property to handle file uploads
     */
    private $filePdf;

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFilePdf(UploadedFile $filePdf = null)
    {
        $this->filePdf = $filePdf;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFilePdf()
    {
        return $this->filePdf;
    }

    /**
     * Manages the copying of the file to the relevant place on the server
     */
    public function uploadFilePdf()
    {
        // the file property can be empty if the field is not required
        if (null === $this->getFilePdf()) {
            return;
        }

        // move takes the target directory and target filename as params
        $this->getFilePdf()->move(
           __DIR__.'/../../../../../web/'. 'uploads/montacargas/ficha' ,
            $this->getFilePdf()->getClientOriginalName()
        );

        // set the path property to the filename where you've saved the file
        $this->ficha = $this->getFilePdf()->getClientOriginalName();

        // clean up the file property as you won't need it anymore
        $this->setFilePdf(null);
    }


    public function __toString()
    {
        return $this->getModelo();
    }

}
