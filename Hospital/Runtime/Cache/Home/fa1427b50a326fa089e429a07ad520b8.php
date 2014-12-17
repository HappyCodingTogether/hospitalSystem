<?php if (!defined('THINK_PATH')) exit();?><html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>图腾医院统一挂号平台</title>
		<link rel="stylesheet" type="text/css" href="/hospitalSystem/trunk/Public/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="/hospitalSystem/trunk/Public/css/tuteng.css" />
	</head>
	<body>
		<header>
			<div id="header">
				<div id="header_main">
					<div class="header_main">
						<div class="col-md-6">
							<div class="logo">
								<img src="/hospitalSystem/trunk/Public/images/logo.png">
							</div>
						</div>
						<div class="col-md-6">
							<div class="search-box">
								<div class="input-group">
									<div class="input-group-btn dropdown">
								        <button type="button" class="btn btn-default dropdown-toggle btn-type" data-toggle="dropdown">
								        	<span id="search-type">科室</span>
								        	<span class="caret"></span>
								        </button>
								        <ul class="dropdown-menu">
								            <li>医院</li>
								            <li>科室</li>
								        </ul>
							        </div>
		                            <input type="text" class="form-control"/>
		                            <input type="submit"/>
								</div>
							</div>
						</div>
                        <?php
 if(!isset($_SESSION['userName'])){ ?>
						<div id="r_l">
							<div class="r_l-box">
								<ul>
									<li><a href="javascript:void(0)" id="login_a">登录</a></li>
									<li><a href="/hospitalSystem/trunk/index.php/Home/Hospital/register">注册</a></li>
								</ul>	
							</div>
						</div>
                        <?php
 } else{ ?>
                            <div id="r_l2">
                                <div class="r_l-box">
                                <ul>
                                    <li><label ><?php echo $_SESSION['userName']?></label></li>
                                    <li><a href="/hospitalSystem/trunk/index.php/Home/User/logout">注销</a></li>
                                </ul>
                                </div>
                            </div>
                        <?php
 } ?>
					</div>
				</div>
				<div id="header_menu">
					<div class="menu-list">
						<div class="col-md-offset-1">
							<ul>
                                <li><a href="/hospitalSystem/trunk/index.php/Home/Hospital">首页</a></li>
                                <li><a href="/hospitalSystem/trunk/index.php/Home/Hospital/hospitals">按医院预约</a></li>
								<li><a href="/hospitalSystem/trunk/index.php/Home/Hospital/keshi">按科室预约</a></li>
								<li><a href="/hospitalSystem/trunk/index.php/Home/Hospital/gonggao">最新公告</a></li>
								<li><a href="/hospitalSystem/trunk/index.php/Home/Hospital/personCenter">个人中心</a></li>
							</ul>
						</div>
					</div>
				</div>

				<div id="login-box" class="login-box">
					<form method="post" action="/hospitalSystem/trunk/index.php/Home/User/login">
						<div class="form-group">
							<input type="text" id="userName" name="userName" class="form-control" placeholder="用户名"/>
						</div>
						<div class="form-group">
							<input type="password" id="pwd" name="pwd" class="form-control" placeholder="密码"/>
						</div>
						<div class="checkbox">
							<label>
						        <input type="checkbox">记住密码
						    </label>
						    <span class="forget-pwd">
						    	<a href="">忘记密码</a>
						    </span>
					  	</div>
					  	<input type="submit" class="btn btn-primary pull-right" value="登录">
					</form>
				</div>

			</div>
		</header>
