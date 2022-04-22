<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $passwordHasher)
    {

    }

    public function load(ObjectManager $manager): void
    {
        $admin = new Admin();
        $admin->setUsername("Creativ'Lab");
        $admin->setRoles(['ROLE_ADMIN']);
        $password = $this->passwordHasher->hashPassword($admin, 'password');
        $admin->setPassword($password);
        $manager->persist($admin);
        $manager->flush();
    }
}
