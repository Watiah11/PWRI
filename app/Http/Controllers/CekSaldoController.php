<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class CekSaldoController extends Controller
{
    public function index ()
    {
        $data = get_access();
        $user = User::where('KodeUser', Session::get('KodeUser'))->first();
        $path = '/payment/aggregator/history';
        $method = 'POST';
        $token = $data['access_token'];
        $timestamp = $data['expiry_token'];
        $userId = strval($user->Username);
        $requestId = 'pwri' . date('YmdHis') . str_pad(mt_rand(1, 100), 4, 0, STR_PAD_LEFT);
        $body = json_encode([
            "requestId"=> $requestId,
            "type"=>"aggregator_transaction_history",
            "body"=>[
                "userId"=> $userId,
                "limit"=> 10,
                "seqId"=> 0
            ]
        ]);
        $clientSecret = env('PASSWORD_NETZME');

        $message = "path=" . $path  . "&method=" . $method . "&token=Bearer " . $token . "&timestamp=" . $timestamp . "&body=" . $body;
        $keys = $clientSecret . "-" . $timestamp . '-Bearer ' . $token;

        $hash = hash_hmac("sha256", $message, $keys);
        
        $client = Http::withHeaders([
            'Signature' => $hash,
            'Client-Id' => env('USERNAME_NETZME'),
            'Authorization' => 'Bearer ' . $token,
            'Request-Time' => $timestamp,
            'Content-Type' => 'application/json'
        ])->post('https://api-stg.netzme.com/payment/aggregator/history',[
            "requestId"=> $requestId,
            "type"=>"aggregator_transaction_history",
            "body"=>[
                "userId"=> $userId,
                "limit"=> 10,
                "seqId"=> 0
            ]
        ]);

        $transaksi = $client['body']['transactions'] ?? [];

        foreach ($transaksi as $key => $value) {
            $transaksi[$key]['description'] = json_decode($value['details'])->description ?? '';
            $transaksi[$key]['merchantName'] = json_decode($value['details'])->merchantName ?? '';
            $transaksi[$key]['bankCode'] = json_decode($value['details'])->bankCode ?? '';
        }


        $balance = getBalance($user->Username);
        $balance = str_replace("IDR ", "", $balance['body']['balance']);
        Session::put('Balance', $balance);
        
        return view('saldo.index',compact('transaksi', 'balance'));
    }
}
