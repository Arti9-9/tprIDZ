<?php

namespace App\Controller\Admin;

use App\Entity\Equipment;
use App\Entity\FunctionalUnit;
use App\Entity\GroupParameter;
use App\Entity\Reliabilities;
use App\Entity\ReliabilitiesIGrP;
use App\Entity\TechicalIndexs;
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
            ->setTitle('ИДЗ ТПР');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToCrud('Оборудование', 'fas fa-cog', Equipment::class);
        yield MenuItem::linkToCrud('Тех. индекс', 'fas fa-cog', TechicalIndexs::class);
        yield MenuItem::linkToCrud('Вероятность Рэо', 'fas fa-cog', Reliabilities::class);
        yield MenuItem::linkToCrud('Функциональный узел', 'fa fa-bar-chart', FunctionalUnit::class);
        yield MenuItem::linkTocrud('Параметры группы', 'fas fa-users', GroupParameter::class);
        yield MenuItem::linkToCrud('Вероятность Руэо', 'fas fa-cog', ReliabilitiesIGrP::class);
        yield MenuItem::linktoRoute('Вернуться на гл. страницу', 'fa fa-home' ,'home');
    }
}
