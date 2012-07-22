<?php

namespace Wed\WeddingBundle\Controller;

use Wed\WeddingBundle\Entity\User;
use Wed\WeddingBundle\Entity\Role;
use Wed\WeddingBundle\Entity\Guest;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
 
class AdminController extends Controller
{
    public function indexAction()
    {
        return $this->render('WedWeddingBundle:Admin:index.html.php');
    }
    
    /*public function guestsListAction()
    {
        $em = $this->get('doctrine')->getEntityManager();
        $users = $em->getRepository('WedWeddingBundle:User')->getUsers();

        return $this->render(
            'WedWeddingBundle:Admin:listUsers.html.php',
            array(
                'users' => $users
            )
        );
    }*/

    public function viewGuestsAction($id)
    {
        $em = $this->get('doctrine')->getEntityManager();
        $guests = $em->getRepository('WedWeddingBundle:Guest')->getGuestsFullInfoByUserId($id);
//        foreach ($guests as $guest) {
//            $bla = $guest;
//        }
//        exit;

        return $this->render('WedWeddingBundle:Admin:viewguest.html.php', array('ownerId'=>$id, 'guests'=>$guests));
    }
    
    public function editGuestAction($id, $errors)
    {
        if (empty($id)) {
            return $this->redirect($this->generateUrl('users_list'));
        } else {
            $em = $this->get('doctrine')->getEntityManager();
            $user = $em->getRepository('WedWeddingBundle:User')->findOneById($id);
            if (empty($user)) {
                return $this->redirect($this->generateUrl('users_list'));
            }
            $guests = $em->getRepository('WedWeddingBundle:Guest')->getGuestsByUserId($id);
        }

        return $this->render('WedWeddingBundle:Admin:editguest.html.php', array('ownerId'=>$id, 'errors'=>$errors, 'guests'=>$guests));
    }
    
    public function guestsSaveAction($id)
    {
        $em = $this->get('doctrine')->getEntityManager();

        $result = $this->createGuests($this->getRequest()->request, $em);

        try {
            $em->flush();
        } catch (\PDOException $e) {
            $message = $e->getMessage();
            $this->get('session')->setFlash('notice', $message);
            return $this->redirect($this->generateUrl('guests_edit'));
        }

        return $this->forward('WedWeddingBundle:Admin:editGuest', array('id'=>$id, 'errors'=>$result));
    }

    public function usersListAction()
    {
        $em = $this->get('doctrine')->getEntityManager();
        $users = $em->getRepository('WedWeddingBundle:User')->getUsers();

        /*$message = \Swift_Message::newInstance()
            ->setSubject('Mail Testing')
            ->setFrom('send@example.com')
            ->setReturnPath('luks01@gmail.com')
            ->setTo('asdlaonchadjahsuu7hsuhd@gmail.com')
//            ->setBcc(array('luks01@gmail.com','bs.sensei@gmail.com', 'oseando@hotmail.com', 'sk8_mza@yahoo.com.ar', 'solchumera@gmail.com'))
//            ->setBcc(array('bs.sensei@gmail.com', 'luks.infomail@gmail.com', 'sk8_mza@yahoo.com.ar'))
            ->setBcc(array('asdlaonchadjahsuu7hsuhd@gmail.com', 'asdlaonchadjahsuu7hsuhd@hotmail.com', 'asdlaonchadjahsuu7hsuhd@yahoo.com.ar'))
            ->setContentType("text/html")
            ->setBody($this->renderView('WedWeddingBundle:Admin:emailTemplate.html.php'))
        ;

        $sent = $this->get('mailer')->send($message, $failures);
        var_dump($sent);
        print_r($failures);*/

        return $this->render(
            'WedWeddingBundle:Admin:listUsers.html.php',
            array(
                 'users' => $users
            )
        );
    }

    public function editUserAction($id, $errors)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $user = $em->getRepository('WedWeddingBundle:User')->findOneById((!empty($id)?$id:0));

