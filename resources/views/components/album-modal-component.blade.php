<div class="modal fade" id="AlbumFormModal" tabindex="-1" aria-labelledby="AlbumFormModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AlbumFormModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="albumTitleInput" class="form-label">Album Name</label>
                    <input type="text" class="form-control" id="albumTitleInput" placeholder="Album Name">
                </div>
                <form id="my-dropzone" class="dropzone" action="/" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class=" dz-message dz-clickable">
                        <div class="dropzone-text">
                            <i class="fa-solid fa-cloud-arrow-up"></i>
                            <div class="ms-4">
                                <h3 class="fs-5 fw-bold text-gray-900 mb-1">Drop files here or click to upload.</h3>
                                <span class="fs-7 fw-semibold text-primary opacity-75">Upload up to 10 files</span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="save-album-data-btn">Save changes</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
@vite(['resources/js/custom/albums.js'])
@endpush