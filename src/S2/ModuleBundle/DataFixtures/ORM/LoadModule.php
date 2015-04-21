<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 4/20/15
 * Time: 12:48 PM
 */

namespace S2\ModuleBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use S2\ModuleBundle\Entity\Module;

class LoadModule implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $module1 = new Module();
        $module1->setName('Earl\'s Birthday Party');
        $module1->setYoutubeId('anRkutaPS9w');
        $module1->setDescription('4/20 @ the TLA');
        $manager->persist($module1);

        $module2 = new Module();
        $module2->setName('Earl\'s Birthday Party');
        $module2->setYoutubeId('anRkutaPS9w');
        $module2->setDescription('4/20 @ the TLA');
        $manager->persist($module2);

        $manager->flush();
    }
}
