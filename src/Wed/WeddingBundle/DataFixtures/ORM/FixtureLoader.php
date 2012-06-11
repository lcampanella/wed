<?php

namespace Wed\WeddingBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Wed\WeddingBundle\Entity\User;
use Wed\WeddingBundle\Entity\Role;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;
 
class FixtureLoader implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // create the ROLE_ADMIN role
        $role = new Role();
        $role->setName('ROLE_ADMIN');
 
        $manager->persist($role);
        
        // create a user
        $user = new User();
        $user->setUsername('test');
        $user->setSalt(md5(time()));
        $user->setEmail('test@test666.com');
        $user->setIsActive('1');
        
        // encode and set the password for the user,
        // these settings match our config
        $encoder = new MessageDigestPasswordEncoder('sha512', true, 10);
        $password = $encoder->encodePassword('test', $user->getSalt());
        $user->setPassword($password);
        
        $user->getUserRoles()->add($role);
 
        $manager->persist($user);
 
        $manager->flush();
    }
}