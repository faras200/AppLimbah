@extends('layouts.app')

@section('container')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex justify-content-between">
                    <h6>Postingan</h6>
                    <a href="/post/create" class="btn btn-primary">Tambah <i class="fas fa-plus"></i></a>
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
                                        Jenis</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Berat</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Deskripsi</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($postingan as $post)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3"
                                                        alt="user1">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $post->nama_barang }}</h6>
                                                    {{-- <p class="text-xs text-secondary mb-0">john@creative-tim.com</p> --}}
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">
                                                {{ $post->jenis }}</p>
                                            {{-- <p class="text-xs text-secondary mb-0">Organization</p> --}}
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">
                                                {{ $post->berat }}</p>
                                            {{-- <p class="text-xs text-secondary mb-0">Organization</p> --}}
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">
                                                {{ $post->deskripsi_barang }}</p>
                                            {{-- <p class="text-xs text-secondary mb-0">Organization</p> --}}
                                        </td>
                                        <td class="align-middle text-center">
                                            <span data-container="body" data-bs-toggle="popover" data-bs-placement="top"
                                                data-bs-trigger="hover focus" data-bs-content="Disabled popover">
                                                <a href="/post/{{ $post->id }}/edit" style="margin-right: 5px;"><i
                                                        class="fas fa-edit text-warning"></i></a>
                                            </span>
                                            <span data-container="body" data-bs-toggle="popover" data-bs-placement="top"
                                                data-bs-trigger="hover focus" data-bs-content="Disabled popover">
                                                <i class="fas fa-trash text-danger"
                                                    onclick="confirmationHapusData('/post/delete/{{ $post->id }}')"></i>
                                            </span>
                                            <a href="/post/{{ $post->id }}" style="margin-left: 5px;"><i
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
@endsection
