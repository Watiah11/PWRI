@extends('layanan')

@section('content')
<section class="banner-topup">
    <img class="img-fluid" src="{{ asset('assets_landing/icon/Frame 1171274875 (1).svg') }}" alt="banner">
</section>
<div class="container topup-wrapper">
    <div class="mb-3 px-2 py-3 top-up-title">
        <span class="text-dark">Ada banyak cara untuk top up, Pilih cara yang kamu suka</span>
    </div>
    <div class="row">
        <div class="bank-wrapper rounded-2 mb-3">
            <span>Pilih Bank Virtual Akun</span>
            <div class="row mt-lg-4">
                @foreach ($va as $item)
                <div class="col-md-6 mb-3">
                    <div class="d-flex justify-content-start align-items-center gap-3 picker-bank rounded-2 px-3" data-bank="{{ $item['bankCode'] }}" data-va="{{ $item['accountNumber'] }}">
                        <img class="img-fluid" src="/assets_landing/icon/{{ $item['bankCode'] }}.svg" alt="bank">
                        <div class=" px-lg-5 px-md-2 py-lg-3 py-md-2 rounded-2">{{ $item['bankCode'] }}</div>
                    </div>
                </div>
                @endforeach 
            </div>
        </div>
    </div>
    <button disabled class="text-white rounded-pill btn custom-btn px-5">Lanjut</button>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {

        $('.picker-bank').on('click',function(){
            $('.picker-bank').removeClass('picker-active');
            $(this).addClass('picker-active');
            $('.custom-btn').attr('disabled',false);
        })
        $('.pin-container input').on('keyup', function() {
        console.log($(this).val());
        });
        
        $('.custom-btn').on('click',function(){
            let va = $('.picker-active').attr('data-va');
            let bank = $('.picker-active').attr('data-bank');

            $.ajax({
                url : '{{ route('top-up.va') }}',
                method : 'POST',
                data : {
                    _token : '{{ csrf_token() }}',
                    va,
                    bank
                }
            }).then(ress => {
                if(ress.status == 200){
                    location.href = '{{ route('top-up.summary') }}'
                }
            })
        })
    })
</script>
@endsection