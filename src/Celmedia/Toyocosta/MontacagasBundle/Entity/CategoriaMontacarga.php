<?php

namespace Celmedia\Toyocosta\MontacagasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
/**
 * CategoriaMontacarga
 */
class CategoriaMontacarga
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
     * @var string
     */
    private $foto_thumb;

    /**
     * @var string
     */
    private $logo;

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
    private $subcategorias;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->subcategorias = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return CategoriaMontacarga
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
     * Set foto_thumb
     *
     * @param string $fotoThumb
     * @return CategoriaMontacarga
     */
    public function setFotoThumb($fotoThumb)
    {
        $this->foto_thumb = $fotoThumb;

        return $this;
    }

    /**
     * Get foto_thumb
     *
     * @return string 
     */
    public function getFotoThumb()
    {
        return $this->foto_thumb;
    }

    /**
     * Set logo
     *
     * @param string $logo
     * @return CategoriaMontacarga
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get logo
     *
     * @return string 
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set estado
     *
     * @param integer $estado
     * @return CategoriaMontacarga
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
     * @return CategoriaMontacarga
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
     * @return CategoriaMontacarga
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
     * Add subcategorias
     *
     * @param \Celmedia\Toyocosta\MontacagasBundle\Entity\Subcategoria $subcategorias
     * @return CategoriaMontacarga
     */
    public function addSubcategoria(\Celmedia\Toyocosta\MontacagasBundle\Entity\Subcategoria $subcategorias)
    {
        $this->subcategorias[] = $subcategorias;

        return $this;
    }

    /**
     * Remove subcategorias
     *
     * @param \Celmedia\Toyocosta\MontacagasBundle\Entity\Subcategoria $subcategorias
     */
    public function removeSubcategoria(\Celmedia\Toyocosta\MontacagasBundle\Entity\Subcategoria $subcategorias)
    {
        $this->subcategorias->removeElement($subcategorias);
    }

    /**
     * Get subcategorias
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSubcategorias()
    {
        return $this->subcategorias;
    }
    /**
     * @ORM\PrePersist
     */
    public function lifecycleFileUpload()
    {
        $this->uploadFileThumb();
        $this->uploadFileLogo();

    }








    /**
     * Unmapped property to handle file uploads
     */
    private $fileThumb;

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFileThumb(UploadedFile $fileThumb = null)
    {
        $this->fileThumb = $fileThumb;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFileThumb()
    {
        return $this->fileThumb;
    }

    /**
     * Manages the copying of the file to the relevant place on the server
     */
    public function uploadFileThumb()
    {
        // the file property can be empty if the field is not required
        if (null === $this->getFileThumb()) {
            return;
        }

        // move takes the target directory and target filename as params
        $this->getFileThumb()->move(
           __DIR__.'/../../../../../web/'. 'uploads/montacargas/categoria' ,
            $this->getFileThumb()->getClientOriginalName()
        );

        // set the path property to the filename where you've saved the file
        $this->foto_thumb = $this->getFileThumb()->getClientOriginalName();

        // clean up the file property as you won't need it anymore
        $this->setFileThumb(null);
    }








    /**
     * Unmapped property to handle file uploads
     */
    private $FileLogo;

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFileLogo(UploadedFile $FileLogo = null)
    {
        $this->FileLogo = $FileLogo;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFileLogo()
    {
        return $this->FileLogo;
    }

    /**
     * Manages the copying of the file to the relevant place on the server
     */
    public function uploadFileLogo()
    {
        // the file property can be empty if the field is not required
        if (null === $this->getFileLogo()) {
            return;
        }

        // move takes the target directory and target filename as params
        $this->getFileLogo()->move(
           __DIR__.'/../../../../../web/'. 'uploads/montacargas/categoria' ,
            $this->getFileLogo()->getClientOriginalName()
        );

        // set the path property to the filename where you've saved the file
        $this->logo = $this->getFileLogo()->getClientOriginalName();

        // clean up the file property as you won't need it anymore
        $this->setFileLogo(null);
    }



    
    public function __toString()
    {
        return $this->getNombre();
    }


}
