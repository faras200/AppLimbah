@extends('layouts.app')

@section('container')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex justify-content-between">
                    <h6>Detail Penjemputan</h6>
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
                    <h4 class="text-center">{{ $data->nama_barang }}</h4>
                    <div class="row" style="padding: 20px">
                        <div class="col-md-12 d-flex justify-content-center text-center">
                            <div class="form-group @error('nama_barang') has-danger @enderror">
                                <label class="form-control-label" for="">Foto Barang</label> <br>
                                <img width="100%" height="300px" src="{{ $data->foto }}" alt="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-grouphas-danger">
                                <label class="form-control-label" for="">Pelanggan</label>
                                <input type="text" class="form-control @error('nama_barang') is-invalid @enderror"
                                    value="{{ $data->user->name }}" disabled name="nama_barang">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group @error('nama_barang') has-danger @enderror">
                                <label class="form-control-label" for="">Jenis Barang</label>
                                <input type="text" class="form-control @error('nama_barang') is-invalid @enderror"
                                    value="{{ $data->jenis }}" disabled name="nama_barang">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group @error('nama_barang') has-danger @enderror">
                                <label class="form-control-label" for="">Harga Awal</label>
                                <input type="text" class="form-control @error('nama_barang') is-invalid @enderror"
                                    value=" Rp. {{ number_format($data->harga, 0, ',', '.') }}" disabled name="nama_barang">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group @error('nama_barang') has-danger @enderror">
                                <label class="form-control-label" for="">Harga Deal</label>
                                <input type="text" class="form-control @error('nama_barang') is-invalid @enderror"
                                    value=" Rp. {{ number_format($transaksi->harga_deal, 0, ',', '.') }}" disabled
                                    name="nama_barang">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group @error('status') has-danger @enderror">
                                <label class="form-control-label" for="">Status Transaksi</label>
                                <input type="text" class="form-control @error('nama_barang') is-invalid @enderror"
                                    value=" {{ $transaksi->status }}" disabled name="status">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group @error('nama_barang') has-danger @enderror">
                                <label class="form-control-label" for="">Berat Barang</label>
                                <input type="text" class="form-control @error('nama_barang') is-invalid @enderror"
                                    value=" {{ $data->berat }}" disabled name="nama_barang">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h6 class="text-center mt-4">Data Penjemputan</h6>
                <div class="card-body text-center">
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0"
                                marginwidth="0"
                                src="https://maps.google.com/maps?width=100%25&amp;height=500&amp;hl=en&amp;q={{ $penjemputan->alamat->lat . ',' . $penjemputan->alamat->lang }}+(Home)&amp;t=&amp;z=17&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a
                                    href="https://www.maps.ie/population/">Population mapping</a></iframe>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="form-control-label" for="">Jenis Alamat</label>
                                <input type="text" class="form-control" value=" {{ $penjemputan->alamat->jenis_alamat }}"
                                    disabled name="status">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="form-control-label" for="">Detail Alamat</label>
                                <input type="text" class="form-control"
                                    value=" {{ $penjemputan->alamat->alamat_lengkap }}" disabled name="status">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label" for="">Foto Penjemputan</label>
                                <div class="input-group ">
                                    <input type="text" id="thumbnail" value="" name="foto"
                                        class="form-control">
                                    <button class="btn btn-outline-primary mb-0" type="button" id="lfm"
                                        data-input="thumbnail">Choose</button>
                                </div>
                                @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group @error('deskripsi') has-danger @enderror">
                                <label class="form-control-label" for="">Informasi Penjemputan (optional)</label>
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi"
                                    rows="5" placeholder="cth: diterima oleh tetangga">{{ old('deskripsi', $alamat->deskripsi ?? null) }}</textarea>
                                @error('deskripsi')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">

        <div class="col-md-12 d-flex justify-content-center ">
            <button class="btn col-md-10 bg-gradient-primary" style="padding: 15px"
                onclick="selesaiPenjemputan({{ $penjemputan->id }})"> Selesaikan Penjemputan Ini</button>
        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Penawaran</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="harga_deal" value="">
                    <input type="hidden" id="status" value="{{ $data->status }}">
                    <p>Kamu yakin deal dengan harga penawaran ini?</p>
                    <div class="row mt-4 mb-4">
                        <h4 class="text-center"> Deal di Harga :</h4>
                        <h3 class="text-center" style="font-weight: 800" id="harga"></h3>
                    </div>

                    <div class="row d-flex justify-content-center text-center">
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
                            <label class="form-control-label" for="">Deskripsi (optional)</label>
                            <textarea class="form-control @error('alamat_lengkap') is-invalid @enderror" name="deskripsi" rows="5"
                                id="deskripsi" placeholder="Tambah deskripsi transaksi tambahan"></textarea>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" onclick="prosestransaksi()" class="btn bg-gradient-primary">Proses
                        Transaksi</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        var route_prefix = "/filemanager";
    </script>


    <script>
        {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/stand-alone-button.js')) !!}
    </script>
    <script>
        $('#lfm').filemanager('image', {
            prefix: route_prefix
        });
        // $('#lfm').filemanager('file', {prefix: route_prefix});
    </script>

    <script>
        function selesaiPenjemputan(id) {
            swal({
                title: 'Kamu Yakin Menyelesaikan Penjemputan Ini ?',
                text: 'Pastikan barang yang kamu ambil sudah sesuai!!!',
                icon: 'warning',
                dangerMode: true,
                buttons: ['Tidak', 'Yakin']

            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result) {
                    const csrf = $('meta[name="csrf-token"]').attr('content');
                    const deskripsi = $('#deskripsi').val();
                    const foto = $('#thumbnail').val();
                    if (foto == '') {
                        swal("Peringatan!!", "Input foto penjemputan dulu!", "warning");
                    }
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('penjemputan.selesai') }}",
                        data: {
                            '_token': csrf,
                            'penjemputan': id,
                            'foto': foto,
                            'deskripsi': deskripsi
                        },

                        success: function(data) {
                            if (data.success) {
                                $('#exampleModal').modal('hide');
                                swal("Penjemputan Selesai!",
                                    "Penjemputan sudah selesai, Lihat transaksi penjemputan lain!",
                                    "success");
                                setTimeout(function() {
                                    window.location.href = "/penjemputan";
                                }, 2000);
                            }
                        }

                    });
                }
            })
        }
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by
            Disqus.</a></noscript>
@endsection
