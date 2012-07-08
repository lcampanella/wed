<?php

namespace Wed\WeddingBundle\Entity;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityRepository;

/**
 * Description of GuestRepository
 *
 */
class GuestRepository extends EntityRepository
{
    private $manager;

    public function __construct(ObjectManager $manager){
        $this->manager = $manager; // todo VER SI ES CORRECTO HACER ESTO CON EL OBJECTMANAGER
    }

    public function createGuests($guests)
    {
        foreach ($guests as $guest) {
            if (!empty($guest)) {
                $newGuest = new Guest();
                $newGuest->setUserId($guest['userId']);
                $newGuest->setFirstname($guest['firstname']);
                $newGuest->setLastname($guest['lastname']);
                $newGuest->setEmail($guest['email']);
                $this->manager->persist($newGuest);
            }
        }
        $this->manager->flush();
    }
}