/**
 * Created by tsukaima on 2014/12/17.
 */
$(document).ready(function() {
    $("#user_name").blur(y_username);//验证姓名
    $("#user_id").blur(y_userid);//验证身份证
    $("#user_email").blur(y_useremail);//验证邮箱
    $("#pwd").blur(y_pwd);//验证密码
    $("#pwd2").blur(y_pwd2);//验证再次密码

});

function y_username() { //姓名汉字验证
    var userName = $(this).val();
    var reg = /^[\u4E00-\u9FA5]+$/;//正则表达式判断汉字
    if(!reg.test(userName)) { //不是汉字处理
        errorstr(this,"真实姓名必须全是汉字");
    }
    else {
        correctstr(this,"可以使用");
    }
}

function y_userid() { //身份证验证
    var userID = $(this).val();
    if(id_ishefa(this, userID)) {
        y_id_isuse(this, userID);
    }
}

function id_ishefa(doc, userID) { //验证身份证格式
    var reg = /(^\d{15}$)|(^\d{17}([0-9]|X)$)/;
    if(!(reg.test(userID))) { //身份证格式不对处理
        errorstr(doc,"身份证格式不对");
        return false;
    }
    return true;
}

function y_id_isuse(doc, userID) { //验证身份证是否使用
    $.ajax({
        url: '../User/checkregister',
        type: 'POST',
        async:true,
        dataType: 'json',
        data: "type="+"y_userID"+"&user_idcard="+userID,
        success:function(data) {
            if(data != true) { //身份证已使用
                errorstr(doc, "身份证已被使用");
            }
            else {
                correctstr(doc, "可以使用");
            }
        }
    });
}

function y_useremail() { //邮箱验证
    var userEmail = $(this).val();
    if(email_ishefa(this, userEmail)) {
        y_email_isuse(this, userEmail);
    }
}

function email_ishefa(doc, userEmail) { //验证邮箱格式
    var reg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/;
    if(!(reg.test(userEmail))) { //邮箱格式不对处理
        errorstr(doc, "邮箱格式不对");
        return false;
    }
    return true;
}

function y_email_isuse(doc, userEmail) { //验证邮箱是否使用
    $.ajax({
        url: '../User/checkregister',
        type: 'POST',
        async:true,
        dataType: 'json',
        data: "type="+"y_userEmail"+"&user_email="+userEmail,
        success:function(data) {
            if(data!= true) { //邮箱已使用
                errorstr(doc, "邮箱已被使用");
            }
            else {
                correctstr(doc, "可以使用");
            }
        }
    });
}

function y_pwd() { //验证密码
    var pwd = $(this).val();
    var reg = /[a-zA-Z0-9]{6,16}/;
    if(!(reg.test(pwd))) { //密码格式不对处理
        errorstr(this,"密码不满足要求");
    }
    else {
        correctstr(this,"可以使用");
    }
}

function y_pwd2() { //验证再次密码
    var pwd2 = $(this).val();
    var pwd = $("#pwd").val();
    if(pwd2 != pwd) { //再次密码不等处理
        errorstr(this,"两次密码不同");
    }
    else {
        correctstr(this,"输入相同");
    }
}

function errorstr(doc,str) {
    $(doc).next().text(str);
    $(doc).next().css("color","red");
}

function correctstr(doc,str) {
    $(doc).next().text(str);
    $(doc).next().css("color","green");
}