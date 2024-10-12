<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\OtpModel;
use App\Models\CompanionsModel;
use App\Models\SettingsModel;
use App\Models\ExportModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Email\Email;

class AdminController extends BaseController
{
    public function index()
    {
        $session = session();
        if ($session->has('logged_in') || $session->get('logged_in') == true) {

            $userModel = model(UserModel::class);
            $companionsModel = model(name: CompanionsModel::class);
            $settingsModel = model(name: SettingsModel::class);
            $getSettingsTableAdult = $settingsModel->where('id', '1')->first();
            $getSettingsTableKids = $settingsModel->where('id', '3')->first();
            $getSettingsTableSponsorsA = $settingsModel->where('id', '4')->first();
            $getSettingsTableSponsorsB = $settingsModel->where('id', '6')->first();
            $getSettingsMaxGuest = $settingsModel->where('id', '2')->first();
            $getSettingsQR = $settingsModel->where('id', '5')->first();

            // Get the current page number from the query string or default to 1
            $currentPage = $this->request->getVar('page') ?? 1;

            // Define the number of items per page
            $perPage = 10;

            // Get the search term from the query string
            $searchTerm = $this->request->getVar('search') ?? '';

            // Build the query with search term
            $builder = $userModel->orderBy('id', 'DESC');

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

            // Fetch totals from models
            $totalGuest = $userModel->where('will_attend', 'Yes')->orWhere('will_attend', NULL)->countAllResults();
            $totalCompanions = $companionsModel->where('will_attend', 'Yes')->orWhere('will_attend', NULL)->countAllResults();
            $totalGuestConfirmAttendance = $userModel->where('will_attend', 'Yes')->countAllResults();
            $totalCompanionsConfirmAttendance = $companionsModel->where('will_attend', 'Yes')->countAllResults();
            $totalGuestWillAttend = $totalGuestConfirmAttendance + $totalCompanionsConfirmAttendance ?? 0;
            // Access numeric values from the results
            $maxCap = $getSettingsMaxGuest['quantity'];
            $totalGNow = $totalGuest + $totalCompanions ?? 0;
            $gPercentage = ($totalGNow / $maxCap) * 100 ?? 0;
            $gWPercentage = ($totalGuestWillAttend / $maxCap) * 100 ?? 0;
            // Prepare response data
            $data = [
                'users' => $allUsers,
                'qrSetting' => (int) $getSettingsQR['quantity'],
                'pager' => [
                    'currentPage' => $currentPage,
                    'totalPages' => $pager->getPageCount(),
                    'totalUsers' => $totalUsers,
                    'currentPageUsers' => $currentPageUsers,
                ],
                'guest_percentage' => ceil($gPercentage),
                'maxCap' => $maxCap,
                'totalGuestWillAttend' => ceil($gWPercentage),
                'totalGuestThatConfirm' => $totalGuestWillAttend,
                'totalGNow' => $totalGNow,
                'total_for_1' => ($userModel->getRemSlotsForEachTable(1)) ? $getSettingsTableAdult['quantity'] - (int) $userModel->getRemSlotsForEachTable(1) : $getSettingsTableAdult['quantity'],
                'total_for_2' => ($userModel->getRemSlotsForEachTable(2)) ? $getSettingsTableAdult['quantity'] - (int) $userModel->getRemSlotsForEachTable(2) : $getSettingsTableAdult['quantity'],
                'total_for_3' => ($userModel->getRemSlotsForEachTable(3)) ? $getSettingsTableAdult['quantity'] - (int) $userModel->getRemSlotsForEachTable(3) : $getSettingsTableAdult['quantity'],
                'total_for_4' => ($userModel->getRemSlotsForEachTable(4)) ? $getSettingsTableAdult['quantity'] - (int) $userModel->getRemSlotsForEachTable(4) : $getSettingsTableAdult['quantity'],
                'total_for_5' => ($userModel->getRemSlotsForEachTable(5)) ? $getSettingsTableAdult['quantity'] - (int) $userModel->getRemSlotsForEachTable(5) : $getSettingsTableAdult['quantity'],
                'total_for_6' => ($userModel->getRemSlotsForEachTable(6)) ? $getSettingsTableAdult['quantity'] - (int) $userModel->getRemSlotsForEachTable(6) : $getSettingsTableAdult['quantity'],
                'total_for_7' => ($userModel->getRemSlotsForEachTable(7)) ? $getSettingsTableAdult['quantity'] - (int) $userModel->getRemSlotsForEachTable(7) : $getSettingsTableAdult['quantity'],
                'total_for_8' => ($userModel->getRemSlotsForEachTable(8)) ? $getSettingsTableAdult['quantity'] - (int) $userModel->getRemSlotsForEachTable(8) : $getSettingsTableAdult['quantity'],
                'total_for_9' => ($userModel->getRemSlotsForEachTable(9)) ? $getSettingsTableAdult['quantity'] - (int) $userModel->getRemSlotsForEachTable(9) : $getSettingsTableAdult['quantity'],
                'total_for_10' => ($userModel->getRemSlotsForEachTable(10)) ? $getSettingsTableAdult['quantity'] - (int) $userModel->getRemSlotsForEachTable(10) : $getSettingsTableAdult['quantity'],
                'total_for_11' => ($userModel->getRemSlotsForEachTable(11)) ? $getSettingsTableKids['quantity'] - (int) $userModel->getRemSlotsForEachTable(11) : $getSettingsTableKids['quantity'],
                'total_for_12' => ($userModel->getRemSlotsForEachTable(12)) ? $getSettingsTableSponsorsA['quantity'] - (int) $userModel->getRemSlotsForEachTable(12) : $getSettingsTableSponsorsA['quantity'],
                'total_for_13' => ($userModel->getRemSlotsForEachTable(13)) ? $getSettingsTableSponsorsB['quantity'] - (int) $userModel->getRemSlotsForEachTable(13) : $getSettingsTableSponsorsB['quantity'],
            ];

            $dataObject = json_decode(json_encode($data));
            return view('admin/home', ['data' => $dataObject]);

        } else {
            return redirect()->to('/login');
        }
    }
    public function updateGraph()
    {
        $userModel = model(UserModel::class);
        $companionsModel = model(name: CompanionsModel::class);
        $settingsModel = model(name: SettingsModel::class);
        $getSettingsMaxGuest = $settingsModel->where('id', '2')->first();
        $totalGuest = $userModel->where('will_attend', 'Yes')->orWhere('will_attend', NULL)->countAllResults();
        $totalCompanions = $companionsModel->where('will_attend', 'Yes')->orWhere('will_attend', NULL)->countAllResults();

        $totalGuestConfirmAttendance = $userModel->where('will_attend', 'Yes')->countAllResults();
        $totalCompanionsConfirmAttendance = $companionsModel->where('will_attend', 'Yes')->countAllResults();

        // Access numeric values from the results
        $maxCap = $getSettingsMaxGuest['quantity'];
        $totalGuestWillAttend = $totalGuestConfirmAttendance + $totalCompanionsConfirmAttendance ?? 0;
        $totalGNow = $totalGuest + $totalCompanions ?? 0;
        $gPercentage = ($totalGNow / $maxCap) * 100 ?? 0;
        $gWPercentage = ($totalGuestWillAttend / $maxCap) * 100 ?? 0;

        $data = [
            'totalGuestPercentage' => ceil($gPercentage),
            'totalGuestWillAttend' => ceil($gWPercentage),
            'totalGuest' => $totalGNow,
            'totalGuestConfirm' => $totalGuestWillAttend,
            'totalCap' => $maxCap
        ];
        return $this->response->setJSON($data);
    }
    
