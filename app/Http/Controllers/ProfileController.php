<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
 
    public function index()
    {
       $user = User::where('KodeUser',Session::get('KodeUser'))->first();
        return view('profile.index',compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        if(request()->hasFile('photo')){
            $photo = request()->file('photo');
            $token = getToken($user->Username);
            $data = updatePhoto($token,$user->Username,$photo);

            if($data == 200){
                User::where('ID',$id)->update([
                    'NamaUser' => request('nama') ?? $user->NamaUser,
                    'Email' => request('email') ?? $user->Email,
                    'TanggalLahir' => request('tgl_lahir') ?? $user->TanggalLahir,
                    'JenisKelamin' => request('j_kelamin') ?? $user->JenisKelamin,
                    'Alamat' => request('alamat') ?? $user->Alamat
                ]);

                return back()->with('success','Data Berhasil Di Update');
            }
        }
        User::where('ID',$id)->update([
            'NamaUser' => request('nama') ?? $user->NamaUser,
            'Email' => request('email') ?? $user->Email,
            'TanggalLahir' => request('tgl_lahir') ?? $user->TanggalLahir,
            'JenisKelamin' => request('j_kelamin') ?? $user->JenisKelamin,
            'Alamat' => request('alamat') ?? $user->Alamat
        ]);

        return back()->with('success','Data Berhasil Di Update');

    }
}
