@extends('main')

@section('container')
<div class="container mb-5">
    <div class="row mt-lg-5 wrapper-profile">
        <div class="col-md-4">
            <div class="card card-profile p-3">
                <div class="d-flex justify-content-start align-items-center gap-4">
                    <div class="image-card">
                        @if (isset($user->Photo))
                            <img src="{{ 'https://pwriapi-stg.netzme.com/' . $user->Photo }}" alt="avatar" height="100" width="100">
                        @else
                            <img class="rounded-circle shadow-sm" src="{{ asset('assets_landing/icon/avatars-default.jpg') }}" alt="profile" height="100px">
                        @endif
                    </div>
                    <div class="d-flex flex-column profile-user">
                        <p>{{ $user->NamaUser }}</p>
                        <div class="d-flex justify-content-center gap-3">
                            <img src="{{ asset('assets_landing/icon/star.svg') }}" alt="start">
                            <span>PWRI Member</span>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row gap-4">
                    <div class="col-md-12">
                        <div class="card card-saldo px-3 py-2 text-white">
                            <div class="d-flex justify-content-start align-items-center gap-3">
                                <img src="{{ asset('assets_landing/icon/wallet.svg') }}" alt="wallet">
                                <div class="card-saldo">
                                    <p style="font-size: 18px; font-weight: 700;margin: 0;">Saldo</p>
                                    <p style="font-size: 12px; font-weight: 400;margin-top: 0;">Powered By Netzme</p>
                                    <span style="font-size: 18px;">{{ rupiah(intval(Session::get('Balance'))) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card card-simpanan px-3 py-2 text-white">
                            <div class="d-flex justify-content-start align-items-center gap-3">
                                <img src="{{ asset('assets_landing/icon/wallet.svg') }}" alt="wallet">
                                <div class="card-simpanan">
                                    <span>Simpanan</span>
                                    <br>
                                    <span>Rp.0,-</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 text-dark">
                        <span>Cabang Koperasi</span>
                    </div>
                </div>
                <div class="d-flex justify-content-start gap-3 ms-3 mt-3 text-dark">
                    <i class="bi bi-geo-alt"></i>
                    <span>DKI Jakarta</span>
                </div>
            </div>
        </div>
        <div class="col-md-8 detail-profile">
            <ul class="nav nav-pills mb-3 gap-lg-5 gap-md-5" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-toggle="pill" data-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Biodata Diri</button>
                </li>
            </ul>
            <div class="tab-content px-3" id="pills-tabContent">
                <div class="tab-pane fade active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="d-flex justify-content-start gap-lg-5 gap-md-2 mb-3 wrapper-profile-avatar">
                        <div class="img-avatar d-flex justify-content-centet flex-column align-items-center gap-3">
                            @if (isset($user->Photo))
                            <img src="{{ 'https://pwriapi-stg.netzme.com/' . $user->Photo }}" alt="avatar" 
                            height="150" width="150">
                            @else
                            <img class="rounded-3 shadow-sm" src="{{ asset('assets_landing/icon/avatars-default.jpg') }}" alt="profile" width="150" height="150">
                            @endif
                        </div>
                        <div class="data-diri w-75">
                            <p class="title">Ubah Biodata Diri</p>
                            <div class="row ms-3 wrapper-data-diri">
                                <div class="col-md-4">
                                    <span>Nama</span>
                                </div>
                                <div class="col-md-8 profile-info">
                                    <p>{{ $user->NamaUser }}</p>
                                </div>
                            </div>
                            <div class="row ms-3 wrapper-data-diri">
                                <div class="col-md-4">
                                    <span>Tanggal Lahir</span>
                                </div>
                                <div class="col-md profile-info">
                                    <p>{{ date('d-m-Y',strtotime($user->TanggalLahir)) ?? '-' }}</p>
                                </div>
                            </div>
                            <div class="row ms-3 wrapper-data-diri">
                                <div class="col-md-4">
                                    <span>Jenis Kelamin</span>
                                </div>
                                <div class="col-md profile-info">
                                    <p>{{ $user->JenisKelamin ?? '-' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kontak d-flex flex-column gap-3 mb-3">
                        <span class="title">Kontak</span>
                        <div class="row" style="margin-left: 20px">
                            <div class="col-md-3">
                                <span class="text-dark">Email</span>
                            </div>
                            <div class="col-md-8 d-flex justify-content-start gap-3">
                                <span style=" color: #F24E1E;">{{ $user->Email ?? '-' }}</span>
                                <div class="verifikasi">Terverifikasi</div>
                            </div>
                        </div>
                        <div class="row" style="margin-left: 20px">
                            <div class="col-md-3">
                                <span class="text-dark">No Handphone</span>
                            </div>
                            <div class="col-md-8 d-flex justify-content-start gap-3">
                                <span class="flex-grow-0" style=" color: #F24E1E;">{{ $user->Phone }}</span>
                                <div class="verifikasi flex-grow-0">Terverifikasi</div>
                            </div>
                        </div>
                    </div>
                    <div class="alamat d-flex flex-column gap-3 mb-lg-5">
                        <span class="title">Alamat</span>
                        <div class="row" style="margin-left: 20px">
                            <div class="col-md-12">
                                <span class="text-dark">{{ $user->Alamat ?? '-' }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="btn btn-md rounded-pill px-5 custom-btn text-white py-2" data-toggle="modal" data-target="#exampleModal" id="edit-profile">Edit Profile</div>
                    </div>
                
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal Ubah Name     --}}
<div class="modal" id="exampleModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
        <div class="d-flex justify-content-end px-5 py-4">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('profile.edit',$user->ID) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-body px-5 py-4 wrapper-modal-name">
                <div class="d-flex justify-content-center align-items-center flex-column modal-name-header">
                    <span>Ubah Profile</span>
                </div>
                <div class="d-flex justify-content-start flex-column gap-2 modal-name-input mb-3">
                    <label for="nama" class="fw-bold">Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{ $user->NamaUser }}">
                </div>
                <div class="d-flex justify-content-start flex-column gap-2 modal-name-input mb-3">
                    <label for="email" class="fw-bold">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $user->Email }}">
                </div>
                <div class="d-flex justify-content-start flex-column gap-2 modal-name-input mb-3">
                    <label for="alamat" class="fw-bold">alamat</label>
                    <input type="text" name="alamat" class="form-control" value="{{ $user->Alamat }}">
                </div>
                <div class="d-flex justify-content-start flex-column gap-2 modal-name-input mb-3">
                    <label for="tgl_lahir" class="fw-bold">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tgl_lahir" value="{{ date('Y-m-d',strtotime(Carbon\Carbon::parse($user->TanggalLahir))) }}">
                </div>
                <div class="d-flex justify-content-start flex-column gap-2 modal-name-input mb-3">
                    <label for="j_kelamin" class="fw-bold">Jenis Kelamin</label>
                    <select name="j_kelamin" id="j_kelamin" class="form-control">
                        <option {{ $user->JenisKelamin == 'Pria' ? 'selected' : '' }} value="Pria">Pria</option>
                        <option {{ $user->JenisKelamin == 'Wanita' ? 'selected' : '' }} value="Wanita">Wanita</option>
                    </select>
                </div>
                <div class="d-flex justify-content-start flex-column gap-2 modal-name-input mb-3">
                    <label for="photo" class="fw-bold">Foto Profile</label>
                    <input type="file" name="photo" class="form-control">
                    <span class="text-sm text-secondary fst-italic">Pilih Jika Ingin Merubah Photo</span>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn custom-btn rounded-pill text-white px-5">Simpan</button>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection

