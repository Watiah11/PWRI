@extends('layanan')
@section('content')
    <div class="container wrapper-riwayat">
        <section>
            <img class="img-fluid" style="border-radius: 10px;" src="{{ asset('assets_landing/img/banner-web-user.png') }}" alt="banner">
        </section>
        <div class="card px-3 py-2 card-riwayat">
            <span>Riwayat</span>
            <br/>
            <div id="listData"></div>
            <br>
        </div>
    </div>
@endsection
@section('scripts')
<script>
    $(function() {
        getData();
        let page = 2;
        $('.card-riwayat').on('scroll', function() {
            if($(this).scrollTop() >= $(this).height()){
                getData(page);
                page++;
            }
        });
    }); 

    function getData(page) {
        $.ajax({
            url: '/riwayat/getData',
            type: 'GET',
            data: {
                page: page
            },
            success: function (data) {
                $('#listData').append(data);
            }
        });
    }
</script>
@endsection