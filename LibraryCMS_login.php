<?php
session_start();
if(isset($_SESSION['username'])){
    header("refresh:0;url=LibraryCMS_index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>登录图书管理系统</title>
  <link rel="icon" href="images/logo96.ico" type="image/x-icon">
  <link rel="shortcut icon" href="images/logo96.ico" type="image/x-icon">
  <link rel="stylesheet" href="layui-v2.5.6/layui/css/layui.css">
  <style>
    html,body{
      width: 100%;
      height: 100%;
      margin: 0;
      padding: 0;
      font-family: "微软雅黑";
    }
    body {
      display: flex;
      align-items: center; /*定义body的元素垂直居中*/
      justify-content: center; /*定义body的里的元素水平居中*/
    }
    #bg{
      width: 400px;
      height: 370px;
      box-shadow:0 0 40px #eeeeee inset;
      border-radius: 15px;
      background:#e2e2e2;
    }
    em{
      cursor: default;
    }
    em a{
      color: #ffffff;
    }
    em a:hover{
      color: #393D49;
      cursor: pointer;
    }
  </style>
</head>
<body class="layui-bg-green">
<div id="bg" >
<div id="form_bg" style="position: relative;">
 <h1 style="text-align: center;color:#393D49;font-weight: bold;margin-top: 20px;cursor: default">登录</h1>
<form class="layui-form" id="login_form" method="post" action="./php/LibraryCMS_loginuser.php">
  <div class="layui-form-item" style="margin-left: 10px;">
    <label class="layui-form-label" for="uname" style="font-size: 15px;color:#393D49; cursor: pointer;">教工号</label>
    <div class="layui-input-block">
      <input type="text" name="uname" id="uname" required  lay-verify="required" lay-reqText="<a style='color:#000000'>教工号不能为空！</a>" placeholder="请输入教工号" autocomplete="off" maxlength="10" class="layui-input" style="width: 220px;margin: 30px 0 0">
    </div>
  </div>
  <div class="layui-form-item" style="margin-left: 10px;">
    <label class="layui-form-label" for="pwd" style="font-size: 15px;color:#393D49; cursor: pointer;">密码</label>
    <div class="layui-input-block">
      <input type="password" name="pwd" id="pwd" required  lay-verify="required" lay-reqText="<a style='color:#000000'>密码不能为空！</a>" placeholder="请输入密码" autocomplete="off" maxlength="20" class="layui-input" style="width: 220px;margin: 30px 0 0">
    </div>
  </div>
   <div class="layui-form-item" style="margin:30px 0 0 10px;">
     <label class="layui-form-label" style="color:#393D49;">滑动验证</label>
     <div class="layui-input-block" style="width: 220px;">
       <div id="slider"></div>
     </div>
   </div>
    <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn layui-btn-normal" id="embed-submit" lay-submit lay-filter="login" style="margin: 40px 0 0 15px" >登录</button>
      <a href="LibraryCMS_register.php" class="layui-btn" id="embed-reg" style="margin: 40px 0 0 20px">注册</a>
    </div>
  </div>
</form>
  <div style="position: fixed;bottom: 5px;margin-left: 90px;"><em>Powered By <a id="author" onclick="layer.open({title: '联系作者',content: '<p style=\'color: #000000;\'>作者QQ：2735982878<br>邮箱：2735982878@qq.com</p>',skin: 'layui-layer-molv',btn: '我知道了',resize: false})">@lhk</a> &nbsp;&nbsp;&nbsp;图书管理系统</em></div>
</div>
</div>
<script src="layui-v2.5.6/layui/layui.js"></script>
<script src="js/jquery-3.4.1.js"></script>
<script src="sliderValidate/src/sliderVerify/sliderVerify.js"></script>
<script>
//一般直接写在一个js文件中
layui.config({
  base: 'sliderValidate/dist/sliderVerify/'
}).use(['sliderVerify', 'jquery', 'form'], function() {
  var sliderVerify = layui.sliderVerify,
          form = layui.form;
  var slider = sliderVerify.render({
          elem: '#slider',
          bg: 'layui-bg-green',
          onOk: function(){//当验证通过另一层
		  layer.msg("滑动验证通过！");
	}
  })


//监听提交
  form.on('submit(login)', function(data){
      if(slider.isOk()){//用作表格验证是否已经滑动成功
          $.ajax({
              type: "POST",//方法
              url: "./php/LibraryCMS_loginuser.php" ,//表单接收url
              data: $('#login_form').serialize(),
              datatype: 'json',
              success: function (data) {
                  //提交成功
                  if (data == 1) {
                      $('#embed-submit').attr({'class':'layui-btn layui-btn-disabled','disabled':'true'});
                      $('#embed-reg').attr({'class':'layui-btn layui-btn-disabled','disabled':'true'});
                      layer.msg("<a style='color: #000000;'>" +"登录成功！即将跳转......" + "</a>",{icon: 1});
                      setTimeout(function (){location.href="LibraryCMS_index.php"},3000);
                  }else if (data == 2) {
                      layer.msg("<a style='color: #000000;'>" +"登录失败，账号或密码错误！" + "</a>",{icon: 2});
                  }
              },
              error : function(data) {
                  //提交失败的提示词或者其他反馈代码
                  layer.msg("<a style='color: #000000;'>" +"连接服务器失败！" + "</a>",{icon: 2});
              }
          });
      }else{
                  layer.msg("<a style='color: #000000;'>" + "请先通过滑块验证" + "</a>",{icon: 2});
				}
				return false;
  });


});

</script>
</body>
</html>