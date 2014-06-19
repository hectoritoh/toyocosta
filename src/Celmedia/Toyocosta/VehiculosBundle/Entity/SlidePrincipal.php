<?php

namespace Celmedia\Toyocosta\VehiculosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * SlidePrincipal
 */
class SlidePrincipal
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $link;

    /**
     * @var string
     */
    private $descripcion;

    /**
     * @var string
     */
    private $imagen_banner;

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
     * Set link
     *
     * @param string $link
     * @return SlidePrincipal
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string 
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return SlidePrincipal
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set imagen_banner
     *
     * @param string $imagenBanner
     * @return SlidePrincipal
     */
    public function setImagenBanner($imagenBanner)
    {
        $this->imagen_banner = $imagenBanner;

        return $this;
    }

    /**
     * Get imagen_banner
     *
     * @return string 
     */
    public function getImagenBanner()
    {
        return $this->imagen_banner;
    }

    /**
     * Set estado
     *
     * @param integer $estado
     * @return SlidePrincipal
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
     * @return SlidePrincipal
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
     * @return SlidePrincipal
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
        $this->uploadImagenSlide();
    }



    /**
 * Unmapped property to handle file uploads
 */
private $ImagenSlide;

/**
 * Sets file.
 *
 * @param UploadedFile $file
 */
public function setImagenSlide(UploadedFile $ImagenSlide = null)
{
    $this->ImagenSlide = $ImagenSlide;
}

/**
 * Get file.
 *
 * @return UploadedFile
 */
public function getImagenSlide()
{
    return $this->ImagenSlide;
}

/**
 * Manages the copying of the file to the relevant place on the server
 */
public function uploadImagenSlide()
{
    // the file property can be empty if the field is not required
    if (null === $this->getImagenSlide()) {
        return;
    }

    // move takes the target directory and target filename as params
    $this->getImagenSlide()->move(
       __DIR__.'/../../../../../web/'. 'uploads/slide-principal' ,
        $this->getImagenSlide()->getClientOriginalName()
    );

    // set the path property to the filename where you've saved the file
    $this->imagen_banner = $this->getImagenSlide()->getClientOriginalName();

    // clean up the file property as you won't need it anymore
    $this->setImagenSlide(null);
}




}
