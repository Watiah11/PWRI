@extends('auth')

@section('title')
Register Member
@endsection
@section('contents')

<style>
    .wrapper-login {
        overflow-x: hidden;
    }

    .form-data {
        margin-left: 4rem;
        margin-right: 4rem;
    }

    #nomor {
        border-radius: 20px !important;
        background: rgb(221, 221, 221);
        height: 3.5rem;
    }

    .btn {
        width: 100%;
        height: 3.5rem;
    }

    .banner-login {
        padding-left: 10rem;
    }

    .text-white {
        font-weight: bold;
        font-size: 3.2rem;
        white-space: nowrap;
    }

    .text-center {
        text-align: center;
    }

    .bottom-text {
        font-size: 1.5rem;
        position: absolute;
        bottom: 6%;
        font-weight: 700;
        text-align: center;
        color: white;
    }
</style>

@extends('auth')

@section('title')
    Login
@endsection

@section('contents')
<div class="wrapper-login">
    <div class="form-data">
        <!-- ...Kode HTML lainnya... -->
        <form action="{{ route('login.store') }}" method="post">
            <!-- ...Kode HTML lainnya... -->
            <input type="number" id="nomor" required name="nomor" class="form-control">
            <!-- ...Kode HTML lainnya... -->
            <button type="submit" class="btn custom-btn">MASUK</button>
            <!-- ...Kode HTML lainnya... -->
        </form>
    </div>
    <div class="banner-login">
        <!-- ...Kode HTML lainnya... -->
        <div class="text-white">
            DigiKop PWRI
        </div>
        <!-- ...Kode HTML lainnya... -->
        <div class="text-center">
            <img src="{{ asset('/assets_landing/img/mockup.png') }}" width="70%">
        </div>
        <!-- ...Kode HTML lainnya... -->
        <div class="bottom-text">
            Ayo daftar dan mulai pengalamanmu bersama kami
        </div>
    </div>
</div>
@endsection