    public function refresh()
    {
        $userModel = model(UserModel::class);
        $settingsModel = model(SettingsModel::class);
        $getSettingsTableAdult = $settingsModel->where('id', '1')->first();
        $getSettingsTableKids = $settingsModel->where('id', '3')->first();
        $getSettingsTableSponsorsA = $settingsModel->where('id', '4')->first();
        $getSettingsTableSponsorsB = $settingsModel->where('id', '6')->first();
        // Get the current page number from the query string or default to 1
        $currentPage = $this->request->getVar('page') ?? 1;
        $sort = $this->request->getVar('sort') ?? 'id';
        $order = $this->request->getVar('order') ?? 'DESC';

        // Define the number of items per page
        $perPage = 10;

        // Get the search term from the query string
        $searchTerm = $this->request->getVar('search') ?? '';

        // Build the query with search term
        $builder = $userModel->orderBy($sort, $order);

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
                'currentPageUsers' => $currentPageUsers,
            ],
            'total_for_1' => ($userModel->getRemSlotsForEachTable(1)) ? $getSettingsTableAdult['quantity'] - (int) $userModel->getRemSlotsForEachTable(1) : $getSettingsTableAdult['quantity'],
            'total_for_2' => ($userModel->getRemSlotsForEachTable(2)) ? $getSettingsTableAdult['quantity'] - (int) $userModel->getRemSlotsForEachTable(2) : $getSettingsTableAdult['quantity'],
            'total_for_3' => ($userModel->getRemSlotsForEachTable(3)) ? $getSettingsTableAdult['quantity'] - (int) $userModel->getRemSlotsForEachTable(3) : $getSettingsTableAdult['quantity'],
            'total_for_4' => ($userModel->getRemSlotsForEachTable(4)) ? $getSettingsTableAdult['quantity'] - (int) $userModel->getRemSlotsForEachTable(4) : $getSettingsTableAdult['quantity'],
            'total_for_5' => ($userModel->getRemSlotsForEachTable(5)) ? $getSettingsTableAdult['quantity'] - (int) $userModel->getRemSlotsForEachTable(5) : $getSettingsTableAdult['quantity'],
            'total_for_6' => ($userModel->getRemSlotsForEachTable(6)) ? $getSettingsTableAdult['quantity'] - (int) $userModel->getRemSlotsForEachTable(6) : $getSettingsTableAdult['quantity'],
            'total_for_7' => ($userModel->getRemSlotsForEachTable(7)) ? $getSettingsTableAdult['quantity'] - (int) $userModel->getRemSlotsForEachTable(7) : $getSettingsTableAdult['quantity'],
            'total_for_8' => ($userModel->getRemSlotsForEachTable(8)) ? $getSettingsTableAdult['quantity'] - (int) $userModel->getRemSlotsForEachTable(8) : $getSettingsTableAdult['quantity'],
            'total_for_9' => ($userModel->getRemSlotsForEachTable(9)) ? $getSettingsTableAdult['quantity'] - (int) $userModel->getRemSlotsForEachTable(9) : $getSettingsTableAdult['quantity'],
            'total_for_10' => ($userModel->getRemSlotsForEachTable(10)) ? $getSettingsTableAdult['quantity'] - (int) $userModel->getRemSlotsForEachTable(10) : $getSettingsTableAdult['quantity'],
            'total_for_11' => ($userModel->getRemSlotsForEachTable(11)) ? $getSettingsTableKids['quantity'] - (int) $userModel->getRemSlotsForEachTable(11) : $getSettingsTableKids['quantity'],
            'total_for_12' => ($userModel->getRemSlotsForEachTable(12)) ? $getSettingsTableSponsorsA['quantity'] - (int) $userModel->getRemSlotsForEachTable(12) : $getSettingsTableSponsorsA['quantity'],
            'total_for_13' => ($userModel->getRemSlotsForEachTable(13)) ? $getSettingsTableSponsorsB['quantity'] - (int) $userModel->getRemSlotsForEachTable(13) : $getSettingsTableSponsorsB['quantity'],
        ];

        // Return JSON response
        return $this->response->setJSON($data);
    }
    public function deleteGuest()
    {
        $user_id = $this->request->getPost('user_id');
        $userModel = model(UserModel::class);
        $companionsModel = model(CompanionsModel::class);
        // Find all companions for the given user_id
        $companions = $companionsModel->where('user_id', $user_id)->findAll();

        // Check if the user_id exists before attempting to delete
        if ($userModel->find($user_id)) {
            $userModel->delete($user_id);
            if (!empty($companions)) {
                foreach ($companions as $companion => $c) {
                    $companionsModel->delete($c->id);
                }
            }
          $this->sendNotif();  
          return $this->response->setJSON(['status' => 'success', 'message' => 'Record deleted successfully.']);
        }
    }
    public function assignGuestTable()
    {
        $guest_id = $this->request->getPost('guest_id');
        $table_number = $this->request->getPost('table_number');
        $companion_names = $this->request->getPost('companion_name');
        $userModel = model(UserModel::class);
        $companionModel = model(CompanionsModel::class);
        $settingsModel = model(SettingsModel::class);
        $getSettingsTableAdult = $settingsModel->where('id', '1')->first();
        $getSettingsTableKids = $settingsModel->where('id', '3')->first();
        $getSettingsTableSponsorsA = $settingsModel->where('id', '4')->first();
        $getSettingsTableSponsorsB = $settingsModel->where('id', '6')->first();
        $newAssignees = 0;

        if (empty($table_number)) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Table number is missing.']);
        }

        if ($guest_id) {
            $newAssignees++;
        }
        if ($companion_names) {
            // Iterate over each companion provided in the POST request
            foreach ($companion_names as $companion) {
                $companion_id = $companion['id'] ?? null;
                $companion_name = $companion['name'] ?? null;
                if (!empty($companion_id) && !empty($companion_name)) {
                    $newAssignees++;
                }
            }
        }

        if ($table_number == 11) {
            $rem_slots = $getSettingsTableKids['quantity'] - (int) $userModel->getRemSlotsForEachTable(11);
        } else if ($table_number == 12) {
            $rem_slots = $getSettingsTableSponsorsA['quantity'] - (int) $userModel->getRemSlotsForEachTable(12);
        } else if ($table_number == 13) {
            $rem_slots = $getSettingsTableSponsorsB['quantity'] - (int) $userModel->getRemSlotsForEachTable(13);
        } else {
            $rem_slots = $getSettingsTableAdult['quantity'] - (int) $userModel->getRemSlotsForEachTable($table_number);
        }

        if ($newAssignees <= $rem_slots) {
            if ($guest_id) {
                $userModel->find($guest_id);
                if ($userModel->update($guest_id, ['table_number' => $table_number])) {
                    if ($companion_names) {
                        $this->assignCompanionsToTable($companion_names, $table_number, $companionModel);
                        $this->updateTable();
                        return $this->response->setJSON(['status' => 'success', 'message' => 'Table assigned successfully.']);
                       
                    }
                } else {
                    return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to update user table number.']);
                }
            } else if ($companion_names) {
                $this->assignCompanionsToTable($companion_names, $table_number, $companionModel);
                $this->updateTable();
                return $this->response->setJSON(['status' => 'success', 'message' => 'Table assigned successfully.']);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'User not found.']);
            }
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Table slots not sufficient']);
        }

    }
    private function assignCompanionsToTable($companions, $table_number, $companionModel)
    {
        if ($companions) {
            foreach ($companions as $companion) {
                $companion_id = $companion['id'] ?? null;
                $companion_name = $companion['name'] ?? null;
                if (!empty($companion_id) && !empty($companion_name)) {
                    $companionModel->set('table_number', $table_number)
                        ->where('id', $companion_id)
                        ->update();
                }
            }
        }
    }

    public function getSettings()
    {
        $settingsModel = model(SettingsModel::class);
        // Fetch companions where user_id matches
        $getSettings = $settingsModel->where('qty_settings', 1)->findAll();

        $responseData = [
            'settings' => $getSettings
        ];

        // Return the response as JSON
        return $this->response->setJSON($responseData);
    }
    public function updateSettings()
    {
        $settings = $this->request->getPost('setting');
        $settingsModel = model(SettingsModel::class);
        if ($settings) {
            foreach ($settings as $index => $s) {
                $updateResult = $settingsModel->set('quantity', $s)
                    ->where('id', $index)
                    ->where('qty_settings', 1)
                    ->update();
            }
            if ($updateResult) {
                return $this->response->setJSON(['status' => 'success', 'message' => 'Settings updated.']);
            } else {
                return $this->response->setJSON(['status' => 'success', 'message' => 'Settings update failed.']);
            }

        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Setting payload unavailable']);
        }
        // Return the response as JSON

    }
    public function updateQRSettings()
    {
        $status = $this->request->getPost('status');
        $settingsModel = model(SettingsModel::class);
        $session = session();
        if ($settingsModel) {
            $updateResult = $settingsModel->set('quantity', $status)
                ->where('id', 5)
                ->update();

            if ($updateResult) {
                $session->set([
                    'qrSetting' => $status,
                ]);
                return $this->response->setJSON(['status' => 'success', 'message' => 'QR Settings updated.']);
            } else {
                return $this->response->setJSON(['status' => 'success', 'message' => 'QR Settings update failed.']);
            }

        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Setting payload unavailable']);
        }
        // Return the response as JSON

    }


    public function deleteGuestCompanion()
    {
        $id = $this->request->getPost('id');
        $companionsModel = model(CompanionsModel::class);

        // Check if the user_id exists before attempting to delete
        if ($companionsModel->where('id', $id)) {
            $companionsModel->delete($id);
            $this->sendNotif();
            return $this->response->setJSON(['status' => 'success', 'message' => 'Record deleted successfully.']);
        } else {
            return $this->response->setJSON(['status' => 'warning', 'message' => 'Record not found.']);
        }
    }

    public function getCompanions()
    {
        $user_id = $this->request->getPost('user_id');
        $companionsModel = model(CompanionsModel::class);
        $usersModel = model(UserModel::class);

        // Fetch companions where user_id matches
        $getCompanions = $companionsModel->where('user_id', $user_id)->findAll();
        $getUsers = $usersModel->where('id', $user_id)->findAll();

        $responseData = [
            'companions' => $getCompanions,
            'user' => $getUsers
        ];

        // Return the response as JSON
        return $this->response->setJSON($responseData);

    }

    public function checkDuplicateCompanions()
    {
        $user_id = $this->request->getPost('user_id');
        $companion_name = $this->request->getPost('companion_name');
        $companionsModel = model(CompanionsModel::class);

        // Fetch companions where user_id matches
        $getCompanions = $companionsModel->where('user_id', $user_id)
            ->where('name', $companion_name)
            ->findAll();

        // Optionally, you can use `json_decode` to convert the object to an array
        if (!empty($getCompanions)) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Duplicate companion name detected!']);
        }
    }

    public function addInvitee()
    {
        // Check if the request is AJAX and POST
        if ($this->request->isAJAX() && $this->request->getMethod() === 'POST') {
            $name = $this->request->getPost('name');
            $companion_name = $this->request->getPost('companion_name');
            $table_kid = $this->request->getPost('kid');

            // You can now validate and save the data
            $userModel = new UserModel();

            $data = [
                'name' => $name,
                'will_attend' => NULL,
                'will_not_attend' => NULL,
                'invite_id' => rand(10, 99999999999),
            ];
            $guestSave = $userModel->save($data);
            if ($guestSave) {
                $latestID = $userModel->insertID();
                if (!empty($companion_name)) {
                    $companionsModel = model(CompanionsModel::class);

                    $filteredCompanions = array_filter($companion_name, function ($value) {
                        return trim($value) !== '';
                    });

                    if ($filteredCompanions) {

                        foreach ($filteredCompanions as $c) {
                            $dataCompanion = [
                                'name' => $c,
                                'table_number' => $table_kid,
                                'user_id' => $latestID

                            ];
                            $companionsModel->save($dataCompanion);
                        }

                    }
                }
                $this->sendNotif();
                return $this->response->setJSON(['status' => 'success', 'message' => 'New guest added']);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to save data.']);
            }
        } else {
            // Handle invalid request
            return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid request.']);
        }
    }
    private function sendNotif()
    {
        // Set up Pusher configuration
        $options = [
            'cluster' => 'ap3',  // Replace with your Pusher cluster
            'useTLS' => true,
        ];

        $pusher = new \Pusher\Pusher(
            '8d7fa0a5863f106e689f',    // Replace with your Pusher app key
            '05c55ef62e5add42180d', // Replace with your Pusher app secret
            '1852485',     // Replace with your Pusher app ID
            $options
        );

        $pusherData = [
            'message' => 'Graph Updated',
        ];
        $pusher->trigger('graph-channel', 'graph-updated', $pusherData);
    }
    private function updateTable()
    {
        // Set up Pusher configuration
        $options = [
            'cluster' => 'ap3',  // Replace with your Pusher cluster
            'useTLS' => true,
        ];

        $pusher = new \Pusher\Pusher(
            '43c7f87c078e85dc3242',    // Replace with your Pusher app key
            '637a47098511344943f2', // Replace with your Pusher app secret
            '1877993',     // Replace with your Pusher app ID
            $options
        );

        $pusherData = [
            'message' => 'Table Updated',
        ];
        $pusher->trigger('table-channel', 'table-updated', $pusherData);
    }

    public function editInvitee()
    {
        // Check if the request is AJAX and POST
        if ($this->request->isAJAX() && $this->request->getMethod() === 'POST') {
            $user_id = $this->request->getPost('user_id');
            $name = $this->request->getPost('name');
            $companion_names = $this->request->getPost('companion_name'); // Expecting an array of companions with id and name

            // Initialize the models
            $userModel = model(UserModel::class);
            $companionsModel = model(CompanionsModel::class);

            // Update user details
            if ($user_id && $name) {
                $userModel->set('name', $name);
                $userModel->where('id', $user_id);

                if ($userModel->update($user_id)) {
                    // If the user update was successful, proceed with companions update
                    if ($companion_names) {
                        // Iterate over each companion provided in the POST request
                        foreach ($companion_names as $companion) {
                            $companion_id = $companion['id'] ?? null;
                            $companion_name = $companion['name'];

                            if ($companion_id) {
                                // If companion ID exists, update the companion
                                $companionsModel->set('name', $companion_name);
                                $companionsModel->where('id', $companion_id);
                                $companionsModel->update();
                            } else {
                                // Insert a new companion if it doesn't exist
                                if (!empty($companion_name)) {
                                    $dataCompanion = [
                                        'name' => $companion_name,
                                        'user_id' => $user_id
                                    ];
                                    $companionsModel->save($dataCompanion);
                                } else {
                                    return $this->response->setJSON(['status' => 'error', 'message' => 'Companion was empty.']);

                                }

                            }
                        }
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
    public function sendOTP(){
        $qr_setting = $this->request->getPost('qr_setting');  
        $recipient = $this->request->getPost('email');  
        $otpModel = new OtpModel();
        $otpModel->truncate();
        $data = [
            'status' => 1,
            'qr_setting' => $qr_setting,
            'otp' => rand(10000, 99999),
        ];

        if ($otpModel->save($data)) {
            $lastInsertedID = $otpModel->insertID();
            $latestOTP = $otpModel->find($lastInsertedID);
            $this->sendEmail($latestOTP['otp'],$recipient);
            return $this->response->setJSON(['status' => 'success', 'message' => 'OTP was sent to '.$recipient.'.']);
        }else{
            return $this->response->setJSON(['status' => 'error', 'message' => 'OTP was not generated.']);
        }
    }
        
    public function validateOTP()
    {
        $otp = $this->request->getPost('otp');
        $otpModel = model(OtpModel::class);
        $settingsModel = model(SettingsModel::class);

        if (!empty($otp)) {
            $checkOTP = $otpModel->where('otp', $otp)->first();

            if ($checkOTP) {
                $updateStatus = $otpModel->set('status', 0)
                    ->where('otp', $otp)
                    ->update();

                if ($updateStatus) {
                    $updateQRSetting = $settingsModel->set('quantity', $checkOTP['qr_setting'])
                        ->where('id', 5)
                        ->update();
                    $otpModel->truncate();
                    if ($updateQRSetting) {
                        return $this->response->setJSON(['status' => 'success', 'message' => 'QR Settings updated successfully']);
                    } else {
                        return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to update QR Settings']);
                    }
                } else {
                    return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to update OTP status']);
                }

            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid OTP.']);
            }
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'OTP cannot be empty.']);
        }

    }
    private function sendEmail($otp,$recipient)
    {
            $email = new Email();
            // Enable debugging
            $email->setFrom('admin@celebratewithus.site', 'admin'); // Sender's email and name
            $email->setTo($recipient); // Recipient's email

            $email->setSubject('OTP');
            $message='<!DOCTYPE html>
                        <html lang="en">
                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>OTP</title>
                        </head>
                        <body style="font-family: "Helvetica Neue", Arial, sans-serif; background-color: #f4f6f8; margin: 0; padding: 20px;">
                            <div style="background-color: #ffffff; padding: 40px; border-radius: 12px; max-width: 600px; margin: 0 auto; border: 1px solid #e0e0e0; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);">
                                <h2 style="color: #2c3e50; font-size: 26px; margin-bottom: 25px; padding-bottom: 10px; border-bottom: 2px solid #e9ecef;">One-Time Password (OTP)</h2>
                                <p style="font-size: 16px; line-height: 1.7; color: #4a4a4a; margin: 0 0 15px;">Hello,</p>
                                <p style="font-size: 16px; line-height: 1.7; color: #4a4a4a; margin: 0 0 15px;">Here is your OTP to complete the verification process:</p>
                                <div style="font-size: 30px; color: green; font-weight: bold; text-align: center; padding: 15px; background-color: #f9fafb; border-radius: 8px; margin-top: 20px;">
                                    <strong>'.$otp.'</strong>
                                </div>
                                <p style="font-size: 16px; line-height: 1.7; color: #4a4a4a; margin: 0 0 15px;">If you have any questions, feel free to contact us.</p>
                                <div style="margin-top: 40px; font-size: 13px; color: #999; text-align: center;">
                                    This is an automated notification from <strong style="color: #2c3e50;">Celebrate With Us</strong>.
                                </div>
                            </div>
                        </body>
                        </html> ';

            $email->setMessage($message);
            $email->setMailType('html');

            if ($email->send()) {
                log_message('info', 'Email sent successfully.');
            } else {
                log_message('error',$email->printDebugger(['headers']));
            } 
    }


}
