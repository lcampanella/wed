<?php

namespace Wed\WeddingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GuestController extends Controller
{
    public function indexAction()
    {
        $securityContext = $this->get('security.context');
//        if (false === ($securityContext->isGranted('ROLE_ADMIN') || $securityContext->isGranted('ROLE_USER') )) {
//            return $this->redirect($this->generateUrl('_security_login'));
//        }
        $token = $securityContext->getToken();
        $user = $token->getUser();

        return $this->render('WedWeddingBundle:Guest:index.html.php', array('user'=>$user, 'dateLimitNotReached'=>$this->isConfirmationAllowed()));
    }

    public function confirmationAction()
    {
        $securityContext = $this->get('security.context');
        $token = $securityContext->getToken();
        $user = $token->getUser();

        $em = $this->get('doctrine')->getEntityManager();
        $guests = $em->getRepository('WedWeddingBundle:Guest')->getGuestsFullInfoByUserId($user->getId());

        if ($this->isConfirmationAllowed()) { // Confirmation allowed by date
            return $this->render('WedWeddingBundle:Guest:confirm.html.php', array('user'=>$user, 'guests'=>$guests));
        } else {  // If we reach the date limit for confirmation, show another view
            return $this->render('WedWeddingBundle:Guest:confirm-no-edition.html.php', array('user'=>$user, 'guests'=>$guests));
        }
    }

    public function chooseMenuAction()
    {
        $securityContext = $this->get('security.context');
        $token = $securityContext->getToken();
        $user = $token->getUser();

        $em = $this->get('doctrine')->getEntityManager();
        $guests = $em->getRepository('WedWeddingBundle:Guest')->getGuestsFullInfoByUserId($user->getId());
        $menues = $em->getRepository('WedWeddingBundle:Menu')->findAll();

        if ($this->isConfirmationAllowed()) { // Confirmation allowed by date
            return $this->render('WedWeddingBundle:Guest:choose-menu.html.php', array('user'=>$user, 'guests'=>$guests, 'menues'=>$menues));
        } else { // If we reach the date limit for confirmation, show another view
            return $this->render('WedWeddingBundle:Guest:choose-menu-no-edition.html.php', array('user'=>$user, 'guests'=>$guests, 'menues'=>$menues));
        }
    }

    public function saveMenuAction()
    {
        if (!$this->isConfirmationAllowed()) { // If we reach the date limit for confirmation
            $return = array("responseCode"=>500,  "notice"=>'too late my little friend.');
            $return = json_encode($return);
            return new \Symfony\Component\HttpFoundation\Response($return,200,array('Content-Type'=>'application/json'));
        }

        try {
            $em = $this->updateGuestsMenu();
            $em->flush();
            $return = array("responseCode"=>200,  "notice"=>'La informaci&oacuten fue enviada con &eacutexito.');
        } catch (\Exception $e) {
            $message = $e->getMessage();
            $return = array("responseCode"=>500,  "notice"=>'Se ha producido un error al intentar enviar la informaci&oacuten.');
        }

        $return = json_encode($return);
        return new \Symfony\Component\HttpFoundation\Response($return,200,array('Content-Type'=>'application/json'));
    }

    public function saveConfirmationAction()
    {
        if (!$this->isConfirmationAllowed()) { // If we reach the date limit for confirmation
            $return = array("responseCode"=>500,  "notice"=>'too late my little friend.');
            $return = json_encode($return);
            return new \Symfony\Component\HttpFoundation\Response($return,200,array('Content-Type'=>'application/json'));
        }

        $em = $this->updateGuestsConfirmation();

        try {
            $em->flush();
            $return = array("responseCode"=>200,  "notice"=>'La informaci&oacuten fue enviada con &eacutexito.');
        } catch (\PDOException $e) {
            $message = $e->getMessage();
            $return = array("responseCode"=>500,  "notice"=>'Se ha producido un error al intentar enviar la informaci&oacuten.');
        }

        $return = json_encode($return);
        return new \Symfony\Component\HttpFoundation\Response($return,200,array('Content-Type'=>'application/json'));
    }

    private function updateGuestsConfirmation()
    {
        $em = $this->get('doctrine')->getEntityManager();
        $parameters = $this->getRequest()->request->all();
        // Get logged in user
        $loggedUserId = $this->get('security.context')->getToken()->getUser()->getId();

        foreach ($parameters as $param_name => $param_val) {
            list($fieldName, $guestId) = explode('_', $param_name);
            $confirmed = (bool)$param_val;
            if ($fieldName == 'confirmed') {
                continue;
            }
            $guest = $em->getRepository('WedWeddingBundle:Guest')->findOneById($guestId);
            if (empty($guest) || $guest->getUser()->getId()!=$loggedUserId) {
                throw new \Exception('El invitado con id '.$guestId.' no existe.');
            }
            $guest->setConfirmed($confirmed);

            $em->persist($guest);
        }

        return $em;
    }

    private function updateGuestsMenu()
    {
        $em = $this->get('doctrine')->getEntityManager();
        $parameters = $this->getRequest()->request->all();
        // Get logged in user
        $loggedUserId = $this->get('security.context')->getToken()->getUser()->getId();

        foreach ($parameters as $param_name => $param_val) {
            list($fieldName, $guestId) = explode('_', $param_name);
            $guest = $em->getRepository('WedWeddingBundle:Guest')->findOneById($guestId);
            if (empty($guest) || $guest->getUser()->getId()!=$loggedUserId) {
                throw new \Exception('El invitado con id '.$guestId.' no existe.');
            }
            $menu = $em->getRepository('WedWeddingBundle:Menu')->findOneById($param_val);
            if (empty($menu)) {
                throw new \Exception('El menu con id '.$param_val.' no existe.');
            }
            $guest->setMenu($menu);

            $em->persist($guest);
        }

        return $em;
    }

    private function isConfirmationAllowed()
    {
        // Date limit for confirmation (september 1st)
        $timeLimitDate = strtotime(date('2012-09-01 00:00:00'));
        // Current date
        $timeCurrentDate = strtotime(date('Y-m-d H:i:s'));

        if ($timeCurrentDate >= $timeLimitDate) { // If we reach the date limit for confirmation
            return false;
        }

        return true;
    }
}
