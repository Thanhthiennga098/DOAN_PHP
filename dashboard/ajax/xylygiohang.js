$(document).ready(function(){
    $(document).on("click",".checkdonhang",function(){       
        var IDGioHang = $(this).attr("data-id");
        $(document).on("click",".xoadonhang",function(e){
            e.preventDefault();
            $.ajax({
                type:'get',
                url:'dashboard/ajax/xulyajax.php',
                data:{IDGioHang:IDGioHang},
                success:function(data){
                    $("#xoadonhang").fadeIn('slow').html(data);
                }
            });
        });
    });
});