<?php

namespace Celmedia\Toyocosta\MotosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
/**
 * MotoColor
 */
class MotoColor
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $imagen_color;

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
     * @var \Celmedia\Toyocosta\MotosBundle\Entity\Moto
     */
    private $moto;

    /**
     * @var \Celmedia\Toyocosta\ContenidoBundle\Entity\Color
     */
    private $coloresmotos;


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
     * Set imagen_color
     *
     * @param string $imagenColor
     * @return MotoColor
     */
    public function setImagenColor($imagenColor)
    {
        $this->imagen_color = $imagenColor;

        return $this;
    }

    /**
     * Get imagen_color
     *
     * @return string 
     */
    public function getImagenColor()
    {
        return $this->imagen_color;
    }

    /**
     * Set estado
     *
     * @param integer $estado
     * @return MotoColor
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
     * @return MotoColor
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
     * @return MotoColor
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
     * Set moto
     *
     * @param \Celmedia\Toyocosta\MotosBundle\Entity\Moto $moto
     * @return MotoColor
     */
    public function setMoto(\Celmedia\Toyocosta\MotosBundle\Entity\Moto $moto = null)
    {
        $this->moto = $moto;

        return $this;
    }

    /**
     * Get moto
     *
     * @return \Celmedia\Toyocosta\MotosBundle\Entity\Moto 
     */
    public function getMoto()
    {
        return $this->moto;
    }

    /**
     * Set coloresmotos
     *
     * @param \Celmedia\Toyocosta\ContenidoBundle\Entity\Color $coloresmotos
     * @return MotoColor
     */
    public function setColoresmotos(\Celmedia\Toyocosta\ContenidoBundle\Entity\Color $coloresmotos = null)
    {
        $this->coloresmotos = $coloresmotos;

        return $this;
    }

    /**
     * Get coloresmotos
     *
     * @return \Celmedia\Toyocosta\ContenidoBundle\Entity\Color 
     */
    public function getColoresmotos()
    {
        return $this->coloresmotos;
    }
    /**
     * @ORM\PrePersist
     */
    public function lifecycleFileUpload()
    {
        // Add your code here
        $this->uploadImagenMoto();
    }




    public function __toString()
    {
        return $this->getImagenColor();
    }

    /**
     * Unmapped property to handle file uploads
     */
    private $ImagenMoto;

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setImagenMoto(UploadedFile $ImagenMoto = null)
    {
        $this->ImagenMoto = $ImagenMoto;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getImagenMoto()
    {
        return $this->ImagenMoto;
    }

    /**
     * Manages the copying of the file to the relevant place on the server
     */
    public function uploadImagenMoto()
    {
        // the file property can be empty if the field is not required
        if (null === $this->getImagenMoto()) {
            return;
        }

        // move takes the target directory and target filename as params
        $this->getImagenMoto()->move(
           __DIR__.'/../../../../../web/'. 'uploads/motos/color' ,
            $this->getImagenMoto()->getClientOriginalName()
        );

        // set the path property to the filename where you've saved the file
        $this->imagen_color = $this->getImagenMoto()->getClientOriginalName();

        // clean up the file property as you won't need it anymore
        $this->setImagenMoto(null);
    }




}
