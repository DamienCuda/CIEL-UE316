<?php

namespace App\Controller\Admin;
use App\Entity\Categories;
use App\Entity\Page;
use App\Entity\User;
use App\Entity\Product;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('CIEL UE316');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::section('Home');
        yield MenuItem::linkToRoute('Site', 'fa fa-home', 'app_home');
        yield MenuItem::section('Admin');
        yield MenuItem::linkToCrud('Gestion des catégories', 'fas fa-list', Categories::class);
        yield MenuItem::linkToCrud('Gestion des pages', 'fas fa-newspaper', Page::class);
        yield MenuItem::linkToCrud('Gestion des Produit', 'fas fa-users', Product::class);
        yield MenuItem::linkToCrud('Gestion des utilisteur', 'fas fa-users', User::class);
    }
}
