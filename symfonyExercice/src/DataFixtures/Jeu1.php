<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Artist;
use App\Entity\Disc;
class Jeu1 extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $artist1 = new Artist();
        $artist2 = new Artist();

        $artist1->setName("Queens Of The Stone Age");
        $artist1->setUrl("https://qotsa.com/");
        $artist2->setName("Boss");
        $artist2->setUrl("https://www.youtube.com/watch?v=RCI3G7_FXRQ");

        
        $manager->persist($artist1);
        $manager->persist($artist2);


        $disc1 = new Disc();

        $disc1->setTitle("Songs for the Deaf");
        $disc1->setPicture("https://en.wikipedia.org/wiki/Songs_for_the_Deaf#/media/File:Queens_of_the_Stone_Age_-_Songs_for_the_Deaf.png");
        $disc1->setLabel("Interscope Records");

        $manager->persist($disc1);

        // Pour associer vos entités
        $artist1->addDisc($disc1);

        $manager->flush();

    }
}
