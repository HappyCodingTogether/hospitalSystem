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
        <div id="h-s-condition" class="h-panel">
            <span class="hide" id="t-val"><?php echo ($t1); ?>-<?php echo ($t2); ?>-<?php echo ($t3); ?></span>
            <div class="condition-item">
                <div class="attribute">
                    <span>医院类型：</span>
                </div>
                <div class="condition">
                    <ul>
                        <li><a href="?t=0-<?php echo ($t2); ?>-<?php echo ($t3); ?>">不限</a></li>
                        <li><a href="?t=1-<?php echo ($t2); ?>-<?php echo ($t3); ?>">卫生部直属医院</a></li>
                        <li><a href="?t=2-<?php echo ($t2); ?>-<?php echo ($t3); ?>">北京市卫生局直属医院</a></li>
                        <li><a href="?t=3-<?php echo ($t2); ?>-<?php echo ($t3); ?>">中国医科院所属医院</a></li>
                        <li><a href="?t=4-<?php echo ($t2); ?>-<?php echo ($t3); ?>">中国中医科学院</a></li>
                        <li><a href="?t=5-<?php echo ($t2); ?>-<?php echo ($t3); ?>">北京中医药大学</a></li>
                        <li><a href="?t=6-<?php echo ($t2); ?>-<?php echo ($t3); ?>">北京大学附属医院</a></li>
                        <li><a href="?t=7-<?php echo ($t2); ?>-<?php echo ($t3); ?>">驻京部队医院</a></li>
                        <li><a href="?t=8-<?php echo ($t2); ?>-<?php echo ($t3); ?>">驻京武警医院</a></li>
                        <li><a href="?t=9-<?php echo ($t2); ?>-<?php echo ($t3); ?>">部属厂矿高校医院</a></li>
                        <li><a href="?t=10-<?php echo ($t2); ?>-<?php echo ($t3); ?>">北京区县属医院</a></li>
                        <li><a href="?t=11-<?php echo ($t2); ?>-<?php echo ($t3); ?>">其它</a></li>
                    </ul>
                </div>
            </div>
            <div class="condition-item">
                <div class="attribute">
                    <span>医院等级：</span>
                </div>
                <div class="condition">
                    <ul>
                        <li><a href="?t=<?php echo ($t1); ?>-0-<?php echo ($t3); ?>">不限</a></li>
                        <li><a href="?t=<?php echo ($t1); ?>-1-<?php echo ($t3); ?>">三级医院</a></li>
                        <li><a href="?t=<?php echo ($t1); ?>-2-<?php echo ($t3); ?>">二级医院</a></li>
                        <li><a href="?t=<?php echo ($t1); ?>-3-<?php echo ($t3); ?>">一级医院</a></li>
                    </ul>
                </div>
            </div>
            <div class="condition-item">
                <div class="attribute">
                    <span>所属区县：</span>
                </div>
                <div class="condition">
                    <ul>
                        <li><a href="?t=<?php echo ($t1); ?>-<?php echo ($t2); ?>-0">不限</a></li>
                        <li><a href="?t=<?php echo ($t1); ?>-<?php echo ($t2); ?>-1">海淀区</a></li>
                        <li><a href="?t=<?php echo ($t1); ?>-<?php echo ($t2); ?>-2">朝阳区</a></li>
                        <li><a href="?t=<?php echo ($t1); ?>-<?php echo ($t2); ?>-3">西城区</a></li>
                        <li><a href="?t=<?php echo ($t1); ?>-<?php echo ($t2); ?>-4">东城区</a></li>
                        <li><a href="?t=<?php echo ($t1); ?>-<?php echo ($t2); ?>-5">丰台区</a></li>
                        <li><a href="?t=<?php echo ($t1); ?>-<?php echo ($t2); ?>-6">石景山区</a></li>
                        <li><a href="?t=<?php echo ($t1); ?>-<?php echo ($t2); ?>-7">通州区</a></li>
                        <li><a href="?t=<?php echo ($t1); ?>-<?php echo ($t2); ?>-8">顺义区</a></li>
                        <li><a href="?t=<?php echo ($t1); ?>-<?php echo ($t2); ?>-9">房山区</a></li>
                        <li><a href="?t=<?php echo ($t1); ?>-<?php echo ($t2); ?>-10">大兴区</a></li>
                        <li><a href="?t=<?php echo ($t1); ?>-<?php echo ($t2); ?>-11">昌平区</a></li>
                        <li><a href="?t=<?php echo ($t1); ?>-<?php echo ($t2); ?>-12">怀柔区</a></li>
                        <li><a href="?t=<?php echo ($t1); ?>-<?php echo ($t2); ?>-13">平谷区</a></li>
                        <li><a href="?t=<?php echo ($t1); ?>-<?php echo ($t2); ?>-14">门头沟区</a></li>
                        <li><a href="?t=<?php echo ($t1); ?>-<?php echo ($t2); ?>-15">密云县</a></li>
                        <li><a href="?t=<?php echo ($t1); ?>-<?php echo ($t2); ?>-16">延庆县</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="h-content" class="h-panel">
            <?php if(is_array($list)): foreach($list as $key=>$obj): ?><div class="hospital-item">
                    <img src="/hospitalsystem-master/Public/images/<?php echo ($obj["imgURL"]); ?>"/>
                    <p>
                        <strong><a href="/hospitalsystem-master/index.php/Home/Hospital/hospitalm?hospitalID=<?php echo ($obj["id"]); ?>"><?php echo ($obj["name"]); ?></a></strong><br>
                        电话：<abbr><?php echo ($obj["phone"]); ?></abbr><br>
                        地址：<abbr><?php echo ($obj["xiangxiAddress"]); ?></abbr><br>
                        所属地区：<abbr><?php echo ($obj["quName"]); ?></abbr>
                    </p>
                    <button class="btn btn-warning"><a href="/hospitalsystem-master/index.php/Home/Hospital/hospitalm?hospitalID=<?php echo ($obj["id"]); ?>">进入医院</a></button>
                </div><?php endforeach; endif; ?>
            <p><?php echo ($page); ?></p>
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
        $(document).ready(function() {
            $("#header_menu li").eq(1).addClass("active");
            var t = $("#t-val").text().split("-");
            $(".condition-item").eq(0).find("a").eq(t[0]).addClass("active");
            $(".condition-item").eq(1).find("a").eq(t[1]).addClass("active");
            $(".condition-item").eq(2).find("a").eq(t[2]).addClass("active");
        });
    </script>

	</body>
</html>