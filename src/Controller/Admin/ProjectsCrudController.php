<?php

namespace App\Controller\Admin;

use App\Entity\Projects;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ProjectsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Projects::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm()
                ->hideOnDetail(),
            TextField::new('name'),
            ArrayField::new('contributors'),
            ImageField::new('main_picture')
                ->setUploadDir('./public/assets/projects/main')
                ->setBasePath('/assets/projects')
                ->setUploadedFileNamePattern('.[extension]')
                ->setFormTypeOptions([
                    'attr' => [
                        'accept' => 'image/jpeg, image/png, image/jpg'
                    ]
                ]),
            TextEditorField::new('description')
                ->setNumOfRows(80)
                ->setColumns(50)
                ->hideOnIndex(),
        ];
    }
}
