<?php

namespace App\Controller\Admin;

use App\Entity\Testimonial;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class TestimonialCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Testimonial::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            Field::new('author'),
            Field::new('authorShortDescription'),
            TextEditorField::new('content'),
            Field::new('imageName')->hideOnIndex(),
            ImageField::new('imageFile')->setBasePath('/images/testimonials/')->setFormType(VichImageType::class)->hideOnIndex(),
        ];
    }

}
