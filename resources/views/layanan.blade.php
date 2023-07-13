<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>PWRI Digikop</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Favicons -->
    <link href="{{ asset('assets_landing/logo.png' ) }}" rel="icon">
    {{-- <link href="{{ asset('assets_landing/img/apple-touch-icon.png') }}" rel="apple-touch-icon"> --}}

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_landing/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_landing/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_landing/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_landing/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_landing/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

    <!-- Template Main CSS File -->
    <link rel="stylesheet" href="{{ asset('assets_landing/css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_landing/css/hero.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_landing/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_landing/css/card-member.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_landing/css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_landing/css/penarikan.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_landing/css/summary.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_landing/css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_landing/css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_landing/css/about.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_landing/css/contact.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_landing/css/topup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_landing/css/pin-bayar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_landing/css/summary-bayar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_landing/css/riwayat.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_landing/css/card-riwayat.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_landing/css/card-saldo.css') }}">
    <link href="{{ asset('assets_landing/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('node_modules/dropify/dist/css/dropify.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="{{ asset('assets_landing/vendor/jquery-toast-plugin/dist/jquery.toast.min.css') }}" rel="stylesheet"
    type="text/css">

    <style>
        * {
            font-family: 'Roboto', sans-serif !important;
        }
    </style>


  </head>
  <body>
    @php
        $isLogin = Session::get('ID') ? 1 : 0;
    @endphp
    <header id="header">
      <x-navbar :isLogin="$isLogin" />
    </header>
    <main>
        <div class="container mb-lg-5">
            <div class="row wrapper-layanan">
                <div class="col-md-4">
                    <x-sidebar/>
                </div>
                <div class="col-md-8 ">
                    @yield('content')
                </div>
            </div>
        </div>
    </main>
    <footer id="footer">
        <div class="d-flex justify-content-around footer-name py-5">
            <div class="footer-download">
                <p class="footer-company">DigiKop PWRI</p>
                <span class="text-footer">Koperasi Digital PWRI <br> Powered By Netzme</span>
                <br>
                <span class="sub-text">Unduh dan Nikmati Layanan Kami</span>
                <div class="d-flex justify-content-between btn-download">
                    <a href="https://play.google.com/store/apps/details?id=id.or.pwri.digikop" target="_blank" style="cursor: pointer;" class="playstore">
                        <img src="{{ asset('assets_landing/icon/Google Play.svg') }}" alt="playstore">
                    </a>
                    <a href="#" style="cursor: pointer;"class="appstore">
                        <img src="{{ asset('assets_landing/icon/Google Play (1).svg') }}" alt="appstore">
                    </a>
                </div>
            </div>
            <div class="d-flex gap-3 gap-md-5 footer-link">
                <div class="organisasi">
                    <span>Organisasi</span>
                    <li class="d-flex flex-column gap-lg-3 gap-md-3 mt-lg-3">
                        <a href="{{ route('about') }}">Tentang Kami</a>
                        <a href="{{ route('layanan.index') }}">Layanan</a>
                        <a href="{{ route('contact') }}">Kontak</a>
                    </li>
                </div>
                <div class="bantuan">
                    <span>Bantuan</span>
                    <li class="d-flex flex-column gap-lg-3 mt-lg-3">
                        <a href="#">FAQ</a>
                    </li>
                </div>
                <div class="layanan">
                    <span>Layanan</span>
                    <li class="d-flex flex-column gap-lg-3 mt-lg-3">
                        <a href="#">Pembiayaan</a>
                        <a href="#">Simpanan</a>
                        <a href="#">Marketplace</a>
                        <a href="#">QRIS</a>
                    </li>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-around align-items-center p-lg-3 bottom-footer text-white">
            <div class="copyright text-white">&copy; Copyright PWRI-Netzme 2023. </div>
            <div class="d-flex justify-content-evenly align-items-center gap-lg-5 ">
                <div class="persyaratan">
                    <a href="#">Persyaratan Layanan |</a>
                    <a href="#">Kebijakan Privasi</a>
                </div>
                <div class="sosial-media d-flex gap-lg-3">
                    <a href="#" class="rounded-circle px-2 py-1">
                        <i class="bi bi-facebook text-white"></i>
                    </a>
                    <a href="#" class="rounded-circle px-2 py-1">
                        <i class="bi bi-twitter text-white"></i>
                    </a>
                    <a href="#" class="rounded-circle px-2 py-1">
                        <i class="bi bi-linkedin text-white"></i>
                    </a>
                    <a href="#" class="rounded-circle px-2 py-1">
                        <i class="bi bi-instagram text-white"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="{{ asset('assets_landing/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets_landing/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets_landing/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets_landing/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('assets_landing/vendor/jquery-toast-plugin/dist/jquery.toast.min.js') }}"></script>
    <script src="{{ asset('js/dropify.js') }}"></script>


    <!-- Template Main JS File -->
    <script src="{{ asset('assets_landing/js/main.js') }}"></script>
    @if (session()->has('success'))
        <script>
            $.toast({
                heading: 'Berhasil',
                text: '{{ session()->get('success') }}',
                position: 'top-right',
                loaderBg: '#88c241',
                class: 'jq-toast-primary',
                hideAfter: 9500,
                stack: 6,
                showHideTransition: 'fade'
            });
        </script>
    @endif
    @if (session()->has('failed'))
        <script>
            $.toast({
                heading: 'Gagal',
                text: '{{ session()->get('failed') }}',
                position: 'top-right',
                loaderBg: '#88c241',
                class: 'jq-toast-warning',
                hideAfter: 9500,
                stack: 6,
                showHideTransition: 'fade'
            });
        </script>
    @endif
    @yield('scripts')
    <script>
        $(window).scroll(function() {
        var scroll = $(window).scrollTop();
            if (scroll) {
                $("#header").addClass("fixed-top header-scrolled");
            } else {
                $("#header").removeClass("fixed-top header-scrolled");
            }
            
        });
        $('.avatar').click(function() {
        $('.dropdown-menu').toggle();
        });
    </script>
    <script>
        $(document).ready(function(){
            $('.pin-container input').on('keyup', function() {
                if ($(this).val().length === 1) {
                    $(this).next().focus();
                }else if (event.keyCode === 8 && $(this).val().length === 0 && $(this).index() !== 0) {
                    $(this).prev().val('').focus();
                }
            });
        })
    </script>
</body>
</html>
