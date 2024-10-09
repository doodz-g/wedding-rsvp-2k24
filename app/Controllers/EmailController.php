<?php

namespace App\Controllers;
use CodeIgniter\Email\Email;
class EmailController extends BaseController
{
    public function sendEmail()
    {
        $email = new Email();
        // Enable debugging
        $email->setFrom('admin@celebratewithus.site', 'You'); // Sender's email and name
        $email->setTo('eduvigisgarcia88@gmail.com'); // Recipient's email

        $email->setSubject('Email Test');
        $email->setMessage('This is a test email sent from CodeIgniter 4 using Private Email.');

        if ($email->send()) {
            return 'Email sent successfully! '. $email->printDebugger(['headers']);
        } else {
            return 'Email not sent. Error: ' . $email->printDebugger(['headers']);
        }
    }
}
