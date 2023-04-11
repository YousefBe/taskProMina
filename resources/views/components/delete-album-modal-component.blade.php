<div class="modal fade" id="deleteAlbumModal" tabindex="-1" aria-labelledby="deleteAlbumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteAlbumModalLabel">Delete Album</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h3 class="fw-bolder text-secondary text-center mb-4">Are you Sure You want to delete this album ?</h3>
                <div class="form-check form-switch mb-3">
                    <input class="form-check-input" name="is_moving_images" type="checkbox" id="moveImagesToOtherAlbumSwitch">
                    <label class="form-check-label" for="moveImagesToOtherAlbumSwitch">Move Images to other Album</label>
                </div>
                <select id="selectDestinationAlbumInput" name="destination_album" class="form-select form-select-sm" aria-label=".form-select-sm example" disabled>
                    <option value="" selected>Select Album</option>
                    @foreach($albums as $album)
                        <option value="{{$album->id}}">{{$album->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="submitDeleteAlbumFormBtn" class="btn btn-outline-danger">Delete Album</button>
            </div>
        </div>
    </div>
</div>
