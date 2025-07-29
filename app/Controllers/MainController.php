<?php

namespace App\Controllers;

use App\Models\ServicesModel;
use App\Models\PortfoliosModel;
use App\Models\StaffsModel;

class MainController extends BaseController
{
    public function index(): string
    {
        $db = \Config\Database::connect();

        $webConfig = $db->table('web_conf')->get()->getResultArray();
        $webConfig = array_column($webConfig, 'value', 'item');
        $mainTitle = $webConfig['main_title'] ?? 'Default Main Title';
        $mainSubtitle = $webConfig['main_subtitle'] ?? 'Default Main Subtitle';
        $mainImageUrl = $webConfig['main_image_url'] ?? 'https://cdn.bootstrapstudio.io/placeholders/1400x800.png';

        $servicesModel = new ServicesModel();
        $services = $servicesModel->where('is_main', true)->findAll();
        $portfoliosModel = new PortfoliosModel();
        $portfolios = $portfoliosModel->where('is_main', true)->findAll();
        return view('home', [
            'page'=> 'home',
            'main_title' => $mainTitle,
            'main_subtitle' => $mainSubtitle,
            'main_image_url' => $mainImageUrl,
            'services' => $services,
            'portfolios' => $portfolios
        ]);
    }
    public function about(): string
    {
        return view('about', ['page'=> 'about']);
    }
    public function contact(): string
    {
        return view('contact', ['page'=> 'contact']);
    }
    public function services(): string
    {
        $servicesModel = new ServicesModel();
        $services = $servicesModel->findAll();
        return view('services', ['page'=> 'services', 'services' => $services]);
    }
    public function portfolio(): string
    {
        $portfoliosModel = new PortfoliosModel();
        $portfolios = $portfoliosModel->findAll();
        return view('portfolio', [
            'page'=> 'portfolio',
            'portfolios' => $portfolios
        ]);
    }
    public function staffs(): string
    {
        $staffsModel = new StaffsModel();
        $staffs = $staffsModel->where('is_hidden', false)->findAll();
        return view('staffs', ['page'=> 'staffs', 'staffs' => $staffs]);
    }
}
