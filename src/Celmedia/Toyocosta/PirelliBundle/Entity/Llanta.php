<?php

namespace Celmedia\Toyocosta\PirelliBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Llanta
 */
class Llanta
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
    private $medida;

    /**
     * @var float
     */
    private $rin;

    /**
     * @var string
     */
    private $segmento;

    /**
     * @var float
     */
    private $precio;

    /**
     * @var string
     */
    private $imagen;

    /**
     * @var string
     */
    private $ficha;

    /**
     * @var integer
     */
    private $estado;


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
     * @return Llanta
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
     * Set medida
     *
     * @param string $medida
     * @return Llanta
     */
    public function setMedida($medida)
    {
        $this->medida = $medida;

        return $this;
    }

    /**
     * Get medida
     *
     * @return string 
     */
    public function getMedida()
    {
        return $this->medida;
    }

    /**
     * Set rin
     *
     * @param float $rin
     * @return Llanta
     */
    public function setRin($rin)
    {
        $this->rin = $rin;

        return $this;
    }

    /**
     * Get rin
     *
     * @return float 
     */
    public function getRin()
    {
        return $this->rin;
    }

    /**
     * Set segmento
     *
     * @param string $segmento
     * @return Llanta
     */
    public function setSegmento($segmento)
    {
        $this->segmento = $segmento;

        return $this;
    }

    /**
     * Get segmento
     *
     * @return string 
     */
    public function getSegmento()
    {
        return $this->segmento;
    }

    /**
     * Set precio
     *
     * @param float $precio
     * @return Llanta
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
     * Set imagen
     *
     * @param string $imagen
     * @return Llanta
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }

    /**
     * Get imagen
     *
     * @return string 
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Set ficha
     *
     * @param string $ficha
     * @return Llanta
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
     * @return Llanta
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
     * @ORM\PrePersist
     */
    public function lifecycleFileUpload()
    {
        // Add your code here

        $this->uploadFileFicha();
    }





/**
 * Unmapped property to handle file uploads
 */
private $file;

/**
 * Sets file.
 *
 * @param UploadedFile $file
 */
public function setFile(UploadedFile $file = null)
{
    $this->file = $file;
}

/**
 * Get file.
 *
 * @return UploadedFile
 */
public function getFile()
{
    return $this->file;
}

/**
 * Manages the copying of the file to the relevant place on the server
 */
public function upload()
{
    // the file property can be empty if the field is not required
    if (null === $this->getFile()) {
        return;
    }

    // we use the original file name here but you should
    // sanitize it at least to avoid any security issues

    // move takes the target directory and target filename as params
    $this->getFile()->move(
       __DIR__.'/../../../../../web/'. 'uploads/pirelli' ,
        $this->getFile()->getClientOriginalName()
    );

    // set the path property to the filename where you've saved the file
    $this->imagen = $this->getFile()->getClientOriginalName();

    // clean up the file property as you won't need it anymore
    $this->setFile(null);
}






/**
 * Unmapped property to handle file uploads
 */
private $fileFicha;

/**
 * Sets file.
 *
 * @param UploadedFile $file
 */
public function setFileFicha(UploadedFile $fileFicha = null)
{
    $this->fileFicha = $fileFicha;
}

/**
 * Get file.
 *
 * @return UploadedFile
 */
public function getFileFicha()
{
    return $this->fileFicha;
}

/**
 * Manages the copying of the file to the relevant place on the server
 */
public function uploadFileFicha()
{
    // the file property can be empty if the field is not required
    if (null === $this->getFileFicha()) {
        return;
    }

    // move takes the target directory and target filename as params
    $this->getFileFicha()->move(
       __DIR__.'/../../../../../web/'. 'uploads/pirelli/fichas' ,
        $this->getFileFicha()->getClientOriginalName()
    );

    // set the path property to the filename where you've saved the file
    $this->ficha = $this->getFileFicha()->getClientOriginalName();

    // clean up the file property as you won't need it anymore
    $this->setFileFicha(null);
}




const SERVER_PATH_TO_IMAGE_FOLDER = '/server/path/to/images';



}
