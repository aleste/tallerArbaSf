<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Cerveza
 *
 * @ORM\Table(name="cerveza")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CervezaRepository")
 */
class Cerveza
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=50)
     * @Assert\NotBlank(message="Por favor comple el nombre")
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text")
     * @Assert\NotBlank()
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Origen")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="origen_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $origen;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Estilo")
     */
    private $estilo;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Color")
     */
    private $color;

    /**
     * @var float
     *
     * @ORM\Column(name="alcohol", type="float")
     */
    private $alcohol;

    /**
     * @var float
     *
     * @ORM\Column(name="precio", type="float")
     */
    private $precio;

    /**
     * @ORM\Column(type="string")     
     * @Assert\File(mimeTypes={ "image/jpeg", "image/png" })
     */
    private $foto;

    /**
    * @ORM\Column(name="destacada", type="boolean")
    */
    private $destacada;

    /**
    * @ORM\Column(name="presentacion", type="string")
    */
    private $presentacion;    


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Cerveza
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
     * Set origen
     *
     * @param string $origen
     *
     * @return Cerveza
     */
    public function setOrigen($origen)
    {
        $this->origen = $origen;

        return $this;
    }

    /**
     * Get origen
     *
     * @return string
     */
    public function getOrigen()
    {
        return $this->origen;
    }

    /**
     * Set estilo
     *
     * @param string $estilo
     *
     * @return Cerveza
     */
    public function setEstilo($estilo)
    {
        $this->estilo = $estilo;

        return $this;
    }

    /**
     * Get estilo
     *
     * @return string
     */
    public function getEstilo()
    {
        return $this->estilo;
    }

    /**
     * Set color
     *
     * @param string $color
     *
     * @return Cerveza
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set alcohol
     *
     * @param float $alcohol
     *
     * @return Cerveza
     */
    public function setAlcohol($alcohol)
    {
        $this->alcohol = $alcohol;

        return $this;
    }

    /**
     * Get alcohol
     *
     * @return float
     */
    public function getAlcohol()
    {
        return $this->alcohol;
    }

    /**
     * Set precio
     *
     * @param float $precio
     *
     * @return Cerveza
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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Cerveza
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
     * Set destacada
     *
     * @param boolean $destacada
     *
     * @return Cerveza
     */
    public function setDestacada($destacada)
    {
        $this->destacada = $destacada;

        return $this;
    }

    /**
     * Get destacada
     *
     * @return boolean
     */
    public function getDestacada()
    {
        return $this->destacada;
    }

    /**
     * Set foto
     *
     * @param string $foto
     *
     * @return Cerveza
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
     * Set presentacion
     *
     * @param string $presentacion
     *
     * @return Cerveza
     */
    public function setPresentacion($presentacion)
    {
        $this->presentacion = $presentacion;

        return $this;
    }

    /**
     * Get presentacion
     *
     * @return string
     */
    public function getPresentacion()
    {
        return $this->presentacion;
    }
}
