<?php

namespace App\Controller\Admin;

use App\Entity\Tickets;
use App\Kernel;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TicketsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Tickets::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        $download = Action::new('Download', 'téléchager', 'fa fa-file-invoice')
            ->displayAsButton()
            ->linkToUrl(function (Tickets $entity){
                return $this->getParameter('ticket_directory').$entity->getFile();
            });

        return $actions
            ->add(Crud::PAGE_DETAIL, $download)
            ->disable(Action::EDIT, )
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ->remove(Crud::PAGE_INDEX, Action::NEW);

    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('openedBy'),
        ];
    }
}
