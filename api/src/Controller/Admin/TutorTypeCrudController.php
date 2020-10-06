<?php

namespace App\Controller\Admin;

use App\Entity\TutorType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TutorTypeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TutorType::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
