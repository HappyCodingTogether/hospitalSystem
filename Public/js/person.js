/**
 * Created by tsukaima on 2014/12/22.
 */

$(document).ready(function() {
    $("#header_menu li").eq(4).addClass("active");
    $("#renzheng-upload").change(setImagePreview);
    $(".yuyue-body a").click(cancelOrder);
    $(".pwd-xiugai button").click(changePwd);
});

function setImagePreview() {
    var docObj=document.getElementById("renzheng-upload");
    var imgObjPreview=document.getElementById("preview");
    if(docObj.files && docObj.files[0]){
        //imgObjPreview.src = docObj.files[0].getAsDataURL();

        //火狐7以上版本不能用上面的getAsDataURL()方式获取，需要一下方式
        imgObjPreview.src = window.URL.createObjectURL(docObj.files[0]);
    }else{
        //IE下，使用滤镜
        docObj.select();
        var imgSrc = document.selection.createRange().text;
        var localImagId = document.getElementById("localImag");
        //图片异常的捕捉，防止用户修改后缀来伪造图片
        try{
            localImagId.style.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";
            localImagId.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = imgSrc;
        }catch(e){
            alert("您上传的图片格式不正确，请重新选择!");
            return false;
        }
        imgObjPreview.style.display = 'none';
        document.selection.empty();
    }
    return true;
}

function cancelOrder() {
    var orderID = $(this).attr("data-id");
    $.ajax({
        url: APP+'',//目标地址
        type: 'POST',
        async:false,
        dataType: 'json',
        data: "type="+"cancelOrder"+"&orderID="+orderID,
        success:function(data) {
            if(data == true) {
                location.href = APP+"/Home/Hospital/nowOrder";
            }
        }
    });
}

function changePwd() {
    var newPwd = $("#newPwd").val();
    var newPwd2 = $("#newPwd2").val();
    if(newPwd == newPwd2) {
        $.ajax({
            url: APP+'/Home/User/changepwd',//目标地址
            type: 'POST',
            async:false,
            dataType: 'json',
            data: "type="+"changePwd"+"&newpwd="+newpwd,
            success:function(data) {
                if(data == true) {
                    alert(密码修改成功);
                    location.href = APP+"/Home/Hospital/changePwd";
                }
                else {
                    alert(修改失败);
                }
            }
        });
    }
    else {
        alert(两次输入不相同);
    }
}