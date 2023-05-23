<?php

namespace App\DataFixtures;

use App\Entity\Musiques;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        for($i = 1 ; $i <= 10 ; $i++){
            $musique = new Musiques();

            $musique->setNom('gregory Isaacs');
            $musique->setAlbum('Best of');
            $musique->setReference('456');
            $musique->setPrix('15');
            $musique->setImg('img.jpg');
            $musique->setLabel('Trojan records');

            $manager->persist($musique);
            $manager->flush();
        }
    }
}
