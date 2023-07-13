@extends('layanan')
@section('content')
    <div class="container">
        <section class="banner-topup">
            <img class="img-fluid" style="border-radius: 10px;" src="{{ asset('assets_landing/img/banner-web-user.png') }}" alt="banner">
        </section>
        <x-pin-bayar/> 
    </div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('.pin-container input').on('keyup', function() {
           console.log($(this).val());
        });

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
                    if(ress.status == 200) {
                        location.href = `{{ route('top-up.summary') }}`;
                    }else{
                        alert('PIN Anda Salah !');
                    } 
                })
            }
        });

    });
</script>
@endsection
