@extends('auth')  

@section('title')
    Login
@endsection

@section('contents')
<div class="wrapper-login" style="overflow-x: hidden;">
    <div class="form-data px-lg-5 mt-lg-5 wrapper-input w-100">
        <div class="d-flex justify-content-center logo-sm">
        <img src="{{ asset('assets_landing/icon/digikop.png') }}" alt="Logo" width="30%" height="20%">
        </div>
        <div class="d-flex justify-content-center text-welcome pt-3">
            <p>Selamat Datang</p>
        </div>
        <br>
        <form action="{{ route('login.store') }}" method="post" style="margin-left: 4rem;
    margin-right: 4rem;">
            @csrf
            <div class="form-row mb-5">
                <label for="nomor" style="margin-bottom: 10px; font-size: 18px;">Masukan No. Ponsel</label>
                <input type="number" id="nomor" required name="nomor" class="form-control px-lg-3 py-lg-3 px-md-2 py-md-2" style="border-radius: 20px !important; background: rgb(221, 221, 221); height: 3.5rem;">
            </div>
            <div class="form-row d-flex justify-content-center flex-column align-items-center">
                <button type="submit" class="btn custom-btn rounded-pill text-white px-5 py-2 btn-login" style="
                width: 100%;
    height: 3.5rem;
    ">MASUK</button>
                <div class="d-flex justify-content-center align-items-center gap-2 text-question">
                    <div>Belum punya akun? </div>
                    <a href="{{ route('register') }}">Daftar disini</a>
                </div>
            </div>
        </form>
    </div>
    <div class="banner-login"> 
        <div style="padding-left: 10rem">
                <div class="d-flex justify-content-center align-items-center pt-5 relative" style="flex-direction: column">
                    <div class="text-white" style="font-weight: bold; font-size: 3.2rem; white-space: nowrap;">
                        DigiKop PWRI
                    </div>
                    <div>
                        <img src="{{ asset('/assets_landing/img/powered-icon-white.png') }}" />
                    </div>
                    <div style="text-align: center;" class="mt-4">
                        <img src="{{ asset('/assets_landing/img/mockup.png') }}" width="70%" />
                    </div>
                    <div style="
                        font-size: 1.5rem;
                        position: absolute;
                        bottom: 6%;
                        font-weight: 700;
                        text-align: center;
                        color: white;
                    ">
                        Ayo daftar dan mulai pengalamanmu bersama kami
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection