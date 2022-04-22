<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use App\Entity\Posts;
use App\Entity\Projects;
use App\Entity\ProjectType;
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

        for($i = 1; $i <= 50; $i++)
        {
            $posts = new Posts();
            $posts->setName('Article n°'.$i);
            $posts->setCreatedAt(New \DateTime());
            $posts->setUpdatedAt(New \DateTime());
            $posts->setAuthor("Creativ'Lab");
            $posts->setContent('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam elit lorem, eleifend at iaculis et, interdum non lorem. Sed sem erat, feugiat vel turpis eu, mollis cursus ante. Nulla sit amet quam non justo ultrices porta. Praesent vel arcu orci. Cras in interdum augue, ut finibus elit. Etiam ultrices dolor risus, sed interdum tortor rutrum eget. Maecenas pulvinar, dui in malesuada lacinia, eros nisl facilisis ligula, non finibus ante nisl rutrum eros. Pellentesque a condimentum eros. Mauris eget bibendum lorem. Aenean congue odio eget ante vulputate, id maximus nibh tincidunt. Phasellus at dui enim. Nunc varius mauris lorem, vel tincidunt augue posuere ut. Morbi varius convallis maximus. Mauris at vulputate elit. Nam sit amet purus efficitur, pharetra lacus at, vestibulum sapien.');
            $posts->setMainPicture('post-placeholder.png');
            $manager->persist($posts);
        }
        $manager->flush();

        $typeList = ['electronique', 'prototypage', '3D'];
        $contributor = ['Me', 'Myself', 'and I'];

        for ($j = 1; $j <= 3; $j++){
            $type = new ProjectType();
            $type->setName($typeList[$j - 1]);
            $manager->persist($type);
            for($g = 1; $g <= 5; $g ++)
            {
                $project = new Projects();
                $project->setName('Projet n°'.$g);
                $project->setMainPicture('project-placeholder.png');
                $project->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam elit lorem, eleifend at iaculis et, interdum non lorem. Sed sem erat, feugiat vel turpis eu, mollis cursus ante. Nulla sit amet quam non justo ultrices porta. Praesent vel arcu orci. Cras in interdum augue, ut finibus elit. Etiam ultrices dolor risus, sed interdum tortor rutrum eget. Maecenas pulvinar, dui in malesuada lacinia, eros nisl facilisis ligula, non finibus ante nisl rutrum eros. Pellentesque a condimentum eros. Mauris eget bibendum lorem. Aenean congue odio eget ante vulputate, id maximus nibh tincidunt. Phasellus at dui enim. Nunc varius mauris lorem, vel tincidunt augue posuere ut. Morbi varius convallis maximus. Mauris at vulputate elit. Nam sit amet purus efficitur, pharetra lacus at, vestibulum sapien.');
                $project->setContributors($contributor);
                $project->setType($type);
                $manager->persist($project);
            }
        }
        $manager->flush();
    }
}
