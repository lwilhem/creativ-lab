<?php

namespace App\Controller\Admin;

use App\Entity\Posts;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PostsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Posts::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm()->setDisabled(),
            TextField::new('name')->setHelp('Post Title'),
            TextEditorField::new('content'),
            ImageField::new('main_picture')
                ->setBasePath('uploads/images')
                ->setUploadDir('assets/posts/main')
                ->setUploadedFileNamePattern('[year]/[month]/[day]/[slug]-[contenthash].[extension]')
        ];
    }
}
