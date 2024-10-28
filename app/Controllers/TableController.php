<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\CompanionsModel;
use App\Models\SettingsModel;
use App\Models\NotificationModel;
use App\Models\TableModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class TableController extends BaseController
{
    public function index()
    {
        $session = session();
        if ($session->has('logged_in') || $session->get('logged_in') == true) {

            $this->syncDataforTableDesignation();
            $tableModel = model(TableModel::class);
            $settingsModel = model(name: SettingsModel::class);
            $notificationsModel = model(name: NotificationModel::class);
            $getNotifications = $notificationsModel->findAll();
            $getNotificationsCount = $notificationsModel->where('is_read', 0)->countAllResults();
            $getNotificationsCountAll = $notificationsModel->countAllResults();
            $guestForTable1 = $tableModel->where('table_number', 1)->findAll();
            $guestForTable2 = $tableModel->where('table_number', 2)->findAll();
            $guestForTable3 = $tableModel->where('table_number', 3)->findAll();
            $guestForTable4 = $tableModel->where('table_number', 4)->findAll();
            $guestForTable5 = $tableModel->where('table_number', 5)->findAll();
            $guestForTable6 = $tableModel->where('table_number', 6)->findAll();
            $guestForTable7 = $tableModel->where('table_number', 7)->findAll();
            $guestForTable8 = $tableModel->where('table_number', 8)->findAll();
            $guestForTable9 = $tableModel->where('table_number', 9)->findAll();
            $guestForTable10 = $tableModel->where('table_number', 10)->findAll();
            $guestForTable11 = $tableModel->where('table_number', 11)->findAll();
            $guestForTable12 = $tableModel->where('table_number', 12)->findAll();
            $guestForTable13 = $tableModel->where('table_number', 13)->findAll();

            $getSettingsTableAdult = $settingsModel->where('id', '1')->first();
            $getSettingsTableKids = $settingsModel->where('id', '3')->first();
            $getSettingsTableSponsorsA = $settingsModel->where('id', '4')->first();
            $getSettingsTableSponsorsB = $settingsModel->where('id', '6')->first();

            $data = [
                'table_1' => $guestForTable1,
                'table_2' => $guestForTable2,
                'table_3' => $guestForTable3,
                'table_4' => $guestForTable4,
                'table_5' => $guestForTable5,
                'table_6' => $guestForTable6,
                'table_7' => $guestForTable7,
                'table_8' => $guestForTable8,
                'table_9' => $guestForTable9,
                'table_10' => $guestForTable10,
                'table_11' => $guestForTable11,
                'table_12' => $guestForTable12,
                'table_13' => $guestForTable13,
                'notifications' => $getNotifications,
                'notificationsCount' => $getNotificationsCount ?? 0,
                'notificationsCountAll' => $getNotificationsCountAll ?? 0,
            ];

            $datacaps = [
                'maxCapAdult' =>  $getSettingsTableAdult['quantity'],
                'maxCapKids' =>  $getSettingsTableKids['quantity'],
                'maxCapSponsorA' =>  $getSettingsTableSponsorsA['quantity'],
                'maxCapSponsorB' =>  $getSettingsTableSponsorsB['quantity'],
            ];

            $dataObject = json_decode(json_encode($data));
            return view('admin/table', ['data' => $dataObject,'cap'=>$datacaps]);

        } else {
            return redirect()->to('/login');
        }

    }
    public function refresh()
    {
            $this->syncDataforTableDesignation();
            $tableModel = model(TableModel::class);
            $settingsModel = model(name: SettingsModel::class);
            $guestForTable1 = $tableModel->where('table_number', 1)->findAll();
            $guestForTable2 = $tableModel->where('table_number', 2)->findAll();
            $guestForTable3 = $tableModel->where('table_number', 3)->findAll();
            $guestForTable4 = $tableModel->where('table_number', 4)->findAll();
            $guestForTable5 = $tableModel->where('table_number', 5)->findAll();
            $guestForTable6 = $tableModel->where('table_number', 6)->findAll();
            $guestForTable7 = $tableModel->where('table_number', 7)->findAll();
            $guestForTable8 = $tableModel->where('table_number', 8)->findAll();
            $guestForTable9 = $tableModel->where('table_number', 9)->findAll();
            $guestForTable10 = $tableModel->where('table_number', 10)->findAll();
            $guestForTable11 = $tableModel->where('table_number', 11)->findAll();
            $guestForTable12 = $tableModel->where('table_number', 12)->findAll();
            $guestForTable13 = $tableModel->where('table_number', 13)->findAll();

            $getSettingsTableAdult = $settingsModel->where('id', '1')->first();
            $getSettingsTableKids = $settingsModel->where('id', '3')->first();
            $getSettingsTableSponsorsA = $settingsModel->where('id', '4')->first();
            $getSettingsTableSponsorsB = $settingsModel->where('id', '6')->first();

            $data = [
                'table_1' => $guestForTable1,
                'table_2' => $guestForTable2,
                'table_3' => $guestForTable3,
                'table_4' => $guestForTable4,
                'table_5' => $guestForTable5,
                'table_6' => $guestForTable6,
                'table_7' => $guestForTable7,
                'table_8' => $guestForTable8,
                'table_9' => $guestForTable9,
                'table_10' => $guestForTable10,
                'table_11' => $guestForTable11,
                'table_12' => $guestForTable12,
                'table_13' => $guestForTable13,
                'maxCapAdult' =>  $getSettingsTableAdult['quantity'],
                'maxCapKids' =>  $getSettingsTableKids['quantity'],
                'maxCapSponsorA' =>  $getSettingsTableSponsorsA['quantity'],
                'maxCapSponsorB' =>  $getSettingsTableSponsorsB['quantity'],
            ];

            return $this->response->setJSON($data);
    }
   
    private function syncDataforTableDesignation()
    {
        $companionsModel = model(CompanionsModel::class);
        $usersModel = model(UserModel::class);
        $tableModel = model(TableModel::class);

        $getUsers = $usersModel->where('will_attend', 'Yes')->findAll();
        $getCompanions = $companionsModel->where('will_attend', 'Yes')->findAll();
        $readytoExport = $tableModel->truncate();

        if ($readytoExport) {
            $dataToExport = [];

            if (!empty($getUsers)) {
                foreach ($getUsers as $users) {
                    $dataToExport[] = [
                        'name' => $users->name,
                        'table_number' => $users->table_number,
                        'will_attend' => $users->will_attend,
                    ];
                }
            }

            if (!empty($getCompanions)) {
                foreach ($getCompanions as $companions) {
                    $dataToExport[] = [
                        'name' => $companions->name,
                        'table_number' => $companions->table_number,
                        'will_attend' => $companions->will_attend,
                    ];
                }
            }

            if (!empty($dataToExport)) {
                $syncStatus = $tableModel->insertBatch($dataToExport);

                if ($syncStatus) {
                    log_message('info', 'Syncing Successful.');
                } else {
                    log_message('error', 'Syncing not Successful.');
                }

            } else {
                log_message('error', 'No data to export');
            }

        } else {
            log_message('error', 'Truncate failed');
        }
    }
}
