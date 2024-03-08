<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function process (Request $request)
    {
        $response = (new API\RegisterController)->login($request);

//        Log::debug(__METHOD__ . ': $response : ' . print_r($response, true));

        $resp = json_encode($response, true);

//        Log::debug(__METHOD__ . ': $resp : ' . print_r($resp, true));

        $r = json_decode($resp, true);

        Log::debug(__METHOD__ . ': $r : ' . print_r($r, true));

        if ($r['original']['success']) {
            return view('home')->with('payload', $r);
        } else {
            return view('bad');
        }
    }
}
