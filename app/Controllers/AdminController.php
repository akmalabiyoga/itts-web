<?php
namespace App\Controllers;

use App\Models\PortfoliosModel;
use App\Models\ServicesModel;
use App\Models\StaffsModel;

class AdminController extends BaseController
{
    public function index(): string
    {
        // dd('asd');
        $db = \Config\Database::connect();

        $webConfig = $db->table('web_conf')->get()->getResultArray();
        return view('admin/home', [
            'page'       => 'home',
            'web_config' => $webConfig,
        ]);
    }

    // SERVICES CRUD
    public function services(): string
    {
        $servicesModel = new ServicesModel();
        $services      = $servicesModel->findAll();

        return view('admin/services', [
            'page'     => 'services',
            'services' => $services,
        ]);
    }

    public function storeService()
    {
        $servicesModel = new ServicesModel();
        $data = [
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'icon'        => $this->request->getPost('icon'),
            'contact'     => $this->request->getPost('contact'),
            'is_main'     => $this->request->getPost('is_main'),
        ];
        if (!$servicesModel->insert($data)) {
            $errors = $servicesModel->errors();
            // You can customize this to show errors in the view or flashdata
            return $this->response->setStatusCode(400)->setJSON([
                'success' => false,
                'message' => 'Failed to insert service',
                'errors' => $errors
            ]);
        }
        return redirect()->to(site_url('admin/services'));
    }

    public function updateService()
    {
        $id = $this->request->getPost('id');
        $servicesModel = new ServicesModel();
        $data = [
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
        ];
        $servicesModel->update($id, $data);
        return redirect()->to(site_url('admin/services'));
    }
    public function deleteService(int $id)
    {
        $servicesModel = new ServicesModel();
        $servicesModel->delete($id);
        return redirect()->to(site_url('admin/services'));
    }

    public function editService(int $id)
    {
        $servicesModel = new ServicesModel();
        $service       = $servicesModel->find($id);

        return $this->response->setJSON($service);
    }

    public function portfolios(): string
    {
        $portfoliosModel = new PortfoliosModel();
        $portfolios      = $portfoliosModel->findAll();

        return view('admin/portfolios', [
            'page'       => 'portfolios',
            'portfolios' => $portfolios,
        ]);
    }

    public function staffs(): string
    {
        $staffsModel = new StaffsModel();
        $staffs      = $staffsModel->findAll();

        return view('admin/staffs', [
            'page'   => 'staffs',
            'staffs' => $staffs,
        ]);
    }

    public function storePortfolio()
    {
        $portfoliosModel = new PortfoliosModel();
        $data = [
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'image_url'   => $this->request->getPost('image_url'),
            'is_main'     => $this->request->getPost('is_main'),
        ];
        if (!$portfoliosModel->insert($data)) {
            $errors = $portfoliosModel->errors();
            return $this->response->setStatusCode(400)->setJSON([
                'success' => false,
                'message' => 'Failed to insert portfolio',
                'errors' => $errors
            ]);
        }
        return redirect()->to(site_url('/admin/portfolios'));
    }

    public function updatePortfolio()
    {
        $id = $this->request->getPost('id');
        $portfoliosModel = new PortfoliosModel();
        $data = [
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'image_url'   => $this->request->getPost('image_url'),
            'is_main'     => $this->request->getPost('is_main'),
        ];
        $portfoliosModel->update($id, $data);
        return redirect()->to('/admin/portfolios');
    }

    public function deletePortfolio(int $id)
    {
        $portfoliosModel = new PortfoliosModel();
        $portfoliosModel->delete($id);
        return redirect()->to(site_url('/admin/portfolios'));
    }

    public function editPortfolio(int $id)
    {
        $portfoliosModel = new PortfoliosModel();
        $portfolio = $portfoliosModel->find($id);
        return $this->response->setJSON($portfolio);
    }

    // --- Staffs CRUD ---
    public function storeStaff()
    {
        $staffsModel = new StaffsModel();
        $data = [
            'nama'      => $this->request->getPost('nama'),
            'peran'     => $this->request->getPost('peran'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'is_hidden' => $this->request->getPost('is_hidden'),
            'image_url' => $this->request->getPost('image_url'),
        ];
        if (!$staffsModel->insert($data)) {
            $errors = $staffsModel->errors();
            return $this->response->setStatusCode(400)->setJSON([
                'success' => false,
                'message' => 'Failed to insert staff',
                'errors' => $errors
            ]);
        }
        return redirect()->to(site_url('admin/staffs'));
    }

    public function updateStaff()
    {
        $id = $this->request->getPost('id');
        $staffsModel = new StaffsModel();
        $data = [
            'nama'      => $this->request->getPost('nama'),
            'peran'     => $this->request->getPost('peran'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'is_hidden' => $this->request->getPost('is_hidden'),
            'image_url' => $this->request->getPost('image_url'),
        ];
        $staffsModel->update($id, $data);
        return redirect()->to(site_url('admin/staffs'));
    }

    public function deleteStaff(int $id)
    {
        $staffsModel = new StaffsModel();
        $staffsModel->delete($id);
        return redirect()->to(site_url('admin/staffs'));
    }

    public function editStaff(int $id)
    {
        $staffsModel = new StaffsModel();
        $staff = $staffsModel->find($id);
        return $this->response->setJSON($staff);
    }
}
