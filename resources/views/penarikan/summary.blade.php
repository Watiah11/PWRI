@extends('layanan')
@section('content')
    <div class="container">
        <section class="banner-topup">
            <img class="img-fluid" style="border-radius: 10px;" src="{{ asset('assets_landing/img/banner-web-user.png') }}" alt="banner">
        </section>
        <div class="col-md-6 mb-3">
            <span class="text-dark">Penarikan Ke Rekening Bank</span>
        </div>
        <div class="card summary-wrapper rounded-3 px-4 py-3">
            <span class="text-dark mb-5">Validasi Penarikan</span>
            <div class="row">
                <div class="col-md-6 mb-3 detail-wrapper">
                    <span class="detail">Nama Bank</span>
                </div>
                <div class="col-md-6 mb-3 detail-wrapper">
                    <span class="detail">Bank BNI</span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3 detail-wrapper">
                    <span class="detail">No Rekening Bank</span>    
                </div>
                <div class="col-md-6 mb-3 detail-wrapper">
                    <span class="detail">1231231191</span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3 detail-wrapper">
                    <span class="detail">Nama Rekening</span>
                </div>
                <div class="col-md-6 mb-3 detail-wrapper">
                    <span class="detail">Rachman Latif</span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3 detail-wrapper">
                    <span class="total">Nominal</span>
                </div>
                <div class="col-md-6 mb-3 detail-wrapper">
                    <span class="total">Rp.100.000</span>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-12">
                    <a href="{{ route('penarikan.bayar') }}" class="btn custom-btn text-white w-75 rounded-pill">Tarik</a>
                </div>
            </div>
        </div>
    </div>
@endsection
