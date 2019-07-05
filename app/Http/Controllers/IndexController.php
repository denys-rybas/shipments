<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;


class IndexController extends Controller
{
    public function index()
    {
        return view('layouts/app');
    }
    public function get_user(Request $request)
    {
        $url = 'https://api.shipments.test-y-sbm.com/login';
        $client = new Client(['header'=>[
        'content-type'=>'application/json'
        ]
    ]);
       $response = $client->request('POST',$url,[
           'headers'=>[
               'content-type'=>'application/json'
           ],
           'json'=>$request->data
       ]);
        $response = $response->getBody();
        $user_token = \GuzzleHttp\json_decode($response)->data[0]->token;
        setcookie('token', $user_token, time()+60*60*24*365);
        return response()->json('token has been set in cookies');
    }

}
