<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Interet
 *
 * @ORM\Table(name="points_dinteret")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\InteretRepository")
 */
class Interet
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
     * @var \DateTime
     *
     * @ORM\Column(name="time_stamp", type="datetimetz", nullable=true)
     */
    private $timeStamp;

    /**
     * @var string
     *
     * @ORM\Column(name="amenity", type="string", length=30)
     */
    private $amenity;

    /**
     * @var int
     *
     * @ORM\Column(name="capacity", type="integer")
     */
    private $capacity;

    /**
     * @var string
     *
     * @ORM\Column(name="network", type="string", length=50)
     */
    private $network;

    /**
     * @var string
     *
     * @ORM\Column(name="operator", type="string", length=50)
     */
    private $operator;

    /**
     * @var string
     *
     * @ORM\Column(name="vending", type="string", length=50)
     */
    private $vending;

    /**
     * @var string
     *
     * @ORM\Column(name="wheelchair", type="string", length=50)
     */
    private $wheelchair;

    /**
     * @var string
     *
     * @ORM\Column(name="website", type="string", length=50)
     */
    private $website;

    /**
     * @var string
     *
     * @ORM\Column(name="note", type="string", length=50)
     */
    private $note;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=50)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="other_tags", type="string", length=50)
     */
    private $otherTags;


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
     * @return Interet
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
     * @return Interet
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
     * Set timeStamp
     *
     * @param \DateTime $timeStamp
     *
     * @return Interet
     */
    public function setTimeStamp($timeStamp)
    {
        $this->timeStamp = $timeStamp;

        return $this;
    }

    /**
     * Get timeStamp
     *
     * @return \DateTime
     */
    public function getTimeStamp()
    {
        return $this->timeStamp;
    }

    /**
     * Set amenity
     *
     * @param string $amenity
     *
     * @return Interet
     */
    public function setAmenity($amenity)
    {
        $this->amenity = $amenity;

        return $this;
    }

    /**
     * Get amenity
     *
     * @return string
     */
    public function getAmenity()
    {
        return $this->amenity;
    }

    /**
     * Set capacity
     *
     * @param integer $capacity
     *
     * @return Interet
     */
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;

        return $this;
    }

    /**
     * Get capacity
     *
     * @return int
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * Set network
     *
     * @param string $network
     *
     * @return Interet
     */
    public function setNetwork($network)
    {
        $this->network = $network;

        return $this;
    }

    /**
     * Get network
     *
     * @return string
     */
    public function getNetwork()
    {
        return $this->network;
    }

    /**
     * Set operator
     *
     * @param string $operator
     *
     * @return Interet
     */
    public function setOperator($operator)
    {
        $this->operator = $operator;

        return $this;
    }

    /**
     * Get operator
     *
     * @return string
     */
    public function getOperator()
    {
        return $this->operator;
    }

    /**
     * Set vending
     *
     * @param string $vending
     *
     * @return Interet
     */
    public function setVending($vending)
    {
        $this->vending = $vending;

        return $this;
    }

    /**
     * Get vending
     *
     * @return string
     */
    public function getVending()
    {
        return $this->vending;
    }

    /**
     * Set wheelchair
     *
     * @param string $wheelchair
     *
     * @return Interet
     */
    public function setWheelchair($wheelchair)
    {
        $this->wheelchair = $wheelchair;

        return $this;
    }

    /**
     * Get wheelchair
     *
     * @return string
     */
    public function getWheelchair()
    {
        return $this->wheelchair;
    }

    /**
     * Set website
     *
     * @param string $website
     *
     * @return Interet
     */
    public function setWebsite($website)
    {
        $this->website = $website;

        return $this;
    }

    /**
     * Get website
     *
     * @return string
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Set note
     *
     * @param string $note
     *
     * @return Interet
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Interet
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set otherTags
     *
     * @param string $otherTags
     *
     * @return Interet
     */
    public function setOtherTags($otherTags)
    {
        $this->otherTags = $otherTags;

        return $this;
    }

    /**
     * Get otherTags
     *
     * @return string
     */
    public function getOtherTags()
    {
        return $this->otherTags;
    }
}
