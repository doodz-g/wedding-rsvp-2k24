<?php

namespace App\Controllers;

use App\Services\QrCodeService;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class QrCodeController extends BaseController
{
    public function index()
    {
        $qrCodeService = new QrCodeService();
        $text = 'https://www.example.com'; // Example text to encode
        $qrCodeUri = $qrCodeService->generateQrCode($text);

        // Pass the QR code URI to the view
        return view('qr_code_view', ['qrCodeUri' => $qrCodeUri]);
    }
}
