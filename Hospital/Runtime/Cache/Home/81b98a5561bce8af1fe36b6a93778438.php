<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- saved from url=(0084)https://account.oppo.com/index.php?q=user/register&back=http%3A%2F%2Fwww.oppo.com%2F -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">

<title>统一挂号平台注册</title>
<meta name="keywords" content="统一挂号平台注册页面">
<meta name="description" content="统一挂号平台注册页面">
<link href="/hospital/Public/注册_files/base.min.css" type="text/css" rel="stylesheet">
<link href="/hospital/Public/注册_files/login.min.css" type="text/css" rel="stylesheet">

<script src="/hospital/Public/注册_files/common.min.js" type="text/javascript"></script>
<script type="text/javascript">
var _oztime = new Date().getTime();
</script>
<script src="/hospital/Public/注册_files/reg.min.js" type="text/javascript"></script>
<script src="/hospital/Public/注册_files/jquery.mailAutoComplete-3.1.js" type="text/javascript"></script>
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
		<div class="logo"><a href="http://www.oppo.com/" target="_blank"><img src="/hospital/Public/注册_files/logo_h.png" width="176" height="28"></a></div>
		<div class="site-nav-title">注册帐号</div>
		<ul class="site-nav-right">
			<li class="sus"><a href="/hospital/index.php/Home/Hospital">登录</a></li>
		</ul>
	</div>
</div>
<!--header end-->
<!--content begin-->
<div class="wrapper container">
	<div class="RegBox">
		<div class="RegTitle"><span class="wel_reg">欢迎注册</span> ( 如已有帐号，请<a class="blue1" href="/hospital/index.php/Home/Hospital"> 点此登录 </a>)</div>
		
		<form action="" method="post" class="fillBox regForm" onSubmit="return reg_submit();">
			<div class="username" id="username">
				<label for="vip" class="einfo">真实姓名:</label>
				<span style="display:inline-block;position:relative;"><ul id="mailListBox_0" class="justForJs emailist" style="min-width:292px;_width:292px;position:absolute;left:-6000px;top:37px;z-index:1;"></ul><input name="user_name" type="text" class="usr" id="user_name" maxlength="32" autocomplete="off"></span>
				<span class="rightMsg">(请使用就诊者本人真实姓名注册)</span>
			</div>
			
			<div class="userid" id="userid">
				<label for="vip" class="einfo">身份证号:</label>
				<span style="display:inline-block;position:relative;"><ul id="mailListBox_0" class="justForJs emailist" style="min-width:292px;_width:292px;position:absolute;left:-6000px;top:37px;z-index:1;"></ul><input name="user_id" type="text" class="usr" id="user_id" maxlength="32" autocomplete="off"></span>
				<span class="rightMsg">(请使用就诊者本人有效证件号码注册)</span>
			</div>
<br></br>			
			<div class="emailaddress" id="emailaddress">
				<label for="vip" class="einfo">邮箱地址:</label>
				<span style="display:inline-block;position:relative;"><ul id="mailListBox_0" class="justForJs emailist" style="min-width:292px;_width:292px;position:absolute;left:-6000px;top:37px;z-index:1;"></ul><input name="email_address" type="text" class="usr" id="user_email" maxlength="32" autocomplete="off"></span>
			</div>
<br></br>			
			<div class="login">
				<label class="einfo" for="pw">登录密码:</label>
				<input id="pw" type="password" placeholder="6~16位数字、字母或字符组合的密码" class="usr" maxlength="16">
			</div>
			<div class="strong clearfix">
				<label style="float: left;width: 106px;">&nbsp;</label>
				<span class="default">弱</span>
				<span class="middle">中</span>
				<span class="high">强</span>
			</div>

			<div class="makesure">
				<label class="einfo" for="pw">确认密码:</label>
				<input id="pwd" type="password" placeholder="重复输入密码" class="usr" maxlength="16">
			</div>
			<div class="yanzheng clearfix Regyan" id="Regyan">
				<div class="verblock">
					<label for="vercode" class="einfo">图片验证码:</label>
					<input name="codeStr" type="text" class="verify" id="vercode" maxlength="6">
					<div class="pic">
						<img src="/hospital/Public/注册_files/index.php" alt="点击刷新验证码" title="点击刷新验证码" style="vertical-align:middle;margin-bottom:3px;cursor:pointer;" id="auth_code">
					</div>
				</div>
				<a id="refresh_code" class="back"></a>
			</div>

			<div class="ctime protype">
       		<span lid="1" onClick="check_ctime();" class="login_ctime check"></span></div>

			<div class="reg"><input name="" type="submit" class="gBtn" id="regBtn" style="background-color: rgb(64, 159, 115);" onMouseOver="changecolor();" onMouseOut="fade();" value="注册"></div>
		</form>
	</div>
</div>
<!--content end-->
<!--footer begin-->
<!--GA start add by xueni -->
<script type="text/javascript">
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-43523742-1']);
_gaq.push(['_setDomainName', 'oppo.com']);
_gaq.push(['_addOrganic', 'soso', 'w']);
_gaq.push(['_addOrganic', 'youdao', 'q']);
_gaq.push(['_addOrganic', 'baidu', 'word']);
_gaq.push(['_addOrganic', 'so', 'q']);
_gaq.push(['_addOrganic', '360', 'q']);
_gaq.push(['_addOrganic', 'sogou', 'query']);
_gaq.push(['_trackPageview']);

(function() {
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
</script>
<!--GA end add by xueni -->
<!--miaozhen start add by xueni -->
<script type="text/javascript">
    (function() {
        window._CiQ10034 = window._CiQ10034 || [];
        window._CiQ10034.push(['_cookieUseRootDomain', true]);
        var c = document.createElement('script');
        c.type = 'text/javascript';
        c.async = true;
        c.charset = 'utf-8';
        c.src = '//collect.cn.miaozhen.com/ca/10034';
        var h = document.getElementsByTagName('script')[0];
        h.parentNode.insertBefore(c, h);
    })();
</script>
<noscript>
    &lt;link href="//collect.cn.miaozhen.com/refer/collect?i=10034&amp;v=13922245942&amp;pu=http%3A//%28NoScriptPageviews%29&amp;pt=NoScriptPageviews&amp;ru=http%3A//%28NoScriptClients%29&amp;csh=1000&amp;csw=1000&amp;css=10" rel="stylesheet" type="text/css" /&gt;
</noscript>
<!--miaozhen end add by xueni -->
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?9cb8846b548404438c81aaa02eda4f0f";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
<!--footer end-->


</body></html>