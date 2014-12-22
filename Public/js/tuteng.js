/**
 * Created by tsukaima on 2014/12/8.
 */
$(document).ready(function() {
    $("#login_a").click(function() { //登录框
        $("#login-box").slideToggle(500);
    });
    $(".box-header li,.person-menu li.smallt,#renzheng").click(function() { //框体tab
        $(this).addClass("active");
        $(this).siblings().removeClass("active");
        var body = "#"+this.id+"-body";
        $(body).removeClass("hide");
        $(body).siblings().addClass("hide");
    });
    $(".select-header").click(function() { //快速预约下拉框
        $(this).next().toggleClass("hide");
        $(this).toggleClass("active");
    });
    $(".select-box").mouseleave(function() { //快速预约下拉框收回
        $(this).children("ul").addClass("hide");
        $(this).children(".select-header").removeClass("active");
    });
    $(".select-box li").click(function() {//快速预约下拉框选择
        var drop = $(this).parent();
        drop.prev().children("span:first-child").text($(this).text());
        drop.prev().children("span").eq(1).text($(this).parent().children("li").index(this));
        drop.addClass("hide");
        drop.prev.removeClass("active");

    });
    $(".dropdown-menu li").click(function() { //选择搜索前置条件
        $("#search-type").text($(this).text());
    });
    $(".keshi li.type").click(function (e) { //按科室预约左侧菜单栏
        var dropDown = $(this).next();
        $(".keshi li.items").not(dropDown).slideUp('500');
        dropDown.slideToggle('500');
        e.preventDefault();
    });
    $(".keshi li.items li").click(function() { //科室左侧菜单
        $(".keshi li.items li.active").removeClass("active");
        $(this).addClass("active");
    });
    // 验证码生成
    var captcha_img = $('#auth_code');
    var verifyimg = captcha_img.attr("src");
    captcha_img.click(function(){
        if( verifyimg.indexOf('?')>0){
            $(this).attr("src", verifyimg+'&random='+Math.random());
        }else{
            $(this).attr("src", verifyimg.replace(/\?.*$/,'')+'?'+Math.random());
        }
    });
    //搜索框传值
    $("button.submit").click(function() {
        var type = $("#search-type").text();
        var neirong = $("#search-val").val();
        location.href = "Hospital/sousuo?type="+type+"&neirong="+neirong;
    });
});