<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\CompanionsModel;
use App\Models\ExportModel;
use App\Controllers\BaseController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use CodeIgniter\HTTP\ResponseInterface;

class ExportController extends BaseController
{
    public function export()
    {
        // Fetch data from your model with joined information
        $allGuest = new ExportModel();
        $dataObj = $allGuest->findAll();
        $data = json_decode(json_encode($dataObj), true);

        // Create new Spreadsheet object
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set column headers
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Name');
        $sheet->setCellValue('C1', 'Table Number');
        $sheet->setCellValue('D1', 'Confirmed Attendance');

        // Populate rows
        $rowNumber = 2;
        foreach ($data as $row) {
            $sheet->setCellValue('A' . $rowNumber, $row['id']);
            $sheet->setCellValue('B' . $rowNumber, $row['name']);
            $sheet->setCellValue('C' . $rowNumber, $row['table_number']);
            $sheet->setCellValue('D' . $rowNumber, $row['will_attend']);
            $rowNumber++;
        }

        // Write the file to output
        $writer = new Xlsx($spreadsheet);
        $filename = 'WEDDING_GUEST_LIST_' . date('Y-m-d') . '.xlsx';

        // Set headers for download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }

    public function syncDataToExportTable()
    {
        $companionsModel = model(CompanionsModel::class);
        $usersModel = model(UserModel::class);
        $exportModel = model(ExportModel::class);

        $getUsers = $usersModel->where('will_attend', 'Yes')->findAll();
        $getCompanions = $companionsModel->where('will_attend', 'Yes')->findAll();

        $truncateStatus = $exportModel->truncate();

        if ($truncateStatus) {
            $dataToExport = [];
            
            if (!empty($getUsers)) {
                foreach ($getUsers as $users) {
                    $dataToExport[] = [
                        'name' => $users->name,
                        'table_number' => ($users->table_number === null)  ? 'N/A' : ( $users->table_number == 11  ? 'Kids' : ($users->table_number == 12 ? 'Sponsors A' : ( $users->table_number == 13 ? 'Sponsors B' : $users->table_number))),
                        'will_attend' => $users->will_attend,
                    ];
                }
            }

            if (!empty($getCompanions)) {
                foreach ($getCompanions as $companions) {
                    $dataToExport[] = [
                        'name' => $companions->name,
                        'table_number' => ($companions->table_number === null)  ? 'N/A' : ( $companions->table_number == 11  ? 'Kids' : ($companions->table_number == 12 ? 'Sponsors A' : ( $companions->table_number == 13 ? 'Sponsors B' : $companions->table_number))),
                        'will_attend' => $companions->will_attend,
                    ];
                }
            }

            if (!empty($dataToExport)) {
                $syncStatus = $exportModel->insertBatch($dataToExport);

                if ($syncStatus){
                    return $this->response->setJSON(['status' => 'success', 'message' => 'Syncing data successful.']);
                }else {
                    return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to insert data.']);
                }
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'No data to export.']);
            }

        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Truncate failed.']);
        }
    }

}
