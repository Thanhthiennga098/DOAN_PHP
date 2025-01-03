$(document).ready(function(){
    $(document).on("click",".del_wistlish",function(){
        var IDWistlish = $(this).attr("data-id");
        $(document).on("click",".xoawistlish",function(e){
        e.preventDefault();
        $.ajax({
            type:'get',
            url:'dashboard/ajax/xulyajax.php',
            data:{IDWistlish:IDWistlish},
            success:function(data){
                $("#XoaWishlist").fadeIn('slow').html(data);
            }
        });
    });
    });
});