<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ShipmentsController extends Controller
{
    public function show(){
        $url = 'https://api.shipments.test-y-sbm.com/shipment';
        $client = new Client(['header'=>[
            'content-type'=>'application/json'
        ]
        ]);
        $response = $client->request('GET',$url,[
            'headers'=>[
                'content-type'=>'application/json',
                'Authorization'=>'Bearer '.$_COOKIE['token']
            ],

        ]);
        $response = $response->getBody();
        $response = \GuzzleHttp\json_decode($response);
        return response()->json($response);
    }
    public function addShipment(Request $request){
        $url = 'https://api.shipments.test-y-sbm.com/shipment';
        $client = new Client(['header'=>[
            'content-type'=>'application/json'
        ]
        ]);
        $response = $client->request('POST',$url,[
            'headers'=>[
                'content-type'=>'application/json',
                'Authorization'=>'Bearer '.$_COOKIE['token']
            ],
            'json'=>$request->data

        ]);
        $response = $response->getBody();
        $response = \GuzzleHttp\json_decode($response);
        return response()->json($response);
    }
}
