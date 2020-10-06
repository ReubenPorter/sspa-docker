<?php

namespace App\Controller\Admin;

use App\Entity\Tutor;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AvatarField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class TutorCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Tutor::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            Field::new('name'),
            Field::new('jobTitle'),
            Field::new('shortDescription'),
            Field::new('fullDescription')->hideOnIndex(),
            Field::new('imageName')->hideOnIndex(),
            ImageField::new('imageFile')->setBasePath('/images/tutors/')->setFormType(VichImageType::class)->hideOnIndex(),
            AssociationField::new('tutorType')->setRequired(true)
        ];
    }
}
