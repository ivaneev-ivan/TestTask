<?php

namespace App\DataFixtures;

use App\Entity\Color;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ColorFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $red = (new Color())->setName("Красный");
        $blue = (new Color())->setName("Синий");
        $green = (new Color())->setName("Зеленый");
        $white = (new Color())->setName("Белый");

        $manager -> persist($red);
        $manager -> persist($blue);
        $manager -> persist($green);
        $manager -> persist($white);
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
