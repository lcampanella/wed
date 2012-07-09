<?php

namespace Wed\WeddingBundle\Entity;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityRepository;

/**
 * Description of UserRepository
 *
 */
class UserRepository extends EntityRepository
{
    private $manager;

    public function getUsers()
    {
        $qb = $this->createQueryBuilder('u');
        $qb->select('u')
//                ->from('Wed\WeddingBundle\Entity\User', 'u')
                ->orderBy('u.lastname', 'ASC');

        return $qb->getQuery()->getResult();
    }
}