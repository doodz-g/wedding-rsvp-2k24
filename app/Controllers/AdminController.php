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
            $totalCompanions = $companionsModel->get_totals();

            // Access numeric values from the results
            $totalGuestCount = $totalGuest['total_users'] ?? 0;
            $totalCompanionCount = $totalCompanions['total_companions'] ?? 0;
            // Prepare response data
            $data = [
                'users' => $allUsers,
                'pager' => [
                    'currentPage' => $currentPage,
                    'totalPages' => $pager->getPageCount(),
                    'totalUsers' => $totalUsers,
                    'currentPageUsers' => $currentPageUsers,

                ],
                'total_guests' => $totalGuestCount + $totalCompanionCount
            ];

            $dataObject = json_decode(json_encode($data));
            return view('admin/home', ['data' => $dataObject]);

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

        // Fetch companions where user_id matches
        $getCompanions = $companionsModel->where('user_id', $user_id)->findAll();

        // Optionally, you can use `json_decode` to convert the object to an array
        return $this->response->setJSON($getCompanions);

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
            $session = session();
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
