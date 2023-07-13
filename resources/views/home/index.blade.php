@extends('main')
@section('container')
<div class="wrapper-hero">
    <x-hero/>
</div>
<div class="wrapper-mid">
    <div class="text-center text-white px-lg-5 mid-text">
        <p class="title-mid">Mengapa Memilih Digikop PWRI</p>
        <span >DigiKop PWRI adalah aplikasi Koperasi Digital yang akan melayani kebutuhan transaksi keuangan dan mendukung kegiatan usaha para anggota PWRI dengan memberikan akses kemudahan melalui smartphone kamu kapan saja dan di mana saja. Kami menyebutnya “Cara Mudah Mengatur Keuangan dan Usaha Kamu Dalam Satu Genggaman”.</span>
    </div>
    <div class="d-flex gap-5 justify-content-center text-center card-mid mt-5 mt-lg-5">
        <a class="card-custom shadow-custom rounded-3">
            <div class="card-body">
                <div class="image-card text-center">
                    <img src="{{ asset('assets_landing/icon/registration 1.svg') }}" alt="register">
                </div>
                <div class="card-text text-black">
                    <p>Daftar Mudah</p>
                    <span>Buat akun Digikop PWRI lalu lakukan Upgrade Member, semudah itu untuk mendapatkan layanan dari kami</span>
                </div>
            </div>
        </a>
        <a class="card-custom shadow-custom rounded-3">
            <div class="card-body">
                <div class="image-card text-center">
                    <img src="{{ asset('assets_landing/icon/loan (10) 1.svg') }}" alt="register">
                </div>
                <div class="card-text text-black">
                    <p style="
                    white-space: nowrap;
                ">Dapatkan Pembiayaan</p>
                    <span>Setiap anggota koperasi memiliki kesempatan yang sama untuk mendapatkan kemudahan pembiayaan dari DigiKop PWRI</span>
                </div>
            </div>
        </a>
        <a class="card-custom shadow-custom rounded-3">
            <div class="card-body">
                <div class="image-card text-center">
                    <img src="{{ asset('assets_landing/icon/logo-qris-black@3x.svg') }}" alt="register">
                </div>
                <div class="card-text text-black">
                    <p>Tersedia QRIS</p>
                    <span >Digikop PWRI didukung oleh sistem pembayaran QRIS dari Netzme membuat lebih memudahkan setiap transaksi pembayaran kamu</span>
                </div>
            </div>
        </a>
    </div>
</div>
<div class="wrapper-information">
    <div class="d-flex justify-content-center align-items-center gap-lg-5">
        <div class="image-information img-fluid">
            <img src="{{ asset('assets_landing/icon/Silver 1.svg') }}" alt="example-app">
        </div>
        <div class="text-information">
            <div class="headers">
                <p class="header-information">Pembiayaan Modal Usaha Bantu Kamu Kembangkan Usaha Lebih Cepat</p>
                <span class="footer-information">Kami hadir dengan komitmen mensejahterakan seluruh anggota PWRI melalui produk pembiayaan dan sistem pembayaran QRIS</span>
            </div>
            <br>
            <div class="footers" style="margin-top: 20%">
                <p>Pembiayaan Modal Usaha Bantu Kamu Kembangkan Usaha Lebih Cepat</p>
                <div class="d-flex justify-content-start flex-wrap gap-3 wrapper-btn-download">
                    <a href="https://play.google.com/store/apps/details?id=id.or.pwri.digikop" target="_blank" class="btn custom-btn px-5 play-store rounded-pill d-flex justify-content-center align-items-center gap-2" style="color: white; margin: 0;">
                        <img class="img-fluid" src="{{ asset('assets_landing/icon/playstore 1.svg') }}" alt="playstore">
                        <span>Download</span>
                    </a>
                    <a class="btn custom-btn px-5 app-store rounded-pill d-flex justify-content-center align-items-center gap-2" style="color: white; margin: 0;">
                        <img class="img-fluid" src="{{ asset('assets_landing/icon/apple.svg') }}" alt="playstore">
                        <span>Download</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection