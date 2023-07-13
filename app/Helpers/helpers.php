<?php

use App\Models\BasicSavingAccount;
use App\Models\BasicSavingType;
use App\Models\CallbackPayment;
use App\Models\CallbackQris;
use App\Models\Payment;
use App\Models\PaymentDetail;
use App\Models\PaymentQris;
use App\Models\PPOBTrans;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

function get_access()
{
    $client  = Http::withBasicAuth(env('USERNAME_NETZME'), env('PASSWORD_NETZME'))->post('https://api-stg.netzme.com/oauth/token/accesstoken', [
        'grant_type' => 'client_credentials'
    ]);
    $data = [];
    $data['access_token'] = $client['access_token'] ?? '';
    $data['expiry_token'] = $client['expiry_token'] ?? '';

    return $data;
}

function get_merchant_acess()
{
    $client  = Http::withBasicAuth(env('USERNAME_NETZME'), env('MERCHANT_PASSWORD'))->post('https://tokoapi-stg.netzme.com/oauth/merchant/accesstoken', [
        'grant_type' => 'client_credentials'
    ]);
    $data = [];
    $data['access_token'] = $client['access_token'] ?? '';
    $data['expiry_token'] = $client['expiry_token'] ?? '';

    return $data;
}

function tokenRegister($phone)
{
    $client = Http::post('https://xplorin-api-stg.netzme.id/api/v1/auth/token/registration', [
        "aggregator_id" => env('USERNAME_NETZME'),
        "fullname" => "-",
        "phone_number" => $phone,
        "client_info" => [
            [
                "android_os"=> "chrome",
                "android_api"=> "chrome",
                "id_1"=> "11d18b3b6f132133",
                "device"=> "chrome"
            ]
        ]
    ]);
    
    $data = $client->json();

    return $data['token'];
}
function getOtp($token, $phone)
{
    $client = Http::withToken($token, 'Bearer')
        ->post('https://xplorin-api-stg.netzme.id/api/v1/register', [
            "aggregator_id" => env('USERNAME_NETZME'),
            "fullname" => "-",
            "phoneno" =>  $phone,
            "client_info" =>  [
                [
                    "android_os" => "chrome",
                    "android_api" =>  "chrome",
                    "id_1" =>  "11d18b3b6f132133",
                    "device" => "chrome"
                ]
            ]
        ]);

    return $client->json();
}

function sendOtp($phone, $requestId, $pin)
{
    $client = Http::withToken(Session::get('Token'), 'Bearer')
        ->post('https://xplorin-api-stg.netzme.id/api/v1/register/verify_code', [
            "phoneno" => $phone,
            "aggregator_id" => env('USERNAME_NETZME'),
            "fullname" => "-",
            "request_id" => $requestId,
            "verify_type" => "netzme_verification",
            "client_info" => [
                [
                    "android_os" => "chrome",
                    "android_api" => "chrome",
                    "id_1" => "11d18b3b6f132133",
                    "device" => "chrome"
                ]
            ],
            "code" => $pin
        ]);

    $user = User::where('Phone', session('Phone'))->first();
    $datas = getBalance($user->Username);
    if ($datas['body']['balance']) {
        $balance = str_replace("IDR ", "", $datas['body']['balance']);
    }
    Session::put('KodeUser', $user->KodeUser);
    Session::put('ID', $user->ID);
    Session::put('NamaLengkap', $user->NamaUser);
    Session::put('Photo', $user->Photo);
    Session::put('Email', $user->Email);
    Session::put('NoHp', $user->Phone);
    Session::put('Alamat', $user->Alamat);
    Session::put('TanggalLahir', $user->TanggalLahir);
    Session::put('Balance', $balance ?? 0);

    return $client->json();
}

function rupiah($amount)
{
    $formatted_harga = "Rp " . number_format($amount, 0, ",", ".");
    return $formatted_harga;
}

function apiLogin($username, $nomor)
{
    $data = Http::post('https://pwriapi-stg.netzme.com/mobile/register/web', [
        'username' => $username,
        'phoneno' => $nomor
    ]);

    return $data->json();
}

function getToken($username)
{
    $client = Http::withHeaders(['User-Agent' => Session::get('User-Agent')])
        ->post('https://pwriapi-stg.netzme.com/mobile/accesstoken/web', [
            'username' => $username
        ]);
    $data = $client->json();
    return $data['data']['access_token'];
}

function updatePhoto($token, $username, $photo)
{

    $token = getToken($username);

    $client = Http::withHeaders([
        'Accept' => 'application/json',
        'Authorization' => 'Bearer ' . $token
    ])
        ->attach('photo', file_get_contents($photo), $photo->getClientOriginalName())
        ->post('https://pwriapi-stg.netzme.com/mobile/user/upload', [
            'username' => $username,
        ]);
    $data = $client->json();
    Session::put('Photo', $data['url_profile']);
    $code = $data['meta']['code'];
    return $code;
}

function register($token, $username, $noTelp)
{
    $client = Http::withHeaders([
        'Accept' => 'application/json',
        'Authorization' => 'Bearer ' . $token
    ])
        ->post('https://pwriapi-stg.netzme.com/mobile/register/web', [
            'username' => $username,
            'nomor' => $noTelp
        ]);

    $data = $client->json();

    return $data;
}

