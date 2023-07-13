<div class="card-member d-flex flex-column">
    <p>
        <img src="/assets_landing/img/powered-icon-white.png" width="40%" />
    </p>
    <span class="name">{{ Session::get('NamaLengkap') }}</span>
    <span class="account-number">
        @php
            $kode_user = Session::get('KodeUser');
            $pwri_removed = str_replace('PWRI', '', $kode_user);
            // setiap 4 angka, tambahkan spasi dan 4 angka terakhir ganti XXXX
            $pwri_splitted = str_split($pwri_removed, 4);
            $pwri_splitted[count($pwri_splitted) - 1] = 'XXXX';
            $pwri = implode(' ', $pwri_splitted);
        @endphp
        {{ $pwri }}
    </span>
    <span class="saldo">Saldo</span>
    <span class="saldo-user">{{ rupiah(Session::get('Balance')) }}</span>
</div>