<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>账户安全</title>
	<script type="text/javascript" src="__ROOT__/Sjgw/Common/js/angular.min.js"></script>
    <script type="text/javascript" src="__ROOT__/Sjgw/Common/js/jquery-3.2.1.min.js"></script>
	<style>
		body{
			margin: 0;
			padding: 0;
			list-style: none;
			font: 12px Arial,Helvetica,sans-serif;
    
		}
		li{
			list-style: none;
		}

		a{
			text-decoration: none;
    		color: #666;
		}
		p{
			margin: 0;
			padding: 0;
		}
		h2{
			margin: 0;
			padding: 0;
		}
		dl,dt{
			padding: 0;
			margin: 0;
		}
		.top2 {
		    width: 990px;
		    margin: 0 auto;
		    height: 180px;
		    border-bottom: 1px solid red;
		    position: relative;
		}
		.w2 {
		    width: 990px;
		    margin: 0 auto;
		    position: relative;
		    overflow: hidden;
		}
		.m_left {
		    width: 133px;
		    padding-left: 25px;
		    margin-top: 5px;
		    margin-bottom: 15px;
		    float: left;
		    background: #f8f8f8;
		    border: 1px solid #eee;
		    min-height: 450px;
		}
		.m_right {
		    width: 828px;
		    border: 1px solid #eee;
		    border-left: none;
		    margin-top: 5px;
		    float: right;
		    margin-bottom: 15px;
		    display: none;
		    min-height: 350px;
		}
		.m_title{
			margin: 15px 0;
		    font-weight: 700;
		    overflow: hidden;
		    line-height: 20px;
		    font-size: 14px;
		    font-family: 微软雅黑;
		}
		.m_title b{
			width: 20px;
		    height: 20px;
		    display: block;
		    float: left;
		    background: url(http://static.sanjiang.com/common/images/mine.png) no-repeat;
		}
		.m_title a{
	    	color: #f03838;
		}
		
		.mt{
			color: #666;
    		display: block;
		    overflow: hidden;
		    line-height: 28px;
		    font-size: 12px;
		    font-family: 微软雅黑;
		}
		.active-mt{
		    color: #333;
		    font-size: 14px;
		    font-weight: 700;
		}
		.mt b{
			width: 4px;
		    height: 4px;
		    margin: 12px 12px 8px 4px;
		    display: block;
		    float: left;
		}
		.active-mt b{
		    width: 4px;
		    height: 4px;
		    margin: 12px 12px 8px 4px;
		    display: block;
		    background: #ea1414;
		    float: left;
		}
		.mun{
			line-height: 40px;
		    height: 40px;
		    font-family: 宋体;
		    text-align: left;
		}
		.mun b a{
			font-weight: 400;
		    font-family: 微软雅黑;
		    font-size: 14px;
		    color: #333;
		}
		.cur{
		    color: #f03838;

		}
		.safe_title{
			line-height: 20px;
			padding: 20px 25px;
			font-size: 16px;
		}
		.safe_title span{
			color: #f03838;
			font-family: 微软雅黑;
		}
		.safe_level {
		    border-bottom: 1px dashed #ddd;
		    margin: 0 40px 23px;
		    padding-bottom: 10px;
		    line-height: 50px;
		    overflow: hidden;
		}
		.safe_level span{
			float: left;
			width: 60px;
			display: block;
			color: #666;
		}
	 	.s_line {
		    width: 396px;
		    float: left;
		    height: 18px;
		    padding: 1px;
		    background: #fff;
		    border-radius: 3px;
		    border: 1px solid #e5e5e5;
		    position: relative;
		    margin: 14px 0;
		}
	 	.s_line .level_middle {
		    border-radius: 3px;
		    background: url(http://static.sanjiang.com/safe/images/safe-bf.png) 0 -282px repeat-x;
		    height: 18px;
		    line-height: 18px;
		    text-align: center;
		    color: #fff;
		    width: 66%;
		    position: absolute;
		    left: 1px;
		    top: 1px;
		}
		.safe_level .s_tips {
		    background: url(http://static.sanjiang.com/safe/images/safe-tips.png) 0 0 no-repeat;
		    width: 145px;
		    height: 35px;
		    line-height: 17px;
		    padding: 10px 5px 10px 20px;
		    float: left;
		    margin-left: 8px;
		}
		.safe_list {
		    border-bottom: 1px dashed #ddd;
		    padding-bottom: 23px;
		    overflow: hidden;
		    margin: 0 40px 23px;
		}
		.safe_list .s_status {
		    width: 190px;
		    float: left;
		    height: 50px;
		    border-right: 1px solid #ddd;
		    line-height: 50px;
		    font-weight: 700;
		    font-family: 微软雅黑;
		    font-size: 16px;
		}
		.safe_list .s_status span {
		    width: 40px;
		    height: 34px;
		    background: url(http://static.sanjiang.com/safe/images/safe-bf.png) 0 0 no-repeat;
		    display: block;
		    margin: 5px 10px;
		    float: left;
		}
		.safe_list .s_status span.yes{
			background-position: 0 -100px;
		}
		.safe_list .s_txt{
			width: 460px;
			float: left;
		}
		.safe_list .s_txt p{
			margin-left: 22px;
			line-height: 50px;

		}
		.safe_list .s_txt p span {
		    color: #ea1414;
		}
		.safe_list .s_button_1 {
		    width: 84px;
		    height: 30px;
		    color: #2272c8;
		    line-height: 28px;
		    text-align: center;
		    float: right;
		    display: block;
		    margin-top: 10px;
		}
		.safe_serve{
			margin: 20px 40px;
			color: #666;
			overflow: hidden;
		}
		.safe_serve h2 {
		    line-height: 20px;
		    margin-bottom: 10px;
		    color: #666;
		    font-family: 微软雅黑;
		    font-size: 12px;
		}

		.safe_serve p{
			line-height: 18px;
		}
		.safe_serve p span{
			display: block;

			float: left;
			margin-right: 5px;
		}
		.safe_serve p em {
		    display: block;
		    float: left;
		    font-style: normal;
		    width: 720px;
		}
		.safe_serve p a{
			color:#2272c8;
		}
		.safe_steps {
	   	 	margin: 55px 0 30px 100px;
	    	overflow: hidden;
		}
		.safe_steps dl dd {
		    line-height: 40px;
		    float: left;
		    position: relative;
		    height: 40px;
		    color: #999;
		}
		.safe_steps dl dd.cur i {
		    background: url(http://static.sanjiang.com/safe/images/safe-bf.png) 0 -221px no-repeat;
		    font-size: 23px;
		    color: #36c127;
		}
		.safe_steps dl dd i {
		    width: 40px;
		    z-index: 2;
		    display: block;
		    font-style: normal;
		    text-align: center;
		    font-size: 22px;
		    background: url(http://static.sanjiang.com/safe/images/safe-bf.png) 3px -176px no-repeat;
		    margin-right: 10px;
		    float: left;
		    position: relative;
		    height: 40px;
		}
		.safe_steps dl dd.cur p{
			color: #36c127;
			font-weight: 700;
		}
		.safe_steps dl dd p{
			line-height: 40px;
			float: left;
			font-size: 14px;
		}
		.line_n{
			z-index: 1;
		    border-bottom: 4px solid #ddd;
		    width: 105px;
		    height: 4px;
		    float: left;
		    margin: 16px;
		    display: block;
		}
		.safe_box{
			margin: 0 0 30px 100px;
			color: #666;
		}
		.safe_box dl{
			margin-bottom: 20px;
		    height: 30px;
		    line-height: 30px;
		}
		.safe_box dl dt {
		    width: 125px;
		    float: left;
		    text-align: right;

		}
		.safe_box dl dd {
		    width:560px;
		 	overflow: hidden;
		    position: relative;

		}
		.safe_box dl dd .iphone_num {
		    font-size: 16px;
		    font-weight: 700;
		    float: left;
		    margin-right: 10px;
		}
		.safe_box dl dt span {
		    color: #f03838;
		}
		.safe_box dl dd .input {
		    float: left;
		    width: 180px;
		    height: 20px;
		    line-height: 20px;
		    border: 1px solid #ccc;
		    padding: 4px;
		    background: #fff;
		}
		.a_button{
		    margin: 0 3px 0 8px;
		    float: left;
		    border: 1px solid #ddd;
		    height: 28px;
		    line-height: 28px;
		    background: #f8f8f8;
		    border-radius: 3px;
		    padding: 0 10px;
		}
		.a_button:hover{
			color: red;
		}
		.safe_box dl dd img {
		    width: 75px;
		    height: 30px;
		    float: left;
	     	margin: 0 5px; 
		}
		.safe_box dl dd p a {
		    color: #2272c8;
		}
		.safe_box .submit_button {
		    background: #f03838;
		    width: 102px;
		    height: 30px;
		    line-height: 30px;
		    text-align: center;
		    color: #fff;
		    display: block;
		    border-radius: 3px;
		}
		.safe_box dl dd p{
			float: left;
			color: #999;
			margin-left: 5px;
		}
		.safe_box dl dd p.error{
			color: #f03838;
		}
		.safe_box dl dd p i {
		    width: 16px;
		    height: 16px;
		    display: block;
		    float: left;
		    margin: 7px;
		    background: url(http://static.sanjiang.com/safe/images/safe-bf.png) 0 -50px no-repeat;
		}
		.w2 .active{
			display: block;
		}
		.s_button_2{
			width: 82px;
		    height: 28px;
		    border-radius: 3px;
		    background: #e7f6ff;
		    border: 1px solid #b5dcf5;
		    color: #333;
		    line-height: 28px;
		    text-align: center;
		    float: right;
		    display: block;
		    margin-top: 10px;
		}
		.s_button_2:hover{
			background: #3390ee;
    		color: #fff;
		}
		.safe_box dl dd p {
		    float: left;
		    color: #999;
		    margin-left: 5px;
		}
		.safe_box dl dd p i {
		    width: 16px;
		    height: 16px;
		    display: block;
		    float: left;
		    margin: 7px;
		    background: url(http://static.sanjiang.com/safe/images/safe-bf.png) 0 -50px no-repeat;
		}
		.safe_box dl dd p.yes i {
		    background-position: 0 -76px;
		}
		.safe_box dl dd p.error i {
		    background-position: 0 -50px;
		}
		.safe_box dl dd p.error {
		    color: #f03838;
		}
		.safe_box dl dd .input {
		    float: left;
		    width: 180px;
		    height: 20px;
		    line-height: 20px;
		    border: 1px solid #ccc;
		    padding: 4px;
		    background: #fff;
		}
		input, select, textarea {
		    font-size: 100%;
		    color: #999;
		    vertical-align: middle;
		    border: none;
		    outline: none;
		}
		.safe_box dl dd .reg_psd span {
		    display: inline-block;
		    text-align: center;
		    margin-right: 3px;
		    width: 61px;
		    color: #fff;
		    overflow: hidden;
		    float: left;
		}
		.safe_box dl dd .pwd_Medium_c {
		    background: #f79100;
		}
		.safe_box dl dd .pwd_c {
		    background: #ddd;
		}
		.safe_box .safe_success {
		    margin: 20px 0;
		}
		.safe_box .safe_success .img {
		    background: url(http://static.sanjiang.com/common/images/huihui.jpg) no-repeat;
		    width: 88px;
		    height: 104px;
		    display: block;
		    content: "";
		    float: left;
		    margin-left: 20px;
		}
		.safe_box .safe_success .some p a {
		    color: #2272c8;
		}
	</style>
</head>
<body ng-app="myapp" ng-controller="mycontroller">
	<div class="box1">
		<div class="top2">
		</div>
		<div class="w2">
			<div class="mun ">
				<b><a href="###">首页</a></b>
				&nbsp;>&nbsp;
				<a href="wdeshangjiang.html" >我的三江</a>
				&nbsp;>&nbsp;
				<a href="###" class="cur">账户安全</a>
			</div>
		</div>
		<!-- 左侧列表 -->
		<div class="w2">
			<div class="m_left">
				<div class="m_title">
					<b></b>
					<a href="">我的三江</a>
				</div>
				<div class="mt active-mt">
					<b></b>
					安全设置
				</div>
				<div class="mt">
					<b></b>
					登录密码修改
				</div>
				<div class="mt">
					<b></b>
					手机号修改
				</div>
				<div class="mt">
					<b></b>
					邮箱验证
				</div>	
			</div>
			<!-- 账户安全页面  111 -->
			<div class="m_right active">
				<div class="safe_title">
					<span>账户安全</span>
				</div>
				<div class="safe_level">
					<span>安全级别:</span>
					<div class="s_line">
						<!-- <div class="level_middle" style="width:33.3%">较低</div> -->
						<div class="level_middle">较高</div>
						<!-- <div class="level_middle" style="width:100%">非常高</div> -->
					</div>
					<div class="s_tips">建议启动全部安全设置，以保户账户安全</div>	
				</div>
				<div class="safe_list">
					<div class="s_status">
						<span class="yes"></span>
						 登录密码
					</div>
					<div class="s_txt">
						<p>
							<span>互联网账号存在被盗风险，建议您定期修改密码以保护账户安全</span>
						</p>
					</div>
					<a href="###" class="s_button_1 changepwd">修改</a>
				</div>
				<div class="safe_list">
					<div class="s_status">
						<span class="yes"></span>
						手机修改
					</div>
					<div class="s_txt">
						<p>
						您验证的手机
							<span>{{userinfo.phone}}</span>
							若以丢失或停用，请立即更换
							<span>账户避免被盗</span>
						</p>
					</div>
					<a href="###" class="s_button_1" onclick="tochangephone()">修改</a>
				</div>
				<div class="safe_list">
					<div class="s_status" ng-show="userinfo.verify==1">
						<span class="yes"></span>
						邮箱验证
					</div>
					<div class="s_status"  ng-show="userinfo.verify==0">
						<span class="no" style="background-position: 0 -136px;"></span>
						邮箱验证
					</div>
					<div class="s_txt">
						<p>
						验证后，可用于找回密码
						</p>
					</div>
					<a href="###" class="s_button_1" ng-show="userinfo.verify==1">修改</a>
					<a href="###" class="s_button_2"  ng-show="userinfo.verify==0">立即验证</a>
				</div>
				<div class="safe_serve">
					<h2>安全服务提示</h2>
					<p>
						<span>1.</span>
						<em>确认您登录的是三江购物网，网址
							<a href="###"> http://www.sanjiang.com</a>，注意防范进入钓鱼网站，不要轻信各种即时通讯工具发送的商品或支付链接，谨防网购诈骗。
						</em>
    				</p>

      				<p>
      					<span>2.</span>
      					<em>建议您安装杀毒软件，并定期更新操作系统等软件补丁，确保账户及交易安全。</em>
      				</p>
				</div>	
			</div>
			<!-- 修改密码  填写验证码 2222-->
			<div class="m_right changemima">
				<div class="safe_steps">
					<dl>
						<dd class="cur">
							<i>1</i>
							<p>验证身份</p>
						</dd>
						<dd>
							<div class="line_n"></div>
							<i>2</i>
							<p>修改密码</p>
						</dd>
						<dd>
							<div class="line_n"></div>
							<i>3</i>
							<p>完成</p>
						</dd>
					</dl>
				</div>
				<div class="safe_box">
					<dl>
						<dt>已验证手机：</dt>
						<dd>
							<div class="iphone_num">{{userinfo.phone}}</div>
						</dd>
					</dl>
					<dl>
						<dt><span>*</span>
						手机验证码：
						</dt>
						<dd>
							<input type="text" class="input">
							<a href="###" class="a_button">获取短信校检码</a>
						</dd>
					</dl>
					<dl>
						<dt>验证码：</dt>	
						<dd>
							<input type="text" class="input" id="myverifyinput" placeholder="请输入4位验证码">
							<img src="__APP__/Mysanjiang/verify" id="myverify" onclick='changeverify()'><input type="text" name="" id="check" >
							<p>
							看不清楚？
								<a href="###" onclick="changeverify()">换一张</a>
							</p>
						</dd>
					</dl>
					<dl>
						<dt>&nbsp;</dt>	
						<dd>
							<a href="###" class="submit_button phoneok" ng-click="checkverify()">提交</a>
							<p class="error" ng-hide="checkverifystatus">图文验证码不正确</p>
						</dd>
					</dl>
				</div>		
			</div>
			<div class="m_right changephone">
				<div class="safe_steps">
					<dl>
						<dd class="cur">
							<i>1</i>
							<p>验证身份</p>
						</dd>
						<dd>
							<div class="line_n"></div>
							<i>2</i>
							<p>修改密保手机</p>
						</dd>
						<dd>
							<div class="line_n"></div>
							<i>3</i>
							<p>完成</p>
						</dd>
					</dl>
				</div>
				<div class="safe_box">
					<dl>
						<dt>已验证手机：</dt>
						<dd>
							<div class="iphone_num">{{userinfo.phone}}</div>
						</dd>
					</dl>
					<dl>
						<dt><span>*</span>
						手机验证码：
						</dt>
						<dd>
							<input type="text" class="input">
							<a href="###" class="a_button">获取短信校检码</a>
						</dd>
					</dl>
					<dl>
						<dt>验证码：</dt>	
						<dd>
							<input type="text" class="input" id="myverifyinput" placeholder="请输入4位验证码">
							<img src="__APP__/Mysanjiang/verify" id="myverify" onclick='changeverify()'><input type="text" name="" id="check" >
							<p>
							看不清楚？
								<a href="###" onclick="changeverify()">换一张</a>
							</p>
						</dd>
					</dl>
					<dl>
						<dt>&nbsp;</dt>	
						<dd>
							<a href="###" class="submit_button">提交</a>
						</dd>
					</dl>
				</div>
			</div>
			<!-- 邮箱验证 3333-->
			<div class="m_right">
				<div class="safe_steps">
					<dl>
						<dd class="cur">
							<i>1</i>
							<p>验证身份</p>
						</dd>
						<dd>
							<div class="line_n"></div>
							<i>2</i>
							<p>验证邮箱</p>
						</dd>
						<dd>
							<div class="line_n"></div>
							<i>3</i>
							<p>完成</p>
						</dd>
					</dl>
				</div>
				<div class="safe_box">
					<dl>
						<dt>邮箱地址：</dt>	
						<dd>
							<input type="text" class="input" placeholder="请输入邮箱">
							<p class="error">
								<i></i>
								邮箱不正确，请重新输入
							</p>
							
						</dd>
					</dl>
					<dl>
						<dt>已验证手机：</dt>
						<dd>
							<div class="iphone_num">178*****782</div>
						</dd>
					</dl>
					<dl>
						<dt><span>*</span>
						手机验证码：
						</dt>
						<dd>
							<input type="text" class="input">
							<a href="###" class="a_button">获取短信校检码</a>
						</dd>
					</dl>
					
					<dl>
						<dt>&nbsp;</dt>	
						<dd>
							<a href="###" class="submit_button">提交</a>
						</dd>
					</dl>
				</div>		
			</div>
			<!-- 填写密码 4444-->
			<div class="m_right changemima">
				<div class="safe_steps">
					<dl>
						<dd>
							<i>1</i>
							<p>验证身份</p>
						</dd>
						<dd class="cur" >
							<div class="line_n"></div>
							<i>2</i>
							<p>修改密码</p>
						</dd>
						<dd>
							<div class="line_n"></div>
							<i>3</i>
							<p>完成</p>
						</dd>
					</dl>
				</div>
				<div class="safe_box newpwd">
					<form novalidate="novalidate" name="myform">
						<dl>
							<dt><span>*</span>新的登录密码：</dt>
							<dd>
								<input type="password" name="newpwd" ng-model="newpwd" class="input newpwdinput" ng-minlength="6" ng-maxlength="20" ng-required="true">
								<p class="yes error" ng-if="!myform.newpwd.$valid"><i></i>密码长度只能在6-20位字符之间，请重新输入</p>
								<p class="yes" ng-if="myform.newpwd.$valid"><i></i></p>
							</dd>
						</dl>
						<dl class="h_16" style="height:16px">
				          <dt>&nbsp;</dt>
				          <dd>
				            <div class="reg_psd" style="line-height: 16px;">
				              <span name="pwd_Weak" class=" pwd_Medium_c">弱</span>
				              <span name="pwd_Medium" class=" pwd_Medium_c">中</span>
				              <span name="pwd_Strong" class=" pwd_c pwd_c_r">强</span>
				            </div>
				          </dd>
				        </dl>
						<dl>
							<dt>
							<span>*</span>
							确认登录密码：
							</dt>
							<dd>
								<input type="password" name="" ng-model="newpwd2" class="input newpwdinput">
								<p class="error" ng-show="newpwd!=newpwd2"><i></i>密码不一致</p>
								<p class="yes" ng-show="newpwd==newpwd2"><i></i></p>
							</dd>
						</dl>
						<dl>
							<dt>&nbsp;</dt>	
							<dd>
								<a href="###" class="submit_button phoneok" ng-click="newPwd()">提交</a>
							</dd>
						</dl>
					</form>
				</div>		
			</div>
			<!-- 修改成功 555-->
			<div class="m_right changemima">
				<div class="safe_steps">
					<dl>
						<dd>
							<i>1</i>
							<p>验证身份</p>
						</dd>
						<dd>
							<div class="line_n"></div>
							<i>2</i>
							<p>修改密码</p>
						</dd>
						<dd class="cur" >
							<div class="line_n"></div>
							<i>3</i>
							<p>完成</p>
						</dd>
					</dl>
				</div>
				<div class="safe_box">
					<div class="safe_success">
				        <div class="img"></div>
				        <div class="some">
				          <h1>恭喜您，登录密码已修改成功。</h1>
				          <p>您的账户安全还能提升哦，快去<a onclick="tosafe()">账户安全</a>完善其他安全设置提高评级吧！</p>
				        </div>
				      </div>
				</div>		
			</div>
			<div class="m_right changephone">
				<div class="safe_steps">
					<dl>
						<dd>
							<i>1</i>
							<p>验证身份</p>
						</dd>
						<dd class="cur">
							<div class="line_n"></div>
							<i>2</i>
							<p>修改密保手机</p>
						</dd>
						<dd>
							<div class="line_n"></div>
							<i>3</i>
							<p>完成</p>
						</dd>
					</dl>
				</div>
				<div class="safe_box">
					<dl>
						<dt>已验证手机：</dt>
						<dd>
							<div class="iphone_num">{{userinfo.phone}}</div>
						</dd>
					</dl>
					<dl>
						<dt><span>*</span>
						手机验证码：
						</dt>
						<dd>
							<input type="text" class="input">
							<a href="###" class="a_button">获取短信校检码</a>
						</dd>
					</dl>
					<dl>
						<dt>验证码：</dt>	
						<dd>
							<input type="text" class="input" id="myverifyinput" placeholder="请输入4位验证码">
							<img src="__APP__/Mysanjiang/verify" id="myverify" onclick='changeverify()'><input type="text" name="" id="check" >
							<p>
							看不清楚？
								<a href="###" onclick="changeverify()">换一张</a>
							</p>
						</dd>
					</dl>
					<dl>
						<dt>&nbsp;</dt>	
						<dd>
							<a href="###" class="submit_button">提交</a>
						</dd>
					</dl>
				</div>
			</div>
			<div class="m_right changephone">
				<div class="safe_steps">
					<dl>
						<dd class="cur">
							<i>1</i>
							<p>验证身份</p>
						</dd>
						<dd>
							<div class="line_n"></div>
							<i>2</i>
							<p>修改密保手机</p>
						</dd>
						<dd>
							<div class="line_n"></div>
							<i>3</i>
							<p>完成</p>
						</dd>
					</dl>
				</div>
				<div class="safe_box">
					<dl>
						<dt>已验证手机：</dt>
						<dd>
							<div class="iphone_num">{{userinfo.phone}}</div>
						</dd>
					</dl>
					<dl>
						<dt><span>*</span>
						手机验证码：
						</dt>
						<dd>
							<input type="text" class="input">
							<a href="###" class="a_button">获取短信校检码</a>
						</dd>
					</dl>
					<dl>
						<dt>验证码：</dt>	
						<dd>
							<input type="text" class="input" id="myverifyinput" placeholder="请输入4位验证码">
							<img src="__APP__/Mysanjiang/verify" id="myverify" onclick='changeverify()'><input type="text" name="" id="check" >
							<p>
							看不清楚？
								<a href="###" onclick="changeverify()">换一张</a>
							</p>
						</dd>
					</dl>
					<dl>
						<dt>&nbsp;</dt>	
						<dd>
							<a href="###" class="submit_button">提交</a>
						</dd>
					</dl>
				</div>
			</div>
		</div>
	</div>
</body>
<script src="__ROOT__/Sjgw/Common/js/jquery-3.2.1.min.js"></script>
<script>

    // 刷新验证码
    function changeverify(){
    	// console.log(11111);
        document.getElementById("myverify").src="__APP__/Mysanjiang/verify";
    }
    function tosafe(){
    	$(".m_right").hide();
		$(".m_right").eq(0).show();
		$(".mt").removeClass("active-mt");
		$(".mt").eq(0).addClass("active-mt");
    }
    function tochangephone(){
    	$(".m_right").hide();
    	$(".changephone").eq(0).show();
    	$(".mt").removeClass("active-mt");
    	$(".mt").eq(2).addClass("active-mt");
    }
	$(".mt").click(function(){
		$(".mt").removeClass("active-mt");
		$(this).addClass("active-mt");
		$(".m_right").hide();
		$(".m_right").eq($(this).index()-1).show();
	})
	// 前往修改密码
	$(".changepwd").click(function(){
		$(".m_right").hide();
		$(".changemima").eq(0).show();
	})

	function showd(index){
		$(".m_right").hide();
		$(".m_right").eq(index+1).show();
		$(".mt").removeClass("active-mt");
		$(".mt").eq(index).addClass("active-mt");
	}
	// $(".phoneok").click(function(){
	// 	showd(3);
	// })
	// $(".m_right").eq(0).hide();
	// $(".m_right").eq(1).show();
	// $('.newpwd dl dd p').hide();
	$("input.newpwdinput").blur(function(){
		$(this).parent().find("p").show();
	})
	var app = angular.module('myapp',[]);
    app.controller('mycontroller',function ($scope,$http) {
    	$scope.newpwd='';
    	$scope.checkverifystatus=true;
    	// 获取用户数据
    	$http.post('__APP__/Mysanjiang/getUserData',"",{headers:{"content-type":"application/x-www-form-urlencoded"}}).success(function (res) {
                console.log(res);
                $scope.userinfo = res;
            }).error(function (err) {
                console.log(err);
            })
            // 提交新密码
        $scope.newPwd=function(){
        	if($scope.newpwd===$scope.newpwd2&&$scope.newpwd!=""){
	        	var str = "pwd="+$scope.newpwd;
	        	$http.post('__APP__/Mysanjiang/changePwd',str,{headers:{"content-type":"application/x-www-form-urlencoded"}}).success(function (res) {
	                console.log(res);
	                if(res.status==1){
	                	$(".m_right").hide();
						$(".changemima").eq(2).show();
	                }else{
	                	
	                }
	                // $scope.userinfo = res;
	            }).error(function (err) {
	                console.log(err);
	            })
        	}
        }
        // 验证码
		$scope.checkverify=function (){
			console.log(22);
	        var val = $("#myverifyinput").val();
	        $.ajax({
		        type:'post',
		        url:'__APP__/Mysanjiang/checkverify',
		        data:{
		            val:val
		        },
		        async:true,
		        dataType:'json',
		        success:function(res){
		        	console.log(res);
		        	 console.log($scope.checkverifystatus);
		            if (res.status==1) {
		               	$scope.checkverifystatus=true;
						$(".m_right").hide();
						$(".changemima").eq(1).show();
		            }else{ 
		            	$scope.checkverifystatus=false; 
		            }
		            console.log($scope.checkverifystatus);
	        	}
	    	})
	    }
    })
</script>
</html>