@extends('layouts.app')

@section('container')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex justify-content-between">
                    <h6>Tambah Penjemputan</h6>
                    <a href="/penjemputan" class="btn btn-danger">Batal <i class="fas fa-times"></i></a>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <form action="/penjemputan" method="POST">
                        @method('POST')
                        @csrf
                        <div class="row" style="padding: 10px 15px !important;">
                            <div class="col-md-6">
                                <div class="form-group @error('name') has-danger @enderror">
                                    <label class="form-control-label" for="">Nama Barang</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name') }}" name="name" placeholder="Masukan Nama">
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group @error('email') has-danger @enderror">
                                    <label class="form-control-label" for="">Berat</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}" name="email" placeholder="name@example.com">
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="">Jenis</label>
                                    <select class="form-control" name="role_id">
                                        <option value="">Pilih Jenis</option>
                                        <option value="1">Plastik</option>
                                        <option value="2">Elektronik</option>
                                        <option value="3">Logam</option>
                                        <option value="4">Besi</option>
                                    </select>
                                    @error('role_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="">Foto</label>
                                    <input type="password" name="password" class="form-control">
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <div class="row justify-content-center text-center">
                            <div class="col-6">
                                <button class="btn btn-primary" type="submit">Simpan Data</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
