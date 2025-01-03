$(document).ready(function(){
    $(document).on("click",".XoaSanPham", function(){
        var IDSanPham = $(this).attr("data-id");
        $(document).on("click",".XoaSP",function(e){
            e.preventDefault();
            $.ajax({
            type:'get',
            url:'ajax/xulyajax.php',
            data:{IDSanPham:IDSanPham},
            success:function(data){
                $("#delete").fadeIn('slow').html(data);
            },
        });
        });
    });
});