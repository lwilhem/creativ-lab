<?php

namespace App\Controller\Admin;

use App\Entity\Posts;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints\Image;

class PostsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Posts::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnIndex()
                ->hideOnForm(),
            TextField::new('author')
                ->hideWhenUpdating(),
            DateTimeField::new('createdAt')
                ->hideWhenUpdating()
                ->renderAsNativeWidget(),
            TextField::new('name')
                ->setHelp('Titre du posts'),
            TextEditorField::new('content')
                ->setNumOfRows(50)
                ->hideOnIndex(),
            ImageField::new('main_picture')
                ->setUploadDir('./public/assets/posts/main')
                ->setBasePath('/posts/images')
                ->setUploadedFileNamePattern('[slug]-[timestamp].[extension]')
                ->setFormTypeOptions([
                    'attr' => [
                        'accept' => 'image/jpeg, image/png, image/jpg'
                    ]
                ])
        ];
    }
}
