<?php

namespace NotSoFarAway\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Country
 *
 * @ORM\Table(name="country")
 * @ORM\Entity(repositoryClass="NotSoFarAway\ApiBundle\Repository\CountryRepository")
 */
class Country
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="flag_src", type="string", length=255)
     */
    private $flagSrc;


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
     * Set name
     *
     * @param string $name
     *
     * @return Country
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set flagSrc
     *
     * @param string $flagSrc
     *
     * @return Country
     */
    public function setFlagSrc($flagSrc)
    {
        $this->flagSrc = $flagSrc;

        return $this;
    }

    /**
     * Get flagSrc
     *
     * @return string
     */
    public function getFlagSrc()
    {
        return $this->flagSrc;
    }
}

