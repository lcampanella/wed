<?php

namespace Wed\WeddingBundle\Controller;
 
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
 
class AdminController extends Controller
{
    public function indexAction()
    {
        return $this->render('WedWeddingBundle:Admin:index.html.twig');
    }
    
    public function editGuestAction()
    {
        return $this->render('WedWeddingBundle:Admin:editguest.html.php');
    }
}