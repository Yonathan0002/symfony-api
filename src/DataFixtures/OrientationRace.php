<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class OrientationRace extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $tableauCourse = ["URCA", "Montagne de Reims", "Paris", "Parc de champagne"];
        $tableauDate = ["1st jannary 2013","janrary 31st 2013"];
        $OrientationRace = new
        $dateActuel = ; 
        // $product = new Product();
        $faker = Faker\Factory::create('fr_FR'); // create a French faker
        foreach($tableauCourse as $course)
        {  
            $date = $fake->dateTimeBetween()
            $text = $faker->text;
            if ($date > $dateActuel){
                $Isclosed = false
            }
            else {
                $Isclosed = true
            }
        }
        $manager->persist($product);

        $manager->flush();
    }
}
