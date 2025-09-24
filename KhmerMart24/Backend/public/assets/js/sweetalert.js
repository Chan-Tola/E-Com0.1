$(document).ready(function () {
    function show_toast(type, message) {
        let title = "Success";
        let bgClass = "bg-success";
        let icon = "ri-checkbox-circle-fill";
        if (type === "error") {
            title = "Error";
            bgClass = "bg-danger";
            icon = "ri-error-warning-fill";
        }
        $(".toast").addClass("show");
        $(".toast").addClass(bgClass);
        $(".toast-title").text(title);
        $(".toast-header .icon-base").addClass(icon);
        $(".toast-body").text(message);
        setTimeout(() => {
            $(".toast").removeClass("show");
        }, 5000);
    }
});
