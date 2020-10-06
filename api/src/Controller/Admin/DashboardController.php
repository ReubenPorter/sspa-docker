<?php

namespace App\Controller\Admin;

use App\Entity\SspaClass;
use App\Entity\Testimonial;
use App\Entity\Tutor;
use App\Entity\TutorType;
use App\Entity\Venue;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('SSPA');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');

        yield MenuItem::section('Classes');
        yield MenuItem::linkToCrud('Classes', 'fas fa-users', SspaClass::class);
        yield MenuItem::linkToCrud('Venues', 'fas fa-location-arrow', Venue::class);

        yield MenuItem::section('Tutors');
        yield MenuItem::linkToCrud('Tutors', 'fas fa-user', Tutor::class);
        yield MenuItem::linkToCrud('Tutor type', 'fas fa-user', TutorType::class);

        yield MenuItem::section('Testimonials');
        yield MenuItem::linkToCrud('Testimonials', 'fas fa-comments', Testimonial::class);
    }
}
