<?php

namespace Wed\WeddingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GuestController extends Controller
{
    public function indexAction()
    {
        $securityContext = $this->get('security.context');
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

    public function saveConfirmationAction()
    {
        /*$em = $this->updateGuestsConfirmation();

        try {
            $em->flush();
            return $this->redirect($this->generateUrl('guest_confirmation'));
        } catch (\PDOException $e) {
            $message = $e->getMessage();
            $this->get('session')->setFlash('notice', $message);
            return $this->redirect($this->generateUrl('guest_confirmation'));
        }*/

        $em = $this->updateGuestsConfirmation();

        try {
            $em->flush();
            $return = array("responseCode"=>200,  "notice"=>'La informaci&oacuten fue enviada con &eacutexito.');
        } catch (\PDOException $e) {
            $message = $e->getMessage();
            $return = array("responseCode"=>400,  "notice"=>'Fracaso!');
        }

        $return = json_encode($return);//json encode the array
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
            $guest->setConfirmed($confirmed);

            $em->persist($guest);
        }

        return $em;
    }
}
