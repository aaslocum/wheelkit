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
use S2\PageBundle\Entity\InfoPage;

class LoadInfoPage implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $page1 = new InfoPage();
        $page1->setTitle('Open to Buy');
        $page1->setImage('https://s3.amazonaws.com/wtkmarketing/OTB.png');
        $page1->setContent('<ul><li>Dashboard features department health analysis, future 90 day analysis, high level quick stats, and areas of concern.</li>
<li>Report evaluates department overall health as well as each individual category and sub category health</li>
<li>Analysis of: 90 day and 365 day trend, inventory aging, min/max, inventory balancing, rolling 3 and 12 month turn rates, incoming inventory effect on current OTB position</li>
<li>Estimated adjusted fill in amount in both dollar and units for OTB</li></ul> ');
        $manager->persist($page1);

        $page2 = new InfoPage();
        $page2->setTitle('Sales Report');
        $page2->setImage('https://s3.amazonaws.com/wtkmarketing/SR1.png');
        $page2->setContent('<ul><li>Report displays key sales metrics by category, brand and/or consolidated across all SKUS. Available per location or consolidated across all business units.</li>
<li>Report shows current data compared to goal, 3 year average, last year and stretch goal.</li>
<li>Dashboard snapshots a 5-day range of daily sales and also features the same month-to-date, monthly, and year-to-date metrics mentioned above</li>
<li>Sales snapshot features each location actual sales and margin dollars as compared to LY, 3-year average, goal and stretch in a month-to-date and year-to-date view</li></ul> ');
        $manager->persist($page2);

        $page3 = new InfoPage();
        $page3->setTitle('Vendor Performance');
        $page3->setImage('https://s3.amazonaws.com/wtkmarketing/VP1.png');
        $page3->setContent('<ul><li>Compare vendor performance within a category</li>
<li>Compare vendor performance against each other as they compete for your business</li>
<li>Evaluate vendor performance against the store average within a category</li>
<li>Customize the date range of data, as well as comparison range</li></ul> ');
        $manager->persist($page3);

        $page3 = new InfoPage();
        $page3->setTitle('Staff');
        $page3->setImage('https://s3.amazonaws.com/wtkmarketing/ST1.png');
        $page3->setContent('<ul><li>Time clock management for a multi-store operation from a single location, as opposed to management of each store from the server</li>
<li>Alerts for clock-in/clock-out errors, schedulable payroll summary emails by location</li>
<li>Commission report can be show with time clock report or on its own</li>
<li>Customizable commission parameters; commissions can be percentage, or fixed-dollar based on a predetermined event </li></ul>');
        $manager->persist($page3);
        $manager->flush();
    }
}
