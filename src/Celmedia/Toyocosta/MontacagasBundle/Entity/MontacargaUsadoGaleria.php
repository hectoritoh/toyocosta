<?php

namespace Celmedia\Toyocosta\MontacagasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
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
     * @var \Celmedia\Toyocosta\MontacagasBundle\Entity\MontacargaUsado
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
     * @param \Celmedia\Toyocosta\MontacagasBundle\Entity\MontacargaUsado $montacargaUsado
     * @return MontacargaUsadoGaleria
     */
    public function setMontacargaUsado(\Celmedia\Toyocosta\MontacagasBundle\Entity\MontacargaUsado $montacargaUsado = null)
    {
        $this->montacarga_usado = $montacargaUsado;

        return $this;
    }

    /**
     * Get montacarga_usado
     *
     * @return \Celmedia\Toyocosta\MontacagasBundle\Entity\MontacargaUsado 
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
        $this->uploadFileFoto();
    }




    /**
     * Unmapped property to handle file uploads
     */
    private $fileFoto;

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFileFoto(UploadedFile $fileFoto = null)
    {
        $this->fileFoto = $fileFoto;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFileFoto()
    {
        return $this->fileFoto;
    }

    /**
     * Manages the copying of the file to the relevant place on the server
     */
    public function uploadFileFoto()
    {
        // the file property can be empty if the field is not required
        if (null === $this->getFileFoto()) {
            return;
        }

        // move takes the target directory and target filename as params
        $this->getFileFoto()->move(
           __DIR__.'/../../../../../web/'. 'uploads/montacargas/usados' ,
            $this->getFileFoto()->getClientOriginalName()
        );

        // set the path property to the filename where you've saved the file
        $this->foto = $this->getFileFoto()->getClientOriginalName();

        // clean up the file property as you won't need it anymore
        $this->setFileFoto(null);
    }


    public function __toString()
    {
        return $this->getFoto();
    }



}
