@extends('auth')

@section('title')
    Verify OTP
@endsection

@section('contents')

<div class="wrapper-otp">
    <div class="form-data px-lg-5 mt-lg-5 wrapper-input w-100">
        <div class="d-flex justify-content-center logo-sm">
        <img src="{{ asset('assets_landing/icon/digikop.png') }}" alt="Logo" width="30%" height="20%">

        </div>
        <div class="d-flex justify-content-center text-welcome">
            <p>Verifikasi OTP</p>
        </div>
        <div class="d-flex justify-content-center align-items-center text-center sub-text-otp">
            <span>Silahkan masukan kode yang <br>Anda terima melalui SMS!</span>
        </div>
        <br>  
        <div class="d-flex justify-content-center align-items-start flex-column">
            <div class="pin-container gap-3 mt-2 mb-4">
                <input class="pin-bayar" type="password" maxlength="1" autofocus/>
                <input class="pin-bayar" type="password" maxlength="1" />
                <input class="pin-bayar" type="password" maxlength="1" />
                <input class="pin-bayar" type="password" maxlength="1" />
            </div>
        </div>
        <div class="d-flex justify-content-center flex-column align-items-center mb-5">
            <span id="quest">Belum menerima kode OTP ?</span>
            <form id="re_send" action="{{ route('re-send-otp') }}" method="POST">
                @csrf

                <button type="submit" onclick="e.preventDefault();document.getElementById('re_send').submit();" class="send" style="border: none; background-color: white !important;">Kirim Ulang</button>
            </form>
        </div>
        {{-- <div class="loaders">
            <div class="box">
                <svg viewBox="25 25 50 50">
                    <circle r="20" cy="50" cx="50"></circle>
                </svg>
            </div>
        </div> --}}
        <form action="{{ route('send-otp') }}" method="post">
            @csrf
            <input type="hidden" name="pin" id="otp">
            <div class="form-row d-flex justify-content-center flex-column align-items-center">
                <button type="submit" class="btn custom-btn rounded-pill text-white px-5 btn-verif">VERIFIKASI</button>
            </div>
        </form>
    </div>
    <div class="banner-login">
    <div style="padding-left: 10rem">
                <div class="d-flex justify-content-center align-items-center pt-5" style="flex-direction: column">
                    <div class="text-white" style="font-weight: bold; font-size: 3.2rem; white-space: nowrap;">
                        DigiKop PWRI
                    </div>
                    <div>
                        <img src="{{ asset('/assets_landing/img/powered-icon-white.png') }}" />
                    </div>
                    <div class="mt-4">
                        <img src="{{ asset('/assets_landing/img/mockup.png') }}" />
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection

@section('script-js')
<script>
    let pinArray =[];
    $('.loaders').addClass('d-none');
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
        let pins = pinArray.join('');
        $('#otp').val(pins);
        // $('.btn-verif').on('click',async function(){
        //     $('.loaders').removeClass('d-none');
        //     $(this).addClass('d-none');
        //     await $.ajax({
        //         url : `{{ route('send-otp') }}`,
        //         method : 'POST',
        //         data : {
        //             _token : '{{ csrf_token() }}',
        //             pin : pins
        //         },
        //         success: function(data){
        //             $('.loaders').addClass('d-none');
        //             if(data.status == 200){
        //                 location.href = '{{ route('home') }}'
        //             }
        //         }
        //     })
        // })
    });
</script>
@endsection