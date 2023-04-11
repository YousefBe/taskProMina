@extends('layouts.app')

@section('content')
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Album Task</h1>
                <p class="lead text-muted">
                    this is Promina task developed by Youssef Belal , i Konw UI isn't the best in the world but i couldn't give it more attention due to the lack of time given .
                    sorry about that!
                </p>
            </div>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="d-flex justify-content-end mb-4">
                <button type="button" class="btn btn-success albums-form-btn" data-type="create">
                    Create Albun
                </button>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach($albums as $album)
                    <div class="col">
                        <x-card-component :image="$album->albumCover" :album="$album" />
                    </div>
                @endforeach
            </div>
            <div class="my-4">
                {{$albums->links()}}
            </div>
        </div>
    </div>
    <x-album-modal-component></x-album-modal-component>
    <x-delete-album-modal-component></x-delete-album-modal-component>
    </main>
@endsection
@push('scripts')
    @vite(['resources/js/custom/single-album.js'])
@endpush
