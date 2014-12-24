<?php if (!defined('THINK_PATH')) exit();?><html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>图腾医院统一挂号平台</title>
		<link rel="stylesheet" type="text/css" href="/hospitalsystem-master/Public/css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="/hospitalsystem-master/Public/css/bootstrap-theme.css" />
		<link rel="stylesheet" type="text/css" href="/hospitalsystem-master/Public/css/tuteng.css" />
        <script type="text/javascript">
            var PUBLIC= "/hospitalsystem-master/Public";
            var APP = "/hospitalsystem-master/index.php";
            var ROOT = "/hospitalsystem-master";
        </script>
	</head>
	<body>
		<header>
			<div id="header">
				<div id="header_main">
					<div class="header_main">
						<div class="col-md-6">
							<div class="logo">
								<img src="/hospitalsystem-master/Public/images/logo.png">
							</div>
						</div>
						<div class="col-md-6">
							<div class="search-box">
								<div class="input-group">
									<div class="input-group-btn dropdown">
								        <button type="button" class="btn btn-default dropdown-toggle btn-type" data-toggle="dropdown">
								        	<span id="search-type">医院</span>
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
									<li><a href="/hospitalsystem-master/index.php/Home/Hospital/register">注册</a></li>
								</ul>	
							</div>
						</div>
                        <?php
 } else{ ?>
                            <div id="r_l2">
                                <div class="r_l-box">
                                <ul>
                                    <li><label ><?php echo $_SESSION['userName']?></label></li>
                                    <li><a href="/hospitalsystem-master/index.php/Home/User/logout">注销</a></li>
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
                                <li><a href="/hospitalsystem-master/index.php/Home/Hospital">首页</a></li>
                                <li><a href="/hospitalsystem-master/index.php/Home/Hospital/hospitals">按医院预约</a></li>
								<li><a href="/hospitalsystem-master/index.php/Home/Hospital/keshi">按科室预约</a></li>
								<li><a href="/hospitalsystem-master/index.php/Home/Hospital/gonggao">最新公告</a></li>
								<li><a href="/hospitalsystem-master/index.php/Home/Hospital/personCenter">个人中心</a></li>
							</ul>
						</div>
					</div>
				</div>

				<div id="login-box" class="login-box">
                    <div class="h-triangle"></div>
					<form method="post" action="/hospitalsystem-master/index.php/Home/User/login">
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
						    	<a href="/hospitalsystem-master/index.php/Home/Hospital/findPwd">忘记密码</a>
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
                        <span><a href="/hospitalsystem-master/index.php/Home/Hospital/hospitals">&gt;&gt;进入查看所有医院</a></span>
                    </ul>
                </div>
                <div class="box-body">
                    <img src="/hospitalsystem-master/Public/images/slider1.gif" height="290px"/>
                    <div class="quick-yuyue row">
                        <div class="col-md-6">
                            <div class="total-message" name="websiteinfo">
                                <ul>
                                    <li>可预约的三级医院：共 <strong><?php echo ($websiteinfo["count3"]); ?></strong> 家</li>
                                    <li>可预约的二级医院：共 <strong><?php echo ($websiteinfo["count2"]); ?></strong> 家</li>
                                    <li>可预约总量：共 <strong><?php echo ($websiteinfo["yuyuecount"]); ?></strong> 多</li>
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
                                            <span class="hide">0</span>
                                            <span class="caret"></span>
                                        </div>
                                        <ul class="hide">
                                            <li>不限</li>
                                            <li>卫生部直属医院</li>
                                            <li>北京市卫生局直属医院</li>
                                            <li>中国医科院所属医院</li>
                                            <li>中国中医科学院</li>
                                            <li>北京中医药大学</li>
                                            <li>北京大学附属医院</li>
                                            <li>驻京部队医院</li>
                                            <li>驻京武警医院</li>
                                            <li>部属厂矿高校医院</li>
                                            <li>北京区县属医院</li>
                                            <li>其它</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="select-item">
                                    <label>按医院所属等级</label>
                                    <div class="select-box">
                                        <div class="select-header">
                                            <span>请选择</span>
                                            <span class="hide">0</span>
                                            <span class="caret"></span>
                                        </div>
                                        <ul class="hide">
                                            <li>不限</li>
                                            <li>三级医院</li>
                                            <li>二级医院</li>
                                            <li>一级医院</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="select-item">
                                    <label>按医院所属地区</label>
                                    <div class="select-box">
                                        <div class="select-header">
                                            <span>请选择</span>
                                            <span class="hide">0</span>
                                            <span class="caret"></span>
                                        </div>
                                        <ul class="hide">
                                            <li>不限</li>
                                            <li>海淀区</li>
                                            <li>朝阳区</li>
                                            <li>西城区</li>
                                            <li>东城区</li>
                                            <li>丰台区</li>
                                            <li>石景山区</li>
                                            <li>通州区</li>
                                            <li>顺义区</li>
                                            <li>房山区</li>
                                            <li>大兴区</li>
                                            <li>昌平区</li>
                                            <li>怀柔区</li>
                                            <li>平谷区</li>
                                            <li>门头沟区</li>
                                            <li>密云县</li>
                                            <li>延庆县</li>
                                        </ul>
                                    </div>
                                </div>
                                <button id="to-hospital" class="btn btn-primary">进入预约</button>
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
                                <img src="/hospitalsystem-master/Public/images/slider1.jpg"/>
                                <div class="carousel-caption">
                                    <h4>北京同仁医院</h4>
                                </div>
                            </div>
                            <div class="item">
                                <img src="/hospitalsystem-master/Public/images/slider2.jpg"/>
                                <div class="carousel-caption">
                                    <h4>北京大学医院</h4>
                                </div>
                            </div>
                            <div class="item">
                                <img src="/hospitalsystem-master/Public/images/slider2.jpg"/>
                                <div class="carousel-caption">
                                    <h4>北京人民医院</h4>
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
                        <span><a href="/hospitalsystem-master/index.php/Home/Hospital/gonggao">&gt;&gt;更多</a></span>
                    </ul>
                </div>
                <div class="box-body">
                    <div class="gonggao-items" style="height:258px">
                        <ul>
                            <?php if(is_array($gonggao)): $i = 0; $__LIST__ = $gonggao;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($i % 2 );++$i;?><li><a href="/hospitalsystem-master/index.php/Home/Hospital/gonggaoc?gonggaoid=<?php echo ($arr["id"]); ?>"><?php echo ($arr["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
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
                    <div class="hot-body">
                        <div id="hot-hospital-body">
                            <?php if(is_array($rehospital)): $i = 0; $__LIST__ = $rehospital;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($i % 2 );++$i;?><div class="hot-item">
                                    <img src="/hospitalsystem-master/Public/images/<?php echo ($arr["imgURL"]); ?>"/>
                                    <p>
                                        <strong><a href="/hospitalsystem-master/index.php/Home/Hospital/hospitalm?hospitalID=<?php echo ($arr["id"]); ?>"><?php echo ($arr["name"]); ?></a></strong><br>
                                        电话：<abbr><?php echo ($arr["phone"]); ?></abbr><br>
                                        地址：<abbr><?php echo ($arr["xiangxiAddress"]); ?></abbr><br>
                                        周预约量：<abbr><?php echo ($arr["yuyueCount"]); ?></abbr><br>
                                    </p>
                                </div><?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                        <div id="hot-keshi-body" class="hide">
                            <?php if(is_array($rekeshi)): $i = 0; $__LIST__ = $rekeshi;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($i % 2 );++$i;?><div class="hot-item">
                                    <img src="/hospitalsystem-master/Public/images/<?php echo ($arr["imgURL"]); ?>"/>
                                    <p>
                                        <strong><a href="/hospitalsystem-master/index.php/Home/Hospital/keshim?keshiID=<?php echo ($arr["id"]); ?>"><?php echo ($arr["hospitalname"]); echo ($arr["name"]); ?></a></strong><br>
                                        电话：<abbr><?php echo ($arr["phone"]); ?></abbr><br>
                                        地址：<abbr><?php echo ($arr["xiangxiAddress"]); ?></abbr><br>
                                        周预约量：<abbr><?php echo ($arr["yuyueCount"]); ?></abbr><br>
                                    </p>
                                </div><?php endforeach; endif; else: echo "" ;endif; ?>
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
					<img src="/hospitalsystem-master/Public/images/guahao.png"/>
				</div>
				<div class="col-md-12">
					<ul>
						<li><a href="">关于我们</a></li>
						<li><a href="">联系我们</a></li>
					</ul>
				</div>
			</div>
		</footer>
		<script type="text/javascript" src="/hospitalsystem-master/Public/js/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="/hospitalsystem-master/Public/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/hospitalsystem-master/Public/js/tuteng.js"></script>
        
    <script type="text/javascript">
        $("#header_menu li").eq(0).addClass("active");
        $("#to-hospital").click(function() {
            var t1 = $(".select-header").eq(0).children("span").eq(1).text();
            var t2 = $(".select-header").eq(1).children("span").eq(1).text();
            var t3 = $(".select-header").eq(2).children("span").eq(1).text();
            location.href = "/hospitalsystem-master/index.php/Home/Hospital/hospitals"+"?t="+t1+"-"+t2+"-"+t3;
        });
    </script>

	</body>
</html>