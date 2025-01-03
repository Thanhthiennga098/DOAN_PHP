$(document).ready(function(){
    $(document).on("click",".checkgiohang",function(){       
        var IDGioHang = $(this).attr("data-id");
        $(document).on("click",".xoagiohang",function(e){
            e.preventDefault();
            $.ajax({
                type:'get',
                url:'dashboard/ajax/xulyajax.php',
                data:{IDGioHang:IDGioHang},
                success:function(data){
                    $("#xoasuccess").fadeIn('slow').html(data);
                }
            });
        });
    });
});