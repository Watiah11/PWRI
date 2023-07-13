<div class="card border-0 px-lg-5 py-lg-5 h-100 card-pins" style="background-color: rgba(253, 128, 92, 0.05)">
    <span class="pin-title text-dark">PIN</span>
    <div class="d-flex justify-content-center">
        <p class="pin-ubah text-dark">Ubah Pin DigiKop</p>
    </div>
    <div class="d-flex justify-content-center align-items-center mb-3 flex-column">
        <div class="d-flex justify-content-center align-items-start flex-column">
            <span class="text-dark text-pins">Masukan 6 Digit PIN Lama Kamu</span>
            <div class="pin-container gap-3 mt-2 mb-4">
                <input type="password" maxlength="1" autofocus/>
                <input type="password" maxlength="1" />
                <input type="password" maxlength="1" />
                <input type="password" maxlength="1" />
                <input type="password" maxlength="1" />
                <input type="password" maxlength="1" />
            </div>
        </div>
        <div class="d-flex justify-content-center flex-column">
            <span class="text-dark text-pins">Masukan 6 Digit PIN Baru Kamu</span>
            <div class="pin-container gap-3 mt-2 mb-4">
                <input type="password" maxlength="1" autofocus/>
                <input type="password" maxlength="1" />
                <input type="password" maxlength="1" />
                <input type="password" maxlength="1" />
                <input type="password" maxlength="1" />
                <input type="password" maxlength="1" />
            </div>
        </div>
    </div>
  
    @php
        $ubah = $ubah ?? 0;
    @endphp
    @if ($ubah == 1)
    <div class="text-center text-dark mt-lg-5 pin-ket">PIN harus berupa angka, gunakan kombinasi <br> angka yang tidak mudah ditebak</div>
    @endif
    
    <div class="text-center mt-lg-5">
        <div class="btn btn-pins px-5 rounded-pill">Selanjutnya</div>
    </div>
</div>