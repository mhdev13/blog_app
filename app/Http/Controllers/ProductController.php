<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    //GET
    public function index(){
        
        $client = new \GuzzleHttp\Client();
        $response = $client->get('https://cms.maungaji.co.id/user/getUser', ['verify' => false]);
        $body = $response->getBody();

        echo $body;
    }
}
