<?php if (!defined('THINK_PATH')) exit();?><html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>图腾医院统一挂号平台</title>
		<link rel="stylesheet" type="text/css" href="/hospital/Public/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="/hospital/Public/css/tuteng.css" />
	</head>
	<body>
		<header>
			<div id="header">
				<div id="header_main">
					<div class="header_main">
						<div class="col-md-6">
							<div class="logo">
								<img src="/hospital/Public/images/logo.png">
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
						<div id="r_l">
							<div class="r_l-box">
								<ul>
									<li><a href="javascript:void(0)" id="login_a">登录</a></li>
									<li><a href="#">注册</a></li>
								</ul>	
							</div>
						</div>
					</div>
				</div>
				<div id="header_menu">
					<div class="menu-list">
						<div class="col-md-offset-1">
							<ul>
                                <li><a href="/hospital/index.php/Home/Hospital/index">首页</a></li>
                                <li><a href="/hospital/index.php/Home/Hospital/hospitals">按医院预约</a></li>
								<li><a href="/hospital/index.php/Home/Hospital/keshi">按科室预约</a></li>
								<li><a href="/hospital/index.php/Home/Hospital/gonggao">最新公告</a></li>
								<li><a href="/hospital/index.php/Home/Hospital/personCenter">个人中心</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div id="login-box" class="login-box">
					<form>
						<div class="form-group">
							<input type="text" id="userName" class="form-control" placeholder="用户名"/> 
						</div>
						<div class="form-group">
							<input type="password" id="pwd" class="form-control" placeholder="密码"/> 
						</div>
						<div class="checkbox">
							<label>
						        <input type="checkbox">记住密码
						    </label>
						    <span class="forget-pwd">
						    	<a href="">忘记密码</a>
						    </span>
					  	</div>
					  	<a href="" class="btn btn-primary pull-right">登录</a>
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
                    <dl>
                        <dt><a href="/hospital/index.php/Home/Hospital/gonggaoc">北京丰台医院新增专家号源</a></dt>
                        <dd>2014年12月12日</dd>
                    </dl>
                    <dl>
                        <dt><a href="">北京丰台医院新增专家号源</a></dt>
                        <dd>2014年12月12日</dd>
                    </dl>
                    <dl>
                        <dt><a href="">北京丰台医院新增专家号源</a></dt>
                        <dd>2014年12月12日</dd>
                    </dl>
                    <dl>
                        <dt><a href="">北京丰台医院新增专家号源</a></dt>
                        <dd>2014年12月12日</dd>
                    </dl>
                    <dl>
                        <dt><a href="">北京丰台医院新增专家号源</a></dt>
                        <dd>2014年12月12日</dd>
                    </dl>
                    <dl>
                        <dt><a href="">北京丰台医院新增专家号源</a></dt>
                        <dd>2014年12月12日</dd>
                    </dl>
                    <dl>
                        <dt><a href="">北京丰台医院新增专家号源</a></dt>
                        <dd>2014年12月12日</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>

</div>
<footer>
			<div id="footer" class="footer">
				<div class="col-md-offset-5 col-md-2">
					<img src="/hospital/Public/images/guahao.png"/>
				</div>
				<div class="col-md-12">
					<ul>
						<li><a href="">关于我们</a></li>
						<li><a href="">联系我们</a></li>
					</ul>
				</div>
			</div>
		</footer>
		<script type="text/javascript" src="/hospital/Public/js/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="/hospital/Public/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/hospital/Public/js/tuteng.js"></script>
	</body>
</html>