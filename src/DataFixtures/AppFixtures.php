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

        $chris = new User();
        $chris->setUsername("NotChris")
            ->setPassword($this->passwordHasher->hashPassword($chris, '123'));
        $manager->persist($chris);
 
        $jonathan = new User();
        $jonathan->setUsername("NotJonathan")
            ->setPassword($this->passwordHasher->hashPassword($jonathan, '123456'));
        $manager->persist($jonathan);

        $manager->flush();
    }
}
