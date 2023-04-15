function dialog_1(id,ref){
    Swal.fire({
        title: 'هل أنت متأكد',
        text: "لن تستطيع التراجع عن حذف الصنف",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText:"تراجع",
        confirmButtonText: 'نعم احذفه'
      }).then((result) => {
        if (result.isConfirmed) {
            deleteCategory(id,ref)
        }
      })
}

function deleteCategory(id,ref){
    // Make a request for a user with a given ID
axios.delete('/Categories/'+id)
.then(function (response) {
    result(response.data);
    ref.closest("tr").remove();
})
.catch(function (error) {
    result(error.response.data);
})
};


function result(data){
    Swal.fire({
        position: 'center',
        icon: data.icon,
        title: data.title,
        showConfirmButton: false,
        timer: 1500
      })
}