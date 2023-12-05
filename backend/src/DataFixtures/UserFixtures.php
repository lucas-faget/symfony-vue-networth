<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Post;
use App\Entity\Project;
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

            $postCount = random_int(1, 5);
            for ($k = 0; $k < $postCount; $k++) {
                $post = new Post();
                $post->setContent($faker->paragraphs(random_int(1, 5), true));
                $user->addPost($post);
                $manager->persist($post);
            }

            $projectCount = random_int(1, 3);
            for ($l = 0; $l < $projectCount; $l++) {
                $project = new Project();
                $project->setTitle($faker->catchPhrase());
                $project->setDescription($faker->paragraphs(random_int(1, 5), true));
                for ($j = 0; $j < $tagCount; $j++) {
                    $project->addTag($this->getReference('tag_' . random_int(0, 49)));
                }
                $user->addProject($project);
                $manager->persist($project);
            }

            $manager->persist($user);
        }

        $manager->flush();
    }
}
