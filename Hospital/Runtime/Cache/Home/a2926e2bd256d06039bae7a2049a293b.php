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
        <div class="col-md-3">
            <div class="box">
                <div class="box-header">
                    <ul><li class="active">所有科室</li></ul>
                </div>
                <div class="box-body">
                    <div class="keshi">
                        <ul>
                            <li class="type">内 科</li>
                            <li class="items">
                                <ul>
                                    <li>心血管内科</li>
                                    <li>神经内科</li>
                                    <li>消化内科</li>
                                    <li>内分泌科</li>
                                    <li>免疫科</li>
                                    <li>呼吸科</li>
                                    <li>肾病内科</li>
                                    <li>血液科</li>
                                    <li>感染内科</li>
                                    <li>过敏反应科</li>
                                    <li>老年病科</li>
                                    <li>普通内科</li>
                                    <li>高压氧科</li>
                                </ul>
                            </li>
                            <li class="type">外 科</li>
                            <li class="items">
                                <ul>
                                    <li>神经外科</li>
                                    <li>功能神经外科</li>
                                    <li>心血管外科</li>
                                    <li>胸外科</li>
                                    <li>整形科</li>
                                    <li>乳腺外科</li>
                                    <li>泌尿外科</li>
                                    <li>肝胆外科</li>
                                    <li>肛肠科</li>
                                    <li>血管外科</li>
                                    <li>器官移植</li>
                                    <li>微创外科</li>
                                    <li>普外科</li>
                                    <li>脑外科</li>
                                    <li>烧伤科</li>
                                </ul>
                            </li>
                            <li class="type">妇产科</li>
                            <li class="items">
                                <ul>
                                    <li>妇科</li>
                                    <li>产科</li>
                                    <li>妇科内分泌</li>
                                    <li>妇泌尿科</li>
                                    <li>产前监察科</li>
                                    <li>遗传咨询科</li>
                                    <li>计划生育科</li>
                                    <li>妇产科</li>
                                </ul>
                            </li>
                            <li class="type">生殖中心</li>
                            <li class="items">
                                <ul>
                                    <li>生殖中心</li>
                                </ul>
                            </li>
                            <li class="type">儿 科</li>
                            <li class="items">
                                <ul>
                                    <li>儿科</li>
                                    <li>新生儿科</li>
                                    <li>小儿呼吸科</li>
                                    <li>小儿消化科</li>
                                    <li>小儿营养保健科</li>
                                    <li>遗传咨询科</li>
                                    <li>计划生育科</li>
                                    <li>妇产科</li>
                                </ul>
                            </li>
                            <li class="type">骨外科</li>
                            <li class="type">眼 科</li>
                            <li class="type">口腔科</li>
                            <li class="type">耳鼻咽喉头颈科</li>
                            <li class="type">肿瘤科</li>
                            <li class="type">皮肤性病科</li>
                            <li class="type">男性学科</li>
                            <li class="type">医疗美容科</li>
                            <li class="type">烧伤科</li>
                            <li class="type">精神心理科</li>
                            <li class="type">中医科</li>
                            <li class="type">中西医结合科</li>
                            <li class="type">感染性疾病科</li>
                            <li class="type">结核病科</li>
                            <li class="type">介入医学科</li>
                            <li class="type">康复医学科</li>
                            <li class="type">运动医学科</li>
                            <li class="type">麻醉医学科</li>
                            <li class="type">职业病科</li>
                            <li class="type">地方病科</li>
                            <li class="type">营养科</li>
                            <li class="type">医学影像学</li>
                            <li class="type">病理科</li>
                            <li class="type">其他科室</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="h-panel">
                <div class="hospital-item">
                    <img src="/hospital/Public/images/slider1.jpg"/>
                    <p>
                        <strong><a href="">北京协和医院</a></strong><br>
                        电话：<abbr>东院咨询台:010-69155564;西院咨询台:010-69158010</abbr><br>
                        地址：<abbr>[东院]北京市东城区帅府园一号 [西院]北京市西城区大木仓胡同41号 </abbr><br>
                        所属地区：<abbr>东城区</abbr><br>
                    </p>
                    <button class="btn btn-warning">进入医院</button>
                </div>
                <div class="hospital-item">
                    <img src="/hospital/Public/images/slider1.jpg"/>
                    <p>
                        <strong><a href="">北京协和医院</a></strong><br>
                        电话：<abbr>东院咨询台:010-69155564;西院咨询台:010-69158010</abbr><br>
                        地址：<abbr>[东院]北京市东城区帅府园一号 [西院]北京市西城区大木仓胡同41号 </abbr><br>
                        所属地区：<abbr>东城区</abbr><br>
                    </p>
                    <button class="btn btn-warning">进入医院</button>
                </div>
                <div class="hospital-item">
                    <img src="/hospital/Public/images/slider1.jpg"/>
                    <p>
                        <strong><a href="">北京协和医院</a></strong><br>
                        电话：<abbr>东院咨询台:010-69155564;西院咨询台:010-69158010</abbr><br>
                        地址：<abbr>[东院]北京市东城区帅府园一号 [西院]北京市西城区大木仓胡同41号 </abbr><br>
                        所属地区：<abbr>东城区</abbr><br>
                    </p>
                    <button class="btn btn-warning">进入医院</button>
                </div>
                <div class="hospital-item">
                    <img src="/hospital/Public/images/slider1.jpg"/>
                    <p>
                        <strong><a href="">北京协和医院</a></strong><br>
                        电话：<abbr>东院咨询台:010-69155564;西院咨询台:010-69158010</abbr><br>
                        地址：<abbr>[东院]北京市东城区帅府园一号 [西院]北京市西城区大木仓胡同41号 </abbr><br>
                        所属地区：<abbr>东城区</abbr><br>
                    </p>
                    <button class="btn btn-warning">进入医院</button>
                </div>
                <div class="hospital-item">
                    <img src="/hospital/Public/images/slider1.jpg"/>
                    <p>
                        <strong><a href="">北京协和医院</a></strong><br>
                        电话：<abbr>东院咨询台:010-69155564;西院咨询台:010-69158010</abbr><br>
                        地址：<abbr>[东院]北京市东城区帅府园一号 [西院]北京市西城区大木仓胡同41号 </abbr><br>
                        所属地区：<abbr>东城区</abbr><br>
                    </p>
                    <button class="btn btn-warning">进入医院</button>
                </div>
                <div class="hospital-item">
                    <img src="/hospital/Public/images/slider1.jpg"/>
                    <p>
                        <strong><a href="">北京协和医院</a></strong><br>
                        电话：<abbr>东院咨询台:010-69155564;西院咨询台:010-69158010</abbr><br>
                        地址：<abbr>[东院]北京市东城区帅府园一号 [西院]北京市西城区大木仓胡同41号 </abbr><br>
                        所属地区：<abbr>东城区</abbr><br>
                    </p>
                    <button class="btn btn-warning">进入医院</button>
                </div>
                <div class="hospital-item">
                    <img src="/hospital/Public/images/slider1.jpg"/>
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