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
        <div class="col-md-3">
            <div class="box">
                <div class="box-header">
                    <ul><li class="active" data-i="<?php echo ($i1); ?>-<?php echo ($i2); ?>" id="allKeshi">所有科室</li></ul>
                </div>
                <div class="box-body">
                    <div class="keshi">
                        <ul>
                            <li class="type" id="li0">内 科</li>
                            <li class="items">
                                <ul>
                                    <li>内科</li>
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
                            <li class="type" id="li1">外 科</li>
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
                            <li class="type" id="li2">妇产科</li>
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
                            <li class="type" id="li3">生殖中心</li>
                            <li class="items">
                                <ul>
                                    <li>生殖中心</li>
                                </ul>
                            </li>
                            <li class="type" id="li4">儿 科</li>
                            <li class="items">
                                <ul>
                                    <li>儿科</li>
                                    <li>新生儿科</li>
                                    <li>小儿呼吸科</li>
                                    <li>小儿消化科</li>
                                    <li>小儿营养保健科</li>
                                    <li>小儿皮肤科</li>
                                    <li>小儿心内科</li>
                                    <li>小儿肾内科</li>
                                    <li>小儿内分泌科</li>
                                    <li>小儿免疫科</li>
                                    <li>小儿神经科</li>
                                    <li>小儿耳鼻喉</li>
                                    <li>小儿血液科</li>
                                    <li>小儿感染科</li>
                                    <li>小儿精神科</li>
                                    <li>小儿妇科</li>
                                    <li>小儿外科</li>
                                    <li>小儿心外科</li>
                                    <li>小儿胸外科</li>
                                    <li>小儿骨科</li>
                                    <li>小儿泌尿科</li>
                                    <li>小儿神经外科</li>
                                    <li>小儿整形科</li>
                                    <li>小儿康复科</li>
                                    <li>小儿急诊科</li>
                                    <Li>小儿普外科</Li>
                                    <li>儿童遗传病科</li>
                                    <li>儿童传染病科</li>
                                </ul>
                            </li>
                            <li class="type" id="li5">骨外科</li>
                            <li class="items">
                                <ul>
                                    <li>骨科</li>
                                    <li>脊柱外科</li>
                                    <li>手外科</li>
                                    <li>创伤骨科</li>
                                    <li>骨关节科</li>
                                    <li>矮形骨科</li>
                                    <li>骨质疏松科</li>
                                    <li>骨伤专科</li>
                                </ul>
                            </li>
                            <li class="type" id="li6">眼 科</li>
                            <li class="items">
                                <ul>
                                    <li>眼科</li>
                                    <li>小儿眼科</li>
                                    <li>眼底</li>
                                    <li>角膜科</li>
                                    <li>青光眼</li>
                                    <li>白内障</li>
                                    <li>眼外伤</li>
                                    <li>眼眶及肿瘤</li>
                                    <li>屈光</li>
                                    <li>眼整形</li>
                                    <li>中医眼科</li>
                                    <li>准分子激光科</li>
                                </ul>
                            </li>
                            <li class="type" id="li7">口腔科</li>
                            <li class="items">
                                <ul>
                                    <li>口腔科</li>
                                    <li>颌面外科</li>
                                    <li>正畸科</li>
                                    <li>牙体牙髓科</li>
                                    <li>牙周科</li>
                                    <li>口腔粘膜科</li>
                                    <li>儿童口腔科</li>
                                    <li>口腔修复科</li>
                                    <li>种植科</li>
                                    <li>口腔预防科</li>
                                    <li>口腔特诊科</li>
                                    <li>口腔急诊科</li>
                                </ul>
                            </li>
                            <li class="type" id="li8">耳鼻咽喉头颈科</li>
                            <li class="items">
                                <ul>
                                    <li>耳鼻喉</li>
                                    <li>头颈外科</li>
                                </ul>
                            </li>
                            <li class="type" id="li9">肿瘤科</li>
                            <li class="items">
                                <ul>
                                    <li>肿瘤内科</li>
                                    <li>肿瘤外科</li>
                                    <li>肿瘤妇科</li>
                                    <li>放疗科</li>
                                    <li>骨肿瘤科</li>
                                    <li>肿瘤康复科</li>
                                    <li>肿瘤综合科</li>
                                </ul>
                            </li>
                            <li class="type" id="li10">皮肤性病科</li>
                            <li class="items">
                                <ul>
                                    <li>皮肤科</li>
                                    <li>性病科</li>
                                </ul>
                            </li>
                            <li class="type" id="li11">男性学科</li>
                            <li class="items">
                                <ul>
                                    <li>男性学科</li>
                                </ul>
                            </li>
                            <li class="type" id="li12">皮肤美容</li>
                            <li class="items">
                                <ul>
                                    <li>皮肤美容</li>
                                </ul>
                            </li>
                            <li class="type" id="li13">烧伤科</li>
                            <li class="items">
                                <ul>
                                    <li>烧伤科</li>
                                </ul>
                            </li>
                            <li class="type" id="li14">精神心理科</li>
                            <li class="items">
                                <ul>
                                    <li>精神科</li>
                                    <li>心理咨询科</li>
                                    <li>司法鉴定科</li>
                                    <li>双相障碍科</li>
                                    <li>药物依赖科</li>
                                </ul>
                            </li>
                            <li class="type" id="li15">中医科</li>
                            <li class="items">
                                <ul>
                                    <li>中医科</li>
                                    <li>中医妇产科</li>
                                    <li>中医儿科</li>
                                    <li>中医骨科</li>
                                    <li>中医皮肤科</li>
                                    <li>中医内分泌</li>
                                    <li>中医消化科</li>
                                    <li>中医呼吸科</li>
                                    <li>中医肾病内科</li>
                                    <li>中医免疫科</li>
                                    <li>中医心内科</li>
                                    <li>中医神经内科</li>
                                    <li>中医肿瘤科</li>
                                    <li>中医血液科</li>
                                    <li>中医感染内科</li>
                                    <li>中医肝病科</li>
                                    <li>中医五官科</li>
                                    <li>中医男科</li>
                                    <li>针灸科</li>
                                    <li>中医按摩科</li>
                                    <li>中医外科</li>
                                    <li>中医乳腺外科</li>
                                    <li>中医肛肠科</li>
                                    <li>中医老年病科</li>
                                    <li>中医内科</li>
                                    <li>中医脾胃科</li>
                                    <li>膏方门诊</li>
                                    <li>中医骨伤科</li>
                                </ul>
                            </li>
                            <li class="type" id="li16">中西医结合科</li>
                            <li class="items">
                                <ul>
                                    <li>中西医结合科</li>
                                </ul>
                            </li>
                            <li class="type" id="li17">传染病科</li>
                            <li class="items">
                                <ul>
                                    <li>肝病科</li>
                                    <li>传染科</li>
                                    <li>传染危重病常见疾病</li>
                                </ul>
                            </li>
                            <li class="type" id="li18">结核病科</li>
                            <li class="items">
                                <ul>
                                    <li>结核病科</li>
                                </ul>
                            </li>
                            <li class="type" id="li19">介入医学科</li>
                            <li class="items">
                                <ul>
                                    <li>介入医学科</li>
                                </ul>
                            </li>
                            <li class="type" id="li20">康复医学科</li>
                            <li class="items">
                                <ul>
                                    <li>康复科</li>
                                    <li>理疗科</li>
                                </ul>
                            </li>
                            <li class="type" id="li21">运动医学科</li>
                            <li class="items">
                                <ul>
                                    <li>运动医学科</li>
                                </ul>
                            </li>
                            <li class="type" id="li22">麻醉医学科</li>
                            <li class="items">
                                <ul>
                                    <li>病痛科</li>
                                    <li>麻醉科</li>
                                </ul>
                            </li>
                            <li class="type" id="li23">职业病科</li>
                            <li class="items">
                                <ul>
                                    <li>职业病科</li>
                                </ul>
                            </li>
                            <li class="type" id="li24">地方病科</li>
                            <li class="items">
                                <ul>
                                    <li>地方病科</li>
                                </ul>
                            </li>
                            <li class="type" id="li25">营养科</li>
                            <li class="items">
                                <ul>
                                    <li>营养科</li>
                                </ul>
                            </li>
                            <li class="type" id="li26">医学影像学</li>
                            <li class="items">
                                <ul>
                                    <li>核医学科</li>
                                    <li>放射科</li>
                                    <li>超声科</li>
                                    <li>医学影像科</li>
                                </ul>
                            </li>
                            <li class="type" id="li27">病理科</li>
                            <li class="items">
                                <ul>
                                    <li>病理科</li>
                                </ul>
                            </li>
                            <li class="type" id="li28">其他科室</li>
                            <li class="items">
                                <ul>
                                    <li>急诊科</li>
                                    <li>特色医疗科</li>
                                    <li>干部诊疗科</li>
                                    <li>重症监护室</li>
                                    <li>特诊科</li>
                                    <li>检验科</li>
                                    <li>预防保健科</li>
                                    <li>功能检查科</li>
                                    <li>全科</li>
                                    <li>药剂科</li>
                                    <li>体检科</li>
                                    <li>血透中心</li>
                                    <li>实验中心</li>
                                    <li>碎石中心</li>
                                    <li>IMCC</li>
                                    <li>护理咨询</li>
                                    <li>姿态反应科</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="h-panel">
                <?php if(is_array($list)): foreach($list as $key=>$obj): ?><div class="hospital-item">
                        <img src="/hospitalsystem-master/Public/images/<?php echo ($obj["imgURL"]); ?>"/>
                        <p>
                            <strong><a href="/hospitalsystem-master/index.php/Home/Hospital/keshim?keshiID=<?php echo ($obj["id"]); ?>"><?php echo ($obj["hospitalName"]); ?>&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo ($obj["name"]); ?></a></strong><br>
                            电话：<abbr><?php echo ($obj["phone"]); ?></abbr><br>
                            地址：<abbr><?php echo ($obj["xiangxiAddress"]); ?> </abbr><br>
                        </p>
                        <button class="btn btn-warning"><a href="/hospitalsystem-master/index.php/Home/Hospital/keshim?keshiID=<?php echo ($obj["id"]); ?>">进入科室</a></button>
                    </div><?php endforeach; endif; ?>
                <p><?php echo ($page); ?></p>
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
        $(document).ready(function() {
            showLi();
            $("#header_menu li").eq(2).addClass("active");
            $(".keshi li.items li").click(function() {
                var i1 = $(".items ul").index($(this).parent());
                var i2 = $(this).parent().children("li").index($(this));
                var k = escape($(this).text()).replace(/%u/gi, 'u');
                var str = i1+"-"+i2+"-"+k;
                location.href = APP+"/Home/Hospital/keshi?k="+str;
            });
        });
        function showLi() {
            var i = $("#allKeshi").attr("data-i").split("-");
            window.location.hash = "#li"+i[0];
            $(".keshi li.items").eq(i[0]).show();
            $(".keshi li.items").eq(i[0]).find("li").eq(i[1]).addClass("active");
        }
    </script>

	</body>
</html>