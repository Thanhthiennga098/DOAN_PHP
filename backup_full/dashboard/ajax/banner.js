$(document).ready(function(){
    $(document).on("click",".del_banner", function(){
        var IDBanner = $(this).attr("data-id");
        $(document).on("click",".XoaBanner",function(e){
            e.preventDefault();
            $.ajax({
            type:'get',
            url:'ajax/xulyajax.php',
            data:{IDBanner:IDBanner},
            success:function(data){
                $("#delete").fadeIn('slow').html(data);
            },
        });
        });
    });
});