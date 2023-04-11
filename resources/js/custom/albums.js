import Dropzone from "dropzone";
import "dropzone/dist/dropzone.css";


import toastr from 'toastr';
toastr.success('www')

let dropzoneInstance = null;
let existingAlbumFiles = [];

var submitButton = document.querySelector("#save-album-data-btn");
var albumTitleInput = document.querySelector("#albumTitleInput");

var myModalEl = document.getElementById("AlbumFormModal");
myModalEl.addEventListener("hide.bs.modal", function () {
    dropzoneInstance.destroy();
    albumTitleInput.value = "";
});

const albumDropzoneOptions = {
    url: "/albums",
    autoProcessQueue: false,
    uploadMultiple: true,
    parallelUploads: 100,
    maxFiles: 100,
    acceptedFiles: "image/*",
    init: function () {
        var wrapperThis = this;

        if (existingAlbumFiles.length) {
            //handle already existing files
        }

    
        this.on("addedfile", function (file) {
            // Create the remove button
            var removeButton = Dropzone.createElement(
                `<button class='btn btn-lg dark'><i class="fa-solid fa-trash ms-2 c-pointer text-danger"></i></button>`
            );
            // Listen to the click event
            removeButton.addEventListener("click", function (e) {
                e.preventDefault();
                e.stopPropagation();
                wrapperThis.removeFile(file);
            });

            file.previewElement.appendChild(removeButton);
        });

        this.on("sendingmultiple", function (data, xhr, formData) {
            formData.append('albumName' ,albumTitleInput.value)
        });

        this.on("successmultiple", function (file, response) {
            console.log(response);
        });

        this.on("queuecomplete", function () {
            myModal.hide();
        });
    },
};

submitButton.addEventListener("click", function () {
    if(dropzoneInstance && dropzoneInstance.getQueuedFiles().length !== 0){
        dropzoneInstance.processQueue();
    }else{
        var blob = new Blob();
        blob.upload = { chunked: false };
        dropzoneInstance.uploadFile(blob);
    }
});

var myModal = new window.bootstrap.Modal(
    document.getElementById("AlbumFormModal")
);

function btnClickHandler(e) {
    //create or update
    const mode = e.target.closest("button").dataset.type;
    const selectedAlbum = e.target.closest("button").dataset.album;
    console.log(mode);
    console.log(selectedAlbum);
    if (mode === "create") {
        albumDropzoneOptions.url = "/albums";
        existingAlbumFiles = [];
    } else {
        albumDropzoneOptions.url = "/albums";
        existingAlbumFiles.push(1);
    }
    let myDropzone = new Dropzone("#my-dropzone", albumDropzoneOptions);
    dropzoneInstance = myDropzone;

    myModal.show();
}

// used classes cause i intend to use the btn twice once for creating and one for updating.
const albumBtns = document.getElementsByClassName("albums-form-btn");

Array.from(albumBtns).forEach((btn) => {
    btn.addEventListener("click", btnClickHandler);
});
