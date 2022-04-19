<?php

namespace App\DataFixtures;

use App\Entity\Ticket;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        for($i = 1; $i <= 80; $i++){
            $ticket = new Ticket();
            $ticket->setOpenedBy('email.'.$i.'@edu.devinci.fr');
            $ticket->setFile('public/file/tickets/ticket-'.$i);
            $ticket->setIsHandled(false);
            $ticket->setCreatedAt(new \DateTime());
            $manager->persist($ticket);
        }
        $manager->flush();
    }
}
