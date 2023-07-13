<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RiwayatController extends Controller
{
    public function index()
    {
        return view('riwayat.index');
    }

    public function getData(Request $request)
    {
        $page = $request->page ?? 1;
        $user = User::where('KodeUser', Session::get('KodeUser'))->first();
        $datas = Payment::where('KodeUser', $user->KodeUser)->orderBy('GenerateDate', 'desc')->paginate(10);

        return view('components.card-riwayat', compact('datas'));
    }
}
