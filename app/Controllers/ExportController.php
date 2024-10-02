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
        $this->syncDataToExportTable();
        // Fetch data from your model with joined information
        $allGuest = new ExportModel();
        $dataObj = $allGuest->findAll();
        $data = json_decode(json_encode($dataObj), true);

        // Extract the array of companions
        $companions = $data;

        // Create new Spreadsheet object
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set column headers
        $sheet->setCellValue('A1', 'ID');
        // $sheet->setCellValue('B1', 'Invite ID');
        $sheet->setCellValue('B1', 'Name');
        $sheet->setCellValue('C1', 'Table Number');
        $sheet->setCellValue('D1', 'Will Attend');
        // $sheet->setCellValue('E1', 'Will Not Attend');
        // $sheet->setCellValue('F1', 'Date');

        // Populate rows
        $rowNumber = 2;
        foreach ($companions as $row) {
            // Check if the key exists before accessing it
            $table_number =  $row['table_number'] !== NULL ? $row['table_number'] == 11 ? 'Kids' : ($row['table_number'] == 12 ? 'Sponsors' : $row['table_number'] ): 'N/A';
    
            $sheet->setCellValue('A' . $rowNumber, $row['id']);
            // $sheet->setCellValue('B' . $rowNumber, $invite_id);
            $sheet->setCellValue('B' . $rowNumber, $row['name']);
            $sheet->setCellValue('C' . $rowNumber, $table_number);
            $sheet->setCellValue('D' . $rowNumber, $row['will_attend']);
            // $sheet->setCellValue('F' . $rowNumber, $row['date']);
            $rowNumber++;
        }

        // Write the file to output
        $writer = new Xlsx($spreadsheet);

        // Set header for download
        $filename = 'WEDDING_GUEST_LIST_' . date('Y-m-d') . '.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        // Output file to browser
        $writer->save('php://output');
        exit;
    }
    private function syncDataToExportTable()
    {
        $companionsModel = model(CompanionsModel::class);
        $usersModel = model(UserModel::class);
        $exportModel = model(ExportModel::class);

        $getUsers = $usersModel->where('will_attend','Yes')->findAll();
        $getCompanions = $companionsModel->where('will_attend','Yes')->findAll();

        $truncateStatus = $exportModel->truncate();

        $dataToExport = [];
        if($truncateStatus){

            if (!empty($getUsers)) {
                foreach ($getUsers as $users) {
                    $dataToExport[] = [
                        'name' => $users->name,
                        'table_number' => ($users->table_number === null) ? 'N/A' :($users->table_number == 11 ? 'Kids' : ($users->table_number == 12 ? 'Sponsors' : $users->table_number)),
                        'will_attend' => $users->will_attend,
                    ];
                }
            }
    
            if (!empty($getCompanions)) {
                foreach ($getCompanions as $companions) {
                    $dataToExport[] = [
                        'name' => $companions->name,
                        'table_number' => ($companions->table_number === null) ? 'N/A' :($companions->table_number == 11 ? 'Kids' : ($companions->table_number == 12 ? 'Sponsors' : $companions->table_number)),
                        'will_attend' => $companions->will_attend,
                    ];
                }
            }
            $exportModel->insertBatch($dataToExport);
        }
    }
    
}
