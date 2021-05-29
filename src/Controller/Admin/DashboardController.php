<?php

namespace App\Controller\Admin;

use App\Entity\Equipment;
use App\Entity\FunctionalUnit;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;
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
        $routeBuilder = $this->get(CrudUrlGenerator::class)->build();
        $url = $routeBuilder->setController(EquipmentCrudController::class)->generateUrl();
        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Tpr');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoRoute('Dashboard', 'fa fa-home' ,'home');
        yield MenuItem::linkToDashboard('Equipment', 'fas fa-cog', Equipment::class);
        yield MenuItem::linkToDashboard('FunctionalUnit', 'fa fa-bar-chart', FunctionalUnit::class);
        yield MenuItem::linkToDashboard('GroupParameter', 'fas fa-users', GroupParameter::class);
    }
}
