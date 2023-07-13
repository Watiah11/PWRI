@extends('layanan')

@section('content')
<div class="container mt-md-5 py-5 summary-bayar">
    <span class="text-topup">Top Up Saldo Menggunakan</span>
    <div class="d-flex justify-content-between px-3 py-3 payment-method">
            <img src="/assets_landing/icon/{{ Session::get('Bank') }}.svg" alt="image">
        <a class="text-main" href="{{ route('top-up.index') }}">Ganti</a>
    </div>
    <div class="d-flex justify-content-center flex-column align-items-center mt-md-5 mt-lg-5 wrapper-va">
        <img class="img-fluid" width="600" src="{{ asset('assets_landing/icon/summary.svg') }}" alt="summary">
        <span >Nomor Virtual Akun</span>
        <p id="va">{{ Session::get('VA') }}</p>
        <div class="btn-md btn-custom-1 rounded-pill mb-2" id="salin">Salin Kode</div>
        <div class="d-flex justify-content-center summary-name-akun gap-2">
            <span>Nama Akun :</span>
            <p>{{ Session::get('NamaLengkap') }}</p>
        </div>
    </div>
    <div class="petunjuk">
        <span>Cara Bayar</span>
        <hr class="custom-hr">
        <x-accordion bank="{{ Session::get('Bank') }}"/>
    </div>

</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#salin').click(function() {
            let code = $('#va').text(); // ambil nilai teks dari elemen span
            navigator.clipboard.writeText(code); // salin nilai ke clipboard
            alert('Kode berhasil disalin!'); // beri tahu user bahwa nilai telah disalin
        });
    });
    
</script>
@endsection

{{-- 26257081528880369 --}}
