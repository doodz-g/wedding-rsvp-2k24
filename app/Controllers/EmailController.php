<?php

namespace App\Controllers;

class EmailController extends BaseController
{
    public function sendEmail()
    {
        // Load email library
        $email = \Config\Services::email();

        // If using configuration from code instead of .env
        
        $email->initialize([
            'protocol' => 'smtp',
            'SMTPHost' => 'mail.celebratewithus.site',    # Replace 'yourdomain.com' with your actual domain
            'SMTPUser' => 'admin@celebratewithus.site', # Your full cPanel email address
            'SMTPPass' => 'U[U.pl1u*1Z.',       # The password you created for this email account
            'SMTPPort' => 465,                      # Use port 465 for SSL or 587 for TLS
            'SMTPTimeout' => 5,                     # Optional: timeout in seconds
            'SMTPCrypto' => 'ssl',                    # Use 'ssl' for port 465 or 'tls' for port 587
            'mailType' => 'html',                     # Set to 'html' for HTML emails, or 'text' for plain text
            'charset' => 'UTF-8',                     # Character set (default: UTF-8)
            'wordWrap' => true                     # Word wrapping enabled

        ]);
        

        // Set the sender email and name
        $email->setFrom('admin@celebratewithus.site', 'Admin');

        // Set the recipient email
        $email->setTo('eduvigisgarcia88@gmail.com');

        // Set the subject
        $email->setSubject('Test Email from CodeIgniter 4');

        // Set the message (supports HTML)
        $email->setMessage('<h1>This is a test email</h1><p>Hello, this is a test email from CodeIgniter 4.</p>');

        // Optionally attach a file
        // $email->attach('/path/to/your/file.pdf');

        // Send the email
        if ($email->send()) {
            echo 'Email sent successfully!';
        } else {
            // Print debug message if email failed
            echo $email->printDebugger(['headers']);
        }
    }
}
