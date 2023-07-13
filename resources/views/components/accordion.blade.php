@if ($bank == 'BCA')
<div class="accordion" id="accordionExample">
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Bayar Melalui BCA Virtual Akun
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <span class="fs-6 text-main">ATM BCA</span>
            <ol>
                <li>Masukan kartu ATM BCA & PIN</li>
                <li>Pilih Transaksi Lainya</li>
                <li>Pilih Transfer</li>
                <li>Pilih Rekening BCA Virtual Account</li>
                <li>Masukan nomor Virtual Account</li>
                <li>Masukan jumlah yang ingin dibayarkan</li>
                <li>Validasi pembayaran anda</li>
                <li>Pembayaran selesai</li>
            </ol>
            <span class="fs-6 text-main">BCA Mobile (m-BCA)</span>
            <ol>
                <li>Lakukan Log In pada aplikasi BCA Mobile</li>
                <li>Pilih m-BCA</li>
                <li>Masukan kode akses m-BCA</li>
                <li>Pilih m-Transfer</li>
                <li>Pilih BCA Virtual Account</li>
                <li>Masukan nomor BCA Virtual Account</li>
                <li>Masukan PIN m-BCA</li>
                <li>Pembayaran selesai</li>
            </ol>
            <span class="fs-6 text-main">KlikBCA Individual</span>
            <ol>
                <li>Lakukan Log In pada aplikasi KlikBCA Individual</li>
                <li>Masukan User ID dan PIN</li>
                <li>Pilih transfer ke BCA Virtual Account</li>
                <li>Masukan nomor BCA Virtual Account</li>
                <li>Masukan jumlah yang ingin dibayarkan</li>
                <li>Validasi pembayaran</li>
                <li>Pembayaran selesai</li>
            </ol>
        </div>
      </div>
    </div>
</div>
@elseif ($bank == 'BNI')
<div class="accordion" id="accordionExample">
    <div class="accordion-item">
    <h2 class="accordion-header">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Bayar Melalui BNI Virtual Akun
        </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <span class="fs-6 text-main">ATM BNI</span>
            <ol>
                <li>Masukan kartu ATM BNI & PIN</li>
                <li>Pilih Transaksi Lainya</li>
                <li>Pilih Transfer</li>
                <li>Pilih Rekening BNI Virtual Account</li>
                <li>Masukan nomor Virtual Account</li>
                <li>Masukan jumlah yang ingin dibayarkan</li>
                <li>Validasi pembayaran anda</li>
                <li>Pembayaran selesai</li>
            </ol>
            <span class="fs-6 text-main">BNI Mobile</span>
            <ol>
                <li>Lakukan Log In pada aplikasi BNI Mobile</li>
                <li>Masukan kode akses BNI Mobile</li>
                <li>Pilih m-Transfer</li>
                <li>Pilih BNI Virtual Account</li>
                <li>Masukan nomor BNI Virtual Account</li>
                <li>Masukan PIN BNI Mobile</li>
                <li>Pembayaran selesai</li>
            </ol>
        </div>
    </div>
    </div>
</div>
@elseif ($bank == 'BRI')
<div class="accordion" id="accordionExample">
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Bayar Melalui BRI Virtual Akun
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <span class="fs-6 text-main">ATM BRI</span>
            <ol>
                <li>Masukan kartu ATM BRI & PIN</li>
                <li>Pilih Transaksi Lainya</li>
                <li>Pilih Transfer</li>
                <li>Pilih Rekening BRI Virtual Account</li>
                <li>Masukan nomor Virtual Account</li>
                <li>Masukan jumlah yang ingin dibayarkan</li>
                <li>Validasi pembayaran anda</li>
                <li>Pembayaran selesai</li>
            </ol>
            <span class="fs-6 text-main">BRI Mobile</span>
            <ol>
                <li>Lakukan Log In pada aplikasi BRI Mobile</li>
                <li>Masukan kode akses BRI Mobile</li>
                <li>Pilih m-Transfer</li>
                <li>Pilih BRI Virtual Account</li>
                <li>Masukan nomor BRI Virtual Account</li>
                <li>Masukan PIN BRI Mobile</li>
                <li>Pembayaran selesai</li>
            </ol>
        </div>
      </div>
    </div>
</div>
@elseif ($bank == 'PERMATA')
<div class="accordion" id="accordionExample">
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Bayar Melalui Permata Virtual Akun
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <span class="fs-6 text-main">ATM Permata</span>
            <ol>
                <li>Masukan kartu ATM Permata & PIN</li>
                <li>Pilih Transaksi Lainya</li>
                <li>Pilih Transfer</li>
                <li>Pilih Rekening Permata Virtual Account</li>
                <li>Masukan nomor Virtual Account</li>
                <li>Masukan jumlah yang ingin dibayarkan</li>
                <li>Validasi pembayaran anda</li>
                <li>Pembayaran selesai</li>
            </ol>
            <span class="fs-6 text-main">Permata Mobile</span>
            <ol>
                <li>Lakukan Log In pada aplikasi Permata Mobile</li>
                <li>Masukan kode akses Permata Mobile</li>
                <li>Pilih m-Transfer</li>
                <li>Pilih Permata Virtual Account</li>
                <li>Masukan nomor Permata Virtual Account</li>
                <li>Masukan PIN Permata Mobile</li>
                <li>Pembayaran selesai</li>
            </ol>
        </div>
      </div>
    </div>
</div>
@elseif ($bank == 'MANDIRI')
<div class="accordion" id="accordionExample">
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Bayar Melalui Mandiri Virtual Akun
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <span class="fs-6 text-main">ATM Mandiri</span>
            <ol>
                <li>Masukan kartu ATM Mandiri & PIN</li>
                <li>Pilih Transaksi Lainya</li>
                <li>Pilih Transfer</li>
                <li>Pilih Rekening Mandiri Virtual Account</li>
                <li>Masukan nomor Virtual Account</li>
                <li>Masukan jumlah yang ingin dibayarkan</li>
                <li>Validasi pembayaran anda</li>
                <li>Pembayaran selesai</li>
            </ol>
            <span class="fs-6 text-main">Aplikasi Livin</span>
            <ol>
                <li>Login Livin dengan Username dan Password anda lalu masuk ke menu Bayar</li>
                <li>Tap di menu Pepmbayaran Baru kemudian pilih Multipayment</li>
                <li>Tentukan Rekening Sumber yang akan anda pakai lalu tap input Penyedia Jasa</li>
                <li>Pada kolom pencarian, ketik DigiKop PWRI kemudian pilih penyedia jasa DigiKop PWRI</li>
                <li>Masukan nomor Virtual Account lalu lajut</li>
                <li>Centang jumlah bayar dan tekan Lanjut. Transaksi selesai setelah anda konfirmasi dan masukan MPIN</li>
            </ol>
        </div>
      </div>
    </div>
</div>
@endif