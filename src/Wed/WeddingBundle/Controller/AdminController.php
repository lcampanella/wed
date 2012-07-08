<?php

namespace Wed\WeddingBundle\Controller;

use Wed\WeddingBundle\Entity\User;
use Wed\WeddingBundle\Entity\Role;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
 
class AdminController extends Controller
{
    public function indexAction()
    {
        return $this->render('WedWeddingBundle:Admin:index.html.php');
    }
    
    public function guestsListAction()
    {
        $em = $this->get('doctrine')->getEntityManager();
        $users = $em->getRepository('WedWeddingBundle:User')->getUsers();
        
        return $this->render(
            'WedWeddingBundle:Admin:listUsers.html.php',
            array(
                'users' => $users
            )
        );
    }
    
    public function editGuestAction($id)
    {
        if (!empty($id)) {
            return $this->render('WedWeddingBundle:Admin:editguest.html.php', array('ownerId'=>$id));
        }
    }
    
    public function guestsSaveAction()
    {
        $em = $this->get('doctrine')->getEntityManager();

        $request = $this->getRequest()->request;
        $ownerId = $request->get('ownerId');
        $guests = $request->get('guest');
        $firstnames = $request->get('firstname');
        $lastnames = $request->get('lastname');

        foreach ($guests as $key => $dummy) {
            $guestData[] = array(
                'userId'=>$ownerId,
                'firstname'=>$firstnames[$key],
                'lastname'=>$lastnames[$key],
                'email'=>'asd@asd.com'
            );
        }
        $em->getRepository('WedWeddingBundle:Guest')->createGuests($guestData);

        exit;
//        $request->request;
//        var_dump($request->request);
//        $em = $this->get('doctrine')->getEntityManager();
//        $users = $em->getRepository('WedWeddingBundle:User')->getUsers();
//
//        return $this->render(
//            'WedWeddingBundle:Admin:listUsers.html.php',
//            array(
//                'users' => $users
//            )
//        );
    }

    public function usersListAction()
    {
        $em = $this->get('doctrine')->getEntityManager();
        $users = $em->getRepository('WedWeddingBundle:User')->getUsers();

        return $this->render(
            'WedWeddingBundle:Admin:listUsers.html.php',
            array(
                 'users' => $users
            )
        );
    }

    public function editUserAction($id, $errors)
    {
        return $this->render('WedWeddingBundle:Admin:edituser.html.php', array('errors'=>$errors));
    }

    public function usersSaveAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        // Create user
        $message = $this->createUser($this->getRequest()->request, $em);

        try {
//            $em->flush();
//            $this->get('session')->setFlash('notice', $message);
        } catch (\PDOException $e) {
//            $message = $e->getMessage();
//            $this->get('session')->setFlash('notice', $message);
//            $this->forward('WedWeddingBundle:Admin:editUser', array('id'=>null));
        }
//        $this->get('session')->setFlash('notice', $message);

        return $this->forward('WedWeddingBundle:Admin:editUser', array('id'=>null, 'errors'=>$message));
    }

    private function generateRandomPassword()
    {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, strlen($alphabet)-1);
            $pass[$i] = $alphabet[$n];
        }
        return implode($pass);
    }

    private function isRoleCreated($name)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $role = $em->getRepository('WedWeddingBundle:Role')->findOneByName($name);

        if (!empty($role)) {
            return true;
        }

        return false;
    }

    private function createRoleUser($roleName, $em)
    {
        if (!$this->isRoleCreated($roleName)) {
            $role = new Role();
            $role->setName($roleName);

            $em->persist($role);
        } else {
            $role = $em->getRepository('WedWeddingBundle:Role')->findOneByName($roleName);
        }

        return $role;
    }

    private function createUser($request, $em)
    {
        $lastname = $request->get('lastname');
        $firstname = $request->get('firstname');
        $email = $request->get('email');

//        foreach ($errors as $error) {
//            echo $error->getMessage().'<br />';
//        }

        // create the ROLE_USER role
        $role = $this->createRoleUser('ROLE_USER', $em);

        $user = new User();
        $user->setFirstname($firstname);
        $user->setLastname($lastname);
        $user->setSalt(md5(time()));
        $user->setEmail($email);
        $user->setIsActive('1');
        $password = $this->generateRandomPassword();
        $user->setPassword($password);

        $validator = $this->get('validator');
        $errors = $validator->validate($user);

        if (!empty($errors)) {
            return $errors;
        }

        $user->getUserRoles()->add($role);
        $em->persist($user);

        $message = 'Usuario creado exitosamente.';

        return $message;
    }
}
