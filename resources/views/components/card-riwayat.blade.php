@foreach ($datas as $data)
    <div class="card mt-2">
        @php
            $ppob = $data->ppob ? ($data->ppob->KodePayment ? $data->ppob->KodePayment : 0) : 0;
            $simpanan = getPayment($data->KodePayment, $data->InvoiceID);
        @endphp
        <div class="card-header card-cek">
            @if ($data->KodePayment == 1)
                <div class="d-flex justify-content-between">
                    <span>{{ $simpanan['name'] }}</span>
                    <span>{{ indodates($data->GenerateDate) }}</span>
                </div>
            @elseif ($data->KodePayment == 3)
                <div class="d-flex justify-content-between">
                    <span>{{ $simpanan['name'] }}</span>
                    <span>{{ indodates($data->GenerateDate) }}</span>
                </div>
            @elseif ($data->KodePayment == 5)
                <div class="d-flex justify-content-between">
                    <span>{{ $simpanan['name'] }}</span>
                    <span>{{ indodates($data->GenerateDate) }}</span>
                </div>
            @endif
        </div>
        @if ($data->KodePayment == 1)
            <div class="card-body">
                <span>{{ rupiah($data->Amount) }}</span> -
                <span>{{ $simpanan['description'] }}</span>
                <button type="button" class="btn btn-success float-end">Berhasil</button>
            </div>
        @elseif ($data->KodePayment == 3)
            <div class="card-body">
                <span>{{ rupiah($data->Amount) }}</span> -
                <span>{{ $simpanan['description'] ?? '' }}</span>
                <br>
                <span>{{ $simpanan['reference_id'] ?? '-' }}</span>
                <button type="button" class="btn btn-danger float-end">Gagal</button>
            </div>
        @elseif ($data->KodePayment == 5)
            <div class="card-body">
                <span>{{ rupiah($data->Amount) }}</span> -
                <span>{{ $simpanan['description'] ?? '' }}</span>
                <button type="button" class="btn btn-secondary float-end">Sedang Berlangsung</button>
            </div>
        @endif
    </div>
@endforeach
