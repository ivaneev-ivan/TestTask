<?php

namespace App\DataFixtures;

use App\Entity\Shape;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ShapeFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $square = (new Shape())->setName("Квадрат");
        $rectangle = (new Shape())->setName("Прямоугольник");
        $triangle = (new Shape())->setName("Треугольник");

        $manager->persist($square);
        $manager->persist($rectangle);
        $manager->persist($triangle);

        $manager->flush();
    }
}
