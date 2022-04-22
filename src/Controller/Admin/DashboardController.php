<?php

namespace App\Controller\Admin;

use App\Entity\Posts;
use App\Entity\Projects;
use App\Entity\Tickets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        //$adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(PostsCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Creativ Lab');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

        yield MenuItem::section('Posts & Projets');
        yield MenuItem::linkToCrud('Posts', 'fa fa-home', Posts::class);
        yield MenuItem::linkToCrud('Projets', 'fa fa-home', Projects::class);

        yield MenuItem::section('Tickets');
        yield MenuItem::linkToCrud('Tickets', 'fa fa-home', Tickets::class);

        yield MenuItem::section('Utilitaires');
        yield MenuItem::linkToRoute('Back to Home', 'fa fa-home', 'index');
        yield MenuItem::linkToLogout('Déconnexion', 'fa fa-home');
    }
}
