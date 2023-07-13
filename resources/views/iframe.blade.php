<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Connect To Netzme</title>
</head>
<style>
    body,
    * {
        margin: 0;
        padding: 0;
    }

    iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: none;
    }
</style>

<body>
    <iframe class="call" src="https://xplorin.netzme.id/themes/pwri?fullname=test&aggregator_id=pwri&android_os=chrome&android_api=12&id_1=123&device=chrome&phone_number={{ $nomor }}" frameborder="0"></iframe>
    <input type="hidden" name="nomor" value="{{ $nomor }}" id="nomor">

    <script src="{{ asset('assets_landing/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('assets_landing/vendor/sweetalert/dist/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets_landing/vendor/jquery-toast-plugin/dist/jquery.toast.min.js') }}"></script>
    <script>
        window.addEventListener("message", (event) => {
            let data = JSON.parse(event.data);
            let nomor = $('#nomor').val();
            if (data.username) {
                $.ajax({
                    url: '{{ route('response') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        username: data.username,
                        nomor
                    },
                    complete: function(xhr) {
                        console.log(xhr.status);
                        if (xhr.status == 200) {
                            location.href = '{{ route('home') }}'
                        }
                    }
                })
            }
        });
    </script>
</body>

</html>
