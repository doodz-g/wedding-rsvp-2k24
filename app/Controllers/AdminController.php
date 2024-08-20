<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\CompanionsModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AdminController extends BaseController
{
    public function index()
    {

        $userModel = model(UserModel::class);
        $companionsModel = model(CompanionsModel::class);
        $allUsers = $userModel->findAll();
        $data = [
            'all_users'=> $allUsers
        ];
        
        $dataObject = json_decode(json_encode($data));
        return view('admin/home', ['data' => $dataObject]);
    }
    public function getCompanions(){
        $user_id = $this->request->getPost('user_id');
        $companionsModel = model(CompanionsModel::class);
        
        // Fetch companions where user_id matches
        $getCompanions = $companionsModel->where('user_id', $user_id)->findAll(); 
        
        // Optionally, you can use `json_decode` to convert the object to an array
        return $this->response->setJSON($getCompanions);
        


    }
}
