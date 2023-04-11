const deleteAlbumBtns = document.getElementsByClassName('delete-album-btn')
const moveImagesSwitch = document.getElementById('moveImagesToOtherAlbumSwitch');
const selectAlbumsInput = document.getElementById('selectDestinationAlbumInput');
const submitDeleteAlbumFormBtn = document.getElementById('submitDeleteAlbumFormBtn');
import toastr from 'toastr';
import Swal from 'sweetalert2'


let selectedAlbum=null
let isMovingImages=false

moveImagesSwitch.addEventListener('change', function (e){
    isMovingImages = e.target.checked;

    if (isMovingImages){
        selectAlbumsInput.disabled = false
    }else{
        selectAlbumsInput.disabled = true
    }
})

const modal = document.getElementById('deleteAlbumModal')
const  deleteAlbumModal = new window.bootstrap.Modal(modal);

const showDeleteAlbumModelHandler = (e)=>{
    selectedAlbum = e.target.closest('button').dataset.album
    Array.from(selectAlbumsInput.options).forEach((option)=>{
        if(option.value === selectedAlbum){
            option.classList.add('d-none')
        }else{
            option.classList.remove('d-none')
        }
    })
    deleteAlbumModal.show()
}


Array.from(deleteAlbumBtns).forEach((btn)=>{
    btn.addEventListener('click' , showDeleteAlbumModelHandler )
})

submitDeleteAlbumFormBtn.addEventListener('click',(e)=>{
    const payload = {
        isMovingImages :isMovingImages ,
        destinationAlbum : isMovingImages ?selectAlbumsInput.value : null,
    }
    console.log(isMovingImages)
    console.log(selectAlbumsInput.value)
    if (isMovingImages && !selectAlbumsInput.value){
        return toastr.error('please select a destination Album!')
    }

    const url = '/albums/' + selectedAlbum
    window
        .axios
        .delete(url , { data : payload})
        .then((res)=>{
            Swal.fire(
                'Deleted!',
                'Your Album has been deleted.',
                'success'
            )
            setTimeout(()=>{
                location.reload()
            },2000)
        })
        .catch((err)=>{
            console.log(err)
        })

})
