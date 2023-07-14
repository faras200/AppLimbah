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
                    <form action="/profile/alamat/{{$alamat ? $alamat->id : 'create'}}" method="POST">
                        @method('put')
                        @csrf
                        <div class="row" style="padding: 10px 15px !important;">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="">Jenis Alamat</label>
                                    <select class="form-control" name="jenis_alamat">
                                        <option value="{{$alamat->jenis_alamat ?? '' }}" selected >{{$alamat->jenis_alamat ?? 'Pilih Alamat' }}</option>
                                        <option value="Rumah">Rumah</option>
                                        <option value="Kantor">Kantor</option>
                                        <option value="Gudang">Gudang</option>
                                    </select>
                                    @error('role_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group @error('patokan') has-danger @enderror">
                                    <label class="form-control-label" for="">Patokan</label>
                                    <input type="text" id="patokan"
                                        class="form-control @error('patokan') is-invalid @enderror"
                                        value="{{ old('patokan', $alamat->patokan ?? '') }}" name="patokan" placeholder="cth: cat rumah / warna pagar">
                                    @error('patokan')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group @error('lang') has-danger @enderror">
                                    <label class="form-control-label" for="">longitude</label>
                                    <input type="text" id="lang"
                                        class="form-control @error('lang') is-invalid @enderror"
                                        value="{{ old('lang') }}" name="lang">
                                    @error('lang')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group @error('lat') has-danger @enderror">
                                    <label class="form-control-label" for="">latitude</label>
                                    <input type="text" id="lat"
                                        class="form-control @error('lat') is-invalid @enderror"
                                        value="{{ old('lat') }}" name="lat">
                                    @error('lat')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class=" col-md-12 mx-auto" id="maps">
                            </div>
                            <div class=" col-md-12 text-center">
                                <button type="button" class="btn btn-secondary" onclick="getLocation()">Refresh Map</button>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group @error('alamat_lengkap') has-danger @enderror">
                                    <label class="form-control-label" for="">Alamat Lengkap</label>
                                    <textarea class="form-control @error('alamat_lengkap') is-invalid @enderror" name="alamat_lengkap" rows="5"
                                        placeholder="cth: nomor rumah, Rt/Rw, nama jalan, kode pos">{{old('alamat_lengkap', $alamat->alamat_lengkap ?? null)}}</textarea>
                                    @error('alamat_lengkap')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="row justify-content-center text-center">
                            <div class="col-6">
                                <button class="btn btn-primary" type="submit">Simpan Alamat</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener("load", (event) => {
            getLocation()
        });
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
            const mapurl =  position.coords.latitude + "," +position.coords.longitude;
            $("#maps").html(`<iframe width="100%" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=500&amp;hl=en&amp;q=${mapurl}+(Home)&amp;t=&amp;z=17&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.maps.ie/population/">Population mapping</a></iframe>`);
            console.log(mapurl)
            x.innerHTML = "Latitude: " + position.coords.latitude +
                "<br>Longitude: " + position.coords.longitude +
                "<a href='https://www.google.com/maps/place/ " + position.coords.latitude + "," + position.coords
                .longitude + "'>Lihat Lokasi</a>";
        }
    </script>
@endsection
