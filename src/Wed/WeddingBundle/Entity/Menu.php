<?php

namespace Wed\WeddingBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Wed\WeddingBundle\Entity\Menu
 *
 * @ORM\Entity(repositoryClass="Wed\WeddingBundle\Entity\MenuRepository")
 * @ORM\Table(name="menues")
  */
class Menu
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     */
    private $name;

    /**
     * @var \Wed\WeddingBundle\Entity\Guest $guest
     *
     * @ORM\OneToMany(targetEntity="Wed\WeddingBundle\Entity\Guest", mappedBy="menu")
     */
    private $guests;

    public function __construct()
    {
        $this->guests = new ArrayCollection();
    }

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
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
}