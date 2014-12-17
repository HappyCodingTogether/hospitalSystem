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
                        <?php
 if(!isset($_SESSION['userName'])){ ?>
						<div id="r_l">
							<div class="r_l-box">
								<ul>
									<li><a href="javascript:void(0)" id="login_a">登录</a></li>
									<li><a href="/hospital/index.php/Home/Hospital/register">注册</a></li>
								</ul>	
							</div>
						</div>
                        <?php
 } else{ ?>
                            <div id="r_l2">
                                <div class="r_l-box">
                                <ul>
                                    <li><label ><?php echo $_SESSION['userName']?></label></li>
                                    <li><a href="/hospital/index.php/Home/User/logout">注销</a></li>
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
                                <li><a href="/hospital/index.php/Home/Hospital">首页</a></li>
                                <li><a href="/hospital/index.php/Home/Hospital/hospitals">按医院预约</a></li>
								<li><a href="/hospital/index.php/Home/Hospital/keshi">按科室预约</a></li>
								<li><a href="/hospital/index.php/Home/Hospital/gonggao">最新公告</a></li>
								<li><a href="/hospital/index.php/Home/Hospital/personCenter">个人中心</a></li>
							</ul>
						</div>
					</div>
				</div>

				<div id="login-box" class="login-box">
					<form method="post" action="/hospital/index.php/Home/User/login">
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
        <div class="col-md-8">
            <div id="quick" class="box">
                <div class="box-header">
                    <ul>
                        <li class="active">快速预约</li>
                        <span><a href="">&gt;&gt;进入查看所有医院</a></span>
                    </ul>
                </div>
                <div class="box-body">
                    <img src="/hospital/Public/images/slider1.gif" height="320px"/>
                    <div class="quick-yuyue row">
                        <div class="col-md-6">
                            <div class="total-message">
                                <ul>
                                    <li>可预约的三级医院：共 <strong>72</strong> 家</li>
                                    <li>可预约的二级医院：共 <strong>69</strong> 家</li>
                                    <li>平均每天放号总量：共 <strong>10万</strong> 多</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="quick-content">
                                <div class="select-item">
                                    <label>按医院所属类型</label>
                                    <div class="select-box">
                                        <div class="select-header">
                                            <span>请选择</span>
                                            <span class="caret"></span>
                                        </div>
                                        <ul class="hide">
                                            <li>卫生部直属医院</li>
                                            <li>劳动部直属医院</li>
                                            <li>很部直属医院</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="select-item">
                                    <label>按医院所属类型</label>
                                    <div class="select-box">
                                        <div class="select-header">
                                            <span>请选择</span>
                                            <span class="caret"></span>
                                        </div>
                                        <ul class="hide">
                                            <li>卫生部直属医院</li>
                                            <li>卫生部直属医院</li>
                                            <li>卫生部直属医院</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="select-item">
                                    <label>按医院所属类型</label>
                                    <div class="select-box">
                                        <div class="select-header">
                                            <span>请选择</span>
                                            <span class="caret"></span>
                                        </div>
                                        <ul class="hide">
                                            <li>卫生部直属医院</li>
                                            <li>卫生部直属医院</li>
                                            <li>卫生部直属医院</li>
                                        </ul>
                                    </div>
                                </div>
                                <button class="btn btn-primary">进入预约</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div id="ad" class="box">
                <div class="box-header">
                    <ul>
                        <li class="active">资讯</li>
                    </ul>
                </div>
                <div class="box-body">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <img src="/hospital/Public/images/slider1.jpg"/>
                                <div class="carousel-caption">
                                    <h1>中国海监船</h1>
                                </div>
                            </div>
                            <div class="item">
                                <img src="/hospital/Public/images/slider2.jpg"/>
                                <div class="carousel-caption">
                                    fff
                                </div>
                            </div>
                            <div class="item">
                                <img src="/hospital/Public/images/slider2.jpg"/>
                                <div class="carousel-caption">
                                    fff
                                </div>
                            </div>
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
            <div id="gonggao" class="box">
                <div class="box-header">
                    <ul>
                        <li class="active">最新公告</li>
                        <span><a href="">&gt;&gt;更多</a></span>
                    </ul>
                </div>
                <div class="box-body">
                    <div class="gonggao-items">
                        <ul>
                            <li><a href="">北京市垂杨柳医院暂停预约通知</a></li>
                            <li><a href="">航天中心医院(原721医院)暂停预约通知</a></li>
                            <li><a href="">北京康复医院(北京工人疗养院)暂停预约通知</a></li>
                            <li><a href="">中国中医科学院广安门医院科室调整通知</a></li>
                            <li><a href="">北京肿瘤医院部分科室医生门诊挂号费调整通知</a></li>
                            <li><a href="">清华大学医院暂停预约挂号通知</a></li>
                            <li><a href="">部分医院停止预约11月13日号源的通知</a></li>
                            <li><a href="">北京燕化医院暂停预约通知</a></li>
                            <li><a href="">北京复兴医院暂停预约通知</a></li>
                            <li><a href="">北京安定医院暂停预约通知</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div id="hot" class="box">
                <div class="box-header">
                    <ul>
                        <li id="hot-hospital" class="active">热门医院</li>
                        <li id="hot-keshi">热门科室</li>
                    </ul>
                </div>
                <div class="box-body">
                    <div id="hot-hospital-body">
                        <div class="hot-item">
                            <img src="/hospital/Public/images/slider1.jpg"/>
                            <p>
                                <strong><a href="">首都医科大学宣武医院 [三级甲等]</a></strong><br>
                                电话：<abbr>010-83198370</abbr><br>
                                地址：<abbr>北京市西城区长椿街45号</abbr><br>
                                所属地区：<abbr>西城区</abbr><br>
                            </p>
                        </div>
                        <div class="hot-item">
                            <img src="/hospital/Public/images/slider1.jpg"/>
                            <p>
                                <strong><a href="">首都医科大学宣武医院 [三级甲等]</a></strong><br>
                                电话：<abbr>010-83198370</abbr><br>
                                地址：<abbr>北京市西城区长椿街45号</abbr><br>
                                所属地区：<abbr>西城区</abbr><br>
                            </p>
                        </div>
                        <div class="hot-item">
                            <img src="/hospital/Public/images/slider1.jpg"/>
                            <p>
                                <strong><a href="">首都医科大学宣武医院 [三级甲等]</a></strong><br>
                                电话：<abbr>010-83198370</abbr><br>
                                地址：<abbr>北京市西城区长椿街45号</abbr><br>
                                所属地区：<abbr>西城区</abbr><br>
                            </p>
                        </div>
                        <div class="hot-item">
                            <img src="/hospital/Public/images/slider1.jpg"/>
                            <p>
                                <strong><a href="">首都医科大学宣武医院 [三级甲等]</a></strong><br>
                                电话：<abbr>010-83198370</abbr><br>
                                地址：<abbr>北京市西城区长椿街45号</abbr><br>
                                所属地区：<abbr>西城区</abbr><br>
                            </p>
                        </div>
                        <div class="hot-item">
                            <img src="/hospital/Public/images/slider1.jpg"/>
                            <p>
                                <strong><a href="">首都医科大学宣武医院 [三级甲等]</a></strong><br>
                                电话：<abbr>010-83198370</abbr><br>
                                地址：<abbr>北京市西城区长椿街45号</abbr><br>
                                所属地区：<abbr>西城区</abbr><br>
                            </p>
                        </div>
                        <div class="hot-item">
                            <img src="/hospital/Public/images/slider1.jpg"/>
                            <p>
                                <strong><a href="">首都医科大学宣武医院 [三级甲等]</a></strong><br>
                                电话：<abbr>010-83198370</abbr><br>
                                地址：<abbr>北京市西城区长椿街45号</abbr><br>
                                所属地区：<abbr>西城区</abbr><br>
                            </p>
                        </div>
                    </div>
                    <div id="hot-keshi-body" class="hide">
                        <div class="hot-item">
                            <img src="/hospital/Public/images/slider2.jpg"/>
                            <p>
                                <strong><a href="">北京大学第三医院皮肤科门诊</a></strong><br>
                                电话：<abbr>010-82266699</abbr><br>
                                地址：<abbr>北京市海淀区长椿街45号</abbr><br>
                                所属地区：<abbr>海淀区</abbr><br>
                            </p>
                        </div>
                        <div class="hot-item">
                            <img src="/hospital/Public/images/slider2.jpg"/>
                            <p>
                                <strong><a href="">北京大学第三医院皮肤科门诊</a></strong><br>
                                电话：<abbr>010-82266699</abbr><br>
                                地址：<abbr>北京市海淀区长椿街45号</abbr><br>
                                所属地区：<abbr>海淀区</abbr><br>
                            </p>
                        </div>
                        <div class="hot-item">
                            <img src="/hospital/Public/images/slider2.jpg"/>
                            <p>
                                <strong><a href="">北京大学第三医院皮肤科门诊</a></strong><br>
                                电话：<abbr>010-82266699</abbr><br>
                                地址：<abbr>北京市海淀区长椿街45号</abbr><br>
                                所属地区：<abbr>海淀区</abbr><br>
                            </p>
                        </div>
                        <div class="hot-item">
                            <img src="/hospital/Public/images/slider2.jpg"/>
                            <p>
                                <strong><a href="">北京大学第三医院皮肤科门诊</a></strong><br>
                                电话：<abbr>010-82266699</abbr><br>
                                地址：<abbr>北京市海淀区长椿街45号</abbr><br>
                                所属地区：<abbr>海淀区</abbr><br>
                            </p>
                        </div>
                        <div class="hot-item">
                            <img src="/hospital/Public/images/slider2.jpg"/>
                            <p>
                                <strong><a href="">北京大学第三医院皮肤科门诊</a></strong><br>
                                电话：<abbr>010-82266699</abbr><br>
                                地址：<abbr>北京市海淀区长椿街45号</abbr><br>
                                所属地区：<abbr>海淀区</abbr><br>
                            </p>
                        </div>
                        <div class="hot-item">
                            <img src="/hospital/Public/images/slider2.jpg"/>
                            <p>
                                <strong><a href="">北京大学第三医院皮肤科门诊</a></strong><br>
                                电话：<abbr>010-82266699</abbr><br>
                                地址：<abbr>北京市海淀区长椿街45号</abbr><br>
                                所属地区：<abbr>海淀区</abbr><br>
                            </p>
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