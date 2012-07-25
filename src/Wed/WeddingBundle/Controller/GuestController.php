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

        return $this->render('WedWeddingBundle:Guest:index.html.php', array('user'=>$user));
    }

    public function confirmationAction()
    {
        $securityContext = $this->get('security.context');
        $token = $securityContext->getToken();
        $user = $token->getUser();

        $em = $this->get('doctrine')->getEntityManager();
        $guests = $em->getRepository('WedWeddingBundle:Guest')->getGuestsFullInfoByUserId($user->getId());

        return $this->render('WedWeddingBundle:Guest:confirm.html.php', array('user'=>$user, 'guests'=>$guests));
    }

    public function chooseMenuAction()
    {
        $securityContext = $this->get('security.context');
        $token = $securityContext->getToken();
        $user = $token->getUser();

        $em = $this->get('doctrine')->getEntityManager();
        $guests = $em->getRepository('WedWeddingBundle:Guest')->getGuestsFullInfoByUserId($user->getId());
        $menues = $em->getRepository('WedWeddingBundle:Menu')->findAll();

        return $this->render('WedWeddingBundle:Guest:choose-menu.html.php', array('user'=>$user, 'guests'=>$guests, 'menues'=>$menues));
    }

    public function saveMenuAction()
    {
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

        foreach ($parameters as $param_name => $param_val) {
            list($fieldName, $guestId) = explode('_', $param_name);
            $confirmed = (bool)$param_val;
            if ($fieldName == 'confirmed') {
                continue;
            }
            $guest = $em->getRepository('WedWeddingBundle:Guest')->findOneById($guestId);
            if (empty($guest)) {
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

        foreach ($parameters as $param_name => $param_val) {
            list($fieldName, $guestId) = explode('_', $param_name);
            $guest = $em->getRepository('WedWeddingBundle:Guest')->findOneById($guestId);
            if (empty($guest)) {
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
}
