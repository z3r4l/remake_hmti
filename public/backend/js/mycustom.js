// ==============================================================
// Sweetalert Delete
// ==============================================================
$("body").on("click", ".btn-delete", function () {
    let data_id = $(this).data("id");
    let id = $(this).attr("id");
    let token = $("meta[name='csrf-token']").attr("content");
    console.log(`${id}`);
    console.log(data_id);
    console.log(token);
    Swal.fire({
        title: "Anda Yakin?",
        text: "Yakin Ingin Menghapus ?",
        icon: "warning",
        showCancelButton: true,
        cancelButtonText: "batal",
        confirmButtonColor: "#1a9bfc",
        cancelButtonColor: "#fc4b6c",
        confirmButtonText: "Yes",
    }).then((result) => {
        if (result.isConfirmed) {
            //fetch to delete data
            $.ajax({
                url: data_id,
                type: "DELETE",
                cache: false,
                data: {
                    _token: token,
                },
                success: function () {
                    //show success message
                    Swal.fire({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000,
                        icon: "success",
                        title: "Data Berhasil Di Hapus",
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener(
                                "mouseenter",
                                Swal.stopTimer
                            );
                            toast.addEventListener(
                                "mouseleave",
                                Swal.resumeTimer
                            );
                        },
                    });
                    //remove post on table
                    $(`.Row${id}`).remove();
                },
            });
        }
    });
});

// ==============================================================
// Preview Image
// ==============================================================
    function previewImage()
    {
            
        const imgPreview = document.querySelector('.img-preview')

        const blob = URL.createObjectURL(image.files[0]);
            imgPreview.src = blob;
    }
