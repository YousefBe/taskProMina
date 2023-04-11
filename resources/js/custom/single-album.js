
import Swal from 'sweetalert2'
// import 'sweetalert2/src/sweetalert2.scss'

const deleteImgBtns = document.getElementsByClassName('delete-img-btn')

Array.from(deleteImgBtns).forEach((btn)=>{
    btn.addEventListener('click',function (e){
        const imageId = e.target.closest('button').dataset.image
        const deleteAlbumUrl ='/images/' + imageId;
        console.log(deleteAlbumUrl)
        Swal.fire({
            title: 'Do you want to save the changes?',
            showCancelButton: true,
            confirmButtonText: 'Delete',
        }).then((result) => {
            if (result.isConfirmed) {
                window
                    .axios
                    .delete(deleteAlbumUrl)
                    .then((res)=>{
                       if(res.status === 200){
                           Swal.fire(
                               'Deleted!',
                               'Your Image has been deleted.',
                               'success'
                           )
                           setTimeout(()=>{
                               location.reload()
                           },2000)
                       }
                    })
                    .catch((err)=>{

                    })
            }
        })
    })
})
