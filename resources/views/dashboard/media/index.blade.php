@extends('layouts.app')

@section('container')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex justify-content-between">
                    <h6> Media Gambar</h6>
                </div>
                <iframe src="/laravel-filemanager?type=Images"
                style="width: 100%; height: 600px; overflow: hidden; border: none;"></iframe>
            </div>
        </div>
    </div>
@endsection
