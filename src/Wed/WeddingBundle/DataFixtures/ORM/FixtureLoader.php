<?php

namespace Wed\WeddingBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Wed\WeddingBundle\Entity\User;
use Wed\WeddingBundle\Entity\Role;
use Wed\WeddingBundle\Entity\Menu;
use Wed\WeddingBundle\Entity\Guest;
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
        $user->setFirstname('testfirst');
        $user->setLastname('testlast');
//        $user->setSalt(md5(time()));
        $user->setEmail('test@test.com');
        $user->setIsActive('1');
        
        // encode and set the password for the user,
        // these settings match our config
//        $encoder = new MessageDigestPasswordEncoder('sha512', true, 10);
//        $password = $encoder->encodePassword('test', $user->getSalt());
        $password = 'test';
        $user->setPassword($password);
        
        $user->getUserRoles()->add($role);

        $manager->persist($user);

        $menu = new Menu();
        $menu->setName('Vegetariano');

        $manager->persist($menu);

        $menu2 = new Menu();
        $menu2->setName('Comun');

        $manager->persist($menu2);

        $guest = new Guest();
        $guest->setFirstname('firstname1');
        $guest->setLastname('lastname1');
        $guest->setMenu($menu2);
        $guest->setUser($user);

        $manager->persist($guest);

 
        $manager->flush();
    }
}