<?php

namespace Celmedia\Toyocosta\MontacargasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
/**
 * MontacargaUsado
 */
class MontacargaUsado
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
     * @var integer
     */
    private $anio;

    /**
     * @var string
     */
    private $descripcion;

    /**
     * @var string
     */
    private $formato;

    /**
     * @var string
     */
    private $rawText;

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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $cotizacionesusado;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $imagenes;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->galeria = new \Doctrine\Common\Collections\ArrayCollection();
        $this->cotizacionesusado = new \Doctrine\Common\Collections\ArrayCollection();
        $this->imagenes = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return MontacargaUsado
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
     * @return MontacargaUsado
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
     * @return MontacargaUsado
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
     * Set descripcion
     *
     * @param string $descripcion
     * @return MontacargaUsado
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
     * Set formato
     *
     * @param string $formato
     * @return MontacargaUsado
     */
    public function setFormato($formato)
    {
        $this->formato = $formato;

        return $this;
    }

    /**
     * Get formato
     *
     * @return string 
     */
    public function getFormato()
    {
        return $this->formato;
    }

    /**
     * Set rawText
     *
     * @param string $rawText
     * @return MontacargaUsado
     */
    public function setRawText($rawText)
    {
        $this->rawText = $rawText;

        return $this;
    }

    /**
     * Get rawText
     *
     * @return string 
     */
    public function getRawText()
    {
        return $this->rawText;
    }

    /**
     * Set estado
     *
     * @param integer $estado
     * @return MontacargaUsado
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
     * @return MontacargaUsado
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
     * @return MontacargaUsado
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
     * @param \Celmedia\Toyocosta\MontacargasBundle\Entity\MontacargaUsadoGaleria $galeria
     * @return MontacargaUsado
     */
    public function addGalerium(\Celmedia\Toyocosta\MontacargasBundle\Entity\MontacargaUsadoGaleria $galeria)
    {
        $this->galeria[] = $galeria;

        return $this;
    }

    /**
     * Remove galeria
     *
     * @param \Celmedia\Toyocosta\MontacargasBundle\Entity\MontacargaUsadoGaleria $galeria
     */
    public function removeGalerium(\Celmedia\Toyocosta\MontacargasBundle\Entity\MontacargaUsadoGaleria $galeria)
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
     * Add cotizacionesusado
     *
     * @param \Celmedia\Toyocosta\MontacargasBundle\Entity\MontacargaCotizacion $cotizacionesusado
     * @return MontacargaUsado
     */
    public function addCotizacionesusado(\Celmedia\Toyocosta\MontacargasBundle\Entity\MontacargaCotizacion $cotizacionesusado)
    {
        $this->cotizacionesusado[] = $cotizacionesusado;

        return $this;
    }

    /**
     * Remove cotizacionesusado
     *
     * @param \Celmedia\Toyocosta\MontacargasBundle\Entity\MontacargaCotizacion $cotizacionesusado
     */
    public function removeCotizacionesusado(\Celmedia\Toyocosta\MontacargasBundle\Entity\MontacargaCotizacion $cotizacionesusado)
    {
        $this->cotizacionesusado->removeElement($cotizacionesusado);
    }

    /**
     * Get cotizacionesusado
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCotizacionesusado()
    {
        return $this->cotizacionesusado;
    }

    /**
     * Add imagenes
     *
     * @param \Application\Sonata\MediaBundle\Entity\GalleryHasMedia $imagenes
     * @return MontacargaUsado
     */
    public function addImagene(\Application\Sonata\MediaBundle\Entity\GalleryHasMedia $imagenes)
    {
        $this->imagenes[] = $imagenes;

        return $this;
    }

    /**
     * Remove imagenes
     *
     * @param \Application\Sonata\MediaBundle\Entity\GalleryHasMedia $imagenes
     */
    public function removeImagene(\Application\Sonata\MediaBundle\Entity\GalleryHasMedia $imagenes)
    {
        $this->imagenes->removeElement($imagenes);
    }

    /**
     * Get imagenes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getImagenes()
    {
        return $this->imagenes;
    }

    /**
     * @var string
     */
    private $ficha;


    /**
     * Set ficha
     *
     * @param string $ficha
     * @return MontacargaUsado
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
     * Unmapped property to handle file uploads
     */
    private $fichaPdf;

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFichaPdf(UploadedFile $fichaPdf = null)
    {
        $this->fichaPdf = $fichaPdf;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFichaPdf()
    {
        return $this->fichaPdf;
    }

    /**
     * Manages the copying of the file to the relevant place on the server
     */
    public function uploadFichaPdf()
    {
        // the file property can be empty if the field is not required
        if (null === $this->getFichaPdf()) {
            return;
        }

        // move takes the target directory and target filename as params
        $this->getFichaPdf()->move(
           __DIR__.'/../../../../../web/'. 'uploads/montacargas/ficha' ,
            $this->getFichaPdf()->getClientOriginalName()
        );

        // set the path property to the filename where you've saved the file
        $this->ficha = $this->getFichaPdf()->getClientOriginalName();

        // clean up the file property as you won't need it anymore
        $this->setFichaPdf(null);
    }


    public function __toString()
    {
        return $this->getModelo();
    }

    /**
     * @ORM\PrePersist
     */
    public function lifecycleFileUpload()
    {
        // Add your code here
        $this->uploadFichaPdf();
    }


}
