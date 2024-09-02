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
        $allUsers = $userModel->orderBy('date', 'DESC')->findAll();
        $data = [
            'all_users' => $allUsers
        ];
        $dataObject = json_decode(json_encode($data));
        return view('admin/home', ['data' => $dataObject]);
    }
    public function getUsers()
    {

        $userModel = model(UserModel::class);
        $allUsers = $userModel->orderBy('date', 'DESC')->findAll();
        return $this->response->setJSON($allUsers);

    }
    public function getCompanions()
    {
        $user_id = $this->request->getPost('user_id');
        $companionsModel = model(CompanionsModel::class);

        // Fetch companions where user_id matches
        $getCompanions = $companionsModel->where('user_id', $user_id)->findAll();

        // Optionally, you can use `json_decode` to convert the object to an array
        return $this->response->setJSON($getCompanions);

    }
    public function addInvitee()
    {
        // Check if the request is AJAX and POST
        if ($this->request->isAJAX() && $this->request->getMethod() === 'POST') {
            $name = $this->request->getPost('name');
            $companion_name = $this->request->getPost('companion_name');
            
            // You can now validate and save the data
            $userModel = new UserModel();
           
            $data = [
                'name' => $name,
                'will_attend' => NULL,
                'will_not_attend' => NULL,
                'invite_id' => rand(10, 99999999999),
            ];

            if ($userModel->save($data)) {
                $latestID = $userModel->insertID();
                $companionsModel = model(CompanionsModel::class);
                if($companion_name){
                    foreach($companion_name as $c){
                        $dataCompanion = [
                            'name' => $c,
                            'user_id' => $latestID
                            
                        ];
                        $companionsModel->save($dataCompanion);
                    }
                }
                return $this->response->setJSON(['status' => 'success', 'message' => 'Data saved successfully!']);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to save data.']);
            }
        } else {
            // Handle invalid request
            return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid request.']);
        }
    }
}
