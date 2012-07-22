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
            ->where('g.user = :user_id')
                ->setParameter('user_id', $id)
            ->orderBy('g.lastname', 'ASC');

        return $qb->getQuery()->getResult();
    }

    public function getGuestsFullInfoByUserId($id)
    {
        /*$qb = $this->createQueryBuilder('g');
        $qb->select('g')
            ->innerJoin('g.menues', 'm', 'ON', 'm.id = g.menu_id')
            ->where('g.user_id = :user_id')
            ->setParameter('user_id', $id)
            ->orderBy('g.lastname', 'ASC');

        return $qb->getQuery()->getResult();*/


        $qb = $this->createQueryBuilder('g');
        $qb->select('g')
            ->leftJoin('g.menu', 'm')
            ->where('g.user = :user_id')
        ->setParameter('user_id', (int) $id)
        ->orderBy('g.lastname', 'ASC');

        // con getResult te devuelve un array de objetos. Con getArrayResult, un array de arrays
        return $qb->getQuery()->getResult();
    }
}