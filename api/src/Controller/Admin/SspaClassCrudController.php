<?php

namespace App\Controller\Admin;

use App\Entity\SspaClass;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class SspaClassCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SspaClass::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural('Classes')
            ->setEntityLabelInSingular('Class');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            Field::new('name'),
            BooleanField::new('active'),
            TimeField::new('startTime'),
            TimeField::new('endTime'),
            IntegerField::new('minAge')->hideOnIndex(),
            IntegerField::new('maxAge')->hideOnIndex(),
            TextareaField::new('shortDescription')->hideOnIndex(),
            TextEditorField::new('fullDescription')->hideOnIndex(),
            TextEditorField::new('sessionFocus')->hideOnIndex(),

            MoneyField::new('pricePerLesson', 'Price per lesson £')->setCurrency('GBP')->setStoredAsCents(false),
            MoneyField::new('pricePerTerm', 'Price per term £')->setCurrency('GBP')->setStoredAsCents(false),
            MoneyField::new('pricePerYear', 'Price per year £')->setCurrency('GBP')->setStoredAsCents(false),

            AssociationField::new('venue')->hideOnIndex(),

            Field::new('imageName')->hideOnIndex(),
            ImageField::new('imageFile')->setBasePath('/images/classes/')->setFormType(VichImageType::class)->hideOnIndex(),
        ];
    }
}
