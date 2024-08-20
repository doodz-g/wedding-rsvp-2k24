<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {

        $google_map_key1 = "https://www.google.com/maps/embed/v1/place?q=place_id:ChIJKdlbGeTBlzMRbQxZm8-_ZKQ&key=AIzaSyAc-QXWB4_dbvPDqQU3acosp8InF45vhVs";
        $google_map_key2 = "https://www.google.com/maps/embed/v1/place?q=place_id:ChIJ5fHDdqTHlzMRP8lnCcMPMok&key=AIzaSyAc-QXWB4_dbvPDqQU3acosp8InF45vhVs";

        $data = [
            'google_map_key1'=> $google_map_key1,
            'google_map_key2'=> $google_map_key2,
        ];

        $dataObject = json_decode(json_encode($data));
    
        return view('pages/home', ['data' => $dataObject]);
    }

    
}
