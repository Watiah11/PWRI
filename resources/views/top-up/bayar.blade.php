@extends('layanan')
@section('content')
<section class="banner-topup">
    <img class="img-fluid" src="{{ asset('assets_landing/icon/Frame 1171274875 (1).svg') }}" alt="banner">
</section>
<div class="container wrapper-pinbayar">
    <x-pin-bayar/>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        let pinArray =[];
        $('.pin-bayar').on('keyup', function() {
            if ($(this).val().length === 1) {
                pinArray[$(this).index('.pin-bayar')] = $(this).val();
                if ($(this).index('.pin-bayar') < 5) {
                    $(this).next().focus();
                }
            } else if (event.keyCode === 8 && $(this).index('.pin-bayar') !== 0) {
                pinArray.splice($(this).index('.pin-bayar'), 1); // hapus elemen di index tertentu dari array
                if (pinArray.length === 0) { // cek apakah array kosong
                    pinArray = []; // ubah isi array menjadi kosong
                }
                $(this).prev().focus();
            }
            if(pinArray.length === 6){
                let pins = pinArray.join('');
                $.ajax({
                    url : `{{ route('top-up.pin') }}`,
                    method : 'POST',
                    data : {
                        _token : '{{ csrf_token() }}',
                        pin : pins
                    }
                }).then(ress => {
                    console.log(ress);

                    // if(ress.status == 200) {
                    //     location.href = `{{ route('top-up.summary') }}`;
                    // }else{
                    //     alert('PIN Anda Salah !');
                    // } 
                })
            }
        });

        $('.btn-tampil').on('click',function(){
            var pinInputs = $('.pin-bayar');
            pinInputs.each(function() {
            if ($(this).attr('type') === 'password') {
                $(this).attr('type', 'text');
            } else {
                $(this).attr('type', 'password');
                }
            });
        });
    });
</script>
@endsection