document.addEventListener("DOMContentLoaded", function() {
        $(function() {
            $('.delete').click(function() {

                $wal.fire({
                    title: "Czy na pewno chcesz usunąć rekord?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "Tak !",
                    cancelButtonColor: "#d33",
                    cancelButtonText: "Nie"
                }).then((result) => {
                    if (result.isConfirmed) {


                        $.ajax({
                                method: "DELETE",
                                url: deleteUrl + $(this).data("id"),
                                data: {
                                    _token: csrfToken,
                                    expense: $(this).data("id")
                                }
                            })
                            .done(function(data) {
                                $wal.fire({
                                    title: "Deleted!",
                                    text: "Your file has been deleted.",
                                    icon: "success",
                                    showConfirmButton: false,
                                });
                                setTimeout(() => {
                                    window.location.reload()
                                }, 2000);
                            })
                            .fail(function(data) {
                                $wal.fire("Oos....", data.responseJSON.message,
                                    'error')
                            });
                    }
                });
            })
        });
    });