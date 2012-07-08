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

    public function createUser($data)
    {
        // create the ROLE_ADMIN role
        $role = new Role();
        $role->setName('ROLE_USER');

        $this->manager->persist($role);

        // create a user
        $user = new User();
        $user->setFirstname($data['firstname']);
        $user->setLastname($data['lastname']);
        $user->setSalt(md5(time()));
        $user->setEmail($data['email']);
        $user->setIsActive('1');

        // encode and set the password for the user,
        // these settings match our config
        $encoder = new MessageDigestPasswordEncoder('sha512', true, 10);
        $password = $encoder->encodePassword($this->generateRandomPassword(), $user->getSalt());
        $user->setPassword($password);

        $user->getUserRoles()->add($role);

        $this->manager->persist($user);

        $this->manager->flush();
    }
}