@extends('layouts.app')

@section('container')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex justify-content-between">
                    <h6>Edit Postingan</h6>
                    <a href="/post" class="btn btn-danger">Batal <i class="fas fa-times"></i></a>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <form action="/post/{{ $post->id }}" method="POST">
                        @method('put')
                        @csrf
                        <div class="row" style="padding: 10px 15px !important;">
                            <div class="col-md-6">
                                <div class="form-group @error('nama_barang') has-danger @enderror">
                                    <label class="form-control-label" for="">Nama Barang</label>
                                    <input type="text" class="form-control @error('nama_barang') is-invalid @enderror"
                                        value="{{ old('nama_barang', $post->nama_barang) }}" name="nama_barang">
                                    @error('nama_barang')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group @error('berat') has-danger @enderror">
                                    <label class="form-control-label" for="">Berat</label>
                                    <input type="text" class="form-control @error('berat') is-invalid @enderror"
                                        value="{{ old('berat', $post->berat) }}" name="berat">
                                    @error('berat')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group @error('harga') has-danger @enderror">
                                    <label class="form-control-label" for="">harga</label>
                                    <input type="text" id="rupiah"
                                        class="form-control @error('harga') is-invalid @enderror"
                                        value="{{ old('harga', $post->harga) }}" name="harga">
                                    @error('harga')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="">Status</label>
                                    <select class="form-control" name="status">
                                        @if ($post->status == 'Aktif')
                                            <option selected value="{{ $post->status }}">{{ $post->status }}</option>
                                            <option value="Non-Aktif">Non Aktif</option>
                                        @else
                                            <option selected value="{{ $post->status }}">{{ $post->status }}</option>
                                            <option value="Aktif">Aktif</option>
                                        @endif
                                    </select>
                                    @error('status')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="">Jenis</label>
                                    <select class="form-control" name="jenis">
                                        <option selected value="{{ $post->jenis }}">{{ $post->jenis }}</option>
                                        <option value="plastik">Plastik</option>
                                        <option value="elektronik">Elektronik</option>
                                        <option value="logam">Logam</option>
                                        <option value="besi">Besi</option>
                                    </select>
                                    @error('jenis')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="">Foto</label>
                                    <div class="input-group ">
                                        <input type="text" id="thumbnail" name="foto" value="{{ $post->foto }}"
                                            class="form-control">
                                        <button class="btn btn-outline-primary mb-0" type="button" id="lfm"
                                            data-input="thumbnail">Choose</button>
                                    </div>
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-control-label" for="">Deskripsi Barang</label>
                                <textarea name="deskripsi_barang" class="form-control">{!! old('deskripsi_barang', $post->deskripsi_barang) !!}</textarea>
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
        var lfm = function(type, options) {
            let button = document.getElementById(id);

            button.addEventListener('click', function() {
                var route_prefix = (options && options.prefix) ? options.prefix : '/filemanager';
                var target_input = document.getElementById(button.getAttribute('data-input'));
                var target_preview = document.getElementById(button.getAttribute('data-preview'));

                window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager',
                    'width=900,height=600');
                window.SetUrl = function(items) {
                    var file_path = items.map(function(item) {
                        return item.url;
                    }).join(',');

                    // set the value of the desired input to image url
                    target_input.value = file_path;
                    target_input.dispatchEvent(new Event('change'));

                    // clear previous preview
                    target_preview.innerHtml = '';

                    // set or change the preview image src
                    items.forEach(function(item) {
                        let img = document.createElement('img')
                        img.setAttribute('style', 'height: 5rem')
                        img.setAttribute('src', item.thumb_url)
                        target_preview.appendChild(img);
                    });

                    // trigger change event
                    target_preview.dispatchEvent(new Event('change'));
                };
            });
        };

        lfm('lfm2', 'file', {
            prefix: route_prefix
        });
    </script>


    <!-- CKEditor init -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/ckeditor.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/adapters/jquery.js"></script>
    <script>
        $('textarea[name=deskripsi_barang]').ckeditor({
            height: 300,
            filebrowserImageBrowseUrl: route_prefix + '?type=Images',
            filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{ csrf_token() }}',
            filebrowserBrowseUrl: route_prefix + '?type=Files',
            filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{ csrf_token() }}'
        });
    </script>
@endsection
