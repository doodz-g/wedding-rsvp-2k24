<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\CompanionsModel;
use App\Controllers\BaseController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use CodeIgniter\HTTP\ResponseInterface;

class ExportController extends BaseController
{
    public function export()
    {
            // Fetch data from your model with joined information
        $model = new UserModel();
        $dataObj = $model->getCompanionsWithUserNames();
        $data = json_decode(json_encode($dataObj), true);

        // Extract the array of companions
        $companions = $data;

        // Create new Spreadsheet object
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set column headers
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Invite ID');
        $sheet->setCellValue('C1', 'Name');
        $sheet->setCellValue('D1', 'Will Attend');
        $sheet->setCellValue('E1', 'Will Not Attend');
        $sheet->setCellValue('F1', 'Date');
        $sheet->setCellValue('G1', 'User Name'); // Additional header for user name

        // Populate rows
        $rowNumber = 2;
        foreach ($companions as $row) {
            // Check if the key exists before accessing it
            $invite_id = isset($row['invite_id']) ? $row['invite_id'] : 'N/A';
            $will_not_attend = isset($row['will_not_attend']) ? $row['will_not_attend'] : 'N/A';

            $sheet->setCellValue('A' . $rowNumber, $row['id']);
            $sheet->setCellValue('B' . $rowNumber, $invite_id);
            $sheet->setCellValue('C' . $rowNumber, $row['name']);
            $sheet->setCellValue('D' . $rowNumber, $row['will_attend']);
            $sheet->setCellValue('E' . $rowNumber, $will_not_attend);
            $sheet->setCellValue('F' . $rowNumber, $row['date']);
            $sheet->setCellValue('G' . $rowNumber, $row['user_name']); // User name from joined table
            $rowNumber++;
        }

        // Write the file to output
        $writer = new Xlsx($spreadsheet);

        // Set header for download
        $filename = 'export_' . date('YmdHis') . '.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        // Output file to browser
        $writer->save('php://output');
        exit;
    }

    private function getData()
    {   
        // Replace this with your actual data fetching logic
        // $userModel = model(UserModel::class);
        $model = new CompanionsModel();

        $data['all_users']  = $model->getCompanionsWithUserNames();
        
        return [
            'all_users'=> $data['all_users']
        ];
    }
}