function getBalance($username)
{
    $data = get_access();
    $path = '/payment/aggregator/balance?';
    $method = 'GET';
    $token =  $data['access_token'];
    $timestamp = $data['expiry_token'];
    $body = "";
    $userId = $username;
    $clientSecret = strval(env('PASSWORD_NETZME'));
    $message = "path=" . $path . "userId=" . $userId . "&method=" . $method . "&token=Bearer " . $token . "&timestamp=" . $timestamp . "&body=" . $body;
    $keys = $clientSecret . "-" . $timestamp . '-Bearer ' . $token;

    $hash = hash_hmac("sha256", $message, $keys);

    $client = Http::withHeaders([
        'Signature' => $hash,
        'Client-Id' => env('USERNAME_NETZME'),
        'Authorization' => 'Bearer ' . $token,
        'Request-Time' => $timestamp,
        'Content-Type' => 'application/json'
    ])->get('https://api-stg.netzme.com/payment/aggregator/balance', [
        'userId' => $userId,
    ]);
    return $client->json();
}

function detailSimpanan($invoice)
{
    $data = PaymentDetail::where('PaymentInvoiceID', $invoice)->first();
    $callback = CallbackPayment::where('InvoiceID', $invoice)->first();
    $account = BasicSavingAccount::whereHas('billing', function ($query) use ($data) {
        $query->where('BillingNumber', $data->NoBilling);
    })->first();
    $data = BasicSavingType::where('KodeBasicSavingType', $account->KodeBasicSavingType)->first();
    $result = [];
    $result['type'] = $callback->PaymentMethod ?? '-';
    $result['name'] = 'Pembayaran ' . $data->Name;
    $result['description'] = 'Pembayaran ' . $data->Name . ' ' . indoDate($account->CreatedDate);
    $result['reference_id'] = $callback->ReffID ?? '-';
    $result['merchant_name'] = $callback->MerchantName ?? '-';
    $result['merchant_location'] = $callback->MerchantLocation ?? '-';
    $result['merchant_pan'] = $callback->MerchantPan ?? '-';
    $result['payment_chanel'] = $callback->PaymentChanel ?? '-';
    return $result;
}

function detailPPOB($invoice)
{
    $result = [];
    $data = PPOBTrans::where('InvoiceID', $invoice)->first();
    switch ($data->KodePayment) {
        case 1:
            $result['name'] = 'Pembayaran PPOB';
            $result['nomor'] = $data->Nomor;
            $result['operator'] = $data->master->KodeOperator;
            $result['description'] = 'Pembelian Pulsa ' . $data->master->Name;
            return $result;
            break;
        case 2:
            $result['name'] = 'Pembelian PPOB';
            $result['nomor'] = $data->Nomor;
            $result['operator'] = $data->master->KodeOperator;
            $result['description'] = 'Pembelian ' . $data->master->Name;
            return $result;
            break;
        case 3:
            $result['name'] = 'Pembelian PPOB';
            $result['nomor'] = $data->Nomor;
            $result['description'] = 'Pembelian Token Listrik ' . $data->master->Name;
            return $result;
            break;
        case 4:
            $result['name'] = 'Pembayaran PPOB';
            $result['nomor'] = $data->Nomor;
            $result['description'] = 'Pembayaran Listrik Prabayar' . $data->Nomor;
            break;
        default:
            $result = null;
            break;
    }
}

function detailQris($invoice)
{
    $result = [];
    $data = Payment::where('InvoiceID', $invoice)->first();
    $callback = CallbackQris::where('ReffID', $data->ReferenceID)->orderBy('GenerateDate', 'desc')->first();
    $detail = PaymentQris::where('ReffID', $data->ReferenceID)->first();
    if ($detail) {
        $result['name'] = 'Pembayaran QRIS';
        $result['description'] = $detail->MerchantName . ' - ' . $detail->MerchantLocation;
        $result['reference_id'] = $callback->TransactionID ?? '-';
        return $result;
    }
    $result['name'] = 'Pembayaran QRIS';
    $result['reference_id'] = $data->ReferenceID;
    return $result;
}

function getPayment($data, $invoice)
{
    switch ($data) {
        case 1:
            $data = detailSimpanan($invoice);
            break;
        case 2:
            $data = 'Pembayaran Pinjaman';
            break;
        case 3:
            $data = detailQris($invoice);
            break;
        case 4:
            $data = 'Pembayaran Deposito';
            break;
        case 5:
            $data = detailPPOB($invoice);
            break;
        default:
            $data = null;
            break;
    }

    return $data;
}

function indoDate($ts)
{
    $date = Carbon::parse($ts);
    $dates = [
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember'
    ];
    $monthIndex = $date->format('n');
    $indonesiaMonth = Arr::get($dates, $monthIndex);
    $dateIndo = $date->format('d') . ' ' . $indonesiaMonth . ' ' . $date->format('Y');
    return $dateIndo;
}
function indoDates($ts)
{
    $date = Carbon::parse($ts);
    $dates = [
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember'
    ];
    $monthIndex = $date->format('n');
    $indonesiaMonth = Arr::get($dates, $monthIndex);
    $dateIndo = $date->format('d') . ' ' . $indonesiaMonth . ' ' . $date->format('Y') . ' ' . $date->format('H:i:s');
    return $dateIndo;
}
function parseTs($ts)
{

    $date = Carbon::createFromTimestamp($ts/1000)->setTimezone('Asia/Jakarta');
    $dates = [
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember'
    ];
    $monthIndex = $date->format('n');
    $indonesiaMonth = Arr::get($dates, $monthIndex);
    $dateIndo = $date->format('d') . ' ' . $indonesiaMonth . ' ' . $date->format('Y') . ' ' . $date->format('H:i:s');
    return $dateIndo;
}
