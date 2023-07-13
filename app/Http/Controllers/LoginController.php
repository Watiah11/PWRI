<?php

namespace App\Http\Controllers;

use App\Models\RefreshToken;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $phone = '+62'. ltrim(request('nomor'),'0');
        $user = User::where('Phone', request('nomor'))->first();
        if($user){
            $token = tokenRegister($phone);
            Session::put('Token',$token);
            Session::put('Phone',request('nomor'));
            $otp = getOtp($token,$phone);

            if($otp['result']['error_msg'] == "too many requests"){
                return redirect()->to(route('verify-otp'))->with('failed','Anda Melampaui Batas Maksimal Pengiriman OTP');
            }

            return redirect()->to(route('verify-otp'));
        }else{
            return back()->with('failed', 'User tidak ditemukan');
        }
    }

    public function re_send_otp() 
    {
        $phone = '+62'. ltrim(Session::get('Phone'),'0');
        $token = tokenRegister($phone);
        $otp = getOtp($token,$phone);

        if($otp['result']['error_msg'] == "too many requests"){
            return redirect()->to(route('verify-otp'))->with('failed','Anda Melampaui Batas Maksimal Pengiriman OTP');
        }

        return redirect()->to(route('verify-otp'))->with('success','OTP Berhasil Dikirim Ulang');
    }

    public function verifyOtp()
    {
        return view('auth.otp');
    }

    public function sendOtp()
    {
        $phone =  $phone = '+62'. ltrim(Session::get('phone'),'0');
        $requestId = env('USERNAME_NETZME') . date('YmdHis');
        $pin = request('pin');
        $data = sendOtp($phone,$requestId,$pin);
        $status = $data['meta']['code'];
        $user = User::where('Phone',session('Phone'))->first();
        if($status == 200){
            $auths = apiLogin($user->Username, $user->Phone);
            Session::put('User-Agent',$auths['token_web']);
            return redirect()->to(route('home'));
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect()->to(route('login'))->with('success','Berhasil Logout');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function connect() 
    {
        $nomor = request('nomor');
        return view('iframe',compact('nomor'));        
    }

    public function cekResponse ()
    {
        $data = Http::post('https://pwriapi-stg.netzme.com/mobile/register/web',[
            'username' => request('username'),
            'phoneno' => request('nomor')
        ]);

        $auth = get_access();
        $user = User::where('Username',request('username'))->first();
        $datas = collect(getBalance(request('username')));

        if(isset($datas['body']['balance'])){
            $balance = str_replace("IDR ", "", $datas['body']['balance']);
            $auths = apiLogin($user->Username, $user->Phone);
            Session::put('User-Agent',$auths['token_web']);
            Session::put('Balance',$balance);
            Session::put('KodeUser',$user->KodeUser);
            Session::put('ID',$user->ID);
            Session::put('NamaLengkap',$user->NamaUser);
            Session::put('Photo',$user->Photo);
            Session::put('Email',$user->Email);
            Session::put('NoHp',$user->Phone);
            Session::put('Alamat',$user->Alamat);
            Session::put('TanggalLahir',$user->TanggalLahir);
            Session::put('StatusVerify',$user->StatusVerify);

            return $data->json();
        }
    }
    

}






