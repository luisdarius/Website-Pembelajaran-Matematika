$(document).ready(function () {
            
    /* Sidebar */
    $("#sidebar").mCustomScrollbar({
        theme: "minimal"
    });

    $("#sidebarCollapse").on("click", function () {
        $("#sidebar, #content").toggleClass("active");
        $(".collapse.in").toggleClass("in");
        $("a[aria-expanded=true]").attr("aria-expanded", "false");
    });


    /* DataTable */
    $("#dataTable").DataTable();


    /* Gijgo WYSIWYG Editor*/
    $("#editor").editor();
    $("#editor2").editor();
});

/* Upload Image Preview */
var loadFile = function(event) {
    var output = document.getElementById('imgPreview');
    output.src = URL.createObjectURL(event.target.files[0]);
    URL.revokeObjectURL();
};
