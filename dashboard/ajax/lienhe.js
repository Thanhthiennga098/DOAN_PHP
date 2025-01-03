$(document).ready(function() {
    $(document).on("click", ".delete_lienhe", function() {
        var IDLienHe = $(this).attr("data-id");
        $(document).on("click", ".XoaLienHe", function(e) {
            e.preventDefault();
            $.ajax({
                type: 'get',
                url: 'ajax/xulyajax.php',
                data: { IDLienHe: IDLienHe },
                success: function(data) {
                    $("#delete").fadeIn('slow').html(data);
                },
            });
        });
    });
});