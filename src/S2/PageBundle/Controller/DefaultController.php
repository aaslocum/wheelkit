<?php

namespace S2\PageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($title)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('S2PageBundle:InfoPage');
        $infopage = $repo->findOneBy(array(
            'title'=>str_replace("-"," ",$title),
        ));
        return $this->render('S2PageBundle:Default:index.html.twig', array('page' => $infopage));

    }
}
