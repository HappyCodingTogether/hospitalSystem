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
        <div class="box">
            <div class="box-header">
                <ul>
                    <li class="active">最新公告</li>
                </ul>
            </div>
            <div class="box-body">
                <div class="gonggao">
                    <?php if(is_array($gonggao)): $i = 0; $__LIST__ = $gonggao;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($i % 2 );++$i;?><dl>
                            <dt><a href="/hospitalSystem/trunk/index.php/Home/Hospital/gonggaoc?gonggaoid=<?php echo ($arr["id"]); ?>"><?php echo ($arr["title"]); ?></a></dt>
                            <dd><?php echo ($arr["dateTimes"]); ?></dd>
                        </dl><?php endforeach; endif; else: echo "" ;endif; ?>
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