<div class="main-body">
    
    <div class="container">
        <div id="person-data">
            <div class="col-md-4">
                <div class="box">
                    <div class="box-header">
                        <ul>
                            <li id="person" class="active">个人资料</li>
                            <li id="pwd-xiugai">修改密码</li>
                        </ul>
                    </div>
                    <div class="box-body">
                        <div id="person-body">
                            <table class="data-table">
                                <tr>
                                    <td>姓名：</td>
                                    <td>陈汉川</td>
                                </tr>
                                <tr>
                                    <td>证件：</td>
                                    <td>350322199309264318</td>
                                </tr>
                                <tr>
                                    <td>邮箱：</td>
                                    <td>1320396800@qq.com</td>
                                </tr>
                                <tr>
                                    <td>联系方式：</td>
                                    <td>13141492304</td>
                                </tr>
                                <tr>
                                    <td>是否认证：</td>
                                    <td>
                                        <a href="">点击进入认证</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div id="pwd-xiugai-body" class="hide">
                            <form class="form-pwd-xiugai">
                                <div class="form-item">
                                    <span>原密码：</span>
                                    <div class="form-pwd">
                                        <input type="password"/>
                                    </div>
                                </div>
                                <div class="form-item">
                                    <span>新密码：</span>
                                    <div class="form-pwd">
                                        <input type="password"/>
                                    </div>
                                </div>
                                <div class="form-item">
                                    <span>确认密码：</span>
                                    <div class="form-pwd">
                                        <input type="password"/>
                                    </div>
                                </div>
                                <button class="btn btn-primary">确认修改</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="box">
                    <div class="box-header">
                        <ul>
                            <li id="now-yuyue" class="active">当前预约</li>
                            <li id="prev-yuyue">历史预约</li>
                        </ul>
                    </div>
                    <div class="box-body yuyue-body">
                        <div id="now-yuyue-body">
                            <table>
                                <tr>
                                    <td>医院</td>
                                    <td>科室</td>
                                    <td>医生</td>
                                    <td>就诊日期</td>
                                    <td>预约日期</td>
                                    <td>取消预约</td>
                                </tr>
                                <tr>
                                    <td class="yuyue-hospital">北京大医院</td>
                                    <td class="yuyue-keshi">内科</td>
                                    <td class="yuyue-doctor">陈医生</td>
                                    <td>2014-2-21</td>
                                    <td>2014-8-9</td>
                                    <td><a href="">取消</a></td>
                                </tr>
                                <tr>
                                    <td class="yuyue-hospital">北京大医院sddddddddsdssssfdddddd</td>
                                    <td class="yuyue-keshi">内科</td>
                                    <td class="yuyue-doctor">陈医生</td>
                                    <td>2014-2-21</td>
                                    <td>2014-8-9</td>
                                    <td><a href="">取消</a></td>
                                </tr>
                                <tr>
                                    <td class="yuyue-hospital">北京大医院</td>
                                    <td class="yuyue-keshi">内科</td>
                                    <td class="yuyue-doctor">陈医生</td>
                                    <td>2014-2-21</td>
                                    <td>2014-8-9</td>
                                    <td><a href="">取消</a></td>
                                </tr>
                            </table>
                        </div>
                        <div id="prev-yuyue-body" class="hide">
                            <table>
                                <tr>
                                    <td>医院</td>
                                    <td>科室</td>
                                    <td>医生</td>
                                    <td>就诊日期</td>
                                    <td>预约日期</td>
                                </tr>
                                <tr>
                                    <td class="yuyue-hospital">北京大医院</td>
                                    <td class="yuyue-keshi">内科</td>
                                    <td class="yuyue-doctor">陈医生</td>
                                    <td>2014-2-21</td>
                                    <td>2014-8-9</td>
                                </tr>
                                <tr>
                                    <td class="yuyue-hospital">北京大医院sddddddddsdssssfdddddd</td>
                                    <td class="yuyue-keshi">内科</td>
                                    <td class="yuyue-doctor">陈医生</td>
                                    <td>2014-2-21</td>
                                    <td>2014-8-9</td>
                                </tr>
                                <tr>
                                    <td class="yuyue-hospital">北京大医院</td>
                                    <td class="yuyue-keshi">内科</td>
                                    <td class="yuyue-doctor">陈医生</td>
                                    <td>2014-2-21</td>
                                    <td>2014-8-9</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<footer>
			<div id="footer" class="footer">
				<div class="col-md-offset-5 col-md-2">
					<img src="/hospitalSystem/trunk/Public/images/guahao.png"/>
				</div>
				<div class="col-md-12">
					<ul>
						<li><a href="">关于我们</a></li>
						<li><a href="">联系我们</a></li>
					</ul>
				</div>
			</div>
		</footer>
		<script type="text/javascript" src="/hospitalSystem/trunk/Public/js/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="/hospitalSystem/trunk/Public/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/hospitalSystem/trunk/Public/js/tuteng.js"></script>
	</body>
</html>