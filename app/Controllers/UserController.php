<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\CompanionsModel;
use App\Controllers\BaseController;
use App\Services\QrCodeService;
use CodeIgniter\HTTP\ResponseInterface;

class UserController extends BaseController
{

    public function getinviteedata($rsvp_id)
    {

        try {
            $google_map_key1 = "https://www.google.com/maps/embed/v1/place?q=place_id:ChIJKdlbGeTBlzMRbQxZm8-_ZKQ&key=AIzaSyAc-QXWB4_dbvPDqQU3acosp8InF45vhVs";
            $google_map_key2 = "https://www.google.com/maps/embed/v1/place?q=place_id:ChIJ5fHDdqTHlzMRP8lnCcMPMok&key=AIzaSyAc-QXWB4_dbvPDqQU3acosp8InF45vhVs";
            $userModel = model(UserModel::class);
            $companionsModel = model(CompanionsModel::class);
            $getUserDetails = $userModel->where('invite_id', $rsvp_id)->where('will_attend', NULL)->first();
            $getUserDetailsConfirmRSVP = $userModel->where('invite_id', $rsvp_id)->where('will_attend', 'Yes')->first();

            if (!empty($getUserDetailsConfirmRSVP)) {
                $allCompanions = $companionsModel->where('user_id', $getUserDetailsConfirmRSVP->id)->findAll();
                $countCompanions = count($allCompanions);
                $data = [
                    'google_map_key1' => $google_map_key1,
                    'google_map_key2' => $google_map_key2,
                    'confirm_rsvp' => 1,
                    'confirm_companions' => $allCompanions,
                    'confirm_invitee_qr' => $getUserDetailsConfirmRSVP->qr_code,
                    'confirm_main_invitee' => $getUserDetailsConfirmRSVP->name,
                    'confirm_invite_id' => $getUserDetailsConfirmRSVP->invite_id,
                    'confirm_companions_count' => $countCompanions,
                ];
            } else if (!empty($getUserDetails)) {
                $allUsers = $companionsModel->where('user_id', $getUserDetails->id)->findAll();
                $countCompanions = count($allUsers);
                $data = [
                    'google_map_key1' => $google_map_key1,
                    'google_map_key2' => $google_map_key2,
                    'companions' => $allUsers,
                    'main_invitee' => $getUserDetails->name,
                    'invite_id' => $getUserDetails->invite_id,
                    'companions_count' => $countCompanions,
                ];
            } else {
                $data = [
                    'google_map_key1' => $google_map_key1,
                    'google_map_key2' => $google_map_key2,
                ];
            }
            ;
            $dataObject = json_decode(json_encode($data));
            return view('pages/home', ['data' => $dataObject]);
        } catch (\Exception $e) {
            log_message('error', 'Error in confirmRSVP: ' . $e->getMessage());
            return $this->response->setStatusCode(500)->setBody($e->getMessage());
        }
    }

    public function confirmrsvp()
    {
        $qrCodeService = new QrCodeService();


        // Handle preflight request
        if ($this->request->getMethod() === 'options') {
            return $this->response
                ->setHeader('Access-Control-Allow-Origin', '*')
                ->setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS')
                ->setHeader('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-Requested-With')
                ->setStatusCode(204); // No Content
        }

        try {
            $rsvp_id = $this->request->getPost('rsvp_id');
            $confirm = $this->request->getPost('confirm');

            if (!$rsvp_id) {
                throw new \Exception('RSVP ID is missing');
            }

            $userModel = model(UserModel::class);
            $companionsModel = model(CompanionsModel::class);
            $getUser = $userModel->where('invite_id', $rsvp_id)->first();
            $getCompanions = $companionsModel->where('user_id', $getUser->id)->findAll();


            if ($getUser) {
                $dataUpdated = [
                    'will_attend' => $confirm == 1 ? 'Yes' : 'No',
                ];

                $userModel->update($getUser->id, $dataUpdated);

                // Set up Pusher configuration
                $options = [
                    'cluster' => 'ap3',  // Replace with your Pusher cluster
                    'useTLS' => true,
                ];

                $pusher = new \Pusher\Pusher(
                    'b012177f6ee3695e54b9',    // Replace with your Pusher app key
                    '4904ff2acd898d494475', // Replace with your Pusher app secret
                    '1852485',     // Replace with your Pusher app ID
                    $options
                );

                $pusherData = [
                    'message' => 'User RSVP status updated',
                    'user_id' => $getUser->id,
                    'will_attend' => $dataUpdated['will_attend']
                ];

                $text = base_url('qr/') . $getUser->invite_id;

                $qrCodeUri = $qrCodeService->generateQrCode($text);

                $userModelQR = new UserModel();

                if ($userModelQR) {
                    $userModelQR->set('qr_code', $qrCodeUri);
                    $userModelQR->where('will_attend', 'Yes');
                    $userModelQR->where('invite_id', $rsvp_id);
                    $userModelQR->update();

                }

                $pusher->trigger('rsvp-channel', 'rsvp-updated', $pusherData);
            }

            $data = [
                'confirm' => $confirm,
                'main_invitee_name' => $getUser->name,
                'companions' => $getCompanions,
                'qrCodeUri' => $qrCodeUri
            ];

            // Add CORS headers to the response
            return $this->response
                ->setHeader('Access-Control-Allow-Origin', '*')
                ->setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS')
                ->setHeader('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-Requested-With')
                ->setJSON($data);

        } catch (\Exception $e) {
            return $this->response
                ->setHeader('Access-Control-Allow-Origin', '*')
                ->setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS')
                ->setHeader('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-Requested-With')
                ->setJSON(['error' => $e->getMessage()]);
        }
    }

    public function inviteidgenerator()
    {
        // Invite id auto generator

        $userModel = model(UserModel::class);
        $allUsers = $userModel->findAll();

        foreach ($allUsers as $row => $u) {
            $randomNum = rand(10, 99999999999);
            $userModel->set('invite_id', $randomNum);
            $userModel->where('will_attend', NULL);
            $userModel->where('id', $u->id);
            $userModel->update();
        }

    }
    public function qrLanding($rsvp_id)
    {
        $userModel = model(UserModel::class);
        $companionsModel = model(CompanionsModel::class);

        if(isset($rsvp_id)){
            $getUser = $userModel->where('invite_id', $rsvp_id)->first();
            $getCompanions = $companionsModel->where('user_id', $getUser->id)->findAll();
    
            $data = [
                'companions'=> $getCompanions,
                'main_invitee'=> $getUser->name,
    
            ];
        }
       
        $dataObject = json_decode(json_encode($data));

        return view('pages/qr', ['data' => $dataObject]);

    }
}
