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
        $session = session();
        if ($session->has('logged_in') || $session->get('logged_in') == true) {

            $userModel = model(UserModel::class);
            $companionsModel = model(name: CompanionsModel::class);

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

            // Fetch totals from models
            $totalGuest = $userModel->get_totals();
            $totalTableSlotsFor1 = $userModel->get_table_slots_1();
            $totalTableSlotsFor2 = $userModel->get_table_slots_2();
            $totalTableSlotsFor3 = $userModel->get_table_slots_3();
            $totalTableSlotsFor4 = $userModel->get_table_slots_4();
            $totalTableSlotsFor5 = $userModel->get_table_slots_5();
            $totalTableSlotsFor6 = $userModel->get_table_slots_6();
            $totalTableSlotsFor7 = $userModel->get_table_slots_7();
            $totalTableSlotsFor8 = $userModel->get_table_slots_8();
            $totalTableSlotsFor9 = $userModel->get_table_slots_9();
            $totalTableSlotsFor10 = $userModel->get_table_slots_10();

            $total_for_1 = $totalTableSlotsFor1['total_table_slots_1'];
            $total_for_2 = $totalTableSlotsFor2['total_table_slots_2'];
            $total_for_3 = $totalTableSlotsFor3['total_table_slots_3'];
            $total_for_4 = $totalTableSlotsFor4['total_table_slots_4'];
            $total_for_5 = $totalTableSlotsFor5['total_table_slots_5'];
            $total_for_6 = $totalTableSlotsFor6['total_table_slots_6'];
            $total_for_7 = $totalTableSlotsFor7['total_table_slots_7'];
            $total_for_8 = $totalTableSlotsFor8['total_table_slots_8'];
            $total_for_9 = $totalTableSlotsFor9['total_table_slots_9'];
            $total_for_10 = $totalTableSlotsFor10['total_table_slots_10'];

            $totalCompanions = $companionsModel->get_totals();
            $tgWillAttend = $userModel->get_will_attend();
            $totalGuestWillAttend = $tgWillAttend['total_users_will_attend'] ?? 0;
            // Access numeric values from the results
            $totalGuestCount = $totalGuest['total_users'] ?? 0;
            $totalCompanionCount = $totalCompanions['total_companions'] ?? 0;
            $maxCap = 120;
            $totalGNow = (int) $totalGuestCount + (int) $totalCompanionCount ?? 0;
            $gPercentage = ($totalGNow / $maxCap) * 100 ?? 0;
            $gWPercentage = ($totalGuestWillAttend / $maxCap) * 100 ?? 0;
            // Prepare response data
            $data = [
                'users' => $allUsers,
                'pager' => [
                    'currentPage' => $currentPage,
                    'totalPages' => $pager->getPageCount(),
                    'totalUsers' => $totalUsers,
                    'currentPageUsers' => $currentPageUsers,

                ],
                'guest_percentage' => ceil($gPercentage),
                'maxCap' => $maxCap,
                'totalGuestWillAttend' => ceil($gWPercentage),
                'totalGNow' => $totalGNow,
                'total_for_1' => isset($total_for_1) ? 10 - (int) $total_for_1 : 10,
                'total_for_2' => isset($total_for_2) ? 10 - (int) $total_for_2 : 10,
                'total_for_3' => isset($total_for_3) ? 10 - (int) $total_for_3 : 10,
                'total_for_4' => isset($total_for_4) ? 10 - (int) $total_for_4 : 10,
                'total_for_5' => isset($total_for_5) ? 10 - (int) $total_for_5 : 10,
                'total_for_6' => isset($total_for_6) ? 10 - (int) $total_for_6 : 10,
                'total_for_7' => isset($total_for_7) ? 10 - (int) $total_for_7 : 10,
                'total_for_8' => isset($total_for_8) ? 10 - (int) $total_for_8 : 10,
                'total_for_9' => isset($total_for_9) ? 10 - (int) $total_for_9 : 10,
                'total_for_10' => isset($total_for_10) ? 10 - (int) $total_for_10 : 10,
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
        $totalGuest = $userModel->get_totals();
        $totalCompanions = $companionsModel->get_totals();
        $tgWillAttend = $userModel->get_will_attend();
        $totalGuestWillAttend = $tgWillAttend['total_users_will_attend'] ?? 0;
        // Access numeric values from the results
        $totalGuestCount = $totalGuest['total_users'] ?? 0;
        $totalCompanionCount = $totalCompanions['total_companions'] ?? 0;
        $maxCap = 120;
        $totalGNow = (int) $totalGuestCount + (int) $totalCompanionCount ?? 0;
        $gPercentage = ($totalGNow / $maxCap) * 100 ?? 0;
        $gWPercentage = ($totalGuestWillAttend / $maxCap) * 100 ?? 0;

        $data = [
            'guest_percentage' => ceil($gPercentage),
            'maxCap' => $maxCap,
            'totalGuestWillAttend' => ceil($gWPercentage),
            'totalGNow' => $totalGNow,
        ];
        return $this->response->setJSON($data);
    }
    public function tableView()
    {
        $session = session();
        if ($session->has('logged_in') || $session->get('logged_in') == true) {

            $userModel = model(UserModel::class);
            $companionsModel = model(name: CompanionsModel::class);

            // Build the query with search term
            $allUsers = $userModel->findAll();
            // Get total number of users (considering the search term)
            $totalUsers = $userModel->countAll();

            // Number of users on the current page

            $get_companions = $companionsModel->findAll();

            // Fetch totals from models
            //$allUsers = $userModel->get_users_and_companions();

            $totalGuest = $userModel->get_totals();
            $totalTableSlotsFor1 = $userModel->get_table_slots_1();
            $totalTableSlotsFor2 = $userModel->get_table_slots_2();
            $totalTableSlotsFor3 = $userModel->get_table_slots_3();
            $totalTableSlotsFor4 = $userModel->get_table_slots_4();
            $totalTableSlotsFor5 = $userModel->get_table_slots_5();
            $totalTableSlotsFor6 = $userModel->get_table_slots_6();
            $totalTableSlotsFor7 = $userModel->get_table_slots_7();
            $totalTableSlotsFor8 = $userModel->get_table_slots_8();
            $totalTableSlotsFor9 = $userModel->get_table_slots_9();
            $totalTableSlotsFor10 = $userModel->get_table_slots_10();

            $total_for_1 = $totalTableSlotsFor1['total_table_slots_1'];
            $total_for_2 = $totalTableSlotsFor2['total_table_slots_2'];
            $total_for_3 = $totalTableSlotsFor3['total_table_slots_3'];
            $total_for_4 = $totalTableSlotsFor4['total_table_slots_4'];
            $total_for_5 = $totalTableSlotsFor5['total_table_slots_5'];
            $total_for_6 = $totalTableSlotsFor6['total_table_slots_6'];
            $total_for_7 = $totalTableSlotsFor7['total_table_slots_7'];
            $total_for_8 = $totalTableSlotsFor8['total_table_slots_8'];
            $total_for_9 = $totalTableSlotsFor9['total_table_slots_9'];
            $total_for_10 = $totalTableSlotsFor10['total_table_slots_10'];
            $totalCompanions = $companionsModel->get_totals();
            // Access numeric values from the results
            $totalGuestCount = $totalGuest['total_users'] ?? 0;
            $totalCompanionCount = $totalCompanions['total_companions'] ?? 0;
            // Prepare response data
            $data = [
                'users' => $allUsers,
                'companions' => $get_companions,
                'total_guests' => $totalGuestCount + $totalCompanionCount,
                'total_for_1' => isset($total_for_1) ? 10 - (int) $total_for_1 : 10,
                'total_for_2' => isset($total_for_2) ? 10 - (int) $total_for_2 : 10,
                'total_for_3' => isset($total_for_3) ? 10 - (int) $total_for_3 : 10,
                'total_for_4' => isset($total_for_4) ? 10 - (int) $total_for_4 : 10,
                'total_for_5' => isset($total_for_5) ? 10 - (int) $total_for_5 : 10,
                'total_for_6' => isset($total_for_6) ? 10 - (int) $total_for_6 : 10,
                'total_for_7' => isset($total_for_7) ? 10 - (int) $total_for_7 : 10,
                'total_for_8' => isset($total_for_8) ? 10 - (int) $total_for_8 : 10,
                'total_for_9' => isset($total_for_9) ? 10 - (int) $total_for_9 : 10,
                'total_for_10' => isset($total_for_10) ? 10 - (int) $total_for_10 : 10,
            ];
            $dataObject = json_decode(json_encode($data));
            return view('admin/table', ['data' => $dataObject]);

        } else {
            return redirect()->to('/login');
        }

    }

    public function getUsers()
    {
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
        // Fetch totals from models
        $totalGuest = $userModel->get_totals();
        $totalTableSlotsFor1 = $userModel->get_table_slots_1();
        $totalTableSlotsFor2 = $userModel->get_table_slots_2();
        $totalTableSlotsFor3 = $userModel->get_table_slots_3();
        $totalTableSlotsFor4 = $userModel->get_table_slots_4();
        $totalTableSlotsFor5 = $userModel->get_table_slots_5();
        $totalTableSlotsFor6 = $userModel->get_table_slots_6();
        $totalTableSlotsFor7 = $userModel->get_table_slots_7();
        $totalTableSlotsFor8 = $userModel->get_table_slots_8();
        $totalTableSlotsFor9 = $userModel->get_table_slots_9();
        $totalTableSlotsFor10 = $userModel->get_table_slots_10();

        $total_for_1 = $totalTableSlotsFor1['total_table_slots_1'];
        $total_for_2 = $totalTableSlotsFor2['total_table_slots_2'];
        $total_for_3 = $totalTableSlotsFor3['total_table_slots_3'];
        $total_for_4 = $totalTableSlotsFor4['total_table_slots_4'];
        $total_for_5 = $totalTableSlotsFor5['total_table_slots_5'];
        $total_for_6 = $totalTableSlotsFor6['total_table_slots_6'];
        $total_for_7 = $totalTableSlotsFor7['total_table_slots_7'];
        $total_for_8 = $totalTableSlotsFor8['total_table_slots_8'];
        $total_for_9 = $totalTableSlotsFor9['total_table_slots_9'];
        $total_for_10 = $totalTableSlotsFor10['total_table_slots_10'];
        $currentPageUsers = count($allUsers);
        // Prepare response data
        $data = [
            'users' => $allUsers,
            'pager' => [
                'currentPage' => $currentPage,
                'totalPages' => $pager->getPageCount(),
                'totalUsers' => $totalUsers,
                'currentPageUsers' => $currentPageUsers
            ],
            'total_for_1' => isset($total_for_1) ? 10 - (int) $total_for_1 : 10,
            'total_for_2' => isset($total_for_2) ? 10 - (int) $total_for_2 : 10,
            'total_for_3' => isset($total_for_3) ? 10 - (int) $total_for_3 : 10,
            'total_for_4' => isset($total_for_4) ? 10 - (int) $total_for_4 : 10,
            'total_for_5' => isset($total_for_5) ? 10 - (int) $total_for_5 : 10,
            'total_for_6' => isset($total_for_6) ? 10 - (int) $total_for_6 : 10,
            'total_for_7' => isset($total_for_7) ? 10 - (int) $total_for_7 : 10,
            'total_for_8' => isset($total_for_8) ? 10 - (int) $total_for_8 : 10,
            'total_for_9' => isset($total_for_9) ? 10 - (int) $total_for_9 : 10,
            'total_for_10' => isset($total_for_10) ? 10 - (int) $total_for_10 : 10,
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

                return $this->response->setJSON(['status' => 'success', 'message' => 'Record deleted successfully.']);
            } else {
                return $this->response->setJSON(['status' => 'warning', 'message' => 'Record not found.']);
            }
        }
    }
    public function assignGuestTable()
    {
        $guest_id = $this->request->getPost('guest_id');
        $table_number = $this->request->getPost('table_number');
        $companion_names = $this->request->getPost('companion_name');
        $userModel = model(UserModel::class);
        $companionModel = model(CompanionsModel::class);
        $checker = 0;
        if ($companion_names) {
            // Iterate over each companion provided in the POST request
            foreach ($companion_names as $companion) {
                $companion_id = $companion['id'] ?? null;
                $companion_name = $companion['name'] ?? null;
                if (!empty($companion_id) && !empty($companion_name)) {
                    $checker++;
                }
            }
        }
        $rem_slots = $userModel->getRemSlots($table_number);

        if (empty($table_number)) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Table number is missing.']);
        }
        if ($checker <= $rem_slots) {
            if ($guest_id) {
                $userModel->find($guest_id);
                if ($userModel->update($guest_id, ['table_number' => $table_number])) {
                    if ($companion_names) {
                        $this->assignCompanionsToTable($companion_names, $table_number, $companionModel);
                        return $this->response->setJSON(['status' => 'success', 'message' => 'Table assigned successfully.']);
                    }
                } else {
                    return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to update user table number.']);
                }
            } else if ($companion_names) {
                $this->assignCompanionsToTable($companion_names, $table_number, $companionModel);
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

    public function deleteGuestCompanion()
    {
        $id = $this->request->getPost('id');
        $companionsModel = model(CompanionsModel::class);

        // Check if the user_id exists before attempting to delete
        if ($companionsModel->where('id', $id)) {
            $companionsModel->delete($id);
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
                if ($companion_name) {
                    foreach ($companion_name as $c) {
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
                $userModel->where('will_attend', NULL);
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
}
