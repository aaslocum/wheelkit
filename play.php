<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Debug\Debug;


$loader = require_once __DIR__.'/app/bootstrap.php.cache';
Debug::enable();

require_once __DIR__.'/app/AppKernel.php';

$kernel = new AppKernel('dev', true);
$kernel->loadClassCache();
$request = Request::createFromGlobals();
$kernel->boot();

$container = $kernel->getContainer();
$container->enterScope('request');
$container->set('request', $request);

//setup done

$templating = $container->get('templating');

$em = $container->get('doctrine')->getManager();
$repo = $em->getRepository('S2ModuleBundle:Module');
$module = $repo->findOneBy(array(
    'name'=>'Danny goes biking',
));
echo $templating->render('S2ModuleBundle:Default:index.html.twig', array('module' => $module));

