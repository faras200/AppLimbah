@extends('layouts.app')

@section('container')
    <div class="page-header min-height-200 border-radius-xl "
        style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
        <span class="mask bg-gradient-primary opacity-6"></span>
    </div>
    <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
        <div class="row gx-4">
            <div class="col-auto">
                <div class="avatar avatar-xl position-relative">
                    <img src="../assets/img/bruce-mars.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                </div>
            </div>
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1">
                        {{ $user->name }}
                    </h5>
                    <p class="mb-0 font-weight-bold text-sm">
                        {{ ($user->role_id == 1 ? 'Petugas' : $user->role_id == 0) ? 'Administrator' : 'User Biasa' }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4 mt-4 text-center">
        <h6>Informasi Profile</h6>
    </div>
    @if (session()->has('success'))
        @php
            $p = session('success');
        @endphp
        <script>
            swal({
                title: 'Berhasil!!',
                text: '<?= $p ?>',
                icon: 'success',
            });
        </script>
    @endif
    @if (session()->has('failed'))
        @php
            $p = session('failed');
        @endphp
        <script>
            swal({
                title: 'Gagal!!',
                text: '<?= $p ?>',
                icon: 'warning',
            });
        </script>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-body px-0 pt-0 pb-2">
                    <form action="/profile/{{ $user->id }}" method="POST">
                        @method('put')
                        @csrf
                        <div class="row" style="padding: 10px 15px !important;">
                            <div class="col-md-6">
                                <div class="form-group @error('name') has-danger @enderror">
                                    <label class="form-control-label" for="">Nama</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name', $user->name) }}" name="name" placeholder="Masukan Nama">
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group @error('email') has-danger @enderror">
                                    <label class="form-control-label" for="">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email', $user->email) }}" name="email"
                                        placeholder="name@example.com">
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="">Password Lama</label>
                                    <input type="password" name="passwordlama" class="form-control">
                                    @error('passwordlama')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="">Password Baru</label>
                                    <input type="password" name="password" class="form-control">
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="row justify-content-center text-center">
                            <div class="col-6">
                                <button class="btn btn-primary" type="submit">Perbarui Profile</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4 mt-4 text-center">
        <h6>Alamat Anda</h6>

    </div>
    <div class="row">
        <div class="col-12">
            @if ($alamat == null)
                <span class="alert-text text-danger"><strong>Peringatan!</strong> Segera Lengkapi Alamat Rumah
                    Kamu!!</span>
            @endif
            <div class="card mb-4">
                <div class="card-body px-0 pt-0 pb-2">
                    <form action="/administrator" method="POST">
                        @method('POST')
                        @csrf
                        <div class="row" style="padding: 10px 15px !important;">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="">Jenis Alamat</label>
                                    <select class="form-control" name="role_id">
                                        <option value="">Pilih Alamat</option>
                                        <option value="rumah">Rumah</option>
                                        <option value="kantor">Administrator</option>
                                        <option value="gudang">Gudang</option>
                                    </select>
                                    @error('role_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group @error('alamat_lengkap') has-danger @enderror">
                                    <label class="form-control-label" for="">Alamat Lengkap</label>
                                    <textarea class="form-control @error('alamat_lengkap') is-invalid @enderror" name="alamat_lengkap"
                                        placeholder="Masukan Nama"> {{ old('alamat_lengkap', @$alamat->alamat_lengkap) }} </textarea>
                                    @error('alamat_lengkap')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group @error('lang') has-danger @enderror">
                                    <label class="form-control-label" for="">longitude</label>
                                    <input type="text" id="lang" class="form-control @error('lang') is-invalid @enderror"
                                        value="{{ old('lang') }}" name="lang">
                                    @error('lang')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group @error('lat') has-danger @enderror">
                                    <label class="form-control-label" for="">latitude</label>
                                    <input type="text" id="lat" class="form-control @error('lat') is-invalid @enderror"
                                        value="{{ old('lat') }}" name="lat">
                                    @error('lat')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group @error('patokan') has-danger @enderror">
                                    <label class="form-control-label" for="">Patokan</label>
                                    <input type="text" id="patokan" class="form-control @error('patokan') is-invalid @enderror"
                                        value="{{ old('patokan') }}" name="patokan" placeholder="name@example.com">
                                    @error('patokan')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="">Role</label>
                                    <select class="form-control" name="role_id">
                                        <option value="">Pilih Role</option>
                                        <option value="1">Petugas</option>
                                        <option value="0">Administrator</option>
                                    </select>
                                    @error('role_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>


                        </div>

                        <div class="row justify-content-center text-center">
                            <div class="col-6">
                                <button class="btn btn-primary" type="submit">Perbarui Alamat</button>
                            </div>
                        </div>
                    </form>

                    <div class="col-md-6">
                        <button onclick="getLocation()">Try It</button>

                        <p id="demo"></p>
                    </div>
                    <div class="col-md-6">
                        <div id="googleMap" style="width:100%;height:380px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var x = document.getElementById("demo");

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }

        function showPosition(position) {
            document.getElementById("lang").value = position.coords.longitude;
            document.getElementById("lat").value = position.coords.latitude;
            x.innerHTML = "Latitude: " + position.coords.latitude +
                "<br>Longitude: " + position.coords.longitude +
                "<a href='https://www.google.com/maps/place/ " + position.coords.latitude + "," + position.coords
                .longitude + "'>Lihat Lokasi</a>";
        }
    </script>
@endsection
