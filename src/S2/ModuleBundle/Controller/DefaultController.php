<?php

namespace S2\ModuleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {

        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('S2ModuleBundle:Module');
        $module = $repo->findOneBy(array(
            'name'=>str_replace("-"," ",$name),
        ));
        return $this->render('S2ModuleBundle:Default:index.html.twig', array('module' => $module));
    }
}
