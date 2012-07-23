<?php
namespace Wed\WeddingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Wedding\WeddingBundle\Entity\Guest
 *
 * @ORM\Entity(repositoryClass="Wed\WeddingBundle\Entity\GuestRepository")
 * @ORM\Table(name="guests")
 */
class Guest
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $firstname
     *
     * @ORM\Column(name="firstname", type="string", length=50, nullable=false)
     */
    private $firstname;

    /**
     * @var string $lastname
     *
     * @ORM\Column(name="lastname", type="string", length=50, nullable=false)
     */
    private $lastname;

    /**
     * @var \Wed\WeddingBundle\Entity\Menu $menu
     *
     * @ORM\ManyToOne(targetEntity="Wed\WeddingBundle\Entity\Menu", inversedBy="guest")
     */
    private $menu;

    /**
     * @var \Wed\WeddingBundle\Entity\User $user
     *
     * @ORM\ManyToOne(targetEntity="Wed\WeddingBundle\Entity\User", inversedBy="guest")
     */
    private $user;

    /**
    * @var boolean $confirmed
    *
    * @ORM\Column(name="confirmed", type="boolean", nullable=false)
    */
    private $confirmed = false;

    public function __construct()
    {
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set confirmed
     *
     * @param boolean $confirmed
     */
    public function setConfirmed($confirmed)
    {
        $this->confirmed = $confirmed;
    }

    /**
     * Get confirmed
     *
     * @return boolean
     */
    public function getConfirmed()
    {
        return $this->confirmed;
    }

    public function getMenu()
    {
        return $this->menu;
    }

    public function setMenu(Menu $menu)
    {
        $this->menu = $menu;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser(User $user)
    {
        $this->user = $user;
    }

    public function getFullname()
    {
        $fullname = $this->lastname.' '.$this->firstname;
        return $fullname;
    }
}