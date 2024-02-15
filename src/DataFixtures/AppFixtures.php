<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
     
    }

    public function load(ObjectManager $manager): void
    {

        $user = new User();

        

        $user->setUsername("NotChris")
            ->setPassword($this->passwordHasher->hashPassword($user, '123'));

      
        // $product = new Product();
        $manager->persist($user);

        $manager->flush();
    }
}
