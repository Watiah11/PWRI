@extends('layanan')
@section('content')
    <div class="container">
        <section class="banner-topup">
            <img class="img-fluid" style="border-radius: 10px" src="{{ asset('assets_landing/img/banner-web-user.png') }}" alt="banner">
        </section>
        <div class="col-md-6 mb-3">
            <span class="text-dark">Penarikan Ke Rekening Bank</span>
        </div>
        <div class="row p-lg-2 rounded-2 mb-3" style="background-color: rgba(255, 154, 108, 0.05);">
            <div class="form-row">
            </div>
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <x-input name="no_rek" labelName="No Rekening" />
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label for="nominal" style="color: #000000;">Pilih Nominal</label>
                    <div class="d-flex justify-start flex-wrap gap-3 wrraper-nominal">
                        <div class="picker px-5 py-3 rounded-2" data-active="1">50.000</div>
                        <div class="picker px-5 py-3 rounded-2" data-active="1">100.000</div>
                        <div class="picker px-5 py-3 rounded-2" data-active="1">200.000</div>
                        <div class="picker px-5 py-3 rounded-2" data-active="1">300.000</div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <x-input name="no_rek" labelName="Jumlah Lainnya" placeholder="Minimal 50.000"/>
                </div>
            </div>
        </div>
        <div class="form-row">
            <a href="{{ route('penarikan.summary') }}" class="text-white rounded-pill btn btn-1 custom-btn px-5">Lanjut</a>
        </div>
    </div>
@endsection
@section('scripts')
<script>
    $(document).ready(function () {
        $('.picker').on('click',function(){
            $('.picker').removeClass('btn-active');
            $(this).addClass('btn-active');
        })
    })
</script>
@endsection