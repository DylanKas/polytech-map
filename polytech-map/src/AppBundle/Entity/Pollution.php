<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;
/**
 * Pollution
 *
 * @ORM\Table(name="pollution",
 *    uniqueConstraints={
 *        @UniqueConstraint(name="pollution_unique",
 *            columns={"latitude", "longitude"})
 *    }
 * )
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PollutionRepository")
 */
class Pollution
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
     * @var float
     *
     * @ORM\Column(name="pm25", type="float", nullable=true)
     */
    private $pm25;

    /**
     * @var float
     *
     * @ORM\Column(name="pm10", type="float", nullable=true)
     */
    private $pm10;

    /**
     * @var float
     *
     * @ORM\Column(name="o3", type="float", nullable=true)
     */
    private $o3;

    /**
     * @var float
     *
     * @ORM\Column(name="no2", type="float", nullable=true)
     */
    private $no2;


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
     * @return Pollution
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
     * @return Pollution
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
     * Set pm25
     *
     * @param float $pm25
     *
     * @return Pollution
     */
    public function setPm25($pm25)
    {
        $this->pm25 = $pm25;

        return $this;
    }

    /**
     * Get pm25
     *
     * @return float
     */
    public function getPm25()
    {
        return $this->pm25;
    }

    /**
     * Set pm10
     *
     * @param float $pm10
     *
     * @return Pollution
     */
    public function setPm10($pm10)
    {
        $this->pm10 = $pm10;

        return $this;
    }

    /**
     * Get pm10
     *
     * @return float
     */
    public function getPm10()
    {
        return $this->pm10;
    }

    /**
     * Set o3
     *
     * @param float $o3
     *
     * @return Pollution
     */
    public function setO3($o3)
    {
        $this->o3 = $o3;

        return $this;
    }

    /**
     * Get o3
     *
     * @return float
     */
    public function getO3()
    {
        return $this->o3;
    }

    /**
     * Set no2
     *
     * @param float $no2
     *
     * @return Pollution
     */
    public function setNo2($no2)
    {
        $this->no2 = $no2;

        return $this;
    }

    /**
     * Get no2
     *
     * @return float
     */
    public function getNo2()
    {
        return $this->no2;
    }
}
