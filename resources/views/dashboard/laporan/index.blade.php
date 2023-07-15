@extends('layouts.app')

@section('container')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex justify-content-between">
                    <h6>Laporan</h6>
                    {{-- <a href="/laporan/create" class="btn btn-primary">Tambah <i class="fas fa-plus"></i></a> --}}
                </div>
                <div class="card-header pb-0 d-flex justify-content-center">
                    <div class="col-10 nav-wrapper position-relative end-0">
                        <ul class="nav nav-pills nav-fill p-1" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#transaksi"
                                    role="tab" aria-controls="profile" aria-selected="true">
                                    Laporan Transaksi
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#penjemputan" role="tab"
                                    aria-controls="dashboard" aria-selected="false">
                                    Laporan Penjemputan
                                </a>
                            </li>
                        </ul>
                    </div>
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
                <div class="card-body tab-content px-0 pt-0 pb-2" id="pills-tabContent">
                    <div id="transaksi" class="tab-pane fade show active table-responsive p-0">
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
                    <div id="penjemputan" class="tab-pane fade table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama
                                        Penjual
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Jenis Alamat</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Patokan</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Status</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Lokasi Maps</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penjemputan as $data)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <img src="{{ $data->transaksi->post->foto }}"
                                                        class="avatar avatar-sm me-3" alt="user1">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $data->user->name }}</h6>
                                                    {{-- <p class="text-xs text-secondary mb-0">john@creative-tim.com</p> --}}
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">
                                                {{ $data->alamat->jenis_alamat }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">
                                                {{ $data->alamat->patokan }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">
                                                {{ $data->status }}</p>
                                        </td>
                                        <td>
                                            <a class="text-xs font-weight-bold mb-0"
                                                href="https://www.google.com/maps/place/{{ $data->alamat->lat . ',' . $data->alamat->lang }}"
                                                target="_blank">Klik
                                                Lokasi</a>
                                        </td>
                                        <td class="align-middle text-center">
                                            @can('isAdmin')
                                                <a href="/penjemputan/{{ $data->id }}/edit" style="margin-right: 5px;"><i
                                                        class="fas fa-edit text-warning"></i></a>
                                                <i class="fas fa-trash text-danger"
                                                    onclick="confirmationHapusData('/penjemputan/delete/{{ $data->id }}')"></i>
                                            @endcan
                                            <a href="/penjemputan/{{ $data->id }}" style="margin-left: 5px;"><i
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
    <script>
        function confirmationHapusData(url) {
            swal({
                title: 'Anda Yakin Untuk Menghapus Data Ini ?',
                text: 'Anda Tidak Dapat Melihat Data Ini Lagi!!!',
                icon: 'warning',
                dangerMode: true,
                buttons: ['Tidak', 'Yakin']

            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result) {
                    window.location.href = url;
                }
            })
        }
    </script>
@endsection
