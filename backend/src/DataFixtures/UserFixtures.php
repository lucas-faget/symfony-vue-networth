<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        for ($i = 0; $i < 100; $i++) {
            $user = new User();
            $user
                ->setFirstname($faker->firstName)
                ->setLastname($faker->lastName)
                ->setEmail($faker->email)
                ->setTitle($faker->jobTitle)
                ->setProfileImage(random_int(1, 16) . '.svg');

            $tagCount = random_int(1, 10);
            for ($j = 0; $j < $tagCount; $j++) {
                $user->addTag($this->getReference('tag_' . random_int(0, 49)));
            }

            $manager->persist($user);
        }

        $manager->flush();
    }
}
