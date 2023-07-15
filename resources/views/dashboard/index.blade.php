@extends('layouts.app')

@section('container')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Dashboard</h6>
                </div>

                <div class="card-body">
                    <h4>Wellcome <b>{{ Auth::user()->name }}</b></h4>
                </div>
            </div>
        </div>
        @can('isAdmin')
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Transaksi</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $transaksi }}

                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <a href="/transaksi" style="font-size: 12px">Lihat semua</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Users</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $user }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="fa fa-users text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <a href="/users" style="font-size: 12px">Lihat semua</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Postingan Aktif</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $postingan }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <a href="/post" style="font-size: 12px">Lihat semua</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Penjemputan</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $penjemputan }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="fa fa-car-side text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <a href="/penjemputan" style="font-size: 12px">Lihat semua</a>
                        </div>
                    </div>
                </div>
            </div>
        @endcan

    </div>

    @can('isUser')
        @if ($alamat == 0)
            <div class="row">
                <div class="col-12">
                    <a href="/profile">
                        <div class="alert alert-warning alert-dismissible fade show text-white" role="alert">
                            <span class="alert-icon"><i class="ni ni-notification-70"></i></span>
                            <span class="alert-text"><strong>Peringatan!!</strong> Lengkapi data alamat kamu sebelum melakukan
                                transaksi! </span>
                        </div>
                    </a>
                </div>
            </div>
        @endif
    @endcan

    @canany(['isAdmin', 'isUser'])
        <div class="row mt-4">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between">
                        <h6>Transaksi Hari Ini {{ date('d-m-Y') }}</h6>
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
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama
                                            Barang
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Pelanggan</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Harga Deal</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Status</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Type</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Tanggal</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datas as $data)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="{{ $data->post->foto }}" class="avatar avatar-sm me-3"
                                                            alt="user1">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $data->post->nama_barang }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $data->post->user->name }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">
                                                    Rp. {{ number_format($data->harga_deal, 0, ',', '.') }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $data->status }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $data->type }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ date('d-m-Y', strtotime($data->created_at)) }}</p>
                                            </td>
                                            <td class="align-middle text-center">
                                                @can('isAdmin')
                                                    {{-- <a href="/transaksi/{{ $data->id }}/edit" style="margin-right: 5px;"><i
                                                        class="fas fa-edit text-warning"></i></a> --}}
                                                    <i class="fas fa-trash text-danger"
                                                        onclick="confirmationHapusData('/transaksi/delete/{{ $data->id }}')"></i>
                                                @endcan
                                                <a href="/transaksi/{{ $data->id }}" style="margin-left: 5px;"><i
                                                        class="fas fa-eye text-info"></i></a>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endcanany

    @can('isPetugas')
        <div class="row mt-4">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between">
                        <h6>Penjemputan Hari Ini {{ date('d-m-Y') }}</h6>
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
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama
                                            Barang
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Pelanggan</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Harga Deal</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Status</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Type</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Tanggal</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transaksi as $data)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="{{ $data->post->foto }}" class="avatar avatar-sm me-3"
                                                            alt="user1">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $data->post->nama_barang }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $data->user->name }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">
                                                    Rp. {{ number_format($data->harga_deal, 0, ',', '.') }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $data->status }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ $data->type }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">
                                                    {{ date('d-m-Y', strtotime($data->created_at)) }}</p>
                                            </td>
                                            <td class="text-center" style="vertical-align: middle;">
                                                <button class="text-xs mb-0 btn bg-gradient-warning" type="button"
                                                    onclick="prosesJemput({{ $data->id }}, '{{ json_encode($data->user->alamat->alamat_lengkap) }}')"
                                                    style="margin-right: 5px;">Proses
                                                    Jemput <i class="fa fa-car-side text-white"
                                                        style="margin-left: 10px;"></i></button>
                                                {{-- <i class="fas fa-trash text-danger"
                                                onclick="confirmationHapusData('/penjemputan/delete/{{ $data->id }}')"></i> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modaljemput" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Penjemputan
                        </h5>
                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="trxid" value="">
                        <p>Kamu yakin ingin proses penjemputan ini?</p>
                        <div class="row mt-4 mb-4">
                            <h5 class="text-center"> Alamat :</h5>
                            <p class="text-center" id="alamat"></p>
                        </div>

                        {{-- <div class="row d-flex justify-content-center text-center">
                    <p>Kamu mau transaksi dimana?</p>
                    <div class="col-12 d-flex justify-content-center">
                        <div class="form-check mb-3" style="margin-right:15px">
                            <input class="form-check-input" type="radio" name="type" value="ke-lokasi"
                                id="customRadio1">
                            <label class="custom-control-label" for="customRadio1">Datang Ke Lokasi</label>
                        </div>
                        <div class="form-check" style="margin-left:15px">
                            <input class="form-check-input" type="radio" name="type" value="di-rumah"
                                id="customRadio2">
                            <label class="custom-control-label" for="customRadio2">Jemput Di rumah</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <label class="form-control-label" for="">Deskripsi
                            (optional)
                        </label>
                        <textarea class="form-control @error('alamat_lengkap') is-invalid @enderror" name="deskripsi" rows="5"
                            id="deskripsi" placeholder="Tambah deskripsi transaksi tambahan"></textarea>

                    </div>
                </div> --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" onclick="jemputSekarang()" class="btn bg-gradient-primary">Jemput
                            Sekarang</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function prosesJemput(trxid, alamat) {
                console.log(trxid);
                $('#alamat').html(alamat);
                $('#trxid').val(trxid);
                $('#modaljemput').modal('show');
            }

            function jemputSekarang() {
                const csrf = $('meta[name="csrf-token"]').attr('content');
                const trx = $('#trxid').val();
                $.ajax({
                    type: 'POST',
                    url: "{{ route('create.penjemputan') }}",
                    data: {
                        '_token': csrf,
                        'trxid': trx,
                    },

                    success: function(data) {
                        if (data.success) {
                            $('#modaljemput').modal('hide');

                            swal("Penjemputan Berhasil Diproses!",
                                "Segera lakukan penjemputan ke lokasi transaksi!", "success");

                            setTimeout(function() {
                                window.location.href = "/penjemputan/" + data.penjemputan;
                            }, 1400);
                        }

                    }

                });
            }
        </script>
    @endcan

    {{-- <div class="row">
        @can('isAdmin')
            <div class="p-6 bg-white border-b border-gray-200">
                Kamu Adalah Admin
            </div>
        @else
            <div class="p-6 bg-white border-b border-gray-200">
                Kamu Adalah Pelanggan
            </div>
        @endcan()
    </div> --}}
@endsection
