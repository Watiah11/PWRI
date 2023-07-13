<div class="card mt-2">
    <div class="card-header card-cek">
        @if ($itemid == 'qr_invoice')
            <img src="{{ asset('assets_landing/icon/bill 1.svg') }}" alt="#">
            <span>Pembayaran QRIS {{  $merchantName }}</span>
        
        @elseif ($itemid == 'top_up')
            <img src="{{ asset('assets_landing/icon/topup.svg') }}" alt="#">
            <span>Top Up Melalui {{ $bankCode }}</span>

        @elseif($itemid == 'payment_bill')
            <img src="{{ asset('assets_landing/icon/bill 1.svg') }}" alt="#">
            <span>{{ $desc }}</span>
        @else
            <img src="{{ asset('assets_landing/icon/topup.svg') }}" alt="#">
            <span>-</span>
        @endif
    </div>
    <div class="card-body">
        @if ($itemid == 'top_up')
        <div class="d-flex justify-content-between">
            <span>Top Up Saldo {{ rupiah(str_replace("IDR ", "", $amount)) }}</span>
            <span>{{ parseTs($date) }}</span>
        </div>
        @elseif($itemid == 'qr_invoice')
        <div class="d-flex justify-content-between">
            <span>Pembayaran Qris {{ rupiah(str_replace("IDR ", "", $amount)) }}</span>
            <span>{{ parseTs($date) }}</span>
        </div>
        @elseif($itemid == 'payment_bill')
        <div class="d-flex justify-content-between">
            <span>Pembayaran Bill {{ rupiah(str_replace("IDR ", "", $amount)) }}</span>
            <span>{{ parseTs($date) }}</span>
        </div>
        @else
        -
        @endif
    </div>
</div>