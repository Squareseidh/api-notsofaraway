<?php

namespace NotSoFarAway\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 *
 * @ORM\Table(name="article")
 * @ORM\Entity(repositoryClass="NotSoFarAway\ApiBundle\Repository\ArticleRepository")
 */
class Article
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="publish_time", type="date")
     */
    private $publishTime;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @ORM\ManyToOne(targetEntity="NotSoFarAway\ApiBundle\Entity\Country")
     * @ORM\JoinColumn(nullable=false)
     */
    private $country;

    /**
     * @ORM\ManyToOne(targetEntity="NotSoFarAway\ApiBundle\Entity\Author")
     * @ORM\JoinColumn(nullable=false)
     */
    private $author;

    /**
     * @var string
     *
     * @ORM\Column(name="link", type="string", length=255)
     */
    private $link;

    /**
     * @var string
     *
     * @ORM\Column(name="image_src", type="string", length=255)
     */
    private $imageSrc;

    /**
     * @var integer
     *
     * @ORM\Column(name="divergents", type="integer")
     */
    private $divergents;


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
     * Set title
     *
     * @param string $title
     *
     * @return Article
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set publishTime
     *
     * @param \DateTime $publishTime
     *
     * @return Article
     */
    public function setPublishTime($publishTime)
    {
        $this->publishTime = $publishTime;

        return $this;
    }

    /**
     * Get publishTime
     *
     * @return \DateTime
     */
    public function getPublishTime()
    {
        return $this->publishTime;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Article
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set link
     *
     * @param string $link
     *
     * @return Article
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set imageSrc
     *
     * @param string $imageSrc
     *
     * @return Article
     */
    public function setImageSrc($imageSrc)
    {
        $this->imageSrc = $imageSrc;

        return $this;
    }

    /**
     * Get imageSrc
     *
     * @return string
     */
    public function getImageSrc()
    {
        return $this->imageSrc;
    }

    /**
     * Set country
     *
     * @param \NotSoFarAway\ApiBundle\Entity\Country $country
     *
     * @return Article
     */
    public function setCountry(\NotSoFarAway\ApiBundle\Entity\Country $country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \NotSoFarAway\ApiBundle\Entity\Country
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set author
     *
     * @param \NotSoFarAway\ApiBundle\Entity\Author $author
     *
     * @return Article
     */
    public function setAuthor(\NotSoFarAway\ApiBundle\Entity\Author $author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return \NotSoFarAway\ApiBundle\Entity\Author
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set divergents
     *
     * @param integer $divergents
     *
     * @return Article
     */
    public function setDivergents($divergents)
    {
        $this->divergents = $divergents;

        return $this;
    }

    /**
     * Get divergents
     *
     * @return integer
     */
    public function getDivergents()
    {
        return $this->divergents;
    }
}
