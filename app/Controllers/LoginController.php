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
        // Initialize the first session (default session)
        $sessionAdmin = \Config\Services::session();

        // Initialize the second session (with custom configuration)
        $config = new \Config\SessionTwo();
        $sessionSuperAdmin = \Config\Services::session($config);

        // Check if the user is logged in using either session
        if (
            ($sessionAdmin->has('logged_in') && $sessionAdmin->get('logged_in') == true) ||
            ($sessionSuperAdmin->has('logged_in') && $sessionSuperAdmin->get('logged_in') == true)
        ) {
            // Redirect to the dashboard if logged in from any session
            return redirect()->to('/dashboard');
        } else {
            // If not logged in, show the login page
            return view('admin/login');
        }

    }

    public function authenticate()
    {
        $sessionAdmin = \Config\Services::session();

        // Initialize the second session (with custom configuration)
        $config = new \Config\SessionTwo();
        $sessionSuperAdmin = \Config\Services::session($config);

        $model = new AdminModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Get user by username
        $user = $model->getUserByUsername($username);

        // Google reCAPTCHA verification
        $recaptchaResponse = $this->request->getPost('g-recaptcha-response');
        $secretKey = '6LcujTAUAAAAAJxVcoFAYSVFlzKcA6HtIZCSOrz5'; // Secret key
        $apiUrl = 'https://www.google.com/recaptcha/api/siteverify';

        // Perform reCAPTCHA verification
        $response = file_get_contents($apiUrl . '?secret=' . $secretKey . '&response=' . $recaptchaResponse);
        $responseData = json_decode($response);

        if ($user) {
            if (password_verify($password, $user['password'])) {
                if ($responseData->success) {
                    // Determine user type
                    if ($user['usertype'] == "superadmin") {
                        // Set session for superadmin
                        $sessionSuperAdmin->set([
                            'username' => $user['username'],
                            'usertype' => $user['usertype'],
                            'logged_in' => true
                        ]);
                        return redirect()->to('/dashboard');
                    } else if ($user['usertype'] == "admin") {
                        // Set session for admin
                        $sessionAdmin->set([
                            'username' => $user['username'],
                            'usertype' => $user['usertype'],
                            'logged_in' => true
                        ]);
                        return redirect()->to('/dashboard');
                    } else {
                        // Handle unexpected user type
                        $sessionAdmin->setFlashdata('error', 'User type not recognized.');
                        return view('admin/login');
                    }
                } else {
                    // reCAPTCHA failed
                    $sessionAdmin->setFlashdata('error', 'Please complete the CAPTCHA correctly.');
                    return view('admin/login');
                }
            } else {
                // Password verification failed
                $sessionAdmin->setFlashdata('error', 'Incorrect password.');
                return view('admin/login');
            }
        } else {
            // Username not found
            $sessionAdmin->setFlashdata('error', 'Username not registered.');
            return view('admin/login');
        }
    }

    public function logout()
    {
        $sessionAdmin = \Config\Services::session(); // Get the admin session
        $config = new \Config\SessionTwo(); // Get the configuration for the second session
        $sessionSuperAdmin = \Config\Services::session($config); // 
        if ($sessionAdmin->has('logged_in') && $sessionAdmin->get('logged_in') == true){
            $sessionAdmin->destroy();
            return view('admin/login');
        }
        
        if ($sessionSuperAdmin->has('logged_in') && $sessionSuperAdmin->get('logged_in') == true){
            $sessionSuperAdmin->destroy(); 
            return view('admin/login');
        }
      
    }

}
