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
        <div id="h-s-condition" class="h-panel">
            <div class="condition-item">
                <div class="attribute">
                    <span>医院类型：</span>
                </div>
                <div class="condition">
                    <ul>
                        <li><a href="" class="active">卫生部直属医院</a></li>
                        <li><a href="">北京市卫生局直属医院</a></li>
                        <li><a href="">中国医科院所属医院</a></li>
                        <li><a href="">中国中医科学院</a></li>
                        <li><a href="">北京中医药大学</a></li>
                        <li><a href="">北京大学附属医院</a></li>
                        <li><a href="">驻京部队医院</a></li>
                        <li><a href="">驻京武警医院</a></li>
                        <li><a href="">部属厂矿高校医院</a></li>
                        <li><a href="">北京区县属医院</a></li>
                        <li><a href="">其它</a></li>
                    </ul>
                </div>
            </div>
            <div class="condition-item">
                <div class="attribute">
                    <span>医院等级：</span>
                </div>
                <div class="condition">
                    <ul>
                        <li><a href="" class="active">不限</a></li>
                        <li><a href="">三级医院</a></li>
                        <li><a href="">二级医院</a></li>
                        <li><a href="">一级医院</a></li>
                    </ul>
                </div>
            </div>
            <div class="condition-item">
                <div class="attribute">
                    <span>所属区县：</span>
                </div>
                <div class="condition">
                    <ul>
                        <li><a href="" class="active">不限</a></li>
                        <li><a href="">海淀区</a></li>
                        <li><a href="">朝阳区</a></li>
                        <li><a href="">西城区</a></li>
                        <li><a href="">东城区</a></li>
                        <li><a href="">丰台区</a></li>
                        <li><a href="">石景山区</a></li>
                        <li><a href="">通州区</a></li>
                        <li><a href="">顺义区</a></li>
                        <li><a href="">房山区</a></li>
                        <li><a href="">大兴区</a></li>
                        <li><a href="">昌平区</a></li>
                        <li><a href="">怀柔区</a></li>
                        <li><a href="">平谷区</a></li>
                        <li><a href="">门头沟区</a></li>
                        <li><a href="">密云县</a></li>
                        <li><a href="">延庆县</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="h-content" class="h-panel">
            <div class="hospital-item">
                <img src="/hospitalSystem/trunk/Public/images/slider1.jpg"/>
                <p>
                    <strong><a href="">北京协和医院</a></strong><br>
                    电话：<abbr>东院咨询台:010-69155564;西院咨询台:010-69158010</abbr><br>
                    地址：<abbr>[东院]北京市东城区帅府园一号 [西院]北京市西城区大木仓胡同41号 </abbr><br>
                    所属地区：<abbr>东城区</abbr><br>
                </p>
                <button class="btn btn-warning">进入医院</button>
            </div>
            <div class="hospital-item">
                <img src="/hospitalSystem/trunk/Public/images/slider1.jpg"/>
                <p>
                    <strong><a href="">北京协和医院</a></strong><br>
                    电话：<abbr>东院咨询台:010-69155564;西院咨询台:010-69158010</abbr><br>
                    地址：<abbr>[东院]北京市东城区帅府园一号 [西院]北京市西城区大木仓胡同41号 </abbr><br>
                    所属地区：<abbr>东城区</abbr><br>
                </p>
                <button class="btn btn-warning">进入医院</button>
            </div>
            <div class="hospital-item">
                <img src="/hospitalSystem/trunk/Public/images/slider1.jpg"/>
                <p>
                    <strong><a href="">北京协和医院</a></strong><br>
                    电话：<abbr>东院咨询台:010-69155564;西院咨询台:010-69158010</abbr><br>
                    地址：<abbr>[东院]北京市东城区帅府园一号 [西院]北京市西城区大木仓胡同41号 </abbr><br>
                    所属地区：<abbr>东城区</abbr><br>
                </p>
                <button class="btn btn-warning">进入医院</button>
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