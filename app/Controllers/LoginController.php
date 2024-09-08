<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class LoginController extends BaseController
{
    public function index()
    {
        $session = session();
        // $password = password_hash('P@55w0rd1', PASSWORD_DEFAULT);
        if ($session->has('logged_in') || $session->get('logged_in') == true) {
            return redirect()->to('/admin');
        } else {
            return view('admin/login');
        }

    }

    public function authenticate()
    {
        $session = session();
        $model = new AdminModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $model->getUserByUsername($username);

        if ($user) {
            // Verify the password
            if (password_verify($password, $user['password'])) {
                $session->set([
                    'username' => $user['username'],
                    'logged_in' => true
                ]);
                return redirect()->to('/dashboard');
            } else {
                $session->setFlashdata('error', 'Invalid password');
                return view('admin/login');
            }
        } else {
            $session->setFlashdata('error', 'Username not found');
            return view('admin/login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return view('admin/login');
    }
    public function admin()
    {
        $session = session();
        if ($session->has('logged_in') || $session->get('logged_in') == true) {

            $userModel = model(UserModel::class);

            // Get the current page number from the query string or default to 1
            $currentPage = $this->request->getVar('page') ?? 1;
    
            // Define the number of items per page
            $perPage = 10;
    
            // Get the search term from the query string
            $searchTerm = $this->request->getVar('search') ?? '';
    
            // Build the query with search term
            $builder = $userModel->orderBy('date', 'DESC');
    
            if ($searchTerm) {
                $builder->like('name', $searchTerm); // Modify this to match the fields you want to search
            }
    
            // Get paginated results
            $allUsers = $builder->paginate($perPage, 'default', $currentPage);
            // Get the pager instance
            $pager = \Config\Services::pager();
    
            // Get total number of users (considering the search term)
            $totalUsers = $builder->countAll();
            // Number of users on the current page
    
            $currentPageUsers = count($allUsers);
            // Prepare response data
            $data = [
                'users' => $allUsers,
                'pager' => [
                    'currentPage' => $currentPage,
                    'totalPages' => $pager->getPageCount(),
                    'totalUsers' => $totalUsers,
                    'currentPageUsers' => $currentPageUsers
                ]
            ];

            $dataObject = json_decode(json_encode($data));
            return view('admin/home', ['data' => $dataObject]);

        } else {
            return redirect()->to('/login');
        }
    }
}
