<div class="card shadow-sm">
    <img src="{{$image}}" class="custom-card-image" alt="">

    <div class="card-body">
        @if($isAlbum)
            <div class="d-flex justify-content-between align-items-center">
                <a href="{{route('albums.show',$album->id)}}" class="album-link">{{$album->name}}</a>
                <i class="fa-solid fa-trash ms-2 c-pointer text-danger"></i>
            </div>
        @else
            <div class="d-flex justify-content-end align-items-center">
                <i class="fa-solid fa-trash ms-2 c-pointer text-danger"></i>
            </div>
        @endif
    </div>
</div>
