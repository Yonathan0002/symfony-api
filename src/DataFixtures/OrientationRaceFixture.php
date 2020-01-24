<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

use App\Entity\OrientationRace;
use Faker\Factory;
class OrientationRaceFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR'); // create a French faker
        //$generator = \Faker\Factory::create();
        $tableauCourse = ["URCA", "Montagne de Reims", "Paris", "Parc de champagne"];
        $dateActuel = new \DateTime("NOW");
 
        $yeardatedebut =  2013;
        $yeardatefin =  2020;
        foreach($tableauCourse as $course)
        {  
            for($i = $yeardatedebut; $i <= $yeardatefin; $i++){
                $OrientationRace = new OrientationRace();
                $date = $faker->dateTimeBetween("1 January ".strval($i),"31 December ".strval($i),null);
                $OrientationRace->setWillStartAt($date);
                $text = $faker->text($maxNbChars = 200);
                $OrientationRace->setDescription($text);
                if ($date > $dateActuel){
                    $OrientationRace->setIsClosed(false);
                }
                else {
                    $OrientationRace->setIsClosed(true);
                }
                $OrientationRace->setName($course." ".strval($i));
                
                $manager->persist($OrientationRace);    
            }
        }
        $manager->flush();
    }
}
