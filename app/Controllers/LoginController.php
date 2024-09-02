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
                return redirect()->to('/admin');
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
            $allUsers = $userModel->orderBy('date', 'DESC')->findAll();
            $data = [
                'all_users' => $allUsers
            ];
            $dataObject = json_decode(json_encode($data));

            return view('admin/home', ['data' => $dataObject]);

        } else {
            return view('admin/login');
        }
    }
}
