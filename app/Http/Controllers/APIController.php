<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class APIController extends Controller
{
    // public function login(){
    //   $client = new \GuzzleHttp\Client([
    //     'cookies' => true,
    //   ]);
    //   $response = $client->request('POST', 'http://contoh.com/api/login', [
    //     'headers' => [
    //         'Content-Type'     => 'application/x-www-form-urlencoded',
    //      ],
    //       'form_params' => [
    //           'email' => 'simik@gmail.com',
    //           'password' => 'password',
    //       ]
    //   ]);
    //   print_r($response);
    // }

public function login(){
    $data = [
      'email' => 'simik@gmail.com',
      'password' => 'password',
    ];

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "http://contoh.com/api/login",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30000,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        // CURLOPT_CAINFO => "C:xampp/htdocs/cacert.pem",
        CURLOPT_POSTFIELDS => json_encode($data),
        CURLOPT_HTTPHEADER => array(
        	// Set here requred headers
            "accept: */*",
            "accept-language: en-US,en;q=0.8",
            "content-type: application/json",
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        return $response;
    }
  }

}
