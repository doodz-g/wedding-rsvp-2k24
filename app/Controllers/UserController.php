<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\CompanionsModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class UserController extends BaseController

{

    public function getInviteeData($rsvp_id){

        try {
            $google_map_key = "https://www.google.com/maps/embed/v1/place?q=place_id:ChIJKdlbGeTBlzMRbQxZm8-_ZKQ&key=AIzaSyAc-QXWB4_dbvPDqQU3acosp8InF45vhVs";
            $userModel = model(UserModel::class);
            $companionsModel = model(CompanionsModel::class);
            $getUserDetails = $userModel->where('invite_id', $rsvp_id)->where('will_attend',NULL)->first();
            if(!empty($getUserDetails)){
                $allUsers = $companionsModel->where('user_id', $getUserDetails->id)->findAll();
                $countCompanions=count($allUsers);
                $data = [
        
                    'google_map_key'=> $google_map_key,
                    'companions' => $allUsers,
                    'main_invitee' => $getUserDetails->name,
                    'invite_id' => $getUserDetails->invite_id,
                    'companions_count' => $countCompanions,
                ];
            }else{
                $data = [
                    'google_map_key'=> $google_map_key,
                ];
            }
            $dataObject = json_decode(json_encode($data));
            return view('pages/home', ['data' => $dataObject]);
        }catch (\Exception $e) {
            log_message('error', 'Error in confirmRSVP: ' . $e->getMessage());
            return $this->response->setStatusCode(500)->setBody($e->getMessage());
        }
    }

    public function confirmRSVP()
    {  
        try {
            $rsvp_id = $this->request->getPost('rsvp_id');
            $confirm = $this->request->getPost('confirm');
            
            if (!$rsvp_id) {
                throw new \Exception('RSVP ID is missing');
            }
    
            $userModel = model(UserModel::class);
            $allUsers = $userModel->where('invite_id', $rsvp_id)->first();
            
            if ($allUsers) {
                $dataUpdated = [
                    'will_attend' => $confirm == 1 ? 'Yes': 'No',
                ];
            
                $userModel->update($allUsers->id, $dataUpdated);
               
            }

            $data = [
                'confirm' => $confirm
            ];
    
            return $this->response->setJSON($data);
    
        } catch (\Exception $e) {
            log_message('error', 'Error in confirmRSVP: ' . $e->getMessage());
            return $this->response->setStatusCode(500)->setBody($e->getMessage());
        }
    }

    public function inviteIDGenerator(){
        // Invite id auto generator
       
        $userModel = model(UserModel::class);
        $allUsers = $userModel->findAll();
    
        foreach($allUsers as $row => $u){
            $randomNum = rand(10,99999999999);
            $userModel->set('invite_id',$randomNum);
            $userModel->where('will_attend',NULL);
            $userModel->where('id',$u->id);
            $userModel->update();
        }

    }
}
