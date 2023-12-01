<?php

namespace App\DataFixtures;

use App\Entity\Tag;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class TagFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        for ($i = 0; $i < 50; $i++) {
            $tag = new Tag();
            $tag->setName($faker->jobTitle);

            $manager->persist($tag);

            $this->addReference('tag_' . $i, $tag);
        }

        $manager->flush();
    }
}
