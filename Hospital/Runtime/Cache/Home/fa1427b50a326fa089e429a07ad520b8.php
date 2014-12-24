<?php if (!defined('THINK_PATH')) exit();?><html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>图腾医院统一挂号平台</title>
		<link rel="stylesheet" type="text/css" href="/hospitalSystem-master/Public/css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="/hospitalSystem-master/Public/css/bootstrap-theme.css" />
		<link rel="stylesheet" type="text/css" href="/hospitalSystem-master/Public/css/tuteng.css" />
        <script type="text/javascript">
            var PUBLIC= "/hospitalSystem-master/Public";
            var APP = "/hospitalSystem-master/index.php";
            var ROOT = "/hospitalSystem-master";
        </script>
	</head>
	<body>
		<header>
			<div id="header">
				<div id="header_main">
					<div class="header_main">
						<div class="col-md-6">
							<div class="logo">
								<img src="/hospitalSystem-master/Public/images/logo.png">
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
		                            <input type="text" class="form-control" id="search-val"/>
		                            <button class="submit"></button>
								</div>
							</div>
						</div>
                        <?php
 if(!isset($_SESSION['userName'])){ ?>
						<div id="r_l">
							<div class="r_l-box">
								<ul>
									<li><a href="javascript:void(0)" id="login_a">登录</a></li>
									<li><a href="/hospitalSystem-master/index.php/Home/Hospital/register">注册</a></li>
								</ul>	
							</div>
						</div>
                        <?php
 } else{ ?>
                            <div id="r_l2">
                                <div class="r_l-box">
                                <ul>
                                    <li><label ><?php echo $_SESSION['userName']?></label></li>
                                    <li><a href="/hospitalSystem-master/index.php/Home/User/logout">注销</a></li>
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
                                <li><a href="/hospitalSystem-master/index.php/Home/Hospital">首页</a></li>
                                <li><a href="/hospitalSystem-master/index.php/Home/Hospital/hospitals">按医院预约</a></li>
								<li><a href="/hospitalSystem-master/index.php/Home/Hospital/keshi">按科室预约</a></li>
								<li><a href="/hospitalSystem-master/index.php/Home/Hospital/gonggao">最新公告</a></li>
								<li><a href="/hospitalSystem-master/index.php/Home/Hospital/personCenter">个人中心</a></li>
							</ul>
						</div>
					</div>
				</div>

				<div id="login-box" class="login-box">
                    <div class="h-triangle"></div>
					<form method="post" action="/hospitalSystem-master/index.php/Home/User/login">
						<div class="form-group">
							<input type="text" id="userName" name="userName" class="form-control" placeholder="邮箱/身份证号"/>
						</div>
						<div class="form-group">
							<input type="password" id="pwd" name="pwd" class="form-control" placeholder="密码"/>
						</div>
						<div class="checkbox">
							<label>
						        <input type="checkbox">记住密码
						    </label>
						    <span class="forget-pwd">
						    	<a href="/hospitalSystem-master/index.php/Home/Hospital/findPwd">忘记密码</a>
						    </span>
					  	</div>
					  	<input type="submit" class="btn btn-primary pull-right" value="登录">
					</form>
				</div>
			</div>
		</header>
<div class="main-body">
    
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="person-menu">
                    <ul>
                        <li class="bigt">个人资料</li>
                        <li class="smallt active" id="person"><a href="/hospitalSystem-master/index.php/Home/Hospital/personCenter">账户资料</a></li>
                        <li class="smallt" id="pwd-xiugai"><a href="/hospitalSystem-master/index.php/Home/Hospital/changePwd">修改密码</a></li>
                        <li class="bigt">我的预约</li>
                        <li class="smallt" id="n-yuyue"><a href="/hospitalSystem-master/index.php/Home/Hospital/nowOrder">当前预约</a></li>
                        <li class="smallt" id="p-yuyue"><a href="/hospitalSystem-master/index.php/Home/Hospital/prevOrder">历史预约</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <div id="person-body" class="box">
                    <div class="box-header">
                        <ul>
                            <li class="active">账户资料</li>
                        </ul>
                    </div>
                    <div class="box-body">
                        <div class="person-data">
                            <table class="data-table">
                                <tr>
                                    <td>姓名：</td>
                                    <td><?php echo ($user["name"]); ?></td>
                                </tr>
                                <tr>
                                    <td>证件：</td>
                                    <td><?php echo ($user["IDcard"]); ?></td>
                                </tr>
                                <tr>
                                    <td>邮箱：</td>
                                    <td><?php echo ($user["email"]); ?></td>
                                </tr>
                                <tr>
                                    <td>是否认证：</td>
                                    <?php if($user["isRenzheng"] == 0): ?><td>
                                            <a href="/hospitalSystem-master/index.php/Home/Hospital/identifyCenter" id="renzheng">点击进入认证</a>
                                        </td>
                                        <?php elseif($user["isRenzheng"] == 1): ?>
                                        <td>已认证</td>
                                        <?php else: ?>
                                        <td>等待管理员审核</td><?php endif; ?>
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
					<img src="/hospitalSystem-master/Public/images/guahao.png"/>
				</div>
				<div class="col-md-12">
					<ul>
						<li><a href="">关于我们</a></li>
						<li><a href="">联系我们</a></li>
					</ul>
				</div>
			</div>
		</footer>
		<script type="text/javascript" src="/hospitalSystem-master/Public/js/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="/hospitalSystem-master/Public/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/hospitalSystem-master/Public/js/tuteng.js"></script>
        
    <script type="text/javascript" src="/hospitalSystem-master/Public/js/person.js"></script>

	</body>
</html>