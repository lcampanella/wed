<?php
namespace Wed\WeddingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Wedding\HomeBundle\Entity\Guests
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
     * @var integer $user_id
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     */
    private $user_id;

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
     * @var integer $menu_id
     *
     * @ORM\Column(name="menu_id", type="integer", nullable=true)
     */
    private $menu_id;

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
     * Get userId
     *
     * @return integer
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set userId
     *
     * @param integer $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
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
     * Get menu_id
     *
     * @return integer
     */
    public function getMenuId()
    {
        return $this->menu_id;
    }

    /**
     * Set menu_id
     *
     * @param integer $menu_id
     */
    public function setMenuId($menu_id)
    {
        $this->menu_id = $menu_id;
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
}