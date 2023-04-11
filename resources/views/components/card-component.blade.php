<div class="card shadow-sm">
    <img src="{{$image}}" class="custom-card-image" alt="">

    <div class="card-body">
        @if($isAlbum)
            <div class="d-flex justify-content-between align-items-center">
                <a href="{{route('albums.show',$album->id)}}" class="album-link">{{$album->name}}</a>
                <button class="btn delete-album-btn" data-album="{{$album->id}}">
                    <i class="fa-solid fa-trash ms-2 c-pointer text-danger"></i>
                </button>
            </div>
        @else
            <div class="d-flex justify-content-between align-items-center">
                <p class="h4">{{$imageData->name}}</p>
               <button class="btn delete-img-btn" data-image="{{$imageData->id}}">
                   <i class="fa-solid fa-trash ms-2 c-pointer text-danger"></i>
               </button>
            </div>
        @endif
    </div>
</div>
