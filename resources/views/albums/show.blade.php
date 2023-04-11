@extends('layouts.app')

@section('content')
    <div class="my-5 py-5 bg-light">
        <div class="container">
            <div class="d-flex justify-content-between my-5">
                <div>
                    <p class="h3">Album : {{$album->name}} </p>
                    <p class="h5">Images Count : {{$imagesCount}} </p>
                </div>
                <button type="button" class="btn btn-primary albums-form-btn mx-2" data-album="{{$album}}" data-type="update">
                    Edit Album
                </button>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach($images as $image)
                    <div class="col">
                        <x-card-component :image="asset('storage/'. $image->path)" :imageData="$image"/>
                    </div>
                @endforeach
            </div>
            <div class="my-4">
                {{$images->links()}}
            </div>
        </div>
    </div>
    <x-album-modal-component></x-album-modal-component>
    </main>
@endsection

@push('scripts')
    @vite(['resources/js/custom/single-image.js'])
@endpush
