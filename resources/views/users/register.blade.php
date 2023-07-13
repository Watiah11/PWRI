@extends('main')

@section('container')

<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class=" rounded text-center mt-3 pt-3 pb-3 mb-3 px-4" style="background-color: white">
                <h2 class="text-center">Registrasi PWRI Digikop</h2>
            </div>

                <form method="post" action="{{ route('users.store')}}">
                @csrf 
                    <h6 class="ms-1">Nomor KTP</h6>
                    <div class="form-floating">
                        <input type="number" name="no_ktp" class="form-control mb-3" id="no_ktp" value="{{ old('no_ktp') }}" placeholder="Nomor KTP" required>
                        <label for="floatingInput">Nomor KTP</label>
                        @error('no_ktp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <h6 class="ms-1">Email akan digunakan untuk token dan akses masuk</h6>
                    <div class="form-floating">
                        <input type="text" name="email" class="form-control mb-3" value="{{ old('email') }}" id="email" placeholder="Email" required>
                        <label for="floatingInput">Email</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <h6 class="ms-1">Masukan nomor handphone yang aktif digunakan</h6>
                    <div class="form-floating">
                        <input type="number" name="no_hp" class="form-control mb-3" value="{{ old('no_hp') }}" id="no_hp" placeholder="No Handphone" required>
                        <label for="floatingInput">No Handphone (Contoh : 081234567890)</label>
                        @error('no_hp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <h4 class="ms-1 mt-5 mb-2">Kemanan Akun</h4>

                    <h6 class="ms-1 ">PIN akan digunakan untuk setiap transaksi </h6>
                    <div class="form-floating">
                        <input type="number" name="pin" class="form-control mb-4" id="pin" value="{{ old('pin') }}" placeholder="Terdiri 6 angka" required>
                        <label for="floatingInput">PIN (Terdiri 6 angka)</label>
                        @error('pin')
                            <div class="invalid-feedback">
                                {{ $no_telp }}
                            </div>
                        @enderror
                    </div>
                    

                    <h6 class="ms-1 ">Ulangi PIN</h6>
                    <div class="form-floating">
                        <input type="number" name="konfir_pin" class="form-control mb-4" id="konfir_pin" value="{{ old('konfir_pin') }}" placeholder="Ulangi PIN" required>
                        <label for="floatingInput">Ulangi PIN</label>
                        @error('konfir_pin')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    

                    <br>
                    <button class="w-100 btn btn-lg btn-primary mb-5" type="submit">Submit</button>

                </form>
            </div>
        <div class="col-md-2"></div>
    </div>
</div>

<style>
    body{
        background-color: rgb(219, 230, 236)
    }
</style>

@endsection