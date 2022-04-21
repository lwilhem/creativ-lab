<?php

namespace App\Controller\Admin;

use App\Entity\Tickets;
use App\Repository\TicketsRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class TicketsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Tickets::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->showEntityActionsInlined();
    }

    public function configureActions(Actions $actions): Actions
    {
        $download = Action::new('download', 'téléchager', 'fa fa-file-invoice')
            ->setLabel(false)
            ->linkToCrudAction('download');

        return $actions
            ->disable(Action::NEW)
            ->add(Crud::PAGE_INDEX, $download)
            ->add(Crud::PAGE_INDEX, Action::DETAIL);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('openedBy'),
            BooleanField::new('isHandled'),
            DateTimeField::new('createdAt')->hideOnForm(),
            DateTimeField::new('ClosedAt')->hideOnForm(),
        ];
    }

    public function download(AdminContext $adminContext, TicketsRepository $ticketsRepository): BinaryFileResponse
    {
        $fileId = $adminContext->getRequest()->get('entityId');
        $tickets = $ticketsRepository->findOneBy(['id' => $fileId]);
        $filePath = $this->getParameter('kernel.project_dir').'/public/uploads/tickets/'.$tickets->getFile();
        return new BinaryFileResponse($filePath);
    }
}
