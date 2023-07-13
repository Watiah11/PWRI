@extends('main')
@section('container')
    <div class="contact-header">
        <span class="text-white">KONTAK KAMI</span>
        <p class="text-white">Hubungi Kami Untuk Segala Pertanyaan Kamu</p>
    </div>
    <div class="container mb-lg-5">
        <div class="d-flex justify-content-center mt-lg-5">
            <span class="me">Kontak Kami</span>
        </div>
        <div class="d-flex justify-content-center">
            <hr class="hr-contact">
        </div>
        <div class="d-flex justify-content-center gap-3 text-center mb-lg-5">
            <div class="pertanyaan">
                <span>Pertanyaan Pers</span>
                <p>Untuk keperluan pers dan media, kunjungi Ruang Berita</p>
            </div>
            <div class="digikop-care">
                <span>DigiKop Care</span>
                <p>Jika Kamu memiliki pertanyaan seputar transaksi atau membutuhkan bantuan lainnya, kunjungi DigiKop Care di sini</p>
            </div>
        </div>
        <div class="d-flex justify-content-center gap-4 wrapper-location">
            <div class="location">
                <span class="text-dark"><i class="bi bi-geo-alt"></i> GRAHA WREDATAMA</span>
                <p>Jl. Pinang Raya No.89, Pondok Labu, Jakarta Selatan 12450 E-mail : sekertariat@pwri.or.id <br>
                    Telp: (021)7665674 - 7665675 Fax: (021) 7665676 Jakarta - Indonesia
                </p>
            </div>
            <div class="maps">
                <iframe
                    width="600"
                    height="200"
                    frameborder="0" style="border:0"
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15862.605167640766!2d106.7947449!3d-6.3094595!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ee180c029f15%3A0xb0094db2e9a258a8!2sGraha%20Wredatama!5e0!3m2!1sid!2sid!4v1682429101345!5m2!1sid!2sid"
                    allowfullscreen>
                </iframe>
            </div>
        {{-- https://goo.gl/maps/fb9RKt53AhyUahQ76 --}}
        </div>
    </div>
@endsection