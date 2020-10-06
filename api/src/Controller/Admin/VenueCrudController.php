<?php

namespace App\Controller\Admin;

use App\Entity\Venue;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class VenueCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Venue::class;
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
