<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Pusher\Pusher;

class Notification extends BaseController
{
    public function index()
    {
        $options = [
            'cluster' => 'ap3',
            'useTLS' => true
        ];

        $pusher = new Pusher(
            'b012177f6ee3695e54b9',
            '4904ff2acd898d494475',
            '1852485',
            $options
        );

        $data['message'] = 'Hello, this is a notification!';
        $pusher->trigger('my-channel', 'my-event', $data);
    }
}
