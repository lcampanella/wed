<?php

namespace Wed\WeddingBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * Description of GuestRepository
 *
 */
class GuestRepository extends EntityRepository
{
    public function getGuestsByUserId($id)
    {
        $qb = $this->createQueryBuilder('g');
        $qb->select('g')
            ->where('g.user_id = :user_id')
                ->setParameter('user_id', $id)
            ->orderBy('g.lastname', 'ASC');

        return $qb->getQuery()->getResult();
    }
}