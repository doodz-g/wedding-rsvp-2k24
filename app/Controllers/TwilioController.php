<?php

namespace App\Controllers;

use App\Models\OtpModel;
use Twilio\Rest\Client;
use Config\Twilio as TwilioConfig;

class TwilioController extends BaseController
{
    protected $twilio;

    public function __construct()
    {
        // Load Twilio config
        $twilioConfig = new TwilioConfig();
        $this->twilio = new Client($twilioConfig->sid, $twilioConfig->token);
    }

    public function sendSms()
    {
        $qr_setting = $this->request->getPost('qr_setting');  // Receiver's phone number
        $recipient = $this->request->getPost('phone_number');  // Receiver's phone number
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
            try {
                // Send SMS via Twilio
                $this->twilio->messages->create(
                    $recipient,
                    [
                        'from' => (new TwilioConfig())->from,  // Twilio phone number
                        'body' => 'Your code will be: '.$latestOTP['otp'],
                    ]
                );

                return $this->response->setJSON(['status' => 'success', 'message' => 'OTP has been successfully sent!']);
            } catch (\Exception $e) {
                return $this->response->setJSON(['status' => 'error', 'message' => 'OTP was not sent.']);
            }
        }else{
            return $this->response->setJSON(['status' => 'error', 'message' => 'OTP was not generated.']);
        }
    }
}
