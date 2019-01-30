<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Gares
 *
 * @ORM\Table(name="Recherche")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RechercheRepository")
 */
class Recherche
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
     * @var int
     *
     * @ORM\Column(name="time_stamp", type="datetime", nullable=true)
     */
    private $time_stamp;

    /**
     * @var string
     *
     * @ORM\Column(name="criteres", type="string", length=150, nullable=true)
     */
    private $criteres;

    /**
     * @var string
     *
     * @ORM\Column(name="resultats", type="string", length=150, nullable=true)
     */
    private $resultats;

    /**
     * @var string
     *
     * @ORM\Column(name="score", type="string", length=150, nullable=true)
     */
    private $score;

    /**
     * @var float
     *
     * @ORM\Column(name="latitude", type="float")
     */
    private $latitude;

    /**
     * @var float
     *
     * @ORM\Column(name="longitude", type="float")
     */
    private $longitude;

    public function __construct()
    {
        $this->time_stamp = new \DateTime();
    }

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
     * Get latitude
     *
     * @return string
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Get longitude
     *
     * @return string
     */
    public function getLongitude()
    {
        return $this->longitude;
    }
    /**
     * Get score
     *
     * @return string
     */
    public function getScore()
    {
        return $this->score;
    }
    /**
     * Get resultats
     *
     * @return string
     */
    public function getResultats()
    {
        return $this->resultats;
    }

    /**
     * Get criteres
     *
     * @return string
     */
    public function getCriteres()
    {
        return $this->criteres;
    }

    /**
     * Set latitude
     *
     * @param float $latitude
     * @return Recherche
     */
    public function setLatitude($latitude)
    {
        $this->latitude=$latitude;
        return $this;
    }

    /**
     * Set longitude
     *
     * @param float $longitude
     * @return Recherche
     */
    public function setLongitude($longitude)
    {
        $this->longitude=$longitude;
        return $this;
    }
    /**
     * Set score
     *
     * @param string $score
     * @return Recherche
     */
    public function setScore($score)
    {
        $this->score=$score;
        return $this;
    }
    /**
     * Set resultats
     *
     * @param string $resultats
     * @return Recherche
     */
    public function setResultats($resultats)
    {
        $this->resultats=$resultats;
        return $this;
    }

    /**
     * Set criteres
     *
     * @param string $criteres
     * @return Recherche
     */
    public function setCriteres($criteres)
    {
        $this->criteres=$criteres;
        return $this;
    }


}
