<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ecole
 *
 * @ORM\Table(name="ecole")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EcoleRepository")
 */
class Ecole
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

    /**
     * @var string
     *
     * @ORM\Column(name="patronyme", type="string", length=50, nullable=true)
     */
    private $patronyme;

    /**
     * @var string
     *
     * @ORM\Column(name="secteur", type="string", length=10, nullable=true)
     */
    private $secteur;

    /**
     * @var string
     *
     * @ORM\Column(name="nature", type="string", length=45, nullable=true)
     */
    private $nature;

    /**
     * @var binary
     *
     * @ORM\Column(name="etat", type="binary", nullable=true)
     */
    private $etat;

    /**
     * @var string
     *
     * @ORM\Column(name="academie", type="string", length=25, nullable=true)
     */
    private $academie;


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
     * Set latitude
     *
     * @param float $latitude
     *
     * @return Ecole
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param float $longitude
     *
     * @return Ecole
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set patronyme
     *
     * @param string $patronyme
     *
     * @return Ecole
     */
    public function setPatronyme($patronyme)
    {
        $this->patronyme = $patronyme;

        return $this;
    }

    /**
     * Get patronyme
     *
     * @return string
     */
    public function getPatronyme()
    {
        return $this->patronyme;
    }

    /**
     * Set secteur
     *
     * @param string $secteur
     *
     * @return Ecole
     */
    public function setSecteur($secteur)
    {
        $this->secteur = $secteur;

        return $this;
    }

    /**
     * Get secteur
     *
     * @return string
     */
    public function getSecteur()
    {
        return $this->secteur;
    }

    /**
     * Set nature
     *
     * @param string $nature
     *
     * @return Ecole
     */
    public function setNature($nature)
    {
        $this->nature = $nature;

        return $this;
    }

    /**
     * Get nature
     *
     * @return string
     */
    public function getNature()
    {
        return $this->nature;
    }

    /**
     * Set etat
     *
     * @param binary $etat
     *
     * @return Ecole
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return binary
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set academie
     *
     * @param string $academie
     *
     * @return Ecole
     */
    public function setAcademie($academie)
    {
        $this->academie = $academie;

        return $this;
    }

    /**
     * Get academie
     *
     * @return string
     */
    public function getAcademie()
    {
        return $this->academie;
    }
}

