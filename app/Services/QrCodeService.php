<?php

namespace App\Services;

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

class QrCodeService
{
    public function generateQrCode($text, $size = 300)
    {
        $qrCode = new QrCode($text);
        $qrCode->setSize($size);

        $writer = new PngWriter();
        $result = $writer->write($qrCode);

        // Return the QR code as a data URI
        return $result->getDataUri();
    }
}
