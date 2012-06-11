<?php

namespace Wed\WeddingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class WeddingController extends Controller
{
    public function indexAction()
    {
        return $this->render('WedWeddingBundle:Wedding:index.html.twig');
    }
    
    public function welcomeAction()
    {
        return $this->render('WedWeddingBundle:Wedding:welcome.html.twig');
    }
}
