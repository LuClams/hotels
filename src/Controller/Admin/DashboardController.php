<?php

namespace App\Controller\Admin;

use App\Entity\Booking;
use App\Entity\Contact;
use App\Entity\Hostel;
use App\Entity\Room;
use App\Entity\Slideimage;
use App\Entity\Supervisor;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        //return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
         $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
         return $this->redirect($adminUrlGenerator->setController(HostelCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Hostel');
    }

    public function configureMenuItems(): iterable
    {
        //yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
        yield MenuItem::linktoRoute('Back to the website', 'fas fa-home', 'app_home');
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

        yield MenuItem::section('Management');
        yield MenuItem::linkToCrud('Managers', 'fa fa-file-text', Supervisor::class)
            ->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Contact Form', 'fa fa-user', Contact::class);

        yield MenuItem::section('Users');
            yield MenuItem::linkToCrud('Users', 'fa fa-comment', User::class)
                ->setPermission('ROLE_ADMIN');
            yield MenuItem::linkToCrud('Bookings', 'fa fa-user', Booking::class);

        yield MenuItem::section('Hostel Group');
        yield MenuItem::linkToCrud('Hostels', 'fa fa-comment', Hostel::class)
            ->setPermission('ROLE_ADMIN');
        yield MenuItem::subMenu('Mon Hotel', 'fa fa-article')->setSubItems([
            MenuItem::linkToCrud('Westeen', 'fa fa-tags', Hostel::class)
                ->setAction('detail')
                ->setEntityId(1)
                ->setPermission('ROLE_SUPERVISOR_WESTEEN'),
            MenuItem::linkToCrud('Hyatt', 'fa fa-file-text', Hostel::class)
                ->setAction('detail')
                ->setEntityId(2)
                ->setPermission('ROLE_SUPERVISOR_HYATT'),
            MenuItem::linkToCrud('Cap', 'fa fa-comment', Hostel::class)
                ->setAction('detail')
                ->setEntityId(3)
                ->setPermission('ROLE_SUPERVISOR_CAP'),
            MenuItem::linkToCrud('Ibis', 'fa fa-tags', Hostel::class)
                ->setAction('detail')
                ->setEntityId(4)
                ->setPermission('ROLE_SUPERVISOR_IBIS'),
            MenuItem::linkToCrud('Hotel-V', 'fa fa-file-text', Hostel::class)
                ->setAction('detail')
                ->setEntityId(5)
                ->setPermission('ROLE_SUPERVISOR_HOTELV'),
            MenuItem::linkToCrud('Jazzy', 'fa fa-comment', Hostel::class)
                ->setAction('detail')
                ->setEntityId(6)
                ->setPermission('ROLE_SUPERVISOR_JAZZY'),
            MenuItem::linkToCrud('Yadel', 'fa fa-comment', Hostel::class)
                ->setAction('detail')
                ->setEntityId(7)
                ->setPermission('ROLE_SUPERVISOR_YADEL'),
            ]);

        yield MenuItem::linkToCrud('Rooms', 'fa fa-comment', Room::class)
            ->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('images', 'fa fa-comment', Slideimage::class)
            ->setPermission('ROLE_ADMIN');

    }
}
