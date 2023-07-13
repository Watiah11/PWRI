@extends('layanan')

@section('content')
<section>
    <img class="img-fluid" style="border-radius: 10px;" src="{{ asset('assets_landing/img/banner-web-user.png') }}" alt="banner">
</section>

<div class="card rounded-3">
    <div class="card-header rounded-top-3" style="background-color: #F24E1E;">
        <span class="text-white">Saldo {{ rupiah($balance) }}</span>
    </div>
    <div class="card-body">
        @foreach ($transaksi as $item)
            <x-card-saldo merchantName="{{ $item['merchantName'] }}" bankCode="{{ $item['bankCode'] }}" itemid="{{ $item['type'] }}" amount="{{ $item['amount'] }}" date="{{ $item['ts'] ?? '-' }}" desc="{{ $item['description'] }}" />
        @endforeach
    </div>
</div>
@endsection