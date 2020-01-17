<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

use App\DataFixtures\OrientationRace;
use Faker\Factory;
class OrientationRace extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR'); // create a French faker
        //$generator = \Faker\Factory::create();
        $tableauCourse = ["URCA", "Montagne de Reims", "Paris", "Parc de champagne"];
        $tableauDate = ["1st jannary 2013","janrary 31st 2013"];
        $OrientationRace = new \Faker\ORM\Propel\Populator($faker);
        $dateActuel = strtotime("now"); 
        
        foreach($tableauCourse as $course)
        {  
            $name = 
            $date = $faker->dateTimeBetween($tableauCourse[0],$tableauCourse[1]);
            $text = $faker->text($maxNbChars = 200);
            if ($date > $dateActuel){
                $Isclosed = false;
            }
            else {
                $Isclosed = true;
            }
        }
        $OrientationRace = new OrientationRace($name,$text,$date,$Isclosed);
        $manager->persist($product);

        $manager->flush();
    }
}
