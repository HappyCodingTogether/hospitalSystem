<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- saved from url=(0084)https://account.oppo.com/index.php?q=user/register&back=http%3A%2F%2Fwww.oppo.com%2F -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">

    <title>统一挂号平台注册</title>
    <meta name="keywords" content="统一挂号平台注册页面">
    <meta name="description" content="统一挂号平台注册页面">
    <link href="/hospitalsystem-master/Public/注册_files/base.min.css" type="text/css" rel="stylesheet">
    <link href="/hospitalsystem-master/Public/注册_files/login.min.css" type="text/css" rel="stylesheet">
    <script src="/hospitalsystem-master/Public/js/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script src="/hospitalsystem-master/Public/js/tuteng.js" type="text/javascript"></script>

    <style type="text/css">
        .regForm,.username, .login, .makesure, #Phoneyan, #Regyan{width: 700px!important;}
        .regForm,.regForm div{padding: 0!important;}
        label{width: 100px;display: inline-block;text-align: right;}
    </style>
 <style type="text/css">object,embed{                -webkit-animation-duration:.001s;-webkit-animation-name:playerInserted;                -ms-animation-duration:.001s;-ms-animation-name:playerInserted;                -o-animation-duration:.001s;-o-animation-name:playerInserted;                animation-duration:.001s;animation-name:playerInserted;}                @-webkit-keyframes playerInserted{from{opacity:0.99;}to{opacity:1;}}                @-ms-keyframes playerInserted{from{opacity:0.99;}to{opacity:1;}}                @-o-keyframes playerInserted{from{opacity:0.99;}to{opacity:1;}}                @keyframes playerInserted{from{opacity:0.99;}to{opacity:1;}}</style></head>

<body onLoad="screenInfo();">
<!--header begin-->
<div class="header">
	<div class="wrapper">
		<div class="logo"><a href="/hospitalsystem-master/index.php/Home/Hospital" ><img src="/hospitalsystem-master/Public/注册_files/logo_h.png" width="176" height="28"></a></div>
		<div class="site-nav-title">注册帐号</div>
		<ul class="site-nav-right">
			<li class="sus"><a href="/hospitalsystem-master/index.php/Home/Hospital">登录</a></li>
		</ul>
	</div>
</div>
<!--header end-->
<!--content begin-->
<div class="wrapper container">
	<div class="RegBox">
		<div class="RegTitle"><span class="wel_reg">欢迎注册</span> ( 如已有帐号，请<a class="blue1" href="/hospitalsystem-master/index.php/Home/Hospital"> 点此登录 </a>)</div>
		
		<form action="/hospitalsystem-master/index.php/Home/User/register" method="post" class="fillBox regForm" id="registerform">
			<div class="username" id="username">
				<label class="einfo">真实姓名:</label>
				<input name="user_name" type="text" class="usr" id="user_name" maxlength="32">
				<span class="rightMsg">(请使用就诊者本人真实姓名注册)</span>
			</div>
			
			<div class="userid" id="userid">
				<label class="einfo">身份证号:</label>
                <input name="user_idcard" type="text" class="usr" id="user_id" maxlength="32">
				<span class="rightMsg">(请使用就诊者本人有效证件号码注册)</span>
			</div>
            <br/>
			<div class="emailaddress" id="emailaddress">
				<label class="einfo">邮箱地址:</label>
				<input name="user_email" type="text" class="usr" id="user_email" maxlength="32">
                <span class="rightMsg"></span>
			</div>
            <br/>
			<div class="login">
				<label class="einfo">登录密码:</label>
				<input id="pwd" type="password" name="pwd" placeholder="6~16位数字、字母或字符组合的密码" class="usr" maxlength="16">
                <span class="rightMsg"></span>
			</div>
			<div class="makesure">
				<label class="einfo" >确认密码:</label>
				<input id="pwd2" type="password" name="pwd2" placeholder="重复输入密码" class="usr" maxlength="16">
                <span class="rightMsg"></span>
			</div>
			<div class="yanzheng clearfix Regyan" id="Regyan">
				<div class="verblock">
					<label for="vercode" class="einfo">图片验证码:</label>
					<input name="vercode" type="text" class="verify" id="vercode" maxlength="6">
					<div class="pic" >
						<img src="/hospitalsystem-master/index.php/Home/User/verify" alt="点击刷新验证码" title="点击刷新验证码" style="height:37px;width:150px;vertical-align:middle;margin-bottom:3px;cursor:pointer;" id="auth_code">

					</div>
					<span class="rightMsg"></span>
				</div>

			</div>
			<div class="reg"><input  type="button" class="gBtn" id="regBtn" style="background-color: rgb(64, 159, 115);" onMouseOver="changecolor();" onMouseOut="fade();" value="注册"></div>
		</form>
        <div style="display: none;" id="y_submit">
            <span>0</span><span>0</span><span>0</span><span>0</span><span>0</span><span>0</span>
        </div>
	</div>
</div>
<script type="text/javascript" src="/hospitalsystem-master/Public/js/register.js"></script>
</body></html>