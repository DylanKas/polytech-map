<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Gares
 *
 * @ORM\Table(name="gares")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GareRepository")
 */
class Gare
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
     * @ORM\Column(name="code_ligne", type="integer", nullable=true)
     */
    private $codeLigne;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=45, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="nature", type="string", length=50, nullable=true)
     */
    private $nature;

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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set codeLigne
     *
     * @param integer $codeLigne
     *
     * @return Gare
     */
    public function setCodeLigne($codeLigne)
    {
        $this->codeLigne = $codeLigne;

        return $this;
    }

    /**
     * Get codeLigne
     *
     * @return int
     */
    public function getCodeLigne()
    {
        return $this->codeLigne;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Gare
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set nature
     *
     * @param string $nature
     *
     * @return Gare
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
     * Set latitude
     *
     * @param float $latitude
     *
     * @return Gare
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
     * @return Gare
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
}
