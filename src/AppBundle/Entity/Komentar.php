<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Komentar
 *
 * @ORM\Table(name="komentar")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\KomentarRepository")
 */
class Komentar
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
     * @ORM\Column(name="tekst", type="string", length=1000)
     */
    private $tekst;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="vrijeme", type="datetime")
     */
    private $vrijeme;
	
	/**
     * @var string
     *
     * @ORM\Column(name="autor", type="string", length=100)
	 * @ORM\OneToOne(targetEntity="Autor")
     */
    private $autor;


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
     * Set tekst
     *
     * @param string $tekst
     *
     * @return Komentar
     */
    public function setTekst($tekst)
    {
        $this->tekst = $tekst;

        return $this;
    }

    /**
     * Get tekst
     *
     * @return string
     */
    public function getTekst()
    {
        return $this->tekst;
    }

    /**
     * Set vrijeme
     *
     * @param \DateTime $vrijeme
     *
     * @return Komentar
     */
    public function setVrijeme($vrijeme)
    {
        $this->vrijeme = $vrijeme;

        return $this;
    }

    /**
     * Get vrijeme
     *
     * @return \DateTime
     */
    public function getVrijeme()
    {
        return $this->vrijeme;
    }
	
	/**
     * Set autor
     *
     * @param string $autor
     *
     * @return Komentar
     */
    public function setAutor($autor)
    {
        $this->autor = $autor;

        return $this;
    }

    /**
     * Get autor
     *
     * @return string
     */
    public function getAutor()
    {
        return $this->autor;
	}
	
	public function __construct()
    {
        $this->autor = new ArrayCollection();
		$this->vrijeme = new \DateTime();
    }
}