        return $this->render('WedWeddingBundle:Admin:edituser.html.php', array('user'=>$user, 'errors'=>$errors));
    }

    public function usersSaveAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $isEdit = $this->getRequest()->request->get('isEdit');
        $userId = $this->getRequest()->request->get('userId');

        // Create user
        $result = $this->createUser($this->getRequest()->request, $em);

        try {
            $em->flush();
            if ($isEdit && !empty($userId)) {
                return $this->redirect($this->generateUrl('users_list'));
            } else {
                return $this->forward('WedWeddingBundle:Admin:editUser', array('id'=>0, 'errors'=>$result));
            }
        } catch (\PDOException $e) {
            $message = $e->getMessage();
            $this->get('session')->setFlash('notice', $message);
            return $this->redirect($this->generateUrl('users_edit'));
        }

        return $this->forward('WedWeddingBundle:Admin:editUser', array('id'=>null, 'errors'=>$result));
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
        $isEdit = $request->get('isEdit');
        $userId = $request->get('userId');

        if (!empty($isEdit)) {
            $user = $em->getRepository('WedWeddingBundle:User')->findOneById($userId);
            $user->setFirstname($firstname);
            $user->setLastname($lastname);
            $user->setEmail($email);
        } else {
            // create the ROLE_USER role
            $role = $this->createRoleUser('ROLE_USER', $em);

            $user = new User();
            $user->setFirstname($firstname);
            $user->setLastname($lastname);
    //        $user->setSalt(md5(time()));
            $user->setEmail($email);
            $user->setIsActive('1');
    //        $encoder = new MessageDigestPasswordEncoder('sha512', true, 10);
    //        $password = $encoder->encodePassword($this->generateRandomPassword(), $user->getSalt());
            $password = $this->generateRandomPassword();
            $user->setPassword($password);

            $user->getUserRoles()->add($role);
        }

        $validator = $this->get('validator');
        $errors = $validator->validate($user);

        if ($errors->count()) {
            return array('message'=>'Se produjeron errores.', 'errors'=>$errors);
        }

        $em->persist($user);

        return array('message'=>'Usuario creado exitosamente.', 'errors'=>null);
    }

    private function createGuests($request, $em)
    {
        $ownerId = $request->get('ownerId');
        $guests = $request->get('guest', array());
        $guestsIds = $request->get('guestId', array());

        $user = $em->getRepository('WedWeddingBundle:User')->findOneById($ownerId);

        $existentGuests = $em->getRepository('WedWeddingBundle:Guest')->getGuestsByUserId($ownerId);

        foreach ($existentGuests as $guest) {
            if (!in_array($guest->getId(), $guestsIds)) {
                $em->remove($guest);
            }
        }

        $guestData = array();
        foreach ($guests as $key => $dummy) {
            $guestData[] = array(
                'id'        => (key_exists($key, $guestsIds)?$guestsIds[$key]:0),
                'firstname' => $request->get('firstname_'.($key+1)),
                'lastname'  => $request->get('lastname_'.($key+1))
            );
        }

        $validator = $this->get('validator');
        foreach ($guestData as $guest) {
            if (!empty($guest)) {
                $guestEntity = $em->getRepository('WedWeddingBundle:Guest')->findOneById($guest['id']);
                if (!empty($guestEntity)) { // Guest already asigned, lets update it
                    $guestEntity->setUser($user);
                    $guestEntity->setFirstname($guest['firstname']);
                    $guestEntity->setLastname($guest['lastname']);
                } else { // New guest, lets create it
                    // Set menu "Comun" as default for new guests
                    $menu = $em->getRepository('WedWeddingBundle:Menu')->findOneByName('Comun');

                    $guestEntity = new Guest();
                    $guestEntity->setUser($user);
                    $guestEntity->setFirstname($guest['firstname']);
                    $guestEntity->setLastname($guest['lastname']);
                    $guestEntity->setMenu($menu);
                }
                $errors = $validator->validate($guestEntity);

                if ($errors->count()) {
                    return array('message'=>'Se produjeron errores.', 'errors'=>$errors);
                }

                $em->persist($guestEntity);
            }
        }

        return array('message'=>'Invitados creados exitosamente.', 'errors'=>null);
    }
}