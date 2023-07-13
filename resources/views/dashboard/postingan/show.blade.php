@extends('layouts.app')

@section('container')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex justify-content-between">
                    <h6>Postingan</h6>
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
                    <h4 class="text-center">{{$data->nama_barang}}</h4>
                    <div class="row" style="padding: 20px">
                        <div class="col-md-6">
                            <div class="form-group @error('nama_barang') has-danger @enderror">
                                <label class="form-control-label" for="">Foto Barang</label>
                               <img width="100%" src="{{$data->foto}}" alt="">
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
                                <label class="form-control-label" for="">Harga Barang</label>
                                <input type="text" class="form-control @error('nama_barang') is-invalid @enderror"
                                    value=" Rp. {{ number_format($data->harga, 0, ',', '.');}}" disabled name="nama_barang">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group @error('nama_barang') has-danger @enderror">
                                <label class="form-control-label" for="">Berat Barang</label>
                                <input type="text" class="form-control @error('nama_barang') is-invalid @enderror"
                                    value=" {{$data->berat}}" disabled name="nama_barang">
                            </div>
                        </div>
                    </div>
                    <div class="row" style="padding: 25px; "> 
                    <p > {!! $data->deskripsi_barang !!}</p>
                </div>
                </div>

                <div id="disqus_thread" class="card-footer"></div>
                <script>
                    (function() { // DON'T EDIT BELOW THIS LINE
                        var d = document,
                            s = d.createElement('script');
                        s.src = 'https://skripsifaras.disqus.com/embed.js';
                        s.setAttribute('data-timestamp', +new Date());
                        (d.head || d.body).appendChild(s);
                    })();
                </script>
                <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by
                        Disqus.</a></noscript>
            </div>
        </div>
    </div>
@endsection
