<?php

namespace App\DataFixtures;

use App\Entity\Affiliate;
use App\Entity\Category;
use App\Entity\Job;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

/**
 * Class AppFixtures
 * @package App\DataFixtures
 */
class AppFixtures extends Fixture
{

    /**
     * @param ObjectManager $em
     */
    public function load(ObjectManager $em)
    {
        $faker = Faker\Factory::create("fr_FR");

        // Categories
        $categories = [];
        for ($i = 0; $i < 5; $i++) {
            $category = new Category();
            $category->setName($faker->name);
            $em->persist($category);
            $categories[] = $category;
        }

        // Jobs
        for ($i = 0; $i < 30; $i++) {
            $job = new Job();
            $job->setPosition($faker->jobTitle);
            $job->setLocation(sprintf("%s, %s", $faker->country, $faker->city));
            $job->setCompany($faker->company);
            $job->setEmail($faker->companyEmail);
            $job->setDescription($faker->text());
            $job->setHowToApply($faker->text());
            $job->setUrl($faker->url);
            $job->setToken(md5(uniqid()));
            $job->setCategory($categories[array_rand($categories, 1)]);
            $job->setExpiresAt($faker->dateTime);
            $em->persist($job);
        }

        // Partners
        for ($i = 0; $i < 5; $i++) {
            $affiliate = new Affiliate();
            $affiliate->setEmail($faker->companyEmail);
            $affiliate->setUrl($faker->url);
            $affiliate->setToken(md5(uniqid()));
            $affiliate->addCategory($categories[array_rand($categories, 1)]);
            $em->persist($affiliate);
        }

        $em->flush();
    }
}