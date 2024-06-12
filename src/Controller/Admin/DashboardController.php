<?php

namespace App\Controller\Admin;

use App\Entity\Item;
use App\Entity\ItemImage;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Locale;
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

         return $this->render('admin/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Test Corp.')
            ->setFaviconPath('favicon.svg')
            ->setTextDirection('ltr')
            ->renderContentMaximized()
            ->renderSidebarMinimized()
            ->disableDarkMode()
            ->generateRelativeUrls()
            ->setLocales(['en', 'ru'])
            ->setLocales([
                'en' => '🇬🇧 English',
                'ru' => '🇵🇱 Russia'
            ])
            ->setLocales([
                'en', // locale without custom options
                Locale::new('ru', 'russia', 'far fa-language') // custom label and icon
            ])
            ;
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Items', 'fa fa-tags', Item::class);
        yield MenuItem::linkToCrud('ItemsImages', 'fa fa-tags', ItemImage::class);
    }
}
