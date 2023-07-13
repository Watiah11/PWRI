<section>
    <div class="card card-sidebar p-3">
        <div class="d-flex justify-content-start align-items-center gap-4">
            <div class="image-card">
                @if (Session::get('Photo'))
                    <img src="{{ 'https://pwriapi-stg.netzme.com/' . Session::get('Photo') }}" alt="avatar" height="100" width="100">
                @else
                    <img class="rounded-circle shadow-sm" src="{{ asset('assets_landing/icon/avatars-default.jpg') }}" alt="profile" height="100px">
                @endif
            </div>
            <div class="d-flex flex-column align-items-start profile-user">
                <p>{{ Session::get('NamaLengkap') ?? '-' }}</p>
                <div class="d-flex justify-content-center gap-3">
                    <img src="{{ asset('assets_landing/icon/star.svg') }}" alt="start">
                    <span>PWRI Member</span>
                </div>
            </div>
        </div>
        <hr>
        <x-cards/>
        <div class="d-flex flex-column mt-3 mb-lg-5 wrapper-sidebar-link">
            <!-- <li class="list-unstyled d-flex gap-3 mb-3 sidebar-link">
                <img src="{{ asset('assets_landing/icon/Cash-Finance-Loan-Money-Income.svg') }}" alt="cash-out">
                <a href="{{ route('penarikan.index') }}" class="{{ Route::is('penarikan.index') ? 'sidebar-active' : 'text-dark' }}">Transfer</a>
            </li> -->
            <li class="list-unstyled d-flex gap-3 mb-3 sidebar-link">
                <img src="{{ asset('assets_landing/icon/rupiah 1.svg') }}" alt="cash-out">
                <a href="{{ route('saldo.index') }}" class="{{ Route::is('saldo.index') ? 'sidebar-active' : 'text-dark' }}">Cek Saldo</a>
            </li>
            <li class="list-unstyled d-flex gap-3 mb-3 sidebar-link">
                <img src="{{ asset('assets_landing/icon/wallet (1) 2.svg') }}" alt="cash-out">
                <a href="{{ route('top-up.index') }}" class="{{ Route::is(['top-up.index','top-up.bayar','top-up.summary']) ? 'sidebar-active' : 'text-dark' }}">Top Up</a>
            </li>
            <li class="list-unstyled d-flex gap-3 mb-3 sidebar-link">
                <img src="{{ asset('assets_landing/icon/history 1.svg') }}" alt="cash-out">
                <a href="{{ route('riwayat.index') }}" class="{{ Route::is('riwayat.index') ? 'sidebar-active' : 'text-dark' }}">Riwayat</a>
            </li>
        </div>
    </div>
</section>

