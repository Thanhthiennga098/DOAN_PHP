$(document).ready(function(){
    $(document).on("click",".edit_data",function(){
        var IDTheLoai = $(this).attr("data-id");
        var MaTheLoai = $("#" + IDTheLoai).children("#MaTheLoai").text();
        var TenTheLoai = $("#" + IDTheLoai).children("#TenTheLoai").text();
        $("#MaLoaiSP").val(MaTheLoai);
        $("#TenLoaiSP").val(TenTheLoai);
        $("#IDTheLoaiSP").val(IDTheLoai);
        $(document).on("click",".update_theloai",function(e){
            e.preventDefault();
            var MTheLoai = $("#MaLoaiSP").val();
            var TTheLoai = $("#TenLoaiSP").val();
            var ID = $("#IDTheLoaiSP").val();
            $.ajax({
                type:'post',
                url:'ajax/xulyajax.php',
                data:{ID:ID, MTheLoai:MTheLoai, TTheLoai:TTheLoai},
                success:function(data){
                    $("#succ").fadeIn('slow').html(data);
                },
            });
        });
    });
    $(document).on("click",".delete_data",function(){
        var IDDel = $(this).attr("data-id");
        $(document).on("click",".delete",function(e){
            e.preventDefault();
            $.ajax({
                type:'get',
                url:'ajax/xulyajax.php',
                data:{IDDel:IDDel},
                success:function(data){
                    $("#Delete").fadeIn('slow').html(data);
                }
            });
        });
    });
    
});