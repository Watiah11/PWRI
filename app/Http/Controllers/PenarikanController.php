<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenarikanController extends Controller
{
    public function index()
    {
        return view('penarikan.index');
    }

    public function summary()
    {
        return view('penarikan.summary');
    }

    public function bayar()
    {
        return view('penarikan.bayar');
    }
}
