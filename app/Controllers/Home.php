<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {

        $google_map_key = "https://www.google.com/maps/embed/v1/place?q=place_id:ChIJKdlbGeTBlzMRbQxZm8-_ZKQ&key=AIzaSyAc-QXWB4_dbvPDqQU3acosp8InF45vhVs";
        $data = array('google_map_key'=> $google_map_key);

        $data = [

            'google_map_key'=> $google_map_key,

        ];

        $dataObject = json_decode(json_encode($data));
    
        return view('pages/home', ['data' => $dataObject]);
    }

    
}
