$(document).on("click",".Update_TH",function(){
    var IDThuongHieu = $(this).attr("data-id");
    var MaThuongHieu = $("#" + IDThuongHieu).children("#MaThuongHieu").text();
    var TenThuongHieu = $("#" + IDThuongHieu).children("#TenThuongHieu").text();
    $("#MaTH").val(MaThuongHieu);
    $("#TenTH").val(TenThuongHieu);
    $("#ID_TH").val(IDThuongHieu);
    $(document).on("click",".CapNhat",function(e){
        e.preventDefault();
        var IDTHieu = $("#ID_TH").val();
        var TTHieu = $("#TenTH").val();
        $.ajax({
            type:'post',
            url:'ajax/xulyajax.php',
            data:{IDTHieu:IDTHieu,TTHieu:TTHieu},
            success:function(data){
                $("#thuonghieu").fadeIn('slow').html(data);
            },
        });
    });
});
$(document).on("click",".Delete_TH",function(){
var DelThuongHieu = $(this).attr("data-id");
$(document).on("click",".XoaThuongHieu",function(e){
    e.preventDefault();
    $.ajax({
        type:'get',
        url:'ajax/xulyajax.php',
        data:{DelThuongHieu:DelThuongHieu},
        success:function(data){
            $("#Delete").fadeIn('slow').html(data);
            }
        });
    });
});	