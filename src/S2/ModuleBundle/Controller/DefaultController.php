<?php

namespace S2\ModuleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('S2ModuleBundle:Default:index.html.twig', array('name' => $name));
    }
}
