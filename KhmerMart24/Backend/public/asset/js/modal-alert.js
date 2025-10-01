// SweetAlert2 configuration
const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.onmouseenter = Swal.stopTimer;
        toast.onmouseleave = Swal.resumeTimer;
    },
});
// Function to show success toast
function showSuccessAlert(message) {
    Toast.fire({
        icon: "success",
        title: message,
    });
}

// Function to show error toast
function showErrorAlert(message) {
    Toast.fire({
        icon: "error",
        title: message,
    });
}
$(document).ready(function () {
    // note: show modal
    $(document).on("click", 'button[data-action="show"]', function () {
        const title = $(this).data("title");
        const url = $(this).attr("data-modal-url"); // always current
        console.log(title);
        console.log(url);

        $("#modal #title").text(title);
        // note: check if is a delete action
        const isDeleteAction = $(this).data("type") === "delete";

        if (isDeleteAction) {
            // note: For delete actions - create confirmation content dynamically
            const itemName = $(this).data("item-name");
            const deleteUrl = url;

            const modalContent = `
                <div class="p-4 md:p-5">
                    <p class="text-gray-900 dark:text-white mb-4">
                        Are you sure you want to delete "<strong>${itemName}</strong>"? 
                        This action cannot be undone!
                    </p>
                    <button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                        Red
                    </button>
                    <div class="flex gap-4 justify-end space-x-3">
                        <button type="button" id="confirm-delete" 
                                class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none rounded-lg ">
                            Yes, Delete
                        </button>
                          <button id="confirm-delete" type="button" class="font-medium text-red-600  dark:text-red-500 ml-4">
                                Yes,Delete
                          </button>
                  
                    </div>
                </div>
            `;

            $("#modal #modal-body").html(modalContent);
            $("#modal").removeClass("hidden").addClass("flex");

            // note: Handle delete confirmation
            $("#confirm-delete").on("click", function () {
                const csrfToken = $('meta[name="csrf-token"]').attr("content");
                $.ajax({
                    url: deleteUrl,
                    type: "DELETE",
                    headers: {
                        // ✅ CORRECT: Put in headers, not data
                        "X-CSRF-TOKEN": csrfToken,
                        "X-Requested-With": "XMLHttpRequest",
                    },
                    data: {}, // Keep empty or add other data if needed
                    success: function (res) {
                        // note: close modal
                        $("#modal").removeClass("hidden").addClass("flex");
                        // note: Show sweetalert with success message
                        if (res.success) {
                            // Use the function from sweetalert.js instead of redefining Toast
                            showSuccessAlert(
                                res.message || "Category deleted successfully!"
                            );

                            setTimeout(() => {
                                if (res.redirect) {
                                    window.location.href = res.redirect;
                                }
                                location.reload();
                            }, 1000);
                        }
                    },
                });
            });
        } else {
            $.ajax({
                url: url,
                success: function (res) {
                    $("#modal #modal-body").html(res);
                    $("#modal").removeClass("hidden").addClass("flex");
                    if (res.success) {
                        // Use the function from sweetalert.js instead of redefining Toast
                        showSuccessAlert(res.message);

                        setTimeout(() => {
                            location.reload();
                        }, 1000);
                    }
                },
            });
        }
    });
    // note: hide modal
    $(document).on("click", "#close-modal", function () {
        $("#modal").removeClass("flex").addClass("hidden");
    });
    // note: hide modal when click outside modal content
    $(document).on("click", "#modal", function (e) {
        if (e.target.id === "modal") {
            $("#modal").removeClass("flex").addClass("hidden");
        }
    });
});
