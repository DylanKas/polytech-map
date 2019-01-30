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


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

}
