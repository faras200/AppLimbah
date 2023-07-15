@extends('layouts.app')

@section('container')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex justify-content-between">
                    <h6>Detail Transaksi</h6>
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
                                <img width="100%" height="400px" src="{{ $data->foto }}" alt="">
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
                    <div class="row" style="padding: 25px; ">
                        <p> {!! $data->deskripsi_barang !!}</p>
                    </div>



                </div>
                {{-- <div class="col-12">
                    <div class="card blur shadow-blur max-height-vh-80">
                        <div class="card-header shadow-lg">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex align-items-between">
                                        <div class="col-6">
                                            <h6 class="mb-0 d-block">Komentar</h6>
                                            <span class="text-sm text-dark opacity-8">Scroll kebawah untuk melihat..</span>
                                        </div>
                                        <div class="col-6">
                                            <form action="/komentar" method="POST" class="align-items-center">
                                                @method('post')
                                                @csrf
                                                <div class="input-group ">
                                                    <input type="text" id="rupiah"
                                                        placeholder="Masukan Nominal Penawaran Anda" name="penawaran"
                                                        class="form-control">
                                                    <input type="hidden" name="komentar" value="kosong">
                                                    <input type="hidden" name="post_id" id="post_id"
                                                        value="{{ $data->id }}">
                                                    <button class="btn btn-outline-primary mb-0" type="submit">Buat
                                                        Penawaran</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body overflow-auto overflow-x-hidden">

                            @if (count($komentars) != 0)
                                @foreach ($komentars as $komentar)
                                    @if ($komentar->user_id == Auth::user()->id)
                                        @if ($komentar->komentar == 'kosong')
                                            <div @if ($data->user_id == Auth::user()->id) onclick="buatTransaksi({{ $komentar->penawaran }})" @endif
                                                class="row justify-content-end text-right mb-4">
                                                <div class="col-auto">
                                                    <div class="card bg-gradient-primary shadow text-white">
                                                        <div class="card-body py-2 px-3">
                                                            <small>Penawaran {{ $komentar->user->name }}</small>
                                                            <p class="mb-1" style="font-size:18px; font-weight:800;">Rp.
                                                                {{ number_format($komentar->penawaran, 0, ',', '.') }}
                                                            </p>
                                                            <div
                                                                class="d-flex align-items-center justify-content-end text-sm opacity-6">
                                                                <i class="ni ni-check-bold text-sm me-1"></i>
                                                                <small>{{ $komentar->created_at->diffForHumans() }}</small>
                                                            </div>
                                                            @if ($data->user_id == Auth::user()->id)
                                                                <p class="mb-1" style="font-size:14px;">
                                                                    Klik untuk proses penawaran..
                                                                </p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="row justify-content-end text-right mb-4">
                                                <div class="col-auto">
                                                    <div class="card bg-gray-200">
                                                        <div class="card-body py-2 px-3">
                                                            <small>{{ $komentar->user->name }}</small>
                                                            <p class="mb-1">
                                                                {{ $komentar->komentar }}
                                                            </p>
                                                            <div
                                                                class="d-flex align-items-center justify-content-end text-sm opacity-6">
                                                                <i class="ni ni-check-bold text-sm me-1"></i>
                                                                <small>{{ $komentar->created_at->diffForHumans() }}</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @else
                                        @if ($komentar->komentar == 'kosong')
                                            <div @if ($data->user_id == Auth::user()->id) onclick="buatTransaksi({{ $komentar->penawaran }})" @endif
                                                class="row justify-content-start text-right mb-4">
                                                <div class="col-auto">
                                                    <div class="card bg-gradient-warning shadow text-white">
                                                        <div class="card-body py-2 px-3">
                                                            <small>Penawaran {{ $komentar->user->name }}</small>
                                                            <p class="mb-1" style="font-size:18px; font-weight:800;">Rp.
                                                                {{ number_format($komentar->penawaran, 0, ',', '.') }}
                                                            </p>
                                                            <div
                                                                class="d-flex align-items-center justify-content-end text-sm opacity-6">
                                                                <i class="ni ni-check-bold text-sm me-1"></i>
                                                                <small>{{ $komentar->created_at->diffForHumans() }}</small>
                                                            </div>
                                                            @if ($data->user_id == Auth::user()->id)
                                                                <p class="mb-1" style="font-size:14px;">
                                                                    Klik untuk proses penawaran..
                                                                </p>
                                                            @endif
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        @else
                                            <div class="row justify-content-start text-right mb-4">
                                                <div class="col-auto">
                                                    <div class="card bg-gray-200">
                                                        <div class="card-body py-2 px-3">
                                                            <small>{{ $komentar->user->name }}</small>
                                                            <p class="mb-1">
                                                                {{ $komentar->komentar }}
                                                            </p>
                                                            <div
                                                                class="d-flex align-items-center justify-content-end text-sm opacity-6">
                                                                <i class="ni ni-check-bold text-sm me-1"></i>
                                                                <small>{{ $komentar->created_at->diffForHumans() }}</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                @endforeach
                            @else
                                <div class="row justify-content-center text-center mt-5 mb-5" style="margin-top: 200px;">
                                    <div class="col-auto">
                                        <div class="card bg-gray-200">
                                            <div class="card-body py-2 px-3">
                                                <p class="mb-1">
                                                    Belum Ada Komentar Apapun..
                                                </p>
                                                <div
                                                    class="d-flex align-items-center justify-content-end text-sm opacity-6">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="card-footer d-block">
                            <form action="/komentar" method="POST" class="align-items-center">
                                @method('post')
                                @csrf
                                <div class="d-flex">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="komentar"
                                            placeholder="Masukan Komentar Disini" aria-label="Message example input">
                                        <input type="hidden" name="post_id" value="{{ $data->id }}">
                                        <input type="hidden" name="penawaran" value="kosong">
                                    </div>
                                    <button type="submit" class="btn bg-gradient-primary mb-0 ms-2">
                                        <i class="ni ni-send"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> --}}
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h6 class="text-center mt-4">Data Penjemputan</h6>
                <div class="card-body text-center">
                    <p>Tidak Ada Data Penjemputan</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">

        <div class="col-md-12 d-flex justify-content-center ">
            <button class="btn col-md-10 bg-gradient-primary" style="padding: 15px"
                onclick="selesaiTransaksi({{ $data->id }})"> Selesaikan Transaksi Ini</button>
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
        (function() { // DON'T EDIT BELOW THIS LINE
            var d = document,
                s = d.createElement('script');
            s.src = 'https://skripsifaras.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();

        function buatTransaksi(harga) {
            const status = $('#status').val();
            if (status == 'Non-Aktif') {
                swal("Peringatan Postingan Ini Tidak Aktif!!",
                    "Ubah Postingan Ini menjadi aktif untuk bisa lanjut ke transaksi!", "warning");
                return false;
            }
            $('#exampleModal').modal('show');
            const total = toRp(harga);
            $('#harga_deal').val(harga);
            $('#harga').html(total);
        }

        function prosestransaksi() {
            var radioValue = $("input[name='type']:checked").val();
            if (radioValue == undefined) {
                swal("Peringatan!!", "Pilih lokasi transaksi dulu!", "warning");
            }
            const deskripsi = $('#deskripsi').val();
            const csrf = $('meta[name="csrf-token"]').attr('content');
            const postid = $('#post_id').val();
            const harga = $('#harga_deal').val()
            console.log(harga);
            $.ajax({
                type: 'POST',
                url: "{{ route('create.transaksi') }}",
                data: {
                    '_token': csrf,
                    'post_id': postid,
                    'harga_deal': harga,
                    'deskripsi': deskripsi,
                    'type': radioValue
                },

                success: function(data) {
                    if (data.success) {
                        $('#exampleModal').modal('hide');
                        if (data.type == 'ke-lokasi') {
                            swal("Transaksi Berhasil Dibuat!",
                                "Segera selesaikan transaksi, dengan datang ke lokasi cv izhar!", "success");
                        } else {
                            swal("Transaksi Berhasil Dibuat!", "Tunggu petugas jalan ke rumah kamu oke!",
                                "success");

                        }
                        setTimeout(function() {
                            window.location.href = "/transaksi";
                        }, 1000);
                    }
                }

            });
            console.log(csrf);
            console.log(radioValue);
        }
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by
            Disqus.</a></noscript>
@endsection
