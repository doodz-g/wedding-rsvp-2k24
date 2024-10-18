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
            return redirect()->to('/dashboard');
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

        $recaptchaResponse = $this->request->getPost('g-recaptcha-response');
        // $secretKey = '6LcujTAUAAAAAJxVcoFAYSVFlzKcA6HtIZCSOrz5'; //local
        $secretKey = '6LdIt0sqAAAAAGq_l9qW6ypa1R9VKD8af8Rpm-Ht';
        $apiUrl = 'https://www.google.com/recaptcha/api/siteverify';

        $response = file_get_contents($apiUrl . '?secret=' . $secretKey . '&response=' . $recaptchaResponse);
        $responseData = json_decode($response);

        if ($user) {
            // Verify the password
            if (password_verify($password, $user['password'])) {
                if ($responseData->success) {
                    $session->set([
                        'username' => $user['username'],
                        'usertype' => $user['usertype'],
                        'logged_in' => true
                    ]);
                    return redirect()->to('/dashboard');
                } else {
                    $session->setFlashdata('error', 'Don’t overlook the captcha!!!!');
                    return view('admin/login');
                }
            } else {
                $session->setFlashdata('error', 'Password does not match our records!!!!');
                return view('admin/login');
            }

        } else {
            $session->setFlashdata('error', 'That username is not registered!!!!');
            return view('admin/login');
        }

    }

    public function logout()
    {
        session()->destroy();
        setcookie('ci_session', '', time() - 3600, '/');
        return view('admin/login');
      
    }

}
