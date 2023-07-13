<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class TopUpController extends Controller
{
    public function index ()
    {
        $data = get_access();
        $user = User::where('KodeUser', Session::get('KodeUser'))->first();
        $path = '/payment/aggregator/fixed_va?';
        $method = 'GET';
        $token = $data['access_token'];
        $timestamp = $data['expiry_token'];
        $body = "";
        $userId = strval($user->Username);
        $clientSecret = env('PASSWORD_NETZME');
        $message = "path=" . $path . "userId=" . $userId . "&method=" . $method . "&token=Bearer " . $token . "&timestamp=" . $timestamp . "&body=" . $body;
        $keys = $clientSecret . "-" . $timestamp . '-Bearer ' . $token;

        $hash = hash_hmac("sha256", $message, $keys);
        $client = Http::withHeaders([
            'Signature' => $hash,
            'Client-Id' => env('USERNAME_NETZME'),
            'Authorization' => 'Bearer ' . $token,
            'Request-Time' => $timestamp,
            'Content-Type' => 'application/json'
        ])->get('https://api.netzme.com/payment/aggregator/fixed_va', [
            'userId' => $userId
        ]);

        if (!$client->json()) {
            return response()->json([
                'meta' => 500,
                'message' => 'Internal Server Error'
            ], 500);
        }
        $data = $client->json();
        $va = $data['body']['virtualAccounts'];
        return view('top-up.index',compact('va'));
    }

    public function bayar ()
    {
        return view('top-up.bayar');
    }

    public function summary()
    {
        return view('top-up.summary');
    }

    public function cekPin ()
    {
        $user = User::where('KodeUser', Session::get('KodeUser'))->first();
        return [
            $user,
            request('pin'),
            $user->PIN,
            Session::get('KodeUser'),
            Hash::check(request('pin'), $user->PIN)
        ];
        if(Hash::check(request('pin'), $user->PIN)){
            return response()->json(['status' => 200]);
        }else{
            return response()->json(['status' => 400]);
        }
    }

    public function sessionVa()
    {
        $sessionVa = request('va');
        Session::put('VA',$sessionVa);
        Session::put('Bank',request('bank'));
        return response()->json(['status' => 200]);
    }
